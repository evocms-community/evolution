<?php namespace EvolutionCMS;

use EvolutionCMS\Controllers\UserRoles\Permission;
use EvolutionCMS\Controllers\UserRoles\PermissionsGroups;
use EvolutionCMS\Controllers\UserRoles\RoleManagment;
use EvolutionCMS\Controllers\UserRoles\UserRole;
use EvolutionCMS\Controllers\Users\ChangePassword;
use EvolutionCMS\Exceptions\ServiceValidationException;
use EvolutionCMS\Interfaces\CoreInterface;
use EvolutionCMS\Interfaces\ManagerThemeInterface;
use EvolutionCMS\Models\ActiveUser;
use EvolutionCMS\Models\UserAttribute;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Session\TokenMismatchException;
use View;

class ManagerTheme implements ManagerThemeInterface
{
    /**
     * @var CoreInterface
     */
    protected $core;

    /**
     * @var string
     */
    protected $theme;
    protected $namespace = 'manager';
    protected $lang = 'en';
    protected $langName = 'en';
    protected $textDir;
    protected $lexicon = [];
    protected $charset = 'UTF-8';
    protected $style = [];

    protected $actions = [
        /** frame management - show the requested frame */
        1 => Controllers\Frame::class,
        /** show the homepage */
        2,
        /** document data */
        3,
        /** content management */
        85,
        27,
        4,
        5,
        6,
        63,
        51 => Controllers\MoveDocument::class,
        52 => Controllers\MoveDocument::class,
        61,
        62,
        56,
        /** show the wait page - gives the tree time to refresh (hopefully) */
        7,
        /** let the user log out */
        8 => Controllers\Users\LogInOut::class,
        0 => Controllers\Users\LogInOut::class,
        /** user management */
        87,
        88,
        89 => Controllers\Users\EditOrNewUser::class,
        90 => Controllers\Users\DeleteUser::class,
        32,
        28 => Controllers\Password::class,
        34 => ChangePassword::class,
        /** role management */
        38 => UserRole::class,
        35 => UserRole::class,
        36 => UserRole::class,
        135 => Permission::class,
        136 => PermissionsGroups::class,
        /** category management */
        120,
        121,
        /** template management */
        16 => Controllers\Template::class,
        19 => Controllers\Template::class,
        20,
        21,
        96,
        117,
        /** snippet management */
        22 => Controllers\Snippet::class,
        23 => Controllers\Snippet::class,
        24,
        25,
        98,
        /** htmlsnippet management */
        78 => Controllers\Chunk::class,
        77 => Controllers\Chunk::class,
        79,
        80,
        97,
        /** @deprecated show the credits page */
        18 => Controllers\Help::class,
        /** empty cache & synchronisation */
        26 => Controllers\RefreshSite::class,
        /** Module management */
        106 => Controllers\Modules::class,
        107,
        108,
        109,
        110,
        111,
        112,
        113,
        /** plugin management */
        100 => Controllers\PluginPriority::class,
        101 => Controllers\Plugin::class,
        102 => Controllers\Plugin::class,
        103,
        104,
        105,
        119,
        /** view phpinfo */
        200 => Controllers\Phpinfo::class,
        /** @deprecated errorpage */
        29 => Controllers\EventLog::class,
        /** file manager */
        31,
        /** access permissions */
        91 => Controllers\WebAccessPermissions::class,
        /** access groups processor */
        92,
        /** settings editor */
        17 => Controllers\SystemSettings::class,
        118,
        /** save settings */
        30,
        /** system information */
        53 => Controllers\SystemInfo::class,
        /** optimise table */
        54,
        /** manager log: view items */
        13 => Controllers\ManagerLog::class,
        /** manager log: truncate items */
        55 => Controllers\ManagerLog::class,
        /** calls test page    */
        999,
        /** Empty recycle bin */
        64,
        /** Remove locks */
        67,
        /** Site schedule */
        70 => Controllers\SiteSchedule::class,
        /** Search */
        71 => Controllers\Search::class,
        /** @deprecated About */
        59 => Controllers\Help::class,
        /** Add weblink */
        72,
        /** User management */
        99,
        86 => RoleManagment::class,
        /** template/ snippet management */
        76 => Controllers\Resources::class,
        /** Resource Selector  */
        84,
        /** Backup Manager */
        93,
        /** Duplicate Document */
        94,
        /** Update Tree for Closure Table */
        95 => Controllers\UpdateTree::class,
        /** Template Variables - Based on Apodigm's Docvars */
        300 => Controllers\Tmplvar::class,
        301 => Controllers\Tmplvar::class,
        302,
        303,
        304,
        305 => Controllers\TmplvarRank::class,
        /** Event viewer: show event message log */
        114 => Controllers\EventLog::class,
        115 => Controllers\EventLogDetails::class,
        116,
        501,
    ];

