<?php namespace EvolutionCMS\Controllers;

use EvolutionCMS\Facades\ManagerTheme;
use EvolutionCMS\Interfaces\ManagerTheme\PageControllerInterface;
use EvolutionCMS\Models\SiteContent;
use EvolutionCMS\Models\SiteHtmlsnippet;
use EvolutionCMS\Models\SiteModule;
use EvolutionCMS\Models\SitePlugin;
use EvolutionCMS\Models\SiteSnippet;
use EvolutionCMS\Models\SiteTemplate;
use EvolutionCMS\Models\SiteTmplvar;
use EvolutionCMS\Models\SiteTmplvarContentvalue;

class Search extends AbstractController implements PageControllerInterface
{
    protected string $view = 'page.search';

    public function canView(): bool
    {
        return ManagerTheme::getCore()
            ->hasPermission('view_document');
    }

    public function process(): bool
    {
        if (isset($_REQUEST['searchid'])) {
            $_REQUEST['searchfields'] = $_REQUEST['searchid'];
            $_POST['searchfields'] = $_REQUEST['searchid'];
        }

        $this->parameters = [
            'actionButtons' => $this->parameterActionButtons(),
            'results' => isset($_REQUEST['submitok']) && (int)get_by_key($_GET, 'ajax', 0) !== 1 ? $this->getResults() : [],
            'ajaxResults' => $this->getAjaxResults(),
            'templates' => $this->getTemplates(),
            'isSubmitted' => isset($_REQUEST['submitok']),
            'isAjax' => (int)get_by_key($_GET, 'ajax', 0) === 1
        ];

        return true;
    }

    protected function parameterActionButtons()
    {
        return [
            'cancel' => 1
        ];
    }

