<?php

namespace EvolutionCMS\Controllers;

use EvolutionCMS\Facades\ManagerTheme;
use EvolutionCMS\Interfaces\ManagerTheme\PageControllerInterface;
use EvolutionCMS\Models\Category;
use EvolutionCMS\Models\SiteModule;
use EvolutionCMS\Models\SitePlugin;
use Illuminate\Database\Query\Builder;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class Plugin extends AbstractController implements PageControllerInterface
{
    protected string $view = 'page.plugin';

    protected int $elementType = 5;

    protected array $events = [
        'OnPluginFormPrerender',
        'OnPluginFormRender',
    ];

    /** @var SitePlugin|null */
    private ?SitePlugin $object;

    protected $internal;

    /**
     * {@inheritdoc}
     */
    public function canView(): bool
    {
        return match ($this->getIndex()) {
            101 => evo()->hasPermission('new_plugin'),
            102 => evo()->hasPermission('edit_plugin'),
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
            'internal' => $this->internal,
            'events' => $this->parameterEvents(),
            'actionButtons' => $this->parameterActionButtons(),
        ];

        return true;
    }

    /**
     * @return SitePlugin
     */
    protected function parameterData(): SitePlugin
    {
        $id = $this->getElementId();

        /** @var Builder | SitePlugin $data */
        $data = SitePlugin::query()->firstOrNew(['id' => $id]);

        if ($data->exists) {
            if (empty($data->count())) {
                ManagerTheme::alertAndQuit('Plugin not found for id ' . $id . '.', false);
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
            $join->on('site_module_depobj.type', '=', DB::raw(30));
        })->join('site_plugins', 'site_plugins.id', '=', 'site_module_depobj.resource')
            ->where('site_module_depobj.resource', $this->object->getKey())
            ->where('site_modules.enable_sharedparams', 1)->orderBy('site_modules.name')->get()
            ->pluck('name', 'guid')->toArray();
    }

    protected function parameterDocBlockList()
    {
        $out = '';
        $internal = [];
        if (isset($this->object->plugincode)) {
            $snippetcode = $this->object->plugincode;
            $parsed = evo()->parseDocBlockFromString($snippetcode);
            $out = evo()->convertDocBlockIntoList($parsed);
            $internal[0]['events'] = $parsed['events'] ?? '';
        }

        $this->internal = json_encode($internal);

        return $out;
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
            $out = implode('', $out);
        }

        return (string) $out;
    }

    protected function parameterActionButtons(): array
    {
        return [
            'select' => 1,
            'save' => evo()->hasPermission('save_plugin'),
            'new' => evo()->hasPermission('new_plugin'),
            'duplicate' => !empty($this->object->getKey()) && evo()->hasPermission('new_plugin'),
            'delete' => !empty($this->object->getKey()) && evo()->hasPermission('delete_plugin'),
            'cancel' => 1,
        ];
    }
}
