<?php

use EvolutionCMS\Facades\ManagerTheme;
use EvolutionCMS\Models\DocumentGroup;
use EvolutionCMS\Models\SiteContent;
use EvolutionCMS\Models\SiteHtmlsnippet;
use EvolutionCMS\Models\SiteModule;
use EvolutionCMS\Models\SitePlugin;
use EvolutionCMS\Models\SiteSnippet;
use EvolutionCMS\Models\SiteTemplate;
use EvolutionCMS\Models\SiteTmplvar;
use EvolutionCMS\Models\User;
use EvolutionCMS\Models\UserRole;

define('IN_MANAGER_MODE', true); // we use this to make sure files are accessed through
define('MODX_API_MODE', true);

if (file_exists(dirname(__DIR__, 3) . '/config.php')) {
    $config = require dirname(__DIR__) . '/config.php';
} elseif (file_exists(dirname(__DIR__, 4) . '/config.php')) {
    $config = require dirname(__DIR__, 4) . '/config.php';
} else {
    $config = [
        'root' => dirname(__DIR__, 4),
    ];
}

if (!empty($config['root']) && file_exists($config['root'] . '/index.php')) {
    require_once $config['root'] . '/index.php';
} else {
    echo "<h3>Unable to load configuration settings</h3>";
    echo "Please run the Evolution CMS <a href='../install'>install utility</a>";
    exit;
}

evo()->getSettings();

if (!isset($_SESSION['mgrValidated']) || !isset($_SERVER['HTTP_X_REQUESTED_WITH']) || (strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) != 'xmlhttprequest') || ($_SERVER['REQUEST_METHOD'] != 'POST')) {
    evo()->sendErrorPage();
}

ManagerTheme::setRequest();

evo()->sid = session_id();

$action = get_by_key($_REQUEST, 'a', '', 'is_scalar');
$frame = get_by_key($_REQUEST, 'f', '', 'is_scalar');
$role = isset($_SESSION['mgrRole']) && $_SESSION['mgrRole'] == 1 ? 1 : 0;
$docGroups = isset($_SESSION['mgrDocgroups']) && is_array($_SESSION['mgrDocgroups']) ? implode(',', $_SESSION['mgrDocgroups']) : '';

// set limit sql query
$limit = evo()->getConfig('number_of_results');
header('Content-Type: text/html; charset=' . evo()->getConfig('modx_charset'), true);

