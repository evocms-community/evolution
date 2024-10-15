<?php

namespace EvolutionCMS\Controllers;

use EvolutionCMS\Facades\ManagerTheme;
use EvolutionCMS\Interfaces\ManagerTheme\PageControllerInterface;
use EvolutionCMS\Models\Category;
use EvolutionCMS\Models\SiteTemplate;
use EvolutionCMS\Models\SiteTmplvar;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Collection;

class Template extends AbstractController implements PageControllerInterface
{
    protected string $view = 'page.template';

    protected int $elementType = 1;

    protected array $events = [
        'OnTempFormPrerender',
        'OnTempFormRender',
    ];

    /** @var SiteTemplate|null */
    private ?SiteTemplate $object;

    /**
     * {@inheritdoc}
     */
    public function canView(): bool
    {
        if ($this->getIndex() == 16) {
            return evo()->hasPermission('edit_template');
        }
        if ($this->getIndex() == 19) {
            return evo()->hasPermission('new_template');
        }

        return false;
    }

    /**
     * {@inheritdoc}
     */
    public function process(): bool
    {
        evo()->lockElement($this->elementType, $this->getElementId());

        $this->object = $this->parameterData();
        $this->parameters = [
            'data' => $this->object,
            'elementType' => $this->elementType,
            'categories' => $this->parameterCategories(),
            'tvSelected' => $this->parameterTvSelected(),
            'categoriesWithTv' => $this->parameterCategoriesWithTv(
                $this->object->tvs->reject(
                    function (SiteTmplvar $item) {
                        return $item->category === 0;
                    }
                )->pluck('id')->toArray()
            ),
            'tvOutCategory' => $this->parameterTvOutCategory(
                $this->object->tvs->reject(
                    function (SiteTmplvar $item) {
                        return $item->category !== 0;
                    }
                )->pluck('id')->toArray()
            ),
            'action' => $this->getIndex(),
            'events' => $this->parameterEvents(),
            'actionButtons' => $this->parameterActionButtons(),
        ];

        return true;
    }

    /**
     * @return SiteTemplate
     */
    protected function parameterData(): SiteTemplate
    {
        $id = $this->getElementId();

        /** @var SiteTemplate $data */
        $data = SiteTemplate::with('tvs')
            ->firstOrNew(['id' => $id], [
                'category' => (int) get_by_key($_REQUEST, 'catid', 0),
                'selectable' => 1,
            ]);

        if ($id > 0) {
            if (!$data->exists) {
                ManagerTheme::alertAndQuit('No database record has been found for this template.');
            }

            $_SESSION['itemname'] = $data->templatename;
            if ($data->locked == 1 && $_SESSION['mgrRole'] != 1) {
                ManagerTheme::alertAndQuit('error_no_privileges');
            }
        } else {
            $_SESSION['itemname'] = __('global.new_template');
        }

        $values = ManagerTheme::loadValuesFromSession($_POST);

        if ($values) {
            $data->fill($values);
        }

        return $data;
    }

    protected function parameterCategories(): Collection
    {
        return Category::query()
            ->orderBy('rank')
            ->orderBy('category')
            ->get();
    }

    protected function parameterTvSelected(): array
    {
        return array_unique(array_map('intval', get_by_key($_POST, 'assignedTv', [], 'is_array')));
    }

    protected function parameterTvOutCategory(array $ignore = []): Collection
    {
        $query = SiteTmplvar::with('templates')
            ->where('category', 0)
            ->orderBy('name');

        if (!empty($ignore)) {
            $query = $query->whereNotIn('id', $ignore);
        }

        return $query->get();
    }

    protected function parameterCategoriesWithTv(array $ignore = []): Collection
    {
        $query = Category::with('tvs.templates')
            ->whereHas('tvs', function (Builder $builder) use (
                $ignore
            ) {
                if (!empty($ignore)) {
                    $builder = $builder->whereNotIn(
                        (new SiteTmplvar)->getTable() . '.id'
                        ,
                        $ignore
                    );
                }

                return $builder;
            })
            ->orderBy('rank');

        return $query->get();
    }

    protected function parameterEvents(): array
    {
        $out = [];

        foreach ($this->events as $event) {
            $out[$event] = $this->callEvent($event);
        }

        return $out;
    }

    private function callEvent($name): string
    {
        $out = evo()->invokeEvent($name, [
            'id' => $this->getElementId(),
            'controller' => $this,
        ]);

        if (is_array($out)) {
            return implode('', $out);
        }

        return (string) $out;
    }

    protected function parameterActionButtons(): array
    {
        return [
            'select' => 1,
            'save' => evo()->hasPermission('save_template'),
            'new' => evo()->hasPermission('new_template'),
            'duplicate' => $this->object->getKey() && evo()->hasPermission('new_template'),
            'delete' => $this->object->getKey() && evo()->hasPermission('delete_template'),
            'cancel' => 1,
        ];
    }
}