    public function __construct(CoreInterface $core, string $theme)
    {
        $this->core = $core;

        $this->getCore()['view']->addNamespace('manager', MODX_MANAGER_PATH . '/media/style/' . $theme . '/views/');
        $this->getCore()['view']->addNamespace('manager', MODX_MANAGER_PATH . '/views/');

        $this->theme = $theme;

        $this->loadLang(
            $this->getCore()->getConfig('manager_language')
        );
        if (IN_INSTALL_MODE === false) {
            $this->loadStyle();
        }

        if ($this->getCore()->getConfig('mgr_jquery_path', '') === '') {
            $this->getCore()->setConfig('mgr_jquery_path', 'media/script/jquery/jquery.min.js');
        }
        if ($this->getCore()->getConfig('mgr_date_picker_path', '') === '') {
            $this->getCore()->setConfig('mgr_date_picker_path', 'media/calendar/datepicker.inc.php');
        }
    }

    protected function loadLang($lang = 'en')
    {
        $_lang = array();

        include EVO_CORE_PATH . 'lang/en/global.php';

        // now include_once different language file as english
        if (empty($lang) || !file_exists(EVO_CORE_PATH . 'lang/' . $lang . '/global.php')) {
            $lang = 'en'; // if not set, get the english language file.
        }

        // $length_eng_lang = count($_lang);
        //// Not used for now, required for difference-check with other languages than english (i.e. inside installer)

        if ($lang !== 'en' && file_exists(EVO_CORE_PATH . 'lang/' . $lang . '/global.php')) {
            include EVO_CORE_PATH . 'lang/' . $lang . '/global.php';
        }

        foreach ($_lang as $k => $v) {
            if (strpos($v, '[+') !== false) {
                $_lang[$k] = str_replace(
                    ['[+MGR_DIR+]'],
                    [MGR_DIR],
                    $v
                );
            }
        }
        $this->lexicon = $_lang;
        $this->langName = $lang;
        $this->lang = $lang;
        app()->setLocale($lang);
        $this->setTextDir(in_array($lang, ['fa', 'he']) ? 'rtl' : 'ltr');
        $this->setCharset(evo()->getConfig('modx_charset', 'UTF-8'));
        $this->getCore()->setConfig('lang_code', $lang);
        $this->getCore()->setConfig('manager_language', $lang);

        return $lang;
    }

    public function getTheme(): string
    {
        return $this->theme;
    }

    public function getLang(): string
    {
        return $this->lang;
    }

    public function getLangName()
    {
        return $this->langName;
    }

    public function getTextDir($notEmpty = null)
    {
        if (empty($this->textDir)) {
            return ($notEmpty === null) ? $this->textDir : '';
        }

        return ($notEmpty === null) ? $this->textDir : $notEmpty;
    }

    public function setTextDir($textDir = 'rtl')
    {
        $this->textDir = $textDir === 'rtl' ? 'rtl' : 'ltr';
    }

    public function getLexicon($key = null, $default = '')
    {

        return $key === null ? $this->lexicon : get_by_key($this->lexicon, $key, $default);
    }

    public function getCharset()
    {
        return $this->charset;
    }

    public function setCharset($charset)
    {
        $this->charset = $charset;
    }

    public function getViewName($name)
    {
        return $this->namespace . '::' . $name;
    }

    /**
     * @deprecated
     */
    protected function loadStyle()
    {
        $_style = [];
        $modx = $this->core;
        $_lang = $this->getLexicon();
        include_once $this->getThemeDir(true) . 'style.php';
        $this->style = $_style;
    }

    /**
     * @param bool $full
     * @return string
     */
    public function getThemeDir($full = true): string
    {
        return ($full ? MODX_MANAGER_PATH : '') . 'media/style/' . $this->getTheme() . '/';
    }

    public function getThemeUrl(): string
    {
        return MODX_MANAGER_URL . $this->getThemeDir(false);
    }