    protected function getResults()
    {
        $results = null;

        $searchQuery = SiteContent::query()
            ->select('site_content.id', 'pagetitle', 'longtitle', 'description', 'introtext', 'menutitle', 'deleted', 'published', 'isfolder', 'type');

        $searchfields = trim(get_by_key($_REQUEST, 'searchfields', '', 'is_scalar'));


        $templateid = isset($_REQUEST['templateid']) && $_REQUEST['templateid'] !== '' ? (int)$_REQUEST['templateid'] : '';
        $searchcontent = get_by_key($_REQUEST, 'content', '', 'is_scalar');

        // Handle Input "Search by exact URL"
        $idFromAlias = false;
        if (isset($_REQUEST['url']) && $_REQUEST['url'] !== '') {
            $url = $_REQUEST['url'];
            $friendly_url_suffix = ManagerTheme::getCore()
                ->getConfig('friendly_url_suffix');
            $base_url = MODX_BASE_URL;
            $site_url = MODX_SITE_URL;
            $url = preg_replace('@' . $friendly_url_suffix . '$@', '', $url);
            if ($url[0] === '/') {
                $url = preg_replace('@^' . $base_url . '@', '', $url);
            }
            if (substr($url, 0, 4) === 'http') {
                $url = preg_replace('@^' . $site_url . '@', '', $url);
            }
            $idFromAlias = ManagerTheme::getCore()
                ->getIdFromAlias($url);
        }

        if ($searchfields != '') {
            $tvs = SiteTmplvarContentvalue::query()
                ->where('value', 'LIKE', '%' . $searchfields . '%');

            if ($tvs->count() > 0) {
                $articul_id = [];
                $i = 1;
                foreach ($tvs->pluck('contentid')
                             ->toArray() as $articul) {
                    $articul_id[] = $articul;
                }
            }

            if (ctype_digit($searchfields)) {
                $searchQuery->orWhere('site_content.id', $searchfields);
                if (strlen($searchfields) > 3) {
                    $searchQuery->orWhere('site_content.pagetitle', 'LIKE', '%' . $searchfields . '%');
                }
            }

            if ($idFromAlias) {
                $searchQuery->orWhere('site_content.id', $idFromAlias);

            }

            if (!ctype_digit($searchfields)) {
                $searchQuery = $searchQuery->where(function ($query) use ($searchfields) {
                    $query->where('pagetitle', 'LIKE', '%' . $searchfields . '%')
                        ->orWhere('longtitle', 'LIKE', '%' . $searchfields . '%')
                        ->orWhere('description', 'LIKE', '%' . $searchfields . '%')
                        ->orWhere('introtext', 'LIKE', '%' . $searchfields . '%')
                        ->orWhere('menutitle', 'LIKE', '%' . $searchfields . '%')
                        ->orWhere('alias', 'LIKE', '%' . $searchfields . '%');
                });

            }
        } elseif ($idFromAlias) {
            $searchQuery = $searchQuery->where('site_content.id', $idFromAlias);
        }

        if ($templateid !== '') {
            $searchQuery = $searchQuery->where('site_content.template', $templateid);
        }

        if ($searchcontent !== '') {
            $searchQuery = $searchQuery->where('site_content.content', $searchcontent);
        }

        // get document groups for current user
        if (!empty(ManagerTheme::getCore()
            ->getConfig('use_udperms'))) {
            $mgrRole = (isset ($_SESSION['mgrRole']) && $_SESSION['mgrRole'] == 1) ? 1 : 0;
            if ($mgrRole != 1) {
                if (isset($_SESSION['mgrDocgroups']) && is_array($_SESSION['mgrDocgroups'])) {
                    $searchQuery = $searchQuery->leftJoin('document_groups', 'site_content.id', '=', 'document_groups.document')
                        ->where(function ($query) use ($searchfields) {
                            $query->where('privatemgr', 0)
                                ->orWhereIn('document_group', $_SESSION['mgrDocgroups']);
                        });
                } else {
                    $searchQuery = $searchQuery->where('privatemgr', 0);
                }
            }
        }

        $icons = [
            'text/plain' => ManagerTheme::getStyle('icon_document'),
            'text/html' => ManagerTheme::getStyle('icon_document'),
            'text/xml' => ManagerTheme::getStyle('icon_code_file'),
            'text/css' => ManagerTheme::getStyle('icon_code_file'),
            'text/javascript' => ManagerTheme::getStyle('icon_code_file'),
            'image/gif' => ManagerTheme::getStyle('icon_image'),
            'image/jpg' => ManagerTheme::getStyle('icon_image'),
            'image/png' => ManagerTheme::getStyle('icon_image'),
            'application/pdf' => ManagerTheme::getStyle('icon_pdf'),
            'application/rss+xml' => ManagerTheme::getStyle('icon_code_file'),
            'application/vnd.ms-word' => ManagerTheme::getStyle('icon_word'),
            'application/vnd.ms-excel' => ManagerTheme::getStyle('icon_excel'),
        ];

        if(!empty($articul_id)){
            $searchQuery = $searchQuery->orWhereIn('site_content.id', $articul_id);
        }

        $searchQuery = $searchQuery->groupBy('site_content.id');

        $results = $searchQuery->get()
            ->toArray();

        foreach ($results as &$result) {
            $result['iconClass'] = '';
            if ($result['type'] == 'reference') {
                $result['iconClass'] .= ManagerTheme::getStyle('tree_linkgo');
            } elseif ($result['isfolder'] == 0) {
                $result['iconClass'] .= isset($result['contenttype'], $icons[$result['contenttype']]) ? $icons[$result['contenttype']] : ManagerTheme::getStyle('icon_document');
            } else {
                $result['iconClass'] .= ManagerTheme::getStyle('icon_folder');
            }

            $result['rowClass'] = '';
            if ($result['published'] == 0) {
                $result['rowClass'] .= ' unpublishedNode';
            }
            if ($result['deleted'] == 1) {
                $result['rowClass'] .= ' deletedNode';
            }

            if (function_exists('mb_strlen') && function_exists('mb_substr')) {
                $result['pagetitle'] = mb_strlen($result['pagetitle'], ManagerTheme::getCharset()) > 70 ? mb_substr($result['pagetitle'], 0, 70, ManagerTheme::getCharset()) . "..." : $result['pagetitle'];
                $result['description'] = mb_strlen($result['description'], ManagerTheme::getCharset()) > 70 ? mb_substr($result['description'], 0, 70, ManagerTheme::getCharset()) . "..." : $result['description'];
            } else {
                $result['pagetitle'] = strlen($result['pagetitle']) > 20 ? substr($result['pagetitle'], 0, 20) . '...' : $result['pagetitle'];
                $result['description'] = strlen($result['description']) > 35 ? substr($result['description'], 0, 35) . '...' : $result['description'];
            }
        }

        return $results;
    }

