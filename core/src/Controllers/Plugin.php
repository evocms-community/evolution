<?php namespace EvolutionCMS\Controllers;

use EvolutionCMS\Facades\ManagerTheme;
use EvolutionCMS\Interfaces\ManagerTheme\PageControllerInterface;
use EvolutionCMS\Models\Category;
use EvolutionCMS\Models\SiteModule;
use EvolutionCMS\Models\SitePlugin;
use Illuminate\Support\Collection;

class Plugin extends AbstractController implements PageControllerInterface
{
    protected string $view = 'page.plugin';

    protected int $elementType = 5;

    protected $events = [
        'OnPluginFormPrerender',
        'OnPluginFormRender'
    ];

    /** @var SitePlugin|null */
    private $object;

    protected $internal;

    /**
     * {@inheritdoc}
     */
    public function canView(): bool
    {
        switch ($this->getIndex()) {
            case 101:
                $out = ManagerTheme::getCore()->hasPermission('new_plugin');
                break;

            case 102:
                $out = ManagerTheme::getCore()->hasPermission('edit_plugin');
                break;

            default:
                $out = false;
        }

        return $out;
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
            'categories' => $this->parameterCategories(),
            'action' => $this->getIndex(),
            'importParams' => $this->parameterImportParams(),
            'docBlockList' => $this->parameterDocBlockList(),
            'internal' => $this->internal,
            'events' => $this->parameterEvents(),
            'actionButtons' => $this->parameterActionButtons()
        ];

        return true;
    }

    /**
     * @return SitePlugin
     */
    protected function parameterData()
    {
        $id = $this->getElementId();

        /** @var SitePlugin $data */
        $data = SitePlugin::firstOrNew(['id' => $id]);

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
        return Category::orderBy('rank', 'ASC')
            ->orderBy('category', 'ASC')
            ->get();
    }

    protected function parameterImportParams(): array
    {

        return SiteModule::query()->join('site_module_depobj', function ($join) {
            $join->on('site_module_depobj.module', '=', 'site_modules.id');
            $join->on('site_module_depobj.type', '=', \DB::raw(30));
        })->join('site_plugins', 'site_plugins.id', '=', 'site_module_depobj.resource')
            ->where('site_module_depobj.resource', $this->object->getKey())
            ->where('site_modules.enable_sharedparams', 1)->orderBy('site_modules.name', 'ASC')->get()
            ->pluck('name', 'guid')->toArray();
    }

    protected function parameterDocBlockList()
    {
        $out = '';
        $internal = array();
        if (isset($this->object->plugincode)) {
            $snippetcode = $this->object->plugincode;
            $parsed = ManagerTheme::getCore()->parseDocBlockFromString($snippetcode);
            $out = ManagerTheme::getCore()->convertDocBlockIntoList($parsed);
            $internal[0]['events'] = isset($parsed['events']) ? $parsed['events'] : '';
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
        $out = ManagerTheme::getCore()->invokeEvent($name, [
            'id' => $this->getElementId(),
            'controller' => $this
        ]);
        if (\is_array($out)) {
            $out = implode('', $out);
        }

        return (string)$out;
    }

    protected function parameterActionButtons()
    {
        return [
            'select'    => 1,
            'save'      => ManagerTheme::getCore()->hasPermission('save_plugin'),
            'new'       => ManagerTheme::getCore()->hasPermission('new_plugin'),
            'duplicate' => !empty($this->object->getKey()) && ManagerTheme::getCore()->hasPermission('new_plugin'),
            'delete'    => !empty($this->object->getKey()) && ManagerTheme::getCore()->hasPermission('delete_plugin'),
            'cancel'    => 1
        ];
    }
}