    /**
     * @deprecated
     */
    public function getStyle($key = null)
    {
        return $key === null ? $this->style : get_by_key($this->style, $key, '');
    }

    public function view($name, array $params = [])
    {
        return View::make(
            $this->getViewName($name),
            $this->getViewAttributes($params)
        );
    }

    public function getViewAttributes(array $params = [])
    {
        $baseParams = [
            'modx' => $this->getCore(),
            'modx_lang_attribute' => $this->getLang(),
            'manager_theme' => $this->getTheme(),
            'modx_textdir' => $this->getTextDir(),
            'manager_language' => $this->getLangName(),
            '_lang' => $this->getLexicon(),
            '_style' => $this->getStyle(),
        ];

        return array_merge($baseParams, $params);
    }

    public function getFileProcessor($filepath, $theme = null)
    {
        if ($theme === null) {
            $theme = $this->getTheme();
        }

        if (is_file(MODX_MANAGER_PATH . '/media/style/' . $theme . '/' . $filepath)) {
            $element = MODX_MANAGER_PATH . '/media/style/' . $theme . '/' . $filepath;
        } else {
            $element = MODX_MANAGER_PATH . ltrim($filepath, '/');
        }

        return $element;
    }

    public function findController($action)
    {
        return $action === null ? null : get_by_key($this->actions, $action, $action);
    }

    public function setRequest()
    {
        $request = Request::createFromGlobals();
        $this->core->instance(Request::class, $request);
        $this->core->alias(Request::class, 'request');

        return $request;
    }

    public function handleRoute()
    {
        $evo = $this->getCore();
        $request = $this->setRequest();

        $middleware = config('app.middleware.mgr', []);
        $evo->router->middlewareGroup('mgr', $middleware);

        $aliases = config('app.middleware.aliases', []);

        foreach ($aliases as $key => $class) {
            $evo->router->aliasMiddleware($key, $class);
        }

        Route::middleware('mgr')
            ->namespace('\\EvolutionCMS\\Controllers')
            ->group(MODX_MANAGER_PATH . '/routes.php');

        $routes = $evo->router->getRoutes();
        $routes->refreshNameLookups();
        $routes->refreshActionLookups();

        try {
            $response = $evo->router->dispatch($request);
        } catch (TokenMismatchException $e) {
            $response = response($e->getMessage(), 403);
        }

        $response->send();
    }

    public function handle($action, array $data = [])
    {
        $this->saveAction($action);

        $this->getCore()->invokeEvent('OnManagerPageInit', compact('action'));

        $controllerName = $this->findController($action);

        if (\is_int($controllerName)) {
            $out = $this->view('page.' . $action)->render();
        } elseif (class_exists($controllerName) &&
            \in_array(Interfaces\ManagerTheme\PageControllerInterface::class, class_implements($controllerName), true)
        ) {
            /** @var Interfaces\ManagerTheme\PageControllerInterface $controller */
            $controller = new $controllerName($this, $data);
            $controller->setIndex($action);
            if (!$controller->canView()) {
                $this->alertAndQuit('error_no_privileges');
            } elseif ($controller->checkLocked() === true) {
                $elementType = $controller->getElementType();
                $username = $this->getCore()->elementIsLocked($elementType, $controller->getElementId())['username'];
                $this->alertAndQuit(sprintf($this->getLexicon('lock_msg'), $username, $this->getLexicon('lock_element_type_' . $elementType)), false);
            } elseif ($controller->process()) {
                $out = $controller->render();
            } else {
                $out = '';
            }
        } else {
            $action = 0;
            $out = $this->view('page.' . $action)->render();
        }

        /********************************************************************/
        // log action, unless it's a frame request
        if ($action > 0 && \in_array($action, [1, 2, 7], true) === false) {
            $log = new Legacy\LogHandler;
            $log->initAndWriteLog();
        }
        /********************************************************************/

        unset($_SESSION['itemname']); // clear this, because it's only set for logging purposes

        return $out;
    }

    public function getItemId()
    {
        $out = isset($_REQUEST['id']) ? (int) $_REQUEST['id'] : 0;
        if ($out <= 0) {
            $out = null;
        }

        return $out;
    }

