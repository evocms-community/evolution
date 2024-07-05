<?php namespace EvolutionCMS;

use EvolutionCMS\Interfaces\CoreInterface;
use EvolutionCMS\Interfaces\TemplateController;
use EvolutionCMS\Models\SiteTemplate;

class TemplateProcessor
{
    /**
     * @var Interfaces\CoreInterface
     */
    protected $core;


    public function __construct(Interfaces\CoreInterface $core)
    {
        $this->core = $core;
    }

    public function getBladeDocumentContent()
    {
        $template = false;
        $controller = '';
        $doc = $this->core->documentObject;
        $namespace = trim($this->core->getConfig('ControllerNamespace'));
        if (isset($doc['templatealias']) && $doc['templatealias'] != '') {
            $templateAlias = $doc['templatealias'];
            $controller = $doc['templatecontroller'] ?? '';
        } else {
            if ($doc['template'] === 0) {
                $templateAlias = '_blank';
                if (!empty($namespace) && class_exists($namespace . 'Blank') && is_subclass_of($namespace . 'Blank',
                        TemplateController::class)) {
                    $controller = 'Blank';
                }
            } else {
                $query = SiteTemplate::select(['templatecontroller', 'templatealias'])->find($doc['template']);
                $templateAlias = $query->templatealias;
                $controller = $query->templatecontroller;
            }
        }

        switch (true) {
            case $this->core['view']->exists('tpl-' . $doc['template'] . '_doc-' . $doc['id']):
                $template = 'tpl-' . $doc['template'] . '_doc-' . $doc['id'];
                break;
            case $this->core['view']->exists('doc-' . $doc['id']):
                $template = 'doc-' . $doc['id'];
                break;
            case $this->core['view']->exists('tpl-' . $doc['template']):
                $template = 'tpl-' . $doc['template'];
                break;
            case $this->core['view']->exists($templateAlias):
            case !empty($controller):
                if (isset($doc['id'])) {
                    $documentObject = $this->core->makeDocumentObject($doc['id']);
                    $data = [
                        'modx'           => $this->core,
                        'documentObject' => $documentObject,
                    ];
                } else {
                    $data = [
                        'modx'           => $this->core,
                        'documentObject' => [],
                    ];
                }
                $this->core['view']->share($data);
                if ($this->core->isChunkProcessor('DLTemplate')) {
                    app('DLTemplate')->blade->share($data);
                }
                if (!empty($namespace) && class_exists($namespace . $controller) && is_subclass_of($namespace . $controller,
                        TemplateController::class)) {
                    $controller = $namespace . $controller;
                    $controller = new $controller;
                    $controller->setView($templateAlias);
                    $controller->process();
                    $this->core->addDataToView($controller->getViewData());
                    $view = $controller->getView();
                    if (!empty($view)) {
                        $templateAlias = $view;
                    }
                }
                $template = $templateAlias;
                break;
            default:
                $content = $doc['template'] ? $this->core->documentContent : $doc['content'];
                if (!$content) {
                    $content = $doc['content'];
                }
                if (strpos($content, '@FILE:') === 0) {
                    $template = str_replace('@FILE:', '', trim($content));
                    if (!$this->core['view']->exists($template)) {
                        $this->core->documentObject['template'] = 0;
                        $this->core->documentContent = $doc['content'];
                    }
                }
        }

        return $template;
    }

    /**
     * @param $templateID
     * @return mixed
     */
    public function getTemplateCodeFromDB($templateID)
    {
        return SiteTemplate::findOrFail($templateID)->content;
    }

    /**
     * @param  string  $templateAlias
     * @return string
     */
    private function setPsrClassNames(string $templateAlias): string
    {
        $explodedTplName = explode('_', $templateAlias);
        $explodedTplName = array_map(
            function ($item) {
                return ucfirst(trim($item));
            },
            $explodedTplName
        );

        return join($explodedTplName);
    }
}
