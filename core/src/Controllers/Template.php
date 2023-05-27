<?php namespace EvolutionCMS\Controllers;

use EvolutionCMS\Facades\ManagerTheme;
use EvolutionCMS\Interfaces\ManagerTheme\PageControllerInterface;
use EvolutionCMS\Models\Category;
use EvolutionCMS\Models\SiteTemplate;
use EvolutionCMS\Models\SiteTmplvar;
use Illuminate\Support\Collection;
use Illuminate\Database\Eloquent;

class Template extends AbstractController implements PageControllerInterface
{
    protected string $view = 'page.template';

    protected int $elementType = 1;

    protected $events = [
        'OnTempFormPrerender',
        'OnTempFormRender'
    ];

    /** @var SiteTemplate|null */
    private $object;

    /**
     * {@inheritdoc}
     */
    public function canView(): bool
    {
        if($this->getIndex() == 16) {
            return ManagerTheme::getCore()->hasPermission('edit_template');
        }
        if($this->getIndex() == 19) {
            return ManagerTheme::getCore()->hasPermission('new_template');
        }
        return false;
    }

    /**
     * {@inheritdoc}
     */
    public function process() : bool
    {
        ManagerTheme::getCore()->lockElement($this->elementType, $this->getElementId());

        $this->object = $this->parameterData();
        $this->parameters = [
            'data' => $this->object,
            'elementType' => $this->elementType,
            'categories'       => $this->parameterCategories(),
            'tvSelected'       => $this->parameterTvSelected(),
            'categoriesWithTv' => $this->parameterCategoriesWithTv(
                $this->object->tvs->reject(
                    function (SiteTmplvar $item) {
                        return $item->category === 0;
                    })->pluck('id')->toArray()
            ),
            'tvOutCategory'    => $this->parameterTvOutCategory(
                $this->object->tvs->reject(
                    function (SiteTmplvar $item) {
                        return $item->category !== 0;
                    })->pluck('id')->toArray()
            ),
            'action'           => $this->getIndex(),
            'events'           => $this->parameterEvents(),
            'actionButtons'    => $this->parameterActionButtons()
        ];

        return true;
    }

    /**
     * @return SiteTemplate
     */
    protected function parameterData()
    {
        $id = $this->getElementId();

        /** @var SiteTemplate $data */
        $data = SiteTemplate::with('tvs')
            ->firstOrNew(['id'   => $id], [
                    'category'   => (int)get_by_key($_REQUEST, 'catid', 0),
                    'selectable' => 1
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
            $_SESSION['itemname'] = ManagerTheme::getLexicon("new_template");
        }

        $values = ManagerTheme::loadValuesFromSession($_POST);

        if ($values) {
            $data->fill($values);
        }

        return $data;
    }

    protected function parameterCategories(): Collection
    {
        return Category::orderBy('rank', 'ASC')
            ->orderBy('category', 'ASC')
            ->get();
    }

    protected function parameterTvSelected()
    {
        return array_unique(array_map('intval', get_by_key($_POST, 'assignedTv', [], 'is_array')));
    }

    protected function parameterTvOutCategory(array $ignore = []): Collection
    {
        $query = SiteTmplvar::with('templates')
            ->where('category', '=', 0)
            ->orderBy('name', 'ASC');

        if (!empty($ignore)) {
            $query = $query->whereNotIn('id', $ignore);
        }

        return $query->get();
    }

    protected function parameterCategoriesWithTv(array $ignore = []): Collection
    {
        $query = Category::with('tvs.templates')
            ->whereHas('tvs', function(Eloquent\Builder $builder) use
            (
                $ignore
            ) {
                if (!empty($ignore)) {
                    $builder = $builder->whereNotIn(
                        (new SiteTmplvar)->getTable() . '.id'
                        , $ignore
                    );
                }
                return $builder;
            })
            ->orderBy('rank', 'ASC');

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
        $out = ManagerTheme::getCore()->invokeEvent($name, [
            'id' => $this->getElementId(),
            'controller' => $this
        ]);
        if (\is_array($out)) {
            return implode('', $out);
        }

        return (string)$out;
    }

    protected function parameterActionButtons()
    {
        return [
            'select'    => 1,
            'save'      => ManagerTheme::getCore()->hasPermission('save_template'),
            'new'       => ManagerTheme::getCore()->hasPermission('new_template'),
            'duplicate' => $this->object->getKey() && ManagerTheme::getCore()->hasPermission('new_template'),
            'delete'    => $this->object->getKey() && ManagerTheme::getCore()->hasPermission('delete_template'),
            'cancel'    => 1
        ];
    }
}
