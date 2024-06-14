<?php namespace EvolutionCMS\Controllers;

use EvolutionCMS\Facades\ManagerTheme;
use EvolutionCMS\Interfaces\ManagerTheme\PageControllerInterface;
use EvolutionCMS\Models\Category;
use EvolutionCMS\Models\SiteModule;
use EvolutionCMS\Models\SiteSnippet;
use Illuminate\Support\Collection;

class Snippet extends AbstractController implements PageControllerInterface
{
    protected string $view = 'page.snippet';

    protected int $elementType = 4;

    protected $events = [
        'OnSnipFormPrerender',
        'OnSnipFormRender'
    ];

    /** @var SiteSnippet|null */
    private $object;

    /**
     * {@inheritdoc}
     */
    public function canView(): bool
    {
        switch ($this->getIndex()) {
            case 22:
                $out = ManagerTheme::getCore()->hasPermission('edit_snippet');
                break;

            case 23:
                $out = ManagerTheme::getCore()->hasPermission('new_snippet');
                break;

            default:
                $out = false;
        }

        return $out;
    }

    /**
     * {@inheritdoc}
     */
    public function process(): bool
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
            'events' => $this->parameterEvents(),
            'actionButtons' => $this->parameterActionButtons(),
        ];

        return true;
    }

    /**
     * @return SiteSnippet
     */
    protected function parameterData()
    {
        $id = $this->getElementId();

        /** @var SiteSnippet $data */
        $data = SiteSnippet::firstOrNew(['id' => $id]);

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
        return Category::orderBy('rank', 'ASC')
            ->orderBy('category', 'ASC')
            ->get();
    }

    protected function parameterImportParams()
    {
        return SiteModule::query()->join('site_module_depobj', function ($join) {
            $join->on('site_module_depobj.module', '=', 'site_modules.id');
            $join->on('site_module_depobj.type', '=', \DB::raw(40));
        })->join('site_snippets', 'site_snippets.id', '=', 'site_module_depobj.resource')
            ->where('site_module_depobj.resource', $this->object->getKey())
            ->where('site_modules.enable_sharedparams', 1)->orderBy('site_modules.name', 'ASC')->get()
            ->pluck('name', 'guid')->toArray();
    }

    protected function parameterDocBlockList()
    {
        if (!isset($this->object->snippet)) {
            return '';
        }

        return ManagerTheme::getCore()->convertDocBlockIntoList(
            ManagerTheme::getCore()->parseDocBlockFromString(
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
            'select' => 1,
            'save' => ManagerTheme::getCore()->hasPermission('save_snippet'),
            'new' => ManagerTheme::getCore()->hasPermission('new_snippet'),
            'duplicate' => $this->object->getKey() && ManagerTheme::getCore()->hasPermission('new_snippet'),
            'delete' => $this->object->getKey() && ManagerTheme::getCore()->hasPermission('delete_snippet'),
            'cancel' => 1
        ];
    }
}
