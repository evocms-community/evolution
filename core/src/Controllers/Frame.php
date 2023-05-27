<?php namespace EvolutionCMS\Controllers;

use EvolutionCMS\Facades\ManagerTheme;
use EvolutionCMS\Interfaces\ManagerTheme\PageControllerInterface;
use EvolutionCMS\Interfaces\ManagerThemeInterface;
use EvolutionCMS\Models\SiteModule;

class Frame extends AbstractController implements PageControllerInterface
{
    protected string $view;

    protected $frame;

    protected $sitemenu = [];

    public function __construct(ManagerThemeInterface $managerTheme, array $data = [])
    {
        parent::__construct($managerTheme, $data);

        $this->frame = $this->detectFrame();

        if ($this->frame > 9) {
            // this is to stop the debug thingy being attached to the framesets
            ManagerTheme::getCore()->setConfig('enable_debug', false);
        }
        if (!empty($this->frame)) {
            $this->setView('frame.' . $this->frame);
        }
    }

    /**
     * {@inheritdoc}
     */
    public function canView(): bool
    {
        return true;
    }

    /**
     * {@inheritdoc}
     */
    public function process(): bool
    {
        header("X-XSS-Protection: 0");

        $this->initSession();

        // invoke OnManagerPreFrameLoader
        ManagerTheme::getCore()->invokeEvent(
            'OnManagerPreFrameLoader',
            [
                'action' => ManagerTheme::getActionId(),
            ]
        );

        $body_class = '';
        $tree_width = ManagerTheme::getCore()->getConfig('manager_tree_width');
        $this->parameters['tree_min_width'] = 0;

        if (isset($_COOKIE['MODX_widthSideBar'])) {
            $MODX_widthSideBar = $_COOKIE['MODX_widthSideBar'];
        } else {
            $MODX_widthSideBar = $tree_width;
        }
        $this->parameters['MODX_widthSideBar'] = $MODX_widthSideBar;

        if (!$MODX_widthSideBar) {
            $body_class .= 'sidebar-closed';
        }

        $theme_modes = ['', 'lightness', 'light', 'dark', 'darkness'];
        if (isset($_COOKIE['MODX_themeMode']) && !empty($theme_modes[$_COOKIE['MODX_themeMode']])) {
            $body_class .= ' ' . $theme_modes[$_COOKIE['MODX_themeMode']];
        } elseif (!empty($theme_modes[ManagerTheme::getCore()->getConfig('manager_theme_mode')])) {
            $body_class .= ' ' . $theme_modes[ManagerTheme::getCore()->getConfig('manager_theme_mode')];
        }

        $navbar_position = ManagerTheme::getCore()->getConfig('manager_menu_position');
        if ($navbar_position === 'left') {
            $body_class .= ' navbar-left navbar-left-icon-and-text';
        }

        if (isset(ManagerTheme::getCore()->pluginCache['ElementsInTree'])) {
            $body_class .= ' ElementsInTree';
        }

        $this->parameters['body_class'] = $body_class;

        $unlockTranslations = [
            'msg' => ManagerTheme::getLexicon('unlock_element_id_warning'),
            'type1' => ManagerTheme::getLexicon('lock_element_type_1'),
            'type2' => ManagerTheme::getLexicon('lock_element_type_2'),
            'type3' => ManagerTheme::getLexicon('lock_element_type_3'),
            'type4' => ManagerTheme::getLexicon('lock_element_type_4'),
            'type5' => ManagerTheme::getLexicon('lock_element_type_5'),
            'type6' => ManagerTheme::getLexicon('lock_element_type_6'),
            'type7' => ManagerTheme::getLexicon('lock_element_type_7'),
            'type8' => ManagerTheme::getLexicon('lock_element_type_8'),
        ];

        foreach ($unlockTranslations as $key => $value) {
            $unlockTranslations[$key] = iconv(
                ManagerTheme::getCore()->getConfig('modx_charset'),
                'utf-8',
                $value
            );
        }
        $this->parameters['unlockTranslations'] = $unlockTranslations;

        $user = ManagerTheme::getCore()->getUserInfo(ManagerTheme::getCore()->getLoginUserID('mgr'));
        if ((isset($user['which_browser']) && $user['which_browser'] == 'default') || (!isset($user['which_browser']))) {
            $user['which_browser'] = ManagerTheme::getCore()->getConfig('which_browser');
        }
        $this->parameters['user'] = $user;

        $this->registerCss();

        $flag = $user['role'] == 1 || ManagerTheme::getCore()->hasAnyPermissions([
            'edit_template',
            'edit_chunk',
            'edit_snippet',
            'edit_plugin',
        ]);

        ManagerTheme::getCore()->setConfig(
            'global_tabs',
            (int) (ManagerTheme::getCore()->getConfig('global_tabs') && $flag)
        );

        $this->makeMenu();

        return true;
    }