if (isset($action)) {
    switch ($action) {
        case '1':
            switch ($frame) {
                case 'nodes':
                    // save folderstate
                    if (isset($_REQUEST['opened'])) {
                        $_SESSION['openedArray'] = $_REQUEST['opened'];
                    }
                    if (isset($_REQUEST['savestateonly'])) {
                        exit('send some data');
                    } //??

                    $indent = (int) $_REQUEST['indent'];
                    $parent = (int) $_REQUEST['parent'];
                    $expandAll = (int) $_REQUEST['expandAll'];
                    $output = '';
                    $hereId = isset($_REQUEST['id']) && is_numeric($_REQUEST['id']) ? $_REQUEST['id'] : '';

                    if (isset($_REQUEST['showonlyfolders'])) {
                        $_SESSION['tree_show_only_folders'] = $_REQUEST['showonlyfolders'];
                    }

                    // setup sorting
                    $sortParams = [
                        'tree_sortby',
                        'tree_sortdir',
                        'tree_nodename',
                    ];
                    foreach ($sortParams as $param) {
                        if (isset($_REQUEST[$param])) {
                            $_SESSION[$param] = $_REQUEST[$param];
                            evo()->getManagerApi()->saveLastUserSetting($param, $_REQUEST[$param]);
                        }
                    }

                    // icons by content type
                    $icons = getIconInfo(ManagerTheme::getStyle());

                    if (isset($_SESSION['openedArray'])) {
                        $opened = array_filter(array_map('intval', explode('|', $_SESSION['openedArray'])));
                    } else {
                        $opened = [];
                    }

                    $opened2 = [];
                    $closed2 = [];

                    //makeHTML($indent, $parent, $expandAll, $hereid);
                    echo makeHTML($indent, $parent, $expandAll, $hereId);

                    // check for deleted documents on reload
                    if ($expandAll == 2) {
                        if (!is_null(SiteContent::withTrashed()->firstWhere('deleted', 1))) {
                            echo '<span id="binFull"></span>'; // add a special element to let system now that the bin is full
                        }
                    }
                    break;
            }
            break;

        // elements
        case '76':
            $elements = isset($_REQUEST['elements']) && is_scalar($_REQUEST['elements']) ? htmlentities($_REQUEST['elements']) : '';

            if ($elements) {
                $output = '';
                $items = '';
                $sql = '';
                $a = '';
                $filter = !empty($_REQUEST['filter']) && is_scalar($_REQUEST['filter']) ? addcslashes(trim($_REQUEST['filter']), '%*_') : '';

                switch ($elements) {
                    case 'element_templates':
                        $a = 16;
                        $sql = SiteTemplate::query()
                            ->select('id', 'templatename', 'templatename as name', 'locked')
                            ->orderBy('templatename', 'ASC');
                        if ($filter != '') {
                            $sql = $sql->where('templatename', 'LIKE', '%' . $filter . '%');
                        }

                        if (evo()->hasPermission('new_template')) {
                            $output .= '<li><a id="a_19" href="index.php?a=19" target="main"><i class="' .
                                ManagerTheme::getStyle('icon_add') . '"></i>' . ManagerTheme::getLexicon('new_template') . '</a></li>';
                        }

                        break;

                    case 'element_tplvars':
                        $a = 301;
                        $prefix = DB::getTablePrefix();
                        $sql = SiteTmplvar::query()
                            ->select(
                                'site_tmplvars.id',
                                'site_tmplvars.name',
                                'site_tmplvars.locked',
                                'site_tmplvar_templates.tmplvarid',
                                'templateid',
                                'roleid'
                            )
                            ->leftJoin('site_tmplvar_templates', function ($join) {
                                $join->on('site_tmplvar_templates.tmplvarid', '=', 'site_tmplvars.id');
                                $join->on('site_tmplvar_templates.templateid', '>', DB::raw(0));
                            })
                            ->leftJoin('user_role_vars', function ($join) {
                                $join->on('user_role_vars.tmplvarid', '=', 'site_tmplvars.id');
                                $join->on('user_role_vars.roleid', '>', DB::raw(0));
                            })
                            ->orderBy('site_tmplvars.name')
                            ->groupBy(['site_tmplvars.id', 'site_tmplvars.name', 'site_tmplvars.locked', 'site_tmplvar_templates.tmplvarid']);

                        if ($filter != '') {
                            $sql = $sql->where('site_tmplvars.name', 'LIKE', '%' . $filter . '%');
                        }

                        if (evo()->hasPermission('edit_template') && evo()->hasPermission('edit_snippet') &&
                            evo()->hasPermission('edit_chunk') && evo()->hasPermission('edit_plugin')
                        ) {
                            $output .= '<li><a id="a_300" href="index.php?a=300" target="main"><i class="' .
                                ManagerTheme::getStyle('icon_add') . '"></i>' . ManagerTheme::getLexicon('new_tmplvars') . '</a></li>';
                        }

                        break;

                    case 'element_htmlsnippets':
                        $a = 78;
                        $sql = SiteHtmlsnippet::query()
                            ->select('id', 'name', 'locked', 'disabled')
                            ->orderBy('name', 'ASC');
                        if ($filter != '') {
                            $sql = $sql->where('name', 'LIKE', '%' . $filter . '%');
                        }

                        if (evo()->hasPermission('new_chunk')) {
                            $output .= '<li><a id="a_77" href="index.php?a=77" target="main"><i class="' .
                                ManagerTheme::getStyle('icon_add') . '"></i>' . ManagerTheme::getLexicon('new_htmlsnippet') . '</a></li>';
                        }

                        break;

                    case 'element_snippets':
                        $a = 22;
                        $sql = SiteSnippet::query()
                            ->select('id', 'name', 'locked', 'disabled')
                            ->orderBy('name', 'ASC');

                        if ($filter != '') {
                            $sql = $sql->where('name', 'LIKE', '%' . $filter . '%');
                        }

                        if (evo()->hasPermission('new_snippet')) {
                            $output .= '<li><a id="a_23" href="index.php?a=23" target="main"><i class="' .
                                ManagerTheme::getStyle('icon_add') . '"></i>' . ManagerTheme::getLexicon('new_snippet') . '</a></li>';
                        }

                        break;

                    case 'element_plugins':
                        $a = 102;
                        $sql = SitePlugin::query()
                            ->select('id', 'name', 'locked', 'disabled')
                            ->orderBy('name', 'ASC');

                        if ($filter != '') {
                            $sql = $sql->where('name', 'LIKE', '%' . $filter . '%');
                        }

                        if (evo()->hasPermission('new_plugin')) {
                            $output .= '<li><a id="a_101" href="index.php?a=101" target="main"><i class="' .
                                ManagerTheme::getStyle('icon_add') . '"></i>' . ManagerTheme::getLexicon('new_plugin') . '</a></li>';
                        }

                        break;

                    case 'element_modules':
                        $a = 108;
                        $sql = SiteModule::query()
                            ->select('id', 'name', 'locked', 'disabled')
                            ->orderBy('name', 'ASC');

                        if ($filter != '') {
                            $sql = $sql->where('name', 'LIKE', '%' . $filter . '%');
                        }

                        if (evo()->hasPermission('new_module')) {
                            $output .= '<li><a id="a_107" href="index.php?a=107" target="main"><i class="' .
                                ManagerTheme::getStyle('icon_add') . '"></i>' . ManagerTheme::getLexicon('new_module') . '</a></li>';
                        }

                        break;
                }

                if ($sql->count() > 0) {
                    if ($sql->get(['id'])->count() > $limit) {
                        $output .= '<li class="item-input"><input type="text" name="filter" class="dropdown-item form-control form-control-sm" autocomplete="off" /></li>';
                    }

                    foreach ($sql->take($limit)->get() as $row) {
                        $row = $row->toArray();
                        if ($a == 301) {
                            $row['disabled'] = !$row['templateid'] && !$row['roleid'];
                        }

                        if (!isset($row['disabled'])) {
                            $row['disabled'] = 0;
                        }

                        if (($row['disabled'] || $row['locked']) && $role != 1) {
                            continue;
                        }

                        $items .= '<li class="item ' . ($row['disabled'] ? 'disabled' : '') .
                            ($row['locked'] ? ' locked' : '') . '"><a id="a_' . $a . '__id_' . $row['id'] .
                            '" href="index.php?a=' . $a . '&id=' . $row['id'] .
                            '" target="main" data-parent-id="a_76__elements_' . $elements . '">' .
                            entities($row['name'], evo()->getConfig('modx_charset')) . ' <small class="text-muted">(' .
                            $row['id'] . ')</small></a></li>';
                    }
                }

                if (isset($_REQUEST['filter'])) {
                    $output = $items;
                } else {
                    $output .= $items;
                }

                echo $output;
            }
            break;

        case '86':
        {
            $a = 35;
            $output = '';
            $items = '';
            $filter = !empty($_REQUEST['filter']) && is_scalar($_REQUEST['filter']) ? addcslashes(trim($_REQUEST['filter']), '\%*_') : '';

            $sql = UserRole::query()->orderBy('name');

            if ($filter != '') {
                $sql = $sql->where('name', 'LIKE', '%' . $filter . '%');
            }

            if (evo()->hasPermission('new_role')) {
                $output .= '<li><a id="a_35" href="index.php?a=35" target="main"><i class="' .
                    ManagerTheme::getStyle('icon_add') . '"></i>' . ManagerTheme::getLexicon('new_role') . '</a></li>';
            }

            if ($count = $sql->count()) {
                if ($count > $limit) {
                    $output .= '<li class="item-input"><input type="text" name="filter" class="dropdown-item form-control form-control-sm" autocomplete="off" /></li>';
                }
                foreach ($sql->take($limit)->get() as $row) {
                    $items .= '<li class="item"><a id="a_' . $a . '__id_' . $row->id . '" ' .
                        ($row->id == 1 ? '' : 'href="index.php?a=' . $a . '&id=' . $row->id . '" target="main"') . '>' .
                        entities($row->name, evo()->getConfig('modx_charset')) . ' <small>(' . $row->id .
                        ')</small></a></li>';
                }
            }

            if (isset($_REQUEST['filter'])) {
                $output = $items;
            } else {
                $output .= $items;
            }

            echo $output;
            break;
        }

        // users
        case '99':
            $a = 88;
            $output = '';
            $items = '';
            $filter = !empty($_REQUEST['filter']) && is_scalar($_REQUEST['filter']) ? addcslashes(trim($_REQUEST['filter']), '\%*_') : '';

            $sql = User::query()
                ->select('users.*', 'user_attributes.blocked')
                ->leftJoin('user_attributes', 'users.id', '=', 'user_attributes.internalKey')
                ->orderBy('users.username');

            if ($filter != '') {
                $sql = $sql->where('users.username', 'LIKE', '%' . $filter . '%');
            }

            if (evo()->hasPermission('new_user')) {
                $output .= '<li><a id="a_87" href="index.php?a=87" target="main"><i class="' .
                    ManagerTheme::getStyle('icon_add') . '"></i>' . ManagerTheme::getLexicon('new_web_user') . '</a></li>';
            }

            if ($count = $sql->count()) {
                if ($count > $limit) {
                    $output .= '<li class="item-input"><input type="text" name="filter" class="dropdown-item form-control form-control-sm" autocomplete="off" /></li>';
                }
                foreach ($sql->take($limit)->get() as $row) {
                    $items .= '<li class="item ' . ($row->blocked ? 'disabled' : '') . '"><a id="a_' . $a . '__id_' .
                        $row->id . '" href="index.php?a=' . $a . '&id=' . $row->id . '" target="main">' .
                        entities($row->username, evo()->getConfig('modx_charset')) . ' <small class="text-muted">(' .
                        $row->id . ')</small></a></li>';
                }
            }

            if (isset($_REQUEST['filter'])) {
                $output = $items;
            } else {
                $output .= $items;
            }

            echo $output;
            break;

        case 'modxTagHelper':
            $name = isset($_REQUEST['name']) && is_scalar($_REQUEST['name']) ? $_REQUEST['name'] : false;
            $type = isset($_REQUEST['type']) && is_scalar($_REQUEST['type']) ? $_REQUEST['type'] : false;
            $contextmenu = '';

            if ($role && $name && $type) {
                switch ($type) {
                    case 'Snippet':
                    case 'SnippetNoCache':
                    $snippet = SiteSnippet::query()->where('name', $name)->first();

                        if (!is_null($snippet)) {
                            $row = $snippet->toArray();

                            $contextmenu = [
                                'header' => [
                                    'innerHTML' => '<i class="' . ManagerTheme::getStyle('icon_code') . '"></i> ' .
                                        entities($row['name'], evo()->getConfig('modx_charset')),
                                ],
                                'item' => [
                                    'innerHTML' => '<i class="' . ManagerTheme::getStyle('icon_edit') . '"></i> ' .
                                        ManagerTheme::getLexicon('edit'),
                                    'url' => "index.php?a=22&id=" . $row['id'],
                                ],
                            ];
                            if (!empty($row['description'])) {
                                $contextmenu['seperator'] = '';
                                $contextmenu['description'] = [
                                    'innerHTML' => '<i class="' . ManagerTheme::getStyle('icon_info') . '"></i> ' .
                                        entities($row['description'], evo()->getConfig('modx_charset')),
                                ];
                            }
                        } else {
                            $contextmenu = [
                                'header' => [
                                    'innerHTML' => '<i class="' . ManagerTheme::getStyle('icon_code') . '"></i> ' .
                                        entities($name, evo()->getConfig('modx_charset')),
                                ],
                                'item' => [
                                    'innerHTML' => '<i class="' . ManagerTheme::getStyle('icon_add') . '"></i> ' .
                                        ManagerTheme::getLexicon('new_snippet'),
                                    'url' => "index.php?a=23&itemname=" .
                                        entities($name, evo()->getConfig('modx_charset')),
                                ],
                            ];
                        }
                        break;

                    case 'Chunk':
                        $chunk = SiteHtmlsnippet::query()->where('name', $name)->first();

                        if (!is_null($chunk)) {
                            $row = $chunk->toArray();
                            $contextmenu = [
                                'header' => [
                                    'innerHTML' => '<i class="' . ManagerTheme::getStyle('icon_chunk') . '"></i> ' .
                                        entities($row['name'], evo()->getConfig('modx_charset')),
                                ],
                                'item' => [
                                    'innerHTML' => '<i class="' . ManagerTheme::getStyle('icon_edit') . '"></i> ' .
                                        ManagerTheme::getLexicon('edit'),
                                    'url' => "index.php?a=78&id=" . $row['id'],
                                ],
                            ];
                            if (!empty($row['description'])) {
                                $contextmenu['seperator'] = '';
                                $contextmenu['description'] = [
                                    'innerHTML' => '<i class="' . ManagerTheme::getStyle('icon_info') . '"></i> ' .
                                        entities($row['description'], evo()->getConfig('modx_charset')),
                                ];
                            }
                        } else {
                            $contextmenu = [
                                'header' => [
                                    'innerHTML' => '<i class="' . ManagerTheme::getStyle('icon_chunk') . '"></i> ' .
                                        entities($name, evo()->getConfig('modx_charset')),
                                ],
                                'item' => [
                                    'innerHTML' => '<i class="' . ManagerTheme::getStyle('icon_add') . '"></i> ' .
                                        ManagerTheme::getLexicon('new_htmlsnippet'),
                                    'url' => "index.php?a=77&itemname=" .
                                        entities($name, evo()->getConfig('modx_charset')),
                                ],
                            ];
                        }
                        break;

                    case 'AttributeValue':
                        $chunk = SiteHtmlsnippet::query()->where('name', $name)->first();

                        if (!is_null($chunk)) {
                            $row = $chunk->toArray();
                            $contextmenu = [
                                'header' => [
                                    'innerText' => entities($row['name'], evo()->getConfig('modx_charset')),
                                ],
                                'item' => [
                                    'innerHTML' => '<i class="' . ManagerTheme::getStyle('icon_edit') . '"></i> ' .
                                        ManagerTheme::getLexicon('edit'),
                                    'url' => "index.php?a=78&id=" . $row['id'],
                                ],
                            ];
                            if (!empty($row['description'])) {
                                $contextmenu['seperator'] = '';
                                $contextmenu['description'] = [
                                    'innerHTML' => '<i class="' . ManagerTheme::getStyle('icon_info') . '"></i> ' .
                                        entities($row['description'], evo()->getConfig('modx_charset')),
                                ];
                            }
                        } else {
                            $snippet = SiteSnippet::query()->where('name', $name)->first();

                            if (!is_null($snippet)) {
                                $row = $snippets->toArray();
                                $contextmenu = [
                                    'header' => [
                                        'innerHTML' => '<i class="' . ManagerTheme::getStyle('icon_code') . '"></i> ' .
                                            entities($row['name'], evo()->getConfig('modx_charset')),
                                    ],
                                    'item' => [
                                        'innerHTML' => '<i class="' . ManagerTheme::getStyle('icon_edit') . '"></i> ' .
                                            ManagerTheme::getLexicon('edit'),
                                        'url' => "index.php?a=22&id=" . $row['id'],
                                    ],
                                ];
                                if (!empty($row['description'])) {
                                    $contextmenu['seperator'] = '';
                                    $contextmenu['description'] = [
                                        'innerHTML' => '<i class="' . ManagerTheme::getStyle('icon_info') . '"></i> ' .
                                            entities($row['description'], evo()->getConfig('modx_charset')),
                                    ];
                                }
                            } else {
                                $contextmenu = [
                                    'header' => [
                                        'innerHTML' => '<i class="' . ManagerTheme::getStyle('icon_code') . '"></i> ' .
                                            entities($name, evo()->getConfig('modx_charset')),
                                    ],
                                    'item' => [
                                        'innerHTML' => '<i class="' . ManagerTheme::getStyle('icon_add') . '"></i> ' .
                                            ManagerTheme::getLexicon('new_htmlsnippet'),
                                        'url' => "index.php?a=77&itemname=" .
                                            entities($name, evo()->getConfig('modx_charset')),
                                    ],
                                    'item2' => [
                                        'innerHTML' => '<i class="' . ManagerTheme::getStyle('icon_add') . '"></i> ' .
                                            ManagerTheme::getLexicon('new_snippet'),
                                        'url' => "index.php?a=23&itemname=" .
                                            entities($name, evo()->getConfig('modx_charset')),
                                    ],
                                ];
                            }
                        }
                        break;

                    case 'Placeholder':
                    case 'Tv':
                        $default_field = [
                            'id',
                            'type',
                            'contentType',
                            'pagetitle',
                            'longtitle',
                            'description',
                            'alias',
                            'link_attributes',
                            'published',
                            'pub_date',
                            'unpub_date',
                            'parent',
                            'isfolder',
                            'introtext',
                            'content',
                            'richtext',
                            'template',
                            'menuindex',
                            'searchable',
                            'cacheable',
                            'createdon',
                            'createdby',
                            'editedon',
                            'editedby',
                            'deleted',
                            'deletedon',
                            'deletedby',
                            'publishedon',
                            'publishedby',
                            'menutitle',
                            'hide_from_tree',
                            'haskeywords',
                            'hasmetatags',
                            'privateweb',
                            'privatemgr',
                            'content_dispo',
                            'hidemenu',
                            'alias_visible',
                        ];

                        if (in_array($name, $default_field)) {
                            return;
                        }

                    $tv = SiteTmplvar::query()->where('name', $name)->first();

                        if (!is_null($tv)) {
                            $row = $tv->toArray();
                            $contextmenu = [
                                'header' => [
                                    'innerHTML' => '<i class="' . ManagerTheme::getStyle('icon_tv') . '"></i> ' .
                                        entities($row['name'], evo()->getConfig('modx_charset')),
                                ],
                                'item' => [
                                    'innerHTML' => '<i class="' . ManagerTheme::getStyle('icon_edit') . '"></i> ' .
                                        ManagerTheme::getLexicon('edit'),
                                    'url' => "index.php?a=301&id=" . $row['id'],
                                ],
                            ];
                            if (!empty($row['description'])) {
                                $contextmenu['seperator'] = '';
                                $contextmenu['description'] = [
                                    'innerHTML' => '<i class="' . ManagerTheme::getStyle('icon_info') . '"></i> ' .
                                        entities($row['description'], evo()->getConfig('modx_charset')),
                                ];
                            }
                        } else {
                            $contextmenu = [
                                'header' => [
                                    'innerHTML' => '<i class="' . ManagerTheme::getStyle('icon_tv') . '"></i> ' .
                                        entities($name, evo()->getConfig('modx_charset')),
                                ],
                                'item' => [
                                    'innerHTML' => '<i class="' . ManagerTheme::getStyle('icon_add') . '"></i> ' .
                                        ManagerTheme::getLexicon('new_tmplvars'),
                                    'url' => "index.php?a=300&itemname=" .
                                        entities($name, evo()->getConfig('modx_charset')),
                                ],
                            ];
                        }
                        break;
                }
                echo json_encode($contextmenu, JSON_FORCE_OBJECT | JSON_UNESCAPED_UNICODE);
                break;
            }
            break;

        case 'movedocument':
            $json = [];

            if (evo()->hasPermission('new_document') && evo()->hasPermission('edit_document') &&
                evo()->hasPermission('save_document')
            ) {
                $id = !empty($_REQUEST['id']) ? (int) $_REQUEST['id'] : '';
                $parent = isset($_REQUEST['parent']) ? (int) $_REQUEST['parent'] : 0;
                $menuindex = isset($_REQUEST['menuindex']) && is_scalar($_REQUEST['menuindex']) ? $_REQUEST['menuindex'] : 0;

                // set parent
                if ($id && $parent >= 0) {

                    // find older parent
                    $parentOld = (int) SiteContent::withTrashed()->find($id)->parent;
                    $eventOut = evo()->invokeEvent('OnBeforeMoveDocument', [
                        'id' => $id,
                        'old_parent' => $parentOld,
                        'new_parent' => $parent,
                    ]);

                    if (is_array($eventOut) && count($eventOut) > 0) {
                        $eventParent = array_pop($eventOut);

                        if ($eventParent == $parentOld) {
                            $json['errors'] = ManagerTheme::getLexicon('error_movedocument2');
                        } else {
                            $parent = $eventParent;
                        }
                    }

                    $parentDeleted = $parent > 0 && empty(SiteContent::query()->find($parent));
                    if ($parentDeleted) {
                        $json['errors'] = ManagerTheme::getLexicon('error_parent_deleted');
                    } elseif (empty($json['errors'])) {
                        // check privileges user for move docs
                        if (!empty(evo()->config['tree_show_protected']) && $role != 1) {
                            $docs = DocumentGroup::query()->whereIn('document', [$id, $parent, $parentOld]);
                            if ($docs->count() > 0) {
                                $document_groups = [];
                                foreach ($docs->get()->toArray() as $row) {
                                    $document_groups[$row['document']]['groups'][] = $row['document_group'];
                                }
                                foreach ($document_groups as $key => $value) {
                                    if (($key == $parent || $key == $parentOld || $key == $id) && !in_array($role, $value['groups'])) {
                                        $json['errors'] = ManagerTheme::getLexicon('error_no_privileges');
                                    }
                                }
                                if ($json['errors']) {
                                    header('content-type: application/json');
                                    echo json_encode($json, JSON_FORCE_OBJECT | JSON_UNESCAPED_UNICODE);
                                    break;
                                }
                            }
                        }

                        if ($parent == 0 && $parent != $parentOld && !evo()->config['udperms_allowroot'] &&
                            $role != 1
                        ) {
                            $json['errors'] = ManagerTheme::getLexicon('error_no_privileges');
                        } else {
                            // set new parent
                            SiteContent::withTrashed()->where('id', $id)->update([
                                'parent' => $parent,
                            ]);

                            if ($parent > 0) {
                                // set parent isfolder = 1
                                SiteContent::withTrashed()->where('id', $parent)->update([
                                    'isfolder' => 1,
                                ]);
                            }

                            if ($parent != $parentOld && $parentOld > 0) {
                                // check children docs and set parent isfolder
                                SiteContent::withTrashed()->where('id', $parentOld)->update([
                                    'isfolder' => SiteContent::withTrashed()->where('parent', $parentOld)->count() > 0 ? 1 : 0,
                                ]);
                            }

                            // set menuindex
                            if (!empty($menuindex)) {
                                $menuindex = explode(',', $menuindex);
                                foreach ($menuindex as $key => $value) {
                                    SiteContent::withTrashed()->where('id', $value)->update([
                                        'menuindex' => $key,
                                    ]);
                                }
                            } else {
                                // TODO: max(*) menuindex
                            }

                            if (empty($json['errors'])) {
                                $json['success'] = ManagerTheme::getLexicon('actioncomplete');

                                evo()->invokeEvent('OnAfterMoveDocument', [
                                    'id' => $id,
                                    'old_parent' => $parentOld,
                                    'new_parent' => $parent,
                                ]);
                            }
                        }
                    }
                }
            } else {
                $json['errors'] = ManagerTheme::getLexicon('error_no_privileges');
            }

            header('content-type: application/json');
            echo json_encode($json, JSON_FORCE_OBJECT | JSON_UNESCAPED_UNICODE);
            break;

        case 'getLockedElements':
            $type = isset($_REQUEST['type']) ? (int) $_REQUEST['type'] : 0;
            $id = isset($_REQUEST['id']) ? (int) $_REQUEST['id'] : 0;

            $output = !!evo()->elementIsLocked($type, $id, true);

            if (!$output) {
                $searchQuery = SiteContent::query()->where('site_content.id', $id);
                if ($role != 1) {
                    if (isset($_SESSION['mgrDocgroups']) && is_array($_SESSION['mgrDocgroups'])) {
                        $searchQuery = $searchQuery->join('document_groups', 'site_content.id', '=', 'document_groups.document')
                            ->where(function ($query) {
                                $query->where('privatemgr', 0)
                                    ->orWhereIn('document_group', $_SESSION['mgrDocgroups']);
                            });
                    } else {
                        $searchQuery = $searchQuery->where('privatemgr', 0);
                    }
                }
                if ($searchQuery->count() > 0) {
                    $row = $searchQuery->first()->toArray();
                    $output = !!$row['locked'];
                }
            }

            echo $output;
            break;
    }
}