    protected function getTemplates()
    {
        $templateid = (isset($_REQUEST['templateid']) && $_REQUEST['templateid'] !== '') ? (int)$_REQUEST['templateid'] : '';

        $templates = [];

        $templates[] = [
            'value' => '',
            'title' => ManagerTheme::getLexicon('none'),
            'selected' => ''
        ];

        $templates[] = [
            'value' => 0,
            'title' => '(blank)',
            'selected' => $templateid === 0 ? ' selected' : ''
        ];

        foreach (SiteTemplate::all()
                     ->toArray() as $row) {
            $templates[] = [
                'value' => $row['id'],
                'title' => htmlspecialchars($row['templatename'], ENT_QUOTES, ManagerTheme::getCore()
                        ->getConfig('modx_charset')) . ' (' . $row['id'] . ')',
                'selected' => $row['id'] == $templateid ? ' selected' : ''
            ];
        }

        return $templates;
    }

    protected function getAjaxResults()
    {
        $output = [];

        $searchfields = trim(get_by_key($_REQUEST, 'searchfields', '', 'is_scalar'));

        if ($searchfields != '') {
            //docs
            if (ManagerTheme::getCore()
                    ->hasPermission('new_document') && ManagerTheme::getCore()
                    ->hasPermission('edit_document') && ManagerTheme::getCore()
                    ->hasPermission('save_document')) {

                $results = $this->getResults();

                $count = count($results);

                if ($count) {
                    $output['content'] = [
                        'class' => ManagerTheme::getStyle('icon_sitemap'),
                        'title' => ManagerTheme::getLexicon('manage_documents') . ' (' . $count . ')'
                    ];
                    foreach ($results as $row) {
                        $output['content']['results'][] = [
                            'id' => $row['id'],
                            'url' => 'index.php?a=27&id=' . $row['id'],
                            'title' => $this->highlightingCoincidence($row['pagetitle'], $_REQUEST['searchfields']) . ' (' . $this->highlightingCoincidence($row['id'], $_REQUEST['searchfields']) . ')',
                            'class' => $this->addClassForItemList('', !$row['published'], $row['deleted'])
                        ];
                    }
                }
            }

            //templates
            if (ManagerTheme::getCore()
                ->hasPermission('edit_template')) {

                $results = SiteTemplate::query()
                    ->select('id', 'templatename', 'locked')
                    ->where('id', 'LIKE', '%' . $searchfields . '%')
                    ->orWhere('templatename', 'LIKE', '%' . $searchfields . '%')
                    ->orWhere('description', 'LIKE', '%' . $searchfields . '%')
                    ->orWhere('content', 'LIKE', '%' . $searchfields . '%');

                $count = $results->count();

                if ($count) {
                    $output['templates'] = [
                        'class' => ManagerTheme::getStyle('icon_template'),
                        'title' => ManagerTheme::getLexicon('manage_templates') . ' (' . $count . ')'
                    ];
                    foreach ($results->get()
                                 ->toArray() as $row) {
                        $output['templates']['results'][] = [
                            'id' => $row['id'],
                            'url' => 'index.php?a=16&id=' . $row['id'],
                            'title' => $this->highlightingCoincidence($row['templatename'], $_REQUEST['searchfields']),
                            'class' => $this->addClassForItemList($row['locked'])
                        ];
                    }
                }
            }

            //tvs
            if (ManagerTheme::getCore()
                    ->hasPermission('edit_template') && ManagerTheme::getCore()
                    ->hasPermission('edit_snippet') && ManagerTheme::getCore()
                    ->hasPermission('edit_chunk') && ManagerTheme::getCore()
                    ->hasPermission('edit_plugin')) {

                $results = SiteTmplvar::query()
                    ->select('id', 'name', 'locked')
                    ->where('id', 'LIKE', '%' . $searchfields . '%')
                    ->orWhere('name', 'LIKE', '%' . $searchfields . '%')
                    ->orWhere('description', 'LIKE', '%' . $searchfields . '%')
                    ->orWhere('type', 'LIKE', '%' . $searchfields . '%')
                    ->orWhere('elements', 'LIKE', '%' . $searchfields . '%')
                    ->orWhere('display', 'LIKE', '%' . $searchfields . '%')
                    ->orWhere('display_params', 'LIKE', '%' . $searchfields . '%')
                    ->orWhere('default_text', 'LIKE', '%' . $searchfields . '%');

                $count = $results->count();

                if ($count) {
                    $output['tmplvars'] = [
                        'class' => ManagerTheme::getStyle('icon_tv'),
                        'title' => ManagerTheme::getLexicon('settings_templvars') . ' (' . $count . ')'
                    ];
                    foreach ($results->get()
                                 ->toArray() as $row) {
                        $output['tmplvars']['results'][] = [
                            'id' => $row['id'],
                            'url' => 'index.php?a=301&id=' . $row['id'],
                            'title' => $this->highlightingCoincidence($row['name'], $_REQUEST['searchfields']),
                            'class' => $this->addClassForItemList($row['locked'])
                        ];
                    }
                }
            }

            //Chunks
            if (ManagerTheme::getCore()
                ->hasPermission('edit_chunk')) {

                $results = SiteHtmlsnippet::query()
                    ->select('id', 'name', 'locked', 'disabled')
                    ->where('id', 'LIKE', '%' . $searchfields . '%')
                    ->orWhere('name', 'LIKE', '%' . $searchfields . '%')
                    ->orWhere('description', 'LIKE', '%' . $searchfields . '%')
                    ->orWhere('snippet', 'LIKE', '%' . $searchfields . '%');

                $count = $results->count();

                if ($count) {
                    $output['htmlsnippets'] = [
                        'class' => ManagerTheme::getStyle('icon_chunk'),
                        'title' => ManagerTheme::getLexicon('manage_htmlsnippets') . ' (' . $count . ')'
                    ];
                    foreach ($results->get()
                                 ->toArray() as $row) {
                        $output['htmlsnippets']['results'][] = [
                            'id' => $row['id'],
                            'url' => 'index.php?a=78&id=' . $row['id'],
                            'title' => $this->highlightingCoincidence($row['name'], $_REQUEST['searchfields']),
                            'class' => $this->addClassForItemList($row['locked'], $row['disabled'])
                        ];
                    }
                }
            }

            //Snippets
            if (ManagerTheme::getCore()
                ->hasPermission('edit_snippet')) {

                $results = SiteSnippet::query()
                    ->select('id', 'name', 'locked', 'disabled')
                    ->where('id', 'LIKE', '%' . $searchfields . '%')
                    ->orWhere('name', 'LIKE', '%' . $searchfields . '%')
                    ->orWhere('description', 'LIKE', '%' . $searchfields . '%')
                    ->orWhere('snippet', 'LIKE', '%' . $searchfields . '%')
                    ->orWhere('properties', 'LIKE', '%' . $searchfields . '%')
                    ->orWhere('moduleguid', 'LIKE', '%' . $searchfields . '%');

                $count = $results->count();

                if ($count) {
                    $output['snippets'] = [
                        'class' => ManagerTheme::getStyle('icon_code'),
                        'title' => ManagerTheme::getLexicon('manage_snippets') . ' (' . $count . ')'
                    ];
                    foreach ($results->get()
                                 ->toArray() as $row) {
                        $output['snippets']['results'][] = [
                            'id' => $row['id'],
                            'url' => 'index.php?a=22&id=' . $row['id'],
                            'title' => $this->highlightingCoincidence($row['name'], $_REQUEST['searchfields']),
                            'class' => $this->addClassForItemList($row['locked'], $row['disabled'])
                        ];
                    }
                }
            }

            //plugins
            if (ManagerTheme::getCore()
                ->hasPermission('edit_plugin')) {

                $results = SitePlugin::query()
                    ->select('id', 'name', 'locked', 'disabled')
                    ->where('id', 'LIKE', '%' . $searchfields . '%')
                    ->orWhere('name', 'LIKE', '%' . $searchfields . '%')
                    ->orWhere('description', 'LIKE', '%' . $searchfields . '%')
                    ->orWhere('plugincode', 'LIKE', '%' . $searchfields . '%')
                    ->orWhere('properties', 'LIKE', '%' . $searchfields . '%')
                    ->orWhere('moduleguid', 'LIKE', '%' . $searchfields . '%');

                $count = $results->count();

                if ($count) {
                    $output['plugins'] = [
                        'class' => ManagerTheme::getStyle('icon_plugin'),
                        'title' => ManagerTheme::getLexicon('manage_plugins') . ' (' . $count . ')'
                    ];
                    foreach ($results->get()
                                 ->toArray() as $row) {
                        $output['plugins']['results'][] = [
                            'id' => $row['id'],
                            'url' => 'index.php?a=102&id=' . $row['id'],
                            'title' => $this->highlightingCoincidence($row['name'], $_REQUEST['searchfields']),
                            'class' => $this->addClassForItemList($row['locked'], $row['disabled'])
                        ];
                    }
                }
            }

            //modules
            if (ManagerTheme::getCore()
                ->hasPermission('edit_module')) {

                $results = SiteModule::query()
                    ->select('id', 'name', 'locked', 'disabled')
                    ->where('id', 'LIKE', '%' . $searchfields . '%')
                    ->orWhere('name', 'LIKE', '%' . $searchfields . '%')
                    ->orWhere('description', 'LIKE', '%' . $searchfields . '%')
                    ->orWhere('modulecode', 'LIKE', '%' . $searchfields . '%')
                    ->orWhere('properties', 'LIKE', '%' . $searchfields . '%')
                    ->orWhere('guid', 'LIKE', '%' . $searchfields . '%')
                    ->orWhere('resourcefile', 'LIKE', '%' . $searchfields . '%');

                $count = $results->count();

                if ($count) {
                    $output['modules'] = [
                        'class' => ManagerTheme::getStyle('icon_cogs'),
                        'title' => ManagerTheme::getLexicon('modules') . ' (' . $count . ')'
                    ];
                    foreach ($results->get()
                                 ->toArray() as $row) {
                        $output['modules']['results'][] = [
                            'id' => $row['id'],
                            'url' => 'index.php?a=108&id=' . $row['id'],
                            'title' => $this->highlightingCoincidence($row['name'], $_REQUEST['searchfields']),
                            'class' => $this->addClassForItemList($row['locked'], $row['disabled'])
                        ];
                    }
                }
            }

            return $output;
        }

        return $output;
    }

    protected function addClassForItemList($locked = '', $disabled = '', $deleted = '')
    {
        $class = '';
        if ($locked) {
            $class .= ' locked';
        }
        if ($disabled) {
            $class .= ' disabled';
        }
        if ($deleted) {
            $class .= ' deleted';
        }
        if ($class) {
            $class = trim($class);
        }

        return $class;
    }

    protected function highlightingCoincidence($text, $search)
    {
        $regexp = '!(' . str_replace(array(
                '(',
                ')'
            ), array(
                '\(',
                '\)'
            ), entities(trim($search), ManagerTheme::getCore()
                ->getConfig('modx_charset'))) . ')!isu';

        return preg_replace($regexp, '<span class="text-danger">$1</span>', entities($text, ManagerTheme::getCore()
            ->getConfig('modx_charset')));
    }
}