    public function getActionId()
    {
        // OK, let's retrieve the action directive from the request
        $option = array('min_range' => 1, 'max_range' => 2000);
        if (isset($_GET['a']) && isset($_POST['a'])) {
            $this->alertAndQuit('error_double_action');
        } elseif (isset($_GET['a'])) {
            $action = (int) filter_input(INPUT_GET, 'a', FILTER_VALIDATE_INT, $option);
        } elseif (isset($_POST['a'])) {
            $action = (int) filter_input(INPUT_POST, 'a', FILTER_VALIDATE_INT, $option);
        } else {
            $action = null;
        }

        return $action;
        //return isset($_REQUEST['a']) ? (int)$_REQUEST['a'] : 1;
    }

    public function isAuthManager()
    {
        $out = null;

        if (isset($_SESSION['mgrValidated']) && $_SESSION['usertype'] !== 'manager') {
            //      if (isset($_COOKIE[session_name()])) {
            //          setcookie(session_name(), '', 0, MODX_BASE_URL);
            //      }
            @session_destroy();
            // start session
            //      startCMSSession();
        }

        // andrazk 20070416 - if installer is running, destroy active sessions
        if (is_file(MODX_BASE_PATH . 'assets/cache/installProc.inc.php')) {
            include_once MODX_BASE_PATH . 'assets/cache/installProc.inc.php';
            if (isset($installStartTime)) {
                if ((time() - $installStartTime) > 5 * 60) { // if install flag older than 5 minutes, discard
                    unset($installStartTime);
                    @chmod(MODX_BASE_PATH . 'assets/cache/installProc.inc.php', 0755);
                    unlink(MODX_BASE_PATH . 'assets/cache/installProc.inc.php');
                } else {
                    if ($_SERVER['REQUEST_METHOD'] != 'POST') {
                        if (isset($_COOKIE[session_name()])) {
                            session_unset();
                            @session_destroy();
                            //                  setcookie(session_name(), '', 0, MODX_BASE_URL);
                        }
                    }
                }
            }
        }

        // andrazk 20070416 - if session started before install and was not destroyed yet
        if (defined('EVO_INSTALL_TIME')) {
            if (isset($_SESSION['mgrValidated'])) {
                if (isset($_SESSION['modx.session.created.time'])) {
                    if ($_SESSION['modx.session.created.time'] < EVO_INSTALL_TIME) {
                        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
                            if (isset($_COOKIE[session_name()])) {
                                session_unset();
                                @session_destroy();
                                // setcookie(session_name(), '', 0, MODX_BASE_URL);
                            }
                            header('HTTP/1.0 307 Redirect');
                            header('Location: ' . MODX_MANAGER_URL . 'index.php?installGoingOn=2');
                        }
                    }
                }
            }
        }

