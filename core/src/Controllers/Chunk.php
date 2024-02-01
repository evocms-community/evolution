<?php namespace EvolutionCMS\Controllers;

use EvolutionCMS\Facades\ManagerTheme;
use EvolutionCMS\Models;
use EvolutionCMS\Interfaces\ManagerTheme\PageControllerInterface;
use EvolutionCMS\Models\Category;
use EvolutionCMS\Models\SiteHtmlsnippet;
use Illuminate\Support\Collection;

class Chunk extends AbstractController implements PageControllerInterface
{
    protected string $view = 'page.chunk';

    protected int $elementType = 3;

    protected $events = [
        'OnChunkFormPrerender',
        'OnChunkFormRender',
        'OnRichTextEditorRegister',
        'OnRichTextEditorInit'
    ];

    /** @var SiteHtmlsnippet|null */
    private $object;

    protected $which_editor;

    /**
     * {@inheritdoc}
     */
    public function canView(): bool
    {
        if($this->getIndex() == 77) {
            return ManagerTheme::getCore()->hasPermission('new_chunk');
        }
        if($this->getIndex() == 78) {
            return ManagerTheme::getCore()->hasPermission('edit_chunk');
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
            'data'          => $this->object,
            'elementType' => $this->elementType,
            'categories'    => $this->parameterCategories(),
            'which_editor'  => $this->which_editor,
            'action'        => $this->getIndex(),
            'events'        => $this->parameterEvents(),
            'actionButtons' => $this->parameterActionButtons()
        ];

        return true;
    }

    /**
     * @return SiteHtmlsnippet
     */
    protected function parameterData()
    {
        $id = $this->getElementId();

        /** @var SiteHtmlsnippet $data */
        $data = SiteHtmlsnippet::firstOrNew(['id' => $id]);

        if ($data->exists) {
            if (empty($data->count())) {
                ManagerTheme::alertAndQuit('Chunk not found for id ' . $id . '.', false);
            }

            $_SESSION['itemname'] = $data->name;
            if ($data->locked === 1 && $_SESSION['mgrRole'] != 1) {
                ManagerTheme::alertAndQuit('error_no_privileges');
            }

            $this->which_editor = $data->editor_name;
        } elseif (isset($_REQUEST['itemname'])) {
            $data->name = $_REQUEST['itemname'];
        } else {
            $_SESSION['itemname'] = ManagerTheme::getLexicon("new_htmlsnippet");
        }

        $values = ManagerTheme::loadValuesFromSession($_POST);

        if (!empty($values)) {
            $data->fill($values);
            if (isset($values['which_editor'])) {
                $this->which_editor = $values['which_editor'];
            } else {
                $this->which_editor = 'none';
            }
        }

        ManagerTheme::getCore()->setConfig('which_editor', $this->which_editor);

        return $data;
    }

    protected function parameterCategories(): Collection
    {
        return Category::orderBy('rank', 'ASC')
            ->orderBy('category', 'ASC')
            ->get();
    }

    protected function parameterEvents(): array
    {
        $out = [];

        foreach ($this->events as $event) {
            $out[$event] = $this->callEvent($event);
        }

        return $out;
    }

    private function callEvent($name)
    {
        switch ($name) {
            case 'OnRichTextEditorRegister':
                $out = $this->callEventOnRichTextEditorRegister();
                break;

            case 'OnRichTextEditorInit':
                $out = $this->callEventOnRichTextEditorInit();
                break;

            default:
                $out = $this->callEventDefault($name);
        }

        return $out;
    }

    protected function callEventOnRichTextEditorRegister()
    {
        $out = ManagerTheme::getCore()->invokeEvent('OnRichTextEditorRegister', [
            'controller' => $this
        ]);
        if (empty($out) && !is_array($out)) {
            $out = [];
        }

        return (array)$out;
    }

    protected function callEventOnRichTextEditorInit()
    {
        if ($this->which_editor) {
            $editor = $this->which_editor;
        } else if ($this->object->editor_name !== 'none') {
            $editor = $this->object->editor_name;
        } else {
            $editor = 'none';
        }

        $out = ManagerTheme::getCore()->invokeEvent('OnRichTextEditorInit', [
            'editor' => $editor,
            'elements' => ['post'],
            'controller' => $this
        ]);

        if (\is_array($out)) {
            return implode('', $out);
        }

        return (string)$out;
    }

    protected function callEventDefault($name)
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
            'select' => 1,
            'save' => ManagerTheme::getCore()->hasPermission('save_chunk'),
            'new' => ManagerTheme::getCore()->hasPermission('new_chunk'),
            'duplicate' => !empty($this->object->getKey()) && ManagerTheme::getCore()->hasPermission('new_chunk'),
            'delete' => !empty($this->object->getKey()) && ManagerTheme::getCore()->hasPermission('delete_chunk'),
            'cancel' => 1
        ];
    }
}
