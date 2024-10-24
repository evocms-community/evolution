<?php

namespace EvolutionCMS\Controllers;

use EvolutionCMS\Facades\ManagerTheme;
use EvolutionCMS\Interfaces\ManagerTheme\PageControllerInterface;
use EvolutionCMS\Models\Category;
use EvolutionCMS\Models\SiteModule;
use EvolutionCMS\Models\SiteSnippet;
use Illuminate\Database\Query\Builder;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class Snippet extends AbstractController implements PageControllerInterface
{
    protected string $view = 'page.snippet';

    protected int $elementType = 4;

    protected array $events = [
        'OnSnipFormPrerender',
        'OnSnipFormRender',
    ];

    /** @var SiteSnippet|null */
    private ?SiteSnippet $object;

    /**
     * {@inheritdoc}
     */
    public function canView(): bool
    {
        return match ($this->getIndex()) {
            22 => evo()->hasPermission('edit_snippet'),
            23 => evo()->hasPermission('new_snippet'),
            default => false,
        };
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
            'action' => $this->getIndex(),
            'importParams' => $this->parameterImportParams(),
            'docBlockList' => $this->parameterDocBlockList(),
            'events' => $this->parameterEvents(),
            'actionButtons' => $this->parameterActionButtons(),
        ];

        return true;
    }

    /**
     * @return SiteSnippet
     */
    protected function parameterData(): SiteSnippet
    {
        $id = $this->getElementId();

        /** @var Builder | SiteSnippet $data */
        $data = SiteSnippet::query()->firstOrNew(['id' => $id]);

        if ($data->exists) {
            if (empty($data->count())) {
                ManagerTheme::alertAndQuit('Snippet not found for id ' . $id . '.', false);
            }

            $_SESSION['itemname'] = $data->name;
            if ($data->locked === 1 && $_SESSION['mgrRole'] != 1) {
                ManagerTheme::alertAndQuit('error_no_privileges');
            }
        } elseif (isset($_REQUEST['itemname'])) {
            $data->name = $_REQUEST['itemname'];
        } else {
            $_SESSION['itemname'] = __('global.new_snippet');
        }

        $values = ManagerTheme::loadValuesFromSession($_POST);

        if (!empty($values)) {
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

    protected function parameterImportParams(): array
    {
        return SiteModule::query()->join('site_module_depobj', function ($join) {
            $join->on('site_module_depobj.module', '=', 'site_modules.id');
            $join->on('site_module_depobj.type', '=', DB::raw(40));
        })->join('site_snippets', 'site_snippets.id', '=', 'site_module_depobj.resource')
            ->where('site_module_depobj.resource', $this->object->getKey())
            ->where('site_modules.enable_sharedparams', 1)->orderBy('site_modules.name')->get()
            ->pluck('name', 'guid')->toArray();
    }

    protected function parameterDocBlockList()
    {
        if (!isset($this->object->snippet)) {
            return '';
        }

        return evo()->convertDocBlockIntoList(
            evo()->parseDocBlockFromString(
                $this->object->snippet
            )
        );
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
            'save' => evo()->hasPermission('save_snippet'),
            'new' => evo()->hasPermission('new_snippet'),
            'duplicate' => $this->object->getKey() && evo()->hasPermission('new_snippet'),
            'delete' => $this->object->getKey() && evo()->hasPermission('delete_snippet'),
            'cancel' => 1,
        ];
    }
}