        return isset($_SESSION['mgrValidated']);
    }

    public function hasManagerAccess()
    {
        // check if user is allowed to access manager interface
        return $this->getCore()->hasPermission('access_permissions', 'mgr');
    }

    public function getManagerStartupPageId()
    {
        $homeId = (int) $this->getCore()->getConfig('manager_login_startup');
        if ($homeId <= 0) {
            $homeId = $this->getCore()->getConfig('site_start');
        }

        return $homeId;
    }

    public function renderAccessPage(): string
    {
        $plh = [];

        $plh['login_form_position_class'] = 'loginbox-' . $this->getCore()->getConfig('login_form_position');
        $plh['login_form_style_class'] = 'loginbox-' . $this->getCore()->getConfig('login_form_style');

        return $this->makeTemplate('manager.lockout', 'manager_lockout_tpl', $plh, false);
    }

    public function getTemplate($name, $config = null)
    {
        if (!empty($config) && empty($this->getCore()->getConfig($config))) {
            $this->getCore()->setConfig($config, MODX_MANAGER_PATH . 'media/style/common/' . $name . '.tpl');
        }

        $target = $this->getCore()->getConfig($config);
        $target = str_replace('[+base_path+]', MODX_BASE_PATH, $target);
        $target = $this->getCore()->mergeSettingsContent($target);

        $content = $this->getCore()->getChunk($target);
        if (empty($content)) {
            if (is_file(MODX_BASE_PATH . $target)) {
                $target = MODX_BASE_PATH . $target;
                $content = file_get_contents($target);
            } elseif (is_file($this->getThemeDir() . $name . '.tpl')) {
                $target = $this->getThemeDir() . $name . '.tpl';
                $content = file_get_contents($target);
            } elseif (is_file($this->getThemeDir() . 'templates/actions/' . $name . '.tpl')) {
                $target = $this->getThemeDir() . 'templates/actions/' . $name . '.tpl';
                $content = file_get_contents($target);
            } elseif (is_file($this->getThemeDir() . 'html/' . $name . '.html')) { // ClipperCMS compatible
                $target = $this->getThemeDir() . 'html/' . $name . '.html';
                $content = file_get_contents($target);
            } else {
                $target = MODX_MANAGER_PATH . 'media/style/common/' . $name . '.tpl';
                $content = file_get_contents($target);
            }
        }

        return $content;
    }

    public function makeTemplate($name, $config = null, array $placeholders = [], $clean = true): string
    {
        $content = $this->getTemplate($name, $config);
        // merge placeholders
        $this->getCore()->toPlaceholders(array_merge($this->getTemplatePlaceholders(), $placeholders));
        $content = $this->getCore()->mergePlaceholderContent($content);
        $content = $this->getCore()->mergeSettingsContent($content);
        $content = $this->getCore()->mergeConditionalTagsContent($content);
        $content = $this->getCore()->parseDocumentSource($content);
        $content = $this->getCore()->cleanUpMODXTags($content);
        $content = $this->getCore()->parseText($content, $this->getLexicon(), '[%', '%]');
        $content = $this->getCore()->parseText($content, $this->getStyle(), '[&', '&]');

        if ($clean) {
            $content = removeSanitizeSeed(getSanitizedValue($content));
        }

        return $content;
    }

    public function getTemplatePlaceholders(): array
    {
        $plh = [
            'modx_charset' => $this->getCharset(),
            'favicon' => (file_exists(MODX_BASE_PATH . 'favicon.ico') ? MODX_SITE_URL : $this->getThemeUrl() . 'images/') . 'favicon.ico',
            'homeurl' => $this->getCore()->makeUrl($this->getManagerStartupPageId()),
            'logouturl' => MODX_MANAGER_URL . 'index.php?a=8',
            'year' => date('Y'),
            'theme' => $this->getTheme(),
            'manager_theme_url' => $this->getThemeUrl(),
            'manager_theme_style' => $this->getThemeStyle(),
            'manager_path' => MGR_DIR,
            'csrf' => csrf_field()->toHtml()
        ];

        // set login logo image
        $logo = $this->getCore()->getConfig('login_logo', '');
        if ($logo !== '') {
            if (substr($logo, 0, 4) === "http") {
                $plh['login_logo'] = $logo;
            } else {
                $plh['login_logo'] = MODX_SITE_URL . $logo;
            }
        } else {
            $plh['login_logo'] = $this->getThemeUrl() . 'images/login/default/login-logo.png';
        }

        // set login background image
        $background = $this->getCore()->getConfig('login_bg', '');
        if ($background !== '') {
            if (substr($background, 0, 4) === "http") {
                $plh['login_bg'] = $background;
            } else {
                $plh['login_bg'] = MODX_SITE_URL . $background;
            }

            $plh['login_bg'] = MODX_SITE_URL . $background;
        } else {
            $plh['login_bg'] = $this->getThemeUrl() . 'images/login/default/login-background.jpg';
        }
        unset($background);

        return $plh;
    }

    public function renderLoginPage()
    {
        $plh = [
            'remember_me' => isset($_COOKIE['modx_remember_manager']) ? 'checked="checked"' : '',
        ];

        // invoke OnManagerLoginFormPrerender event
        $evtOut = $this->getCore()->invokeEvent('OnManagerLoginFormPrerender');
        $html = is_array($evtOut) ? implode('', $evtOut) : '';
        $plh['OnManagerLoginFormPrerender'] = $html;

        // andrazk 20070416 - notify user of install/update
        if (isset($_GET['installGoingOn'])) {
            switch ((int) $_GET['installGoingOn']) {
                case 1:
                    $this->getCore()->setPlaceholder(
                        'login_message',
                        '<p><span class="fail">' . $this->getLexicon('login_cancelled_install_in_progress') . '</p>' .
                        '<p>' . $this->getLexicon('login_message') . '</p>'
                    );
                    break;
                case 2:
                    $this->getCore()->setPlaceholder(
                        'login_message',
                        '<p><span class="fail">' . $this->getLexicon('login_cancelled_site_was_updated') . '</p>' .
                        '<p>' . $this->getLexicon('login_message') . '</p>'
                    );
                    break;
            }
        }

        if ($this->getCore()->getConfig('use_captcha')) {
            $plh['login_captcha_message'] = $this->getLexicon("login_captcha_message");
            $plh['captcha_image'] = '<a href="' . MODX_MANAGER_URL . '" class="loginCaptcha"><img id="captcha_image" src="' . MODX_MANAGER_URL . 'captcha.php?rand=' . rand() . '" alt="' . $this->getLexicon('login_captcha_message') . '" /></a>';
            $plh['captcha_input'] = '<label>' . $this->getLexicon('captcha_code') . '</label><input type="text" name="captcha_code" tabindex="3" value="" />';
        }

        // login info
        $uid = '';
        if (isset($_COOKIE['modx_remember_manager'])) {
            $uid = preg_replace('/[^a-zA-Z0-9\-_@\.]*/', '', $_COOKIE['modx_remember_manager']);
        }
        $plh['uid'] = $uid;

        // invoke OnManagerLoginFormRender event
        $evtOut = $this->getCore()->invokeEvent('OnManagerLoginFormRender');
        $html = is_array($evtOut) ? '<div id="onManagerLoginFormRender">' . implode('', $evtOut) . '</div>' : '';
        $plh['OnManagerLoginFormRender'] = $html;

        $plh['login_form_position_class'] = 'loginbox-' . $this->getCore()->getConfig('login_form_position');
        $plh['login_form_style_class'] = 'loginbox-' . $this->getCore()->getConfig('login_form_style');

        $plh['repair_password'] = $this->repairPassword($plh);

        return $this->makeTemplate('login', 'manager_login_tpl', $plh, false);
    }

    public function saveAction($action)
    {
        $flag = false;

        // save page to manager object
        $this->getCore()->getManagerApi()->action = $action;

        if ((int) $action > 1) {
            ActiveUser::where('internalKey', $this->getCore()->getLoginUserID('mgr'))->forceDelete();
            $activeUser = new ActiveUser;
            $activeUser->sid = session_id();
            $activeUser->internalKey = (int) $this->getCore()->getLoginUserID('mgr');
            $activeUser->username = $_SESSION['mgrShortname'];
            $activeUser->lasthit = (int) $this->getCore()->tstart;
            $activeUser->action = (int) $action;
            $activeUser->id = (int) $this->getItemId();
            $activeUser->save();
            $flag = true;
        }

        return $flag;
    }

    public function loadValuesFromSession($data)
    {
        if ($this->getCore()->getManagerApi()->loadFormValues() === true) {
            $data = $_POST;
        }

        return $data;
    }

    /**
     * @return CoreInterface
     */
    public function getCore(): CoreInterface
    {
        return $this->core;
    }

    /**
     * @inheritdoc
     */
    public function alertAndQuit(string $message, $lexicon = true): void
    {
        if ($lexicon) {
            $message = $this->getLexicon($message);
        }
        $this->getCore()->webAlertAndQuit($message);
    }

    public function isLoadDatePicker(): bool
    {
        $actions = [85, 27, 4, 72, 13, 87, 88];
        return \in_array($this->getCore()->getManagerApi()->action, $actions, true);
    }

    public function getCssFiles()
    {
        return [
            'bootstrap' => MODX_MANAGER_PATH . 'media/style/common/bootstrap/css/bootstrap.min.css',
            'font-awesome' => MODX_MANAGER_PATH . 'media/style/common/font-awesome/css/font-awesome.min.css',
            'fonts' => $this->getThemeDir() . 'css/fonts.css',
            'forms' => $this->getThemeDir() . 'css/forms.css',
            'mainmenu' => $this->getThemeDir() . 'css/mainmenu.css',
            'tree' => $this->getThemeDir() . 'css/tree.css',
            'custom' => $this->getThemeDir() . 'css/custom.css',
            'tabpane' => $this->getThemeDir() . 'css/tabpane.css',
            'contextmenu' => $this->getThemeDir() . 'css/contextmenu.css',
            'index' => $this->getThemeDir() . 'css/index.css',
            'main' => $this->getThemeDir() . 'css/main.css',
        ];
    }

    public function css()
    {
        $css = $this->getThemeUrl() . 'style.css';
        $minCssName = 'css/styles.min.css';

        if (!file_exists($this->getThemeDir() . $minCssName) && is_writable($this->getThemeDir() . 'css')) {
            $files = $this->getCssFiles();
            $evtOut = $this->getCore()->invokeEvent('OnBeforeMinifyCss', array(
                'files' => $files,
                'source' => 'manager',
                'theme' => $this->getTheme(),
            ));
            switch (true) {
                case empty($evtOut):
                case \is_array($evtOut) && count($evtOut) === 0:
                    break;
                case \is_array($evtOut) && count($evtOut) === 1:
                    $files = $evtOut[0];
                    break;
                default:
                    $this->getCore()->webAlertAndQuit(
                        sprintf($this->getLexicon('invalid_event_response'), 'OnBeforeMinifyManagerCss')
                    );
            }

            $minifier = new \EvolutionCMS\Support\Formatter\CSSMinify($files);
            $css = $minifier->minify();
            file_put_contents(
                $this->getThemeDir() . $minCssName,
                $css
            );
        }
        if (file_exists($this->getThemeDir() . $minCssName)) {
            $css = $this->getThemeUrl() . $minCssName;
        }

        return $css . '?v=' . $this->getCore()->getVersionData('version');
    }

    public function getMainFrameHeaderHTMLBlock(): string
    {
        $evtOut = $this->getCore()->invokeEvent('OnManagerMainFrameHeaderHTMLBlock');
        return \is_array($evtOut) ? implode("\n", $evtOut) : '';
    }

    public function getThemeStyle(): string
    {
        $default = 'dark';
        $modes = array('', 'lightness', 'light', 'dark', 'darkness');

        $cookie = (int) get_by_key($_COOKIE, 'MODX_themeMode', 0, function ($val) use ($modes) {
            return (int) $val > 0 && (int) $val <= \count($modes);
        });
        $system = $this->getCore()->getConfig('manager_theme_mode');

        if (!empty($cookie)) {
            $out = $modes[$cookie];
        } elseif (!empty($system)) {
            $out = $modes[$system];
        } else {
            $out = $default;
        }

        return $out;
    }

    public function repairPassword($plh)
    {
        $output = '';
        if (isset($_GET['repair_password'])) {
            return $this->makeTemplate('repair_form', 'manager_login_tpl', $plh, false);
        }
        if (isset($_GET['email'])) {
            $user = UserAttribute::where('email', $_GET['email'])->first();
            if (is_null($user)) {
                $output .= '<span class="error">' . \Lang::get('global.could_not_find_user') . '</span>';
            }
            if ($user->blocked == 1) {
                $output .= '<span class="error">' . \Lang::get('global.user_is_blocked') . '</span>';
            } else {
                $hash = '';
                try {
                    $hash = \UserManager::repairPassword(['id' => $user->internalKey, 'mode' => 'hash']);
                } catch (ServiceValidationException $exception) {
                    foreach ($exception->getValidationErrors() as $errors) {
                        foreach ($errors as $error) {
                            $output .= '<span class="error">' . $error . '</span>';
                        }
                    }
                }
                if ($output == '') {
                    $output .= $this->sendRepairMail($_GET['email'], $hash, 'hash');
                }
            }
        }

        return $output . $this->makeTemplate('repair_button', 'manager_login_tpl', $plh, false);
    }

    public function sendRepairMail($email, $hash, $mode)
    {
        $body = '
                <p>' . \Lang::get('global.forgot_password_email_intro') . ' <a href="' . MODX_MANAGER_URL . '?a=0&hash=' . $hash . '&mode=' . $mode . '">' . \Lang::get('global.forgot_password_email_link') . '</a></p>
                <p>' . \Lang::get('global.forgot_password_email_instructions') . '</p>
                <p><small>' . \Lang::get('global.forgot_password_email_fine_print') . '</small></p>';

        $param = array();
        $param['from'] = $this->getCore()->getConfig('site_name') . '<' . $this->getCore()->getConfig('emailsender') . '>';
        $param['to'] = $email;
        $param['subject'] = \Lang::get('global.password_change_request');
        $param['body'] = $body;
        $rs = $this->getCore()->sendmail($param); //ignore mail errors in this case

        if (!$rs) {
            return '<span class="error">' . \Lang::get('global.error_sending_email') . '</span>';
        }

        return '<p><b>' . \Lang::get('global.email_sent') . '</b></p>';
    }
}
