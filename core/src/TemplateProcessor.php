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
        if(isset($this->core->documentObject['templatealias']) && $this->core->documentObject['templatealias'] != ''){
            $templateAlias = $this->core->documentObject['templatealias'];
            $controller = $this->core->documentObject['templatecontroller'];
        }else {
            if($doc['template'] === 0) {
                $templateAlias = '_blank';
            } else {
                $query = SiteTemplate::select(['templatecontroller','templatealias'])->find($doc['template']);
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
                if (isset($this->core->documentObject['id'])) {
                    $documentObject = $this->core->makeDocumentObject($this->core->documentObject['id']);
                    $data = [
                        'modx' => $this->core,
                        'documentObject' => $documentObject,
                    ];
                    $this->core->addDataToView($documentObject);
                } else {
                    $data = [
                        'modx' => $this->core,
                        'documentObject' => [],
                        'siteContentObject' => [],
                    ];
                }
                $this->core['view']->share($data);
                if ($this->core->isChunkProcessor('DLTemplate')) {
                    app('DLTemplate')->blade->share($data);
                }
                $namespace = trim($this->core->getConfig('ControllerNamespace'));
                if (!empty($namespace)) {
                    if(!empty($controller) && class_exists($namespace . $controller) && is_subclass_of($namespace . $controller, TemplateController::class)) {
                        $controller = $namespace . $controller;
                        $controller = new $controller;
                        $controller->setView($templateAlias);
                        $controller->process();
                        $this->core->addDataToView($controller->getViewData());
                        $view = $controller->getView();
                        if(!empty($view)) {
                            $templateAlias = $view;
                        }
                    } else {
                        $baseClassName = $namespace . 'BaseController';
                        if (class_exists($baseClassName)) { //Проверяем есть ли Base класс
                            $classArray = explode('.', $templateAlias);
                            $classArray = array_map(
                                function ($item) {
                                    return $this->setPsrClassNames($item);
                                },
                                $classArray
                            );
                            $classViewPart = implode('.', $classArray);
                            $className = str_replace('.', '\\', $classViewPart);
                            $className = $namespace . ucfirst($className) . 'Controller';
                            if (!class_exists(
                                $className
                            )) { //Проверяем есть ли контроллер по алиасу, если нет, то помещаем Base
                                $className = $baseClassName;
                            }
                            $controller = $this->core->make($className);
                            if (method_exists($controller, 'main')) {
                                $this->core->call([$controller, 'main']);
                            }
                        } else {
                            $this->core->logEvent(0, 3, $baseClassName . ' not exists!');
                        }
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
     * @param string $templateAlias
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
