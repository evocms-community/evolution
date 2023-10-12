<?php

namespace EvolutionCMS\Legacy;

use EvolutionCMS\Facades\ManagerTheme;
use EvolutionCMS\Models\SiteHtmlsnippet;
use EvolutionCMS\Models\SiteModule;
use EvolutionCMS\Models\SitePlugin;
use EvolutionCMS\Models\SiteSnippet;
use EvolutionCMS\Models\SiteTemplate;
use EvolutionCMS\Models\SiteTmplvar;

class ModuleCategoriesManager extends Categories
{
    /**
     * @var array
     */
    public array $params = [];
    /**
     * @var array
     */
    public array $translations = [];
    /**
     * @var array
     */
    public array $new_translations = [];

    /**
     * Set a parameter key and its value
     *
     * @param string $key parameter key
     * @param mixed $value parameter value - could be mixed value-types
     *
     * @return null
     */
    public function set(string $key, $value)
    {
        $this->params[$key] = $value;

        return null;
    }

    /**
     * Get a parameter value
     *
     * @param string $key Parameter-key
     *
     * @return  string           return the parameter value if exists, otherwise false
     */
    public function get(string $key)
    {
        $modx = evolutionCMS();

        if (isset($this->params[$key])) {
            return $this->params[$key];
        } elseif (isset($modx->config[$key])) {
            return $modx->config[$key];
        } elseif (isset($modx->event->params[$key])) {
            return $modx->event->params[$key];
        }

        return false;
    }

    /**
     * @param string $message
     * @param string $namespace
     */
    public function addMessage(string $message, string $namespace = 'default')
    {
        $this->params['messages'][$namespace][] = $message;
    }

    /**
     * @param string $namespace
     *
     * @return bool
     */
    public function getMessages(string $namespace = 'default')
    {
        if (isset($this->params['messages'][$namespace])) {
            return $this->params['messages'][$namespace];
        }

        return false;
    }

    /**
     * @param string $view_name
     * @param $data
     */
    public function renderView($view_name, $data = null)
    {
        global $_lang, $_style;

        $filename = trim($view_name) . '.tpl.phtml';
        $file = self::get('views_dir') . $filename;
        $view = &$this;

        if (is_file($file)
            && is_readable($file)
        ) {
            include $file;
        } else {
            echo 'View "' . self::get('views_dir') . '<strong>' . $filename . '</strong>" not found.';
        }
    }

    /**
     * @param string $element
     * @param int $element_id
     * @param int $category_id
     *
     * @return bool
     */
    public function updateElement($element, $element_id, $category_id): bool
    {
        $_update = [
            'category' => (int) $category_id,
        ];

        switch ($element) {
            case 'templates':
                SiteTemplate::query()->where('id', $element_id)->update($_update);
                break;
            case  'tmplvars':
                SiteTmplvar::query()->where('id', $element_id)->update($_update);
                break;
            case 'htmlsnippets':
                SiteHtmlsnippet::query()->where('id', $element_id)->update($_update);
                break;
            case 'snippets':
                SiteSnippet::query()->where('id', $element_id)->update($_update);
                break;
            case 'plugins':
                SitePlugin::query()->where('id', $element_id)->update($_update);
                break;
            case 'modules':
                SiteModule::query()->where('id', $element_id)->update($_update);
                break;
        }

        return true;
    }

    /**
     * @param string $txt
     *
     * @return string
     */
    public function txt(string $txt): string
    {
        return ManagerTheme::getLexicon($txt);
    }
}