    protected function detectFrame(): string
    {
        return preg_replace(
            '/[^a-z0-9]/i',
            '',
            get_by_key($_REQUEST, 'f', get_by_key($this->data, 'frame'))
        );
    }

    protected function initSession(): void
    {
        $_SESSION['browser'] = (strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE 1') !== false) ? 'legacy_IE' : 'modern';

        if (isset($_SESSION['onLoginForwardToAction']) && is_int($_SESSION['onLoginForwardToAction'])) {
            $this->parameters['initMainframeAction'] = $_SESSION['onLoginForwardToAction'];
            unset($_SESSION['onLoginForwardToAction']);
        } else {
            $this->parameters['initMainframeAction'] = 2; // welcome.static
        }

        if (!isset($_SESSION['tree_show_only_folders'])) {
            $_SESSION['tree_show_only_folders'] = 0;
        }
    }

    protected function registerCss(): string
    {
        $this->parameters['css'] = ManagerTheme::getThemeDir(false) . 'css/page.css?v=' . EVO_INSTALL_TIME;

        $themeDir = ManagerTheme::getThemeDir();

        if (file_exists($themeDir . 'CSSMinify.php')) {
            if (!file_exists($themeDir . 'css/styles.min.css') && is_writable($themeDir . 'css')) {
                $cssFiles = include_once $themeDir . 'CSSMinify.php';
                if (is_array($cssFiles) && count($cssFiles)) {
                    $minifier = new \EvolutionCMS\Support\Formatter\CSSMinify();
                    foreach ($cssFiles as $item) {
                        $minifier->addFile($item);
                    }
                    file_put_contents($themeDir . 'css/styles.min.css', $minifier->minify());
                }
            }

            if (file_exists($themeDir . 'css/styles.min.css')) {
                $this->parameters['css'] = ManagerTheme::getThemeDir(false) . 'css/styles.min.css?v=' . EVO_INSTALL_TIME;
            }
        }

        return $this->parameters['css'];
    }

    protected function makeMenu()
    {
        $this->menuBars()
            ->menuSite()
            ->menuElementTypes()
            ->menuModules()
            ->menuUsers()
            ->menuTools()
            ->menuElements()
            ->menuFiles()
            ->menuCategories()
            ->menuNewModule()
            ->menuRunModules()
            ->menuUserManagement()
            ->menuRoleManagement()
            ->menuWebPermissions()
            ->menuRefreshSite()
            ->menuSearch()
            ->menuBkManager()
            ->menuRemoveLocks()
            ->menuUpdateTree();

        $menu = ManagerTheme::getCore()->invokeEvent('OnManagerMenuPrerender', ['menu' => $this->sitemenu]);
        if (\is_array($menu)) {
            $newmenu = [];
            foreach ($menu as $item) {
                $data = unserialize($item, ['allowed_classes' => false]);
                if (\is_array($data)) {
                    foreach ($data as $k => $v) {
                        $newmenu[$k] = $v;
                    }
                }
            }
            if (\count($newmenu) > 0) {
                $this->sitemenu = $newmenu;
            }
        }

        $this->parameters['menu'] = (new \EvolutionCMS\Support\Menu())
            ->Build(
                $this->sitemenu,
                [
                    'outerClass' => 'nav',
                    'innerClass' => 'dropdown-menu',
                    'parentClass' => 'dropdown',
                    'parentLinkClass' => 'dropdown-toggle',
                    'parentLinkAttr' => '',
                    'parentLinkIn' => '',
                ],
                false
            );
    }

    protected function menuBars()
    {
        $this->sitemenu['bars'] = [
            'bars',
            'main',
            '<i class="' . ManagerTheme::getStyle('icon_bars') . '"></i>',
            'javascript:;',
            ManagerTheme::getLexicon('home'),
            'modx.resizer.toggle(); return false;',
            ' return false;',
            '',
            0,
            10,
            '',
        ];

        return $this;
    }

    protected function menuSite()
    {
        $this->sitemenu['site'] = [
            'site',
            'main',
            '<i class="' . ManagerTheme::getStyle('icon_tachometer') . '"></i><span class="menu-item-text">' . ManagerTheme::getLexicon('home') . '</span>',
            'index.php?a=2',
            ManagerTheme::getLexicon('home'),
            '',
            '',
            'main',
            0,
            10,
            'active',
        ];

        return $this;
    }

    protected function menuElementTypes()
    {
        $flag = ManagerTheme::getCore()->hasAnyPermissions(
            ['edit_template', 'edit_snippet', 'edit_chunk', 'edit_plugin', 'category_manager', 'file_manager']
        );

        if (!$flag) {
            return $this;
        }

        $this->sitemenu['elements'] = [
            'elements',
            'main',
            '<i class="' . ManagerTheme::getStyle('icon_elements') . '"></i><span class="menu-item-text">' . ManagerTheme::getLexicon('elements') . '</span>',
            'javascript:;',
            ManagerTheme::getLexicon('elements'),
            ' return false;',
            '',
            '',
            0,
            20,
            '',
        ];

        return $this;
    }

    protected function menuModules()
    {
        if (!ManagerTheme::getCore()->hasPermission('exec_module')) {
            return $this;
        }

        $this->sitemenu['modules'] = [
            'modules',
            'main',
            '<i class="' . ManagerTheme::getStyle('icon_modules') . '"></i><span class="menu-item-text">' . ManagerTheme::getLexicon('modules') . '</span>',
            'javascript:;',
            ManagerTheme::getLexicon('modules'),
            ' return false;',
            '',
            '',
            0,
            30,
            '',
        ];

        return $this;
    }

    protected function menuUsers()
    {
        $flag = ManagerTheme::getCore()->hasAnyPermissions(
            ['edit_user', 'edit_role', 'manage_groups']
        );

        if (!$flag) {
            return $this;
        }

        $this->sitemenu['users'] = [
            'users',
            'main',
            '<i class="' . ManagerTheme::getStyle('icon_users') . '"></i><span class="menu-item-text">' . ManagerTheme::getLexicon('users') . '</span>',
            'javascript:;',
            ManagerTheme::getLexicon('users'),
            ' return false;',
            'edit_user',
            '',
            0,
            40,
            '',
        ];

        return $this;
    }

    protected function menuTools()
    {
        $flag = ManagerTheme::getCore()->hasAnyPermissions(
            ['empty_cache', 'bk_manager', 'remove_locks', 'import_static', 'export_static']
        );

        if (!$flag) {
            return $this;
        }

        $this->sitemenu['tools'] = [
            'tools',
            'main',
            '<i class="' . ManagerTheme::getStyle('icon_wrench') . '"></i><span class="menu-item-text">' . ManagerTheme::getLexicon('tools') . '</span>',
            'javascript:;',
            ManagerTheme::getLexicon('tools'),
            ' return false;',
            '',
            '',
            0,
            50,
            '',
        ];

        return $this;
    }

    protected function menuElements()
    {
        $this->menuElementTemplates();
        $this->menuElementTv();
        $this->menuElementChunks();
        $this->menuElementSnippets();
        $this->menuElementPlugins();
        $this->menuElementModules();

        return $this;
    }

    protected function menuElementTemplates()
    {
        if (!ManagerTheme::getCore()->hasPermission('edit_template')) {
            return;
        }

        $this->sitemenu['element_templates'] = [
            'element_templates',
            'elements',
            '<i class="' . ManagerTheme::getStyle('icon_template') . '"></i>' . ManagerTheme::getLexicon('templates') . '<i class="' . ManagerTheme::getStyle('icon_angle_right') . ' toggle"></i>',
            'index.php?a=76&tab=0',
            ManagerTheme::getLexicon('templates'),
            '',
            'new_template,edit_template',
            'main',
            0,
            10,
            'dropdown-toggle',
        ];
    }

    protected function menuElementTv()
    {
        if (!ManagerTheme::getCore()->hasAnyPermissions(['edit_template', 'edit_role'])) {
            return;
        }

        $this->sitemenu['element_tplvars'] = [
            'element_tplvars',
            'elements',
            '<i class="' . ManagerTheme::getStyle('icon_tv') . '"></i>' . ManagerTheme::getLexicon('tmplvars') . '<i class="' . ManagerTheme::getStyle('icon_angle_right') . ' toggle"></i>',
            'index.php?a=76&tab=1',
            ManagerTheme::getLexicon('tmplvars'),
            '',
            'new_template,edit_template',
            'main',
            0,
            20,
            'dropdown-toggle',
        ];
    }

    protected function menuElementChunks()
    {
        if (!ManagerTheme::getCore()->hasPermission('edit_chunk')) {
            return;
        }

        $this->sitemenu['element_htmlsnippets'] = [
            'element_htmlsnippets',
            'elements',
            '<i class="' . ManagerTheme::getStyle('icon_chunk') . '"></i>' . ManagerTheme::getLexicon('htmlsnippets') . '<i class="' . ManagerTheme::getStyle('icon_angle_right') . ' toggle"></i>',
            'index.php?a=76&tab=2',
            ManagerTheme::getLexicon('htmlsnippets'),
            '',
            'new_chunk,edit_chunk',
            'main',
            0,
            30,
            'dropdown-toggle',
        ];
    }

    protected function menuElementSnippets()
    {
        if (!ManagerTheme::getCore()->hasPermission('edit_snippet')) {
            return;
        }

        $this->sitemenu['element_snippets'] = [
            'element_snippets',
            'elements',
            '<i class="' . ManagerTheme::getStyle('icon_code') . '"></i>' . ManagerTheme::getLexicon('snippets') . '<i class="' . ManagerTheme::getStyle('icon_angle_right') . ' toggle"></i>',
            'index.php?a=76&tab=3',
            ManagerTheme::getLexicon('snippets'),
            '',
            'new_snippet,edit_snippet',
            'main',
            0,
            40,
            'dropdown-toggle',
        ];
    }

    protected function menuElementPlugins()
    {
        if (!ManagerTheme::getCore()->hasPermission('edit_plugin')) {
            return;
        }

        $this->sitemenu['element_plugins'] = [
            'element_plugins',
            'elements',
            '<i class="' . ManagerTheme::getStyle('icon_plugin') . '"></i>' . ManagerTheme::getLexicon('plugins') . '<i class="' . ManagerTheme::getStyle('icon_angle_right') . ' toggle"></i>',
            'index.php?a=76&tab=4',
            ManagerTheme::getLexicon('plugins'),
            '',
            'new_plugin,edit_plugin',
            'main',
            0,
            50,
            'dropdown-toggle',
        ];
    }

    protected function menuElementModules()
    {
        if (!ManagerTheme::getCore()->hasPermission('edit_module')) {
            return;
        }

        $this->sitemenu['element_modules'] = [
            'element_modules',
            'elements',
            '<i class="' . ManagerTheme::getStyle('icon_module') . '"></i>' . ManagerTheme::getLexicon('modules') . '<i class="' . ManagerTheme::getStyle('icon_angle_right') . ' toggle"></i>',
            'index.php?a=76&tab=5',
            ManagerTheme::getLexicon('modules'),
            '',
            'new_module,edit_module',
            'main',
            0,
            60,
            'dropdown-toggle',
        ];
    }

    protected function menuFiles()
    {
        if (!ManagerTheme::getCore()->hasPermission('file_manager')) {
            return $this;
        }

        $this->sitemenu['manage_files'] = [
            'manage_files',
            'elements',
            '<i class="' . ManagerTheme::getStyle('icon_folder_open') . '"></i>' . ManagerTheme::getLexicon('files'),
            'index.php?a=31',
            ManagerTheme::getLexicon('files'),
            '',
            'file_manager',
            'main',
            0,
            80,
            '',
        ];

        return $this;
    }

    protected function menuCategories()
    {
        if (!ManagerTheme::getCore()->hasPermission('category_manager')) {
            return $this;
        }

        $this->sitemenu['manage_categories'] = [
            'manage_categories',
            'elements',
            '<i class="' . ManagerTheme::getStyle('icon_category') . '"></i>' . ManagerTheme::getLexicon('categories'),
            'index.php?a=120',
            ManagerTheme::getLexicon('categories'),
            '',
            'category_manager',
            'main',
            0,
            70,
            '',
        ];

        return $this;
    }

    protected function menuNewModule()
    {
        $flag = ManagerTheme::getCore()->hasAnyPermissions(
            ['new_module', 'edit_module', 'save_module']
        );

        if (!$flag) {
            return $this;
        }

        return $this;
    }

    protected function menuRunModules()
    {
        if (ManagerTheme::getCore()->hasPermission('exec_module')) {
            $items = [];

            // 1. modules from DB
            if ($_SESSION['mgrRole'] != 1 && ManagerTheme::getCore()->getConfig('use_udperms') === true) {
                $modules = SiteModule::select('site_modules.id', 'site_modules.name', 'site_modules.icon', 'member_groups.member')
                    ->withoutProtected()
                    ->lockedView()
                    ->where('site_modules.disabled', 0)
                    ->orderBy('site_modules.name')
                    ->get()
                    ->toArray();
            } else {
                $modules = SiteModule::where('disabled', '!=', 1)
                    ->orderBy('name')
                    ->get()
                    ->toArray();
            }
            if (count($modules) > 0) {
                foreach ($modules as $row) {
                    $items['module' . $row['id']] = [
                        'module' . $row['id'],
                        'modules',
                        ($row['icon'] != '' ? '<i class="' . e($row['icon']) . '"></i>' : '<i class="' . ManagerTheme::getStyle('icon_module') . '"></i>') . e($row['name']),
                        'index.php?a=112&id=' . $row['id'],
                        e($row['name']),
                        '',
                        '',
                        'main',
                        0,
                        1,
                        '',
                    ];
                }
            }

            // 2. modules from files
            foreach (ManagerTheme::getCore()->modulesFromFile as $module) {
                if (!empty($module['properties']['hidden'])) {
                    continue;
                }

                $items['module' . $module['id']] = [
                    'module' . $module['id'],
                    'modules',
                    ($module['icon'] != '' ? '<i class="' . $module['icon'] . '"></i>' : '<i class="' . ManagerTheme::getStyle('icon_module') . '"></i>') . $module['name'],
                    !empty($module['properties']['routes']) ? 'modules/' . $module['id'] : 'index.php?a=112&id=' . $module['id'],
                    $module['name'],
                    '',
                    '',
                    'main',
                    0,
                    1,
                    '',
                ];
            }

            usort($items, fn($a, $b) => $a[4] <=> $b[4]);

            foreach ($items as $index => &$item) {
                $item[0] = 'module' . $index;
            }

            $this->sitemenu = array_merge($this->sitemenu, $items);
        }

        return $this;
    }

    protected function menuUserManagement()
    {
        $flag = ManagerTheme::getCore()->hasPermission('edit_user');

        if (!$flag) {
            return $this;
        }

        $this->sitemenu['web_user_management_title'] = [
            'web_user_management_title',
            'users',
            '<i class="' . ManagerTheme::getStyle('icon_web_user') . '"></i>' . ManagerTheme::getLexicon('web_user_management_title') . '<i class="' . ManagerTheme::getStyle('icon_angle_right') . ' toggle"></i>',
            'index.php?a=99',
            ManagerTheme::getLexicon('web_user_management_title'),
            '',
            'edit_user',
            'main',
            0,
            20,
            'dropdown-toggle',
        ];

        return $this;
    }

    protected function menuRoleManagement()
    {
        if (ManagerTheme::getCore()->hasPermission('edit_role')) {
            $this->sitemenu['role_management_title'] = [
                'role_management_title',
                'users',
                '<i class="' . ManagerTheme::getStyle('icon_role') . '"></i>' . ManagerTheme::getLexicon('role_management_title') . '<i class="' . ManagerTheme::getStyle('icon_angle_right') . ' toggle"></i>',
                'index.php?a=86',
                ManagerTheme::getLexicon('role_management_title'),
                '',
                'new_role,edit_role,delete_role',
                'main',
                0,
                30,
                'dropdown-toggle',
            ];
        }

        return $this;
    }

    protected function menuWebPermissions()
    {
        if (!ManagerTheme::getCore()->hasPermission('manage_groups')) {
            return $this;
        }

        $this->sitemenu['web_permissions'] = [
            'web_permissions',
            'users',
            '<i class="' . ManagerTheme::getStyle('icon_web_user_access') . '"></i>' . ManagerTheme::getLexicon('web_permissions'),
            'index.php?a=91',
            ManagerTheme::getLexicon('web_permissions'),
            '',
            'web_access_permissions',
            'main',
            0,
            50,
            '',
        ];

        return $this;
    }

    protected function menuRefreshSite()
    {
        $this->sitemenu['refresh_site'] = [
            'refresh_site',
            'tools',
            '<i class="' . ManagerTheme::getStyle('icon_recycle') . '"></i>' . ManagerTheme::getLexicon('refresh_site'),
            'index.php?a=26',
            ManagerTheme::getLexicon('refresh_site'),
            '',
            '',
            'main',
            0,
            5,
            'item-group',
            [
                'refresh_site_in_window' => [
                    'a',
                    // tag
                    'javascript:;',
                    // href
                    'btn btn-secondary',
                    // class or btn-success
                    "modx.popup({url:'index.php?a=26', title:'" . ManagerTheme::getLexicon('refresh_site') . "', icon: 'fa-recycle', iframe: 'ajax', selector: '.tab-page>.container', position: 'right top', width: 'auto', maxheight: '50%%', wrap: 'body' })",
                    // onclick
                    ManagerTheme::getLexicon('refresh_site'),
                    // title
                    '<i class="' . ManagerTheme::getStyle('icon_recycle') . '"></i>',
                    // innerHTML
                ],
            ],
        ];

        return $this;
    }

    protected function menuSearch()
    {
        $this->sitemenu['search'] = [
            'search',
            'tools',
            '<i class="' . ManagerTheme::getStyle('icon_search') . '"></i>' . ManagerTheme::getLexicon('search'),
            'index.php?a=71',
            ManagerTheme::getLexicon('search'),
            '',
            '',
            'main',
            1,
            9,
            '',
        ];

        return $this;
    }

    protected function menuBkManager()
    {
        if (!ManagerTheme::getCore()->hasPermission('bk_manager')) {
            return $this;
        }

        $this->sitemenu['bk_manager'] = [
            'bk_manager',
            'tools',
            '<i class="' . ManagerTheme::getStyle('icon_database') . '"></i>' . ManagerTheme::getLexicon('bk_manager'),
            'index.php?a=93',
            ManagerTheme::getLexicon('bk_manager'),
            '',
            'bk_manager',
            'main',
            0,
            10,
            '',
        ];

        return $this;
    }

    protected function menuRemoveLocks()
    {
        if (!ManagerTheme::getCore()->hasPermission('remove_locks')) {
            return $this;
        }

        $this->sitemenu['remove_locks'] = [
            'remove_locks',
            'tools',
            '<i class="' . ManagerTheme::getStyle('icon_hourglass') . '"></i>' . ManagerTheme::getLexicon('remove_locks'),
            'javascript:modx.removeLocks();',
            ManagerTheme::getLexicon('remove_locks'),
            '',
            'remove_locks',
            '',
            0,
            20,
            '',
        ];

        return $this;
    }

    protected function menuUpdateTree()
    {
        $this->sitemenu['update_tree'] = [
            'update_tree',
            'tools',
            '<i class="' . ManagerTheme::getStyle('icon_sitemap') . '"></i>' . ManagerTheme::getLexicon('update_tree'),
            'index.php?a=95',
            ManagerTheme::getLexicon('update_tree'),
            '',
            'update_tree',
            'main',
            0,
            30,
            '',
        ];

        return $this;
    }
}
