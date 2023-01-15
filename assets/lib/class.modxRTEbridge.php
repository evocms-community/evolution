<?php
/**
 * @author Deesen, yama / updated: 27.01.2018
 */
if (!defined('MODX_BASE_PATH')) {
    die('What are you doing? Get out of here!');
}

class modxRTEbridge
{
    public $pluginName = '';                    // Name of plugin - nessecary to retrieve plugin-configuration by connectors
    public $editorKey = '';                     // Key for config/tpl/settings-files (ckeditor4, tinymce4, ...)
    public $theme = '';                         // Theme-key (default, simple, mini ... )
    public $pluginParams = array();             // Params from Modx plugin-configuration
    public $modxParams = array();               // Holds actual settings merged from Modx- and user-configuration
    public $bridgeParams = array();             // Holds translation of Modx Configuration-Keys to Editor Configuration-Keys
    public $themeConfig = array();              // Valid params and defaults for Editor
    public $tvOptions = array();                // Options set via TV-Option like {"theme":"mini"}
    public $initOnceArr = array();              // Holds custom HTML-Code to inject into tpl.xxxxxxxxx.init_once.html
    public $gSettingsCustom = array();          // Holds custom settings to enable setting via Modx- / user-configuration
    public $gSettingsDefaultValues = array();   // Holds default values for settings
    public $customPlaceholders = array();       // Holds placeholders to make available in all tpl.xxx.xxx.html
    public $langArr = array();                  // Holds lang strings
    public $debug = false;                      // Enable/disable debug messages via HTML-comment
    public $debugMessages = array();            // Holds all messages - added by    $this->debugMessages[] = 'Message';
    public $ajaxSecHash = array();              // Holds security-hashes

    public function __construct($editorKey = NULL, $bridgeConfig = array(), $tvOptions = array(), $basePath = '')
    {
        global $modx, $settings, $usersettings;

        if ($editorKey === NULL) {
            exit('modxRTEbridge: No editorKey set in plugin-initialization.');
        }

        // Check right path
        $file = !empty($basePath) ? $basePath : __FILE__;
        $current_path = str_replace('\\', '/', dirname($file) . '/');
        if (strpos($current_path, MODX_BASE_PATH) === false) {
            exit('modxRTEbridge: Path-Error');
        }

        $path = substr($current_path, strlen(MODX_BASE_PATH));
        $basePath = MODX_BASE_PATH . $path;
        $baseUrl = MODX_BASE_URL . $path;

        // Object to pass vars between multiple plugin-events
        if (!isset($modx->modxRTEbridge)) $modx->modxRTEbridge = array();

        // Init language before bridge so bridge can alter translations via $this->setLang()
        $this->initLang($basePath);

        // Get modxRTEbridge-config from child-class
        $this->bridgeParams           = isset($bridgeConfig['bridgeParams']) ? $bridgeConfig['bridgeParams'] : array();
        $this->gSettingsCustom        = isset($bridgeConfig['gSettingsCustom']) ? $bridgeConfig['gSettingsCustom'] : array();
        $this->gSettingsDefaultValues = isset($bridgeConfig['gSettingsDefaultValues']) ? $bridgeConfig['gSettingsDefaultValues'] : array();

        // Determine settings from Modx
        $mgrAction = isset($modx->manager->action) ? $modx->manager->action : 11;
        switch ($mgrAction) {
            // Create empty array()
            case 11:    // Create new user
                $editorConfig = array();
                break;
            // Get user-config
            case 12:    // Edit user
            case 119:   // Purge plugin processor
                $editorConfig = $usersettings;
                break;
            // Get Modx-config
            case 17:    // Modx-configuration
            default:
                $editorConfig = $settings;
                break;
        }

        // Modx default WYSIWYG-params
        $modxParamsArr = array(
            'theme', 'skin', 'skintheme', 'entermode', 'element_format', 'schema', 'css_selectors',
            'custom_plugins', 'custom_buttons1', 'custom_buttons2', 'custom_buttons3', 'custom_buttons4',
            'template_docs', 'template_chunks'
        );

        // Add defaultCheckbox-Values for user-settings
        $settingsRows = array();
        include($basePath . 'gsettings/gsettings.rows.inc.php');
        $this->gSettingsRows = $settingsRows;
        foreach ($this->gSettingsRows as $param => $row) {
            if (!isset($row['defaultCheckbox']) || !$row['defaultCheckbox']) {
                continue;
            }
            $useGlobalName = $editorKey . '_' . $param . '_useglobal';
            if (!isset($editorConfig[$useGlobalName])
                || !empty($editorConfig[$useGlobalName])
                || (isset($editorConfig[$useGlobalName]) && is_null($editorConfig[$useGlobalName]))
            ) {
                $this->modxParams[$param . '_useglobal'] = '1';
            } else {
                $this->modxParams[$param . '_useglobal'] = '0';
            }
        }

        // Add custom settings from bridge
        foreach ($this->gSettingsCustom as $param => $row) {
            if (!in_array($param, $modxParamsArr)) {
                $modxParamsArr[] = $param;
            }
            // Handle defaultCheckbox
            if (!isset($row['defaultCheckbox']) || !$row['defaultCheckbox']) {
                continue;
            }
            $useGlobalName = $editorKey . '_' . $param . '_useglobal';
            if (!isset($editorConfig[$useGlobalName])
                || !empty($editorConfig[$useGlobalName])
                || (isset($editorConfig[$useGlobalName]) && is_null($editorConfig[$useGlobalName]))
            ) {
                $this->modxParams[$param . '_useglobal'] = '1';
            } else {
                $this->modxParams[$param . '_useglobal'] = '0';
            }
        }

        // Take over editor-configuration from Modx
        foreach ($modxParamsArr as $p) {
            $useGlobalName = $p . '_useglobal';
            if (!in_array($mgrAction, array(11, 12)) && isset($this->modxParams[$useGlobalName]) && $this->modxParams[$useGlobalName] == '1' && isset($modx->configGlobal[$editorKey . '_' . $p])) {
                $value = $modx->configGlobal[$editorKey . '_' . $p];
            } else {
                if (isset($editorConfig[$editorKey . '_' . $p])) {
                    $value = $editorConfig[$editorKey . '_' . $p];
                } else {
                    $value = $this->gSettingsDefaultValues[$p] ?? null;
                }

            }
            $this->modxParams[$p] = $value;
        }

        if (!empty($this->modxParams['custom_buttons_useglobal'])) {
            foreach ([1, 2, 3, 4] as $i) {
                $k = $editorKey . '_custom_buttons' . $i;
                if (isset($modx->configGlobal[$k])) {
                    $this->modxParams['custom_buttons' . $i] = $modx->configGlobal[$k];
                }
            }
        }

        // Set TV-options
        $this->tvOptions = $tvOptions;

        // Set pluginParams
        $this->editorKey                      = $editorKey;
        $this->theme                          = $this->modxParams['theme'] ?? 'base';
        $this->pluginParams                   = $modx->event->params ?? array();
        $this->pluginParams['pluginName']     = $modx->event->activePlugin;
        $this->pluginParams['editorLabel']    = $bridgeConfig['editorLabel'] ?? 'No editorLabel set for "' . $editorKey . '"';
        $this->pluginParams['editorVersion']  = $bridgeConfig['editorVersion'] ?? 'No editorVersion set';
        $this->pluginParams['editorLogo']     = $bridgeConfig['editorLogo'] ?? '';
        $this->pluginParams['skinsDirectory'] = isset($bridgeConfig['skinsDirectory']) && !empty($bridgeConfig['skinsDirectory']) ? trim($bridgeConfig['skinsDirectory'], "/") . "/" : '';
        $this->pluginParams['skinthemeDirectory'] = isset($bridgeConfig['skinthemeDirectory']) && !empty($bridgeConfig['skinthemeDirectory']) ? trim($bridgeConfig['skinthemeDirectory'], "/") . "/" : '';
        $this->pluginParams['base_path']      = $basePath;
        $this->pluginParams['base_url']       = $baseUrl;
    }

    // Function to set editor-parameters
    // $value = NULL deletes key completely from editor-config
    public function set($key, $value, $type = false, $emptyAllowed = false)
    {
        if ($value === NULL) {
            $this->themeConfig[$key] = NULL;    // Delete Parameter completely from JS-initialization
        } else {
            if (!isset($this->themeConfig[$key])) $this->themeConfig[$key] = array();
            $this->themeConfig[$key]['value']   = $value;
            $this->themeConfig[$key]['default'] = !isset($this->themeConfig[$key]['default']) ? $value : $this->themeConfig[$key]['default'];
            $this->themeConfig[$key]['type']    = $type == false ? 'string' : $type;
            $this->themeConfig[$key]['empty']   = $emptyAllowed;
        }
    }

    // Function to append string to existing parameters
    public function appendSet($key, $value, $separator = ',')
    {
        if ($value === '') {
            return;
        }

        if (isset($this->themeConfig[$key])) {
            if ($this->themeConfig[$key]['value'] != '') {
                $this->themeConfig[$key]['value'] .= $separator . $value;
            } else {
                $this->themeConfig[$key]['value'] .= $value;
            }
        }
    }

    // Function to force editor-setting via plugin-code
    // $value = NULL deletes key completely from editor-config
    public function force($key, $value)
    {
        if ($value === NULL) {
            $this->themeConfig[$key] = NULL;  // Delete Parameter completely from JS-initialization
        } else {
            if (!isset($this->themeConfig[$key])) $this->themeConfig[$key] = array();
            $this->themeConfig[$key]['force'] = $value;
        }
    }

    // Function to append custom HTML-Code to tpl.editor.init_once.html
    public function appendInitOnce($str)
    {
        if (!in_array($str, $this->initOnceArr)) {  // Avoid doubling..
            $this->initOnceArr[] = $str;
        }
    }

    // Function to force pluginParams like "elements" via plugin-code
    // $value = NULL deletes key completely from editor-config
    public function setPluginParam($param, $value)
    {
        if ($value === NULL) {
            unset($this->pluginParams[$param]);
            return;
        }
        $this->pluginParams[$param] = $value;
    }

    // Function to set custom-placeholders like renders javascript-objects, arrays etc
    // $value = NULL deletes key completely from custom-placeholders
    public function setPlaceholder($ph, $value)
    {
        if ($value === NULL) {
            unset($this->customPlaceholders[$ph]);
            return;
        }
        $this->customPlaceholders[$ph] = $value;
    }

    // Function to get custom-placeholders
    public function getPlaceholder($ph)
    {
        return $this->customPlaceholders[$ph] ?? NULL;
    }

    // Set new/overwrite translations manually (via bridge)
    public function setLang($key, $string, $overwriteExisting = false)
    {
        if (!is_array($string)) {
            if (!isset($this->langArr[$key]) || $overwriteExisting) {
                $this->langArr[$key] = $string;
            }
            return;
        }
        if (!$overwriteExisting) {
            $this->langArr = array_merge($this->langArr, $string);
        } else {
            $this->langArr = array_merge($string, $this->langArr);
        }
    }

    // Get translation
    public function lang($key = '', $returnNull = false)
    {
        if (!$key) {
            return $returnNull ? NULL : '';
        }
        if (!isset($this->langArr[$key])) {
            return $returnNull ? NULL : 'lang_' . $key;
        }
        return $this->langArr[$key];
    }

    // Renders complete JS-Script
    public function getEditorScript()
    {
        global $modx;
        $ph = array();
        $output = "<!-- modxRTEbridge {$this->editorKey} -->\n";

        // Init via elements
        if (isset($this->pluginParams['elements'])) {

            $this->pluginParams['elements'] = !is_array($this->pluginParams['elements']) ? explode(',', $this->pluginParams['elements']) : $this->pluginParams['elements']; // Allow setting via plugin-configuration

            // Allows bridging elements+TV-options etc before looping
            $this->renderBridgeParams('initBridge');

            // Now loop through tvs
            foreach ($this->pluginParams['elements'] as $selector) {

                $this->initTheme($selector);
                $this->renderBridgeParams($selector);

                // Prepare config output
                $ph = $this->prepareDefaultPlaceholders($selector);
                $ph = array_merge($ph, $this->customPlaceholders, $this->mergeParamArrays());   // Big list..

                // Init only once at all - Load Editors-Library, CSS etc
                if (!defined($this->editorKey . '_INIT_ONCE')) {
                    define($this->editorKey . '_INIT_ONCE', 1);
                    $output .= file_get_contents("{$this->pluginParams['base_path']}tpl/tpl.{$this->editorKey}.init_once.html") . "\n";
                    if (!empty($this->initOnceArr)) {
                        $output .= implode("\n", $this->initOnceArr);
                    }
                    // Provide JS-object with parameters for external scripts like MultiTV
                    $jsParams = array(
                        'default' => 'config_' . $this->editorKey . '_' . $this->modxParams['theme']
                    );
                    $output .= "<script>var modxRTEbridge_{$this->editorKey} = " . json_encode($jsParams) . ";</script>";
                }

                // Init only once per config (enables multiple config-objects i.e. for richtext / richtextmini via [+configJs+])
                if (!defined($this->editorKey . '_INIT_CONFIG_' . $this->theme)) {
                    define($this->editorKey . '_INIT_CONFIG_' . $this->theme, 1);
                    $output .= file_get_contents("{$this->pluginParams['base_path']}tpl/tpl.{$this->editorKey}.config.html") . "\n";
                }

                // Loop through tvs
                $output .= file_get_contents("{$this->pluginParams['base_path']}tpl/tpl.{$this->editorKey}.init.html") . "\n";
                $output = $modx->parseText($output, $ph);
                $output = str_replace('\\', '/', $output);
            }

        } else {
            // No elements given - create Config-Object only
            $this->theme = $this->tvOptions['theme'];
            $this->initTheme('noselector');
            $this->renderBridgeParams('noselector');

            // Prepare config output
            $ph = $this->prepareDefaultPlaceholders();
            $ph = array_merge($ph, $this->customPlaceholders, $this->mergeParamArrays());   // Big list..

            if (!defined($this->editorKey . '_INIT_CONFIG_' . $this->theme)) {
                define($this->editorKey . '_INIT_CONFIG_' . $this->theme, 1);
                $output .= file_get_contents("{$this->pluginParams['base_path']}tpl/tpl.{$this->editorKey}.config.html") . "\n";
                $output = $modx->parseText($output, $ph);
            }
        }

        // Remove empty placeholders !
        $placeholderArr = $modx->getTagsFromContent($output, '[+', '+]');
        if (!empty($placeholderArr)) {
            foreach ($placeholderArr[1] as $key => $val) {
                $output = str_replace($placeholderArr[0][$key], '', $output);
                $this->debugMessages[] = 'Removed empty placeholder: ' . $placeholderArr[1];
            }
        }

        $output .= $this->renderDebugMessages($ph);
        $output .= "<!-- / modxRTEbridge {$this->editorKey} -->\n";

        return $output;
    }

    /**
     * @return array
     */
    public function prepareDefaultPlaceholders($selector = '', $render = true)
    {
        global $modx;

        if ($render) {
            $ph['configString'] = $this->renderConfigString();
            $ph['configRawString'] = $this->renderConfigRawString();
        }
        $ph['editorKey'] = $this->editorKey;
        $ph['themeKey'] = $this->theme;
        $ph['selector'] = $selector;
        $ph['documentIdentifier'] = $modx->documentIdentifier;
        $ph['base_path'] = MODX_BASE_PATH;
        $ph['base_url'] = MODX_BASE_URL;
        $ph['manager_path'] = MGR_DIR;
        $ph['site_manager_url'] = MODX_MANAGER_URL;
        $ph['which_browser'] = !empty($modx->config['which_browser']) ? $modx->config['which_browser'] : 'mcpuk';

        return $ph;
    }

    // Init/load theme
    public function initTheme($selector)
    {
        global $modx;

        $this->theme = $this->tvOptions[$selector]['theme'] ?? $this->theme;

        // Load theme for user or webuser
        if ($modx->isBackend() || ((int)$_GET['quickmanagertv'] == 1 || isset($_SESSION['mgrValidated']))) {
            // User is logged into Manager
            // Load base first to assure Modx settings like entermode, editor_css_path are given set, can be overwritten in custom theme
            include(
                sprintf(
                    "%stheme/theme.%s.base.inc.php",
                    $this->pluginParams['base_path'],
                    $this->editorKey
                )
            );
            include(
                sprintf(
                    "%stheme/theme.%s.%s.inc.php",
                    $this->pluginParams['base_path'],
                    $this->editorKey,
                    $this->theme
                )
            );
            $this->pluginParams['language'] = $this->pluginParams['language'] ?? $this->lang('lang_code');
            return;
        }

        // User is a webuser
        $webuserTheme = !empty($this->pluginParams['webTheme']) ? $this->pluginParams['webTheme'] : 'webuser';
        // Load base first or set EVERYTHING for webuser only in webuser-theme?
        // include("{$this->pluginParams['base_path']}theme/theme.{$this->editorKey}.base.inc.php");
        include(
            sprintf(
                "%stheme/theme.%s.%s.inc.php",
                $this->pluginParams['base_path'],
                $this->editorKey,
                $webuserTheme
            )
        );
        // @todo: determine user-language?
        $this->pluginParams['language'] = $this->pluginParams['language'] ?? $this->lang('lang_code');
    }

    // Call bridge-functions and receive optional bridged-values
    // $selector = "initBridge" allows executing bridging function without modifying $this->themeConfig
    public function renderBridgeParams($selector)
    {
        // Call functions - for optional translation of params/values via bridge.xxxxxxxxxx.inc.php
        foreach ($this->bridgeParams as $editorParam) {
            $bridgeFunction = 'bridge_' . $editorParam;
            if (!method_exists($this, $bridgeFunction)) {
                continue;
            }
            // Call function, get return
            $return = $this->$bridgeFunction($selector);
            if ($return === NULL || !isset($this->themeConfig[$editorParam]) || $selector === 'initBridge') {
                continue;
            }
            $this->themeConfig[$editorParam]['bridged'] = $return;
        }
        // Load Tv-Options as bridged-params
        if ($selector === 'initBridge') {
            return;
        }
        foreach ($this->themeConfig as $key => $conf) {
            if (!isset($this->tvOptions[$selector][$key]) || $key === 'theme') {
                continue;
            }
            $this->themeConfig[$key]['bridged'] = $this->tvOptions[$selector][$key];
        }
    }

    // Renders String for initialization via JS
    public function renderConfigString()
    {
        global $modx;

        $config = array();
        $defaultPhs = $this->prepareDefaultPlaceholders('', false);

        // Build config-string as per themeConfig
        $raw = '';
        foreach ($this->themeConfig as $key => $conf) {

            if ($conf === NULL) {
                continue;
            } // Skip nulled parameters
            $value = $this->determineValue($key, $conf);
            if ($value === NULL) {
                continue;
            } // Skip none-allowed empty settings

            $value = is_string($value) ? $modx->parseText($value, $defaultPhs) : $value; // Allow default-placeholders like [+which_browser+] in theme-param-values

            // Escape quotes
            if (!is_array($value) && strpos($value, "'") !== false && !in_array($conf['type'], array('raw', 'object', 'obj')))
                $value = str_replace("'", "\\'", $value);

            // Determine output-type
            switch (strtolower($conf['type'])) {
                case 'string':
                case 'str':
                    $config[$key] = "        {$key}:'{$value}'";
                    break;
                case 'array':
                case 'arr':
                    if (is_array($value)) {
                        $value = "['" . implode("','", $value) . "']";
                    }
                $config[$key] = "        {$key}:{$value}";
                    break;
                case 'boolean':
                case 'bool':
                    $value = $value == true ? 'true' : 'false';
                    $config[$key] = "        {$key}:{$value}";
                    break;
                case 'json':
                    if (is_array($value)) $value = json_encode($value);
                    $config[$key] = "        {$key}:{$value}";
                    break;
                case 'int':
                case 'constant':
                case 'const':
                case 'number':
                case 'num':
                case 'object':
                case 'obj':
                    $config[$key] = "        {$key}:{$value}";
                    break;
                case 'raw':
                    $raw .= "{$value}\n";
                    break;
            }
        }

        return implode(",\n", $config) . $raw;
    }

    // Renders String for initialization via JS
    public function renderConfigRawString()
    {
        // Build config-string as per themeConfig
        $raw = '';
        foreach ($this->themeConfig as $key => $conf) {

            if ($conf === NULL) {
                continue;
            }  // Skip nulled parameters
            $value = $this->determineValue($key, $conf);
            if ($value === NULL) {
                continue;
            } // Skip none-allowed empty settings

            if ($conf['type'] === 'raw') {
                $raw .= "{$value}\n";
                break;
            }
        }

        return $raw;
    }

    // Get final value of editor-config
    public function determineValue($key, $conf = NULL)
    {
        if ($conf == NULL && isset($this->themeConfig[$key])) {
            $conf = $this->themeConfig[$key];
        }

        $value = isset($this->themeConfig[$key]['bridged']) ? $this->themeConfig[$key]['bridged'] : NULL;
        $value = $value === NULL && isset($this->themeConfig[$key]['force']) ? $this->themeConfig[$key]['force'] : $value;
        $value = $value === NULL && isset($this->themeConfig[$key]['value']) ? $this->themeConfig[$key]['value'] : $value;

        if (!$conf || in_array($conf['type'], array('boolean', 'bool'))) {
            return $value;
        }

        if ($value === '' && $conf['empty'] === false) {  // Empty values not allowed
            if ($conf['default'] === '') {
                return NULL;
            }
            return $conf['default'];
        }

        return $value;
    }

    // Adds initilization before </body> for frontend-editors
    public function addEditorScriptToBody()
    {
        global $modx;

        if (!isset($_SESSION['usertype']) || $_SESSION['usertype'] !== 'manager') {
            return;
        }

        // Show only when logged in manager
        // Add only once
        if (defined($this->editorKey . '_ADDED_TO_BODY')) {
            return;
        }

        define($this->editorKey . '_ADDED_TO_BODY', 1);

        // @todo: How to avoid caching of plugins on event "OnParseDocument"?
        if (strpos($modx->documentOutput, "<!-- modxRTEbridge " . $this->editorKey . " -->") !== false) {
            return;
        }

        $initJs = $this->getEditorScript();
        // Avoid double init if already cached..
        if (strpos($modx->documentOutput, '</body>') !== false) {
            // Append to <body>
            $modx->documentOutput = str_replace('</body>', $initJs . "</body>", $modx->documentOutput);
        } else {
            // No <body> - append to source
            $modx->documentOutput .= $initJs;
        }
    }

    /***************************************************************
     * SETTINGS PARTS
     * @todo: make options dynamic to add for example additional options to setting "schema" like html5-strict, html5-bla, or just to "html4 and html5"..
     ***************************************************************/

    // Outputs Modx- / user-configuration settings
    public function getModxSettings()
    {
        global $modx;
        $params = &$this->pluginParams;

        if (defined('INTERFACE_RENDERED_' . $this->editorKey)) {
            return '';
        }
        define('INTERFACE_RENDERED_' . $this->editorKey, 1);

        // Avoid conflicts with older TinyMCE base configs, prepend editorKey to configKey like [+ckeditor4_custom_plugins+]
        $prependModxParams = array();
        foreach ($this->modxParams as $key => $val) {
            $prependModxParams[$this->editorKey . '_' . $key] = $val;
        }

        $ph = array_merge($prependModxParams, $params);

        // Prepare [+display+]
        $ph['display'] = ($_SESSION['browser'] === 'modern') ? 'table-row' : 'block';
        $ph['display'] = $modx->config['use_editor'] == 1 ? $ph['display'] : 'none';

        // Prepare setting "theme"
        $ph['theme_options'] = $this->getThemeNames();

        // Prepare setting "skin"
        $ph['skin_options'] = $this->getSkinNames();

        // Prepare setting "skin-theme"
        $ph['skintheme_options'] = $this->getSkinThemeNames();

        // Prepare setting "entermode_options"
        $entermode = !empty($ph[$this->editorKey . '_entermode']) ? $ph[$this->editorKey . '_entermode'] : 'p';
        $ph['entermode_options'] = sprintf(
            '<label><input name="[+name+]" type="radio" value="p" %s/>%s</label><br />',
            $this->checked($entermode === 'p'),
            $this->lang('entermode_opt1')
        );
        $ph['entermode_options'] .= sprintf(
            '<label><input name="[+name+]" type="radio" value="br" %s/>%s</label>',
            $this->checked($entermode === 'br'),
            $this->lang('entermode_opt2')
        );
        switch ($modx->manager->action) {
            case '11':
            case '12':
            case '119':
                $ph['entermode_options'] .= '<br />';
                $ph['entermode_options'] .= sprintf(
                    '<label><input name="[+name+]" type="radio" value="" %s/>%s</label><br />',
                    $this->checked(empty($params[$this->editorKey . '_entermode'])),
                    $this->lang('theme_global_settings')
                );
                break;
        }

        // Prepare setting "element_format_options"
        $element_format = !empty($ph[$this->editorKey . '_element_format']) ? $ph[$this->editorKey . '_element_format'] : 'xhtml';
        $ph['element_format_options'] = sprintf(
            '<label><input name="[+name+]" type="radio" value="xhtml" %s/>XHTML</label><br />',
            $this->checked($element_format === 'xhtml')
        );
        $ph['element_format_options'] .= sprintf(
            '<label><input name="[+name+]" type="radio" value="html" %s/>HTML</label>',
            $this->checked($element_format === 'html')
        );
        switch ($modx->manager->action) {
            case '11':
            case '12':
            case '119':
                $ph['element_format_options'] .= '<br />';
                $ph['element_format_options'] .= sprintf(
                    '<label><input name="[+name+]" type="radio" value="" %s/>%s</label><br />',
                    $this->checked(empty($params[$this->editorKey . '_element_format'])),
                    $this->lang('theme_global_settings')
                );
                break;
        }

        // Prepare setting "schema_options"
        $schema = !empty($ph[$this->editorKey . '_schema']) ? $ph[$this->editorKey . '_schema'] : 'html5';
        $ph['schema_options'] = sprintf(
            '<label><input name="[+name+]" type="radio" value="html4" %s/>HTML4(XHTML)</label><br />',
            $this->checked($schema === 'html4')
        );
        $ph['schema_options'] .= sprintf(
            '<label><input name="[+name+]" type="radio" value="html5" %s/>HTML5</label><br />',
            $this->checked($schema === 'html5')
        );
        $ph['schema_options'] .= sprintf(
            '<label><input name="[+name+]" type="radio" value="html5-strict" %s/>HTML5-strict</label>',
            $this->checked($schema === 'html5-strict')
        );
        switch ($modx->manager->action) {
            case '11':
            case '12':
            case '119':
                $ph['schema_options'] .= '<br />';
                $ph['schema_options'] .= sprintf(
                    '<label><input name="[+name+]" type="radio" value="" %s/>%s</label><br />',
                    $this->checked(empty($params[$this->editorKey . '_schema'])),
                    $this->lang('theme_global_settings')
                );
                break;
        }

        // Prepare settings rows output
        include($params['base_path'] . 'gsettings/gsettings.rows.inc.php');
        $settingsRowTpl = file_get_contents($params['base_path'] . "gsettings/gsettings.row.inc.html");
        $settingsRows = isset($settingsRows) ? array_merge($settingsRows, $this->gSettingsCustom) : $this->gSettingsCustom;

        $ph['rows'] = '';
        foreach ($settingsRows as $name => $row) {

            if ($row == NULL) {
                continue;
            }     // Skip disabled config-settings

            $row = array_merge($this->langArr, $row);

            $row['name'] = $this->editorKey . '_' . $name;
            $row['editorKey'] = $this->editorKey;
            $row['title'] = $this->lang($row['title']);
            $row['message'] = $this->lang($row['message']);
            $row['messageVal'] = !empty($row['messageVal']) ? $row['messageVal'] : '';

            // Prepare displaying of default values
            if (!isset($this->gSettingsDefaultValues[$name])) {
                $row['default'] = '';
            } else {
                $row['default'] = sprintf(
                    '<span class="default-val" style="margin:0.5em 0;display:block">%s<i>%s</i></span>',
                    $this->lang('default'),
                    $this->gSettingsDefaultValues[$name]
                );
            }

            // Prepare Default-Checkboxes for user-settings
            if (in_array($modx->manager->action, array(11, 12)) && isset($row['defaultCheckbox']) && $row['defaultCheckbox']) {
                $useGlobalName = $name . '_useglobal';
                if (!is_null($this->modxParams[$useGlobalName]) && empty($this->modxParams[$useGlobalName])) {
                    $useGlobal = '0';
                } else {
                    $useGlobal = '1';
                }
                $useGlobalBool = $useGlobal ? true : false;
                $row['defaultCheckbox'] = sprintf(
                    '<label><input class="defaultCheckbox" type="checkbox" id="%s" %s>%s</label><input id="%s_hidden" name="%s_%s" value="%s" type="hidden" />',
                    $useGlobalName,
                    $this->checked($useGlobalBool),
                    $this->lang('theme_global_settings'),
                    $useGlobalName,
                    $this->editorKey,
                    $useGlobalName,
                    $useGlobal
                );
            } else {
                $row['defaultCheckbox'] = '';
            }

            // Nested parsing
            $output = $settingsRowTpl;
            $bt = md5('');
            while ($bt !== md5($output)) {
                $bt = md5($output);
                $output = $this->parsePlaceholders($output, $row); // Replace general translations
                $output = $this->parsePlaceholders($output, $ph);  // Replace values / settings
            }

            $ph['rows'] .= $output . "\n";
        }

        $settingsBody = file_get_contents("{$params['base_path']}gsettings/gsettings.body.inc.html");

        if (empty($this->pluginParams['editorLogo'])) {
            $ph['editorLogo'] = '';
        } else {
            $ph['editorLogo'] = sprintf(
                '<img src="%s%s" style="max-height:50px;width:auto;margin-right:50px;" />',
                $this->pluginParams['base_url'],
                $this->pluginParams['editorLogo']);
        }

        return $this->replaceTranslations(
            $this->parsePlaceholders($settingsBody, $ph)
        );
    }

    public function parsePlaceholders($content, $ph)
    {
        foreach ($ph as $key => $value) {
            $content = str_replace('[+' . $key . '+]', $value ?? '', $content);
        }
        return $content;
    }

    // Replace all translation-placeholders
    public function replaceTranslations($output)
    {
        global $modx;

        $placeholderArr = $modx->getTagsFromContent($output, '[+', '+]');
        if (empty($placeholderArr)) {
            return $output;
        }

        foreach ($placeholderArr[1] as $key => $val) {
            $trans = $this->lang($val, true);
            if ($trans !== NULL) {
                $output = str_replace($placeholderArr[0][$key], $trans, $output);
            }
        }
        return $output;
    }

    // helpers for getModxSettings()
    public function getThemeNames()
    {
        global $modx;
        $params = $this->pluginParams;

        $themeDir = "{$params['base_path']}theme/";

        switch ($modx->manager->action) {
            case '11':
            case '12':
            case '119':
                $selected = $this->selected(empty($params[$this->editorKey . '_skin']));
                $option[] = '<option value=""' . $selected . '>' . $this->lang('theme_global_settings') . '</option>';
                break;
        }

        foreach (glob("{$themeDir}*") as $file) {
            //$file = str_replace('\\', '/', $file);
            $file = str_replace($themeDir, '', $file);
            $file = str_replace('theme.' . $this->editorKey . '.', '', $file);

            if (in_array($file, array('index.html'))) {
                continue;
            }

            $theme = trim(str_replace('.inc.php', '', $file));
            if ($theme === 'base') {
                continue;
            } // Why should user select base-theme?
            if ($this->lang("theme_" . $theme, true)) {
                $label = $this->lang("theme_" . $theme);
            } else {
                $label = $theme;
            } // Get optional translation or show raw themeKey
            $selected = $this->selected($theme == $this->modxParams['theme']);

            $label = $modx->parseText($label, $this->pluginParams);   // Enable [+editorLabel+] in options-label

            $option[] = sprintf(
                '<option value="%s"%s>%s</option>', $theme, $selected, $label
            );
        }

        if (!isset($option) || !is_array($option)) {
            return '<!-- ' . $this->editorKey . ': No themes found -->';
        }

        return implode("\n", $option);
    }

    public function getSkinNames()
    {
        global $modx;
        $params = $this->pluginParams;

        if (empty($params['skinsDirectory'])) {
            return '<option value="">No skinsDirectory set</option>';
        }

        $skinDir = "{$params['base_path']}{$params['skinsDirectory']}";

        switch ($modx->manager->action) {
            case '11':
            case '12':
            case '119':
                $selected = $this->selected(empty($params[$this->editorKey . '_skin']));
                $option[] = '<option value=""' . $selected . '>' . $this->lang('theme_global_settings') . '</option>';
                break;
        }
        foreach (glob("{$skinDir}*", GLOB_ONLYDIR) as $dir) {
            //$dir = str_replace('\\', '/', $dir);
            $skin_name = substr($dir, strrpos($dir, '/') + 1);
            $skins[$skin_name][] = 'default';
            $styles = glob("{$dir}/ui_*.css");
            if (is_array($styles) && 0 < count($styles)) {
                foreach ($styles as $css) {
                    $skin_variant = substr($css, strrpos($css, '_') + 1);
                    $skin_variant = substr($skin_variant, 0, strrpos($skin_variant, '.'));
                    $skins[$skin_name][] = $skin_variant;
                }
            }
            foreach ($skins as $k => $o)
            {
                foreach ($o as $v) {
                    if ($v === 'default') {
                        $value = $k;
                    } else {
                        $value = $k . ":" . $v;
                    }
                    $selected = $this->selected($value == $this->modxParams['skin']);
                    $option[] = sprintf(
                        '<option value="%s"%s>%s</option>', $value, $selected, $value
                    );
                }
            }
        }

        return is_array($option) ? implode("\n", $option) : '<!-- ' . $this->editorKey . ': No skins found -->';
    }

    public function getSkinThemeNames()
    {
        global $modx;
        $params = $this->pluginParams;

        $themeDir = "{$params['base_path']}{$params['skinthemeDirectory']}";

        switch ($modx->manager->action) {
            case '11':
            case '12':
            case '119':
                $selected = $this->selected(empty($params[$this->editorKey . '_skintheme']));
                $option[] = '<option value=""' . $selected . '>' . $this->lang('theme_global_settings') . '</option>';
                break;
        }

        foreach (glob("{$themeDir}*") as $theme) {
            //$file = str_replace('\\', '/', $file);
            $theme = str_replace($themeDir, '', $theme);

            if (in_array($theme, array('index.html'))) continue;

            $selected = $this->selected($theme == $this->modxParams['skintheme']);

            $option[] = sprintf('<option value="%s"%s>{$theme}</option>', $theme, $selected);
        }

        if (!isset($option) || !is_array($option)) {
            return '<!-- ' . $this->editorKey . ': No themes found -->';
        }

        return implode("\n", $option);
    }

    public function selected($cond = false)
    {
        if ($cond === false) {
            return '';
        }

        return ' selected="selected"';
    }

    public function checked($cond = false)
    {
        if ($cond === false) {
            return '';
        }

        return ' checked="checked"';
    }


    // Init translations
    public function initLang($basePath)
    {
        global $modx;

        // Init langArray once
        if (!empty($this->langArr)) {
            return;
        }

        if (empty($_SESSION['mgrUsrConfigSet']['manager_language'])) {
            $lang_name = $modx->config['manager_language'];
        } else {
            $lang_name = $_SESSION['mgrUsrConfigSet']['manager_language'];
        }
        $gsettings_path = $basePath . "lang/gsettings/";     // Holds general translations
        $custom_path = $basePath . "lang/custom/";        // Holds custom translations
        $lang_file = $lang_name . '.inc.php';
        $fallback_file = 'english.inc.php';
        $lang_code = '';

        // Load gsettings fallback language (show at least english translations instead of empty)
        if (is_file($gsettings_path . $fallback_file)) {
            include($gsettings_path . $fallback_file);
        }
        if (isset($_lang['lang_code'])) {
            $lang_code = $_lang['lang_code'];
        }    // Set langcode for RTE

        // Load gsettings user language
        if (is_file($custom_path . $fallback_file)) {
            include($custom_path . $fallback_file);
        }
        if (isset($_lang['lang_code'])) {
            $lang_code = $_lang['lang_code'];
        }    // Set langcode for RTE

        // Load custom settings fallback language
        if (is_file($gsettings_path . $lang_file)) {
            include($gsettings_path . $lang_file);
        }
        if (isset($_lang['lang_code'])) {
            $lang_code = $_lang['lang_code'];
        }    // Set langcode for RTE

        // Load custom settings user language
        if (is_file($custom_path . $lang_file)) {
            include($custom_path . $lang_file);
        }
        if (isset($_lang['lang_code'])) {
            $lang_code = $_lang['lang_code'];
        }    // Set langcode for RTE

        $this->langArr = $_lang;
        $this->langArr['lang_code'] = $lang_code;
    }

    // Merges all available config-params with prefixes into single array
    public function mergeParamArrays()
    {
        $p = array();
        foreach ($this->pluginParams as $param => $value) {
            $p['pp.' . $param] = !is_array($value) ? $value : implode(',', $value);
        }
        foreach ($this->modxParams as $param => $value) {
            $p['mp.' . $param] = !is_array($value) ? $value : implode(',', $value);
        }
        foreach ($this->themeConfig as $param => $arr) {
            if (isset($arr['force'])) {
                $p['tc.' . $param] = $arr['force'];
            } elseif (isset($arr['bridged'])) {
                $p['tc.' . $param] = $arr['bridged'];
            } else {
                $p['tc.' . $param] = $arr['value'];
            }
        }
        foreach ($this->gSettingsDefaultValues as $param => $value) {
            $p['gd.' . $param] = !is_array($value) ? $value : implode(',', $value);
        }
        foreach ($this->langArr as $param => $value) {
            $p['l.' . $param] = $value;
        }
        return $p;
    }

    // Get PluginConfiguration by Connectors
    public function getModxPluginConfiguration($pluginName)
    {
        global $modx;

        if ($pluginName === NULL) {
            return $this->pluginParams;
        }

        if (empty ($modx->config)) {
            $modx->getSettings();
        }
        $modx->db->connect();

        $plugin = $modx->getPluginCode($pluginName);
        $parameter = $modx->parseProperties($plugin['props'], $pluginName, 'plugin');

        if (is_array($parameter)) {
            $this->pluginParams = array_merge($parameter, $this->pluginParams);
        }
        return $this->pluginParams;
    }

    // Remove all but numbers
    public function onlyNumbers($string)
    {
        return preg_replace("/[^0-9]/", "", $string); // Remove px, % etc
    }

    // Helper to translate "bold,strike,underline,italic" to "bold","strike","underline","italic"
    // Translates Modx Plugin-configuration strings to JSON-compatible string
    public function addQuotesToCommaList($str, $quote = '"')
    {
        if (empty($str)) {
            return '';
        }

        $elements = explode(',', $str);
        foreach ($elements as $key => $val) {
            $elements[$key] = $quote . trim($val) . $quote;
        }
        return implode(',', $elements);
    }

    public function parseEditableIds($source, $attrContentEditable = false)
    {
        if (!isset($_SESSION['mgrValidated'])) return $source;
        if (!$attrContentEditable) {
            $attrContentEditable = '';
        } else {
            $attrContentEditable = ' contenteditable="true"';
        }

        $matchPhs = '~\[\*#(.*?)\*]~'; // match [*#content*] / content
        preg_match_all($matchPhs, $source, $editableIds);

        $this->setEditableIds($editableIds);

        $source = preg_replace(
            $matchPhs,
            '<div class="editable" id="modx_$1"' . $attrContentEditable . '>[*$1*]</div>',
            $source
        );

        return $source;
    }

    public function setEditableIds($editableIds)
    {
        global $modx;

        if (empty($editableIds) || !isset($editableIds[1])) {
            return;
        }

        foreach ($editableIds[1] as $i => $id) {
            $modx->modxRTEbridge['editableIds'][$id] = '';
        }
    }

    // Helper to avoid Placeholder-/Snippet-Execution for Frontend-Editors
    public function protectModxPhs()
    {
        global $modx;

        if (!isset($modx->modxRTEbridge['editableIds']) || !isset($_SESSION['mgrValidated'])) {
            return;
        }
        foreach ($modx->modxRTEbridge['editableIds'] as $modxPh => $x) {
            if (!isset($modx->documentObject[$modxPh])) {
                continue;
            }
            $modx->documentObject[$modxPh] = $this->protectModxPlaceholders($modx->documentObject[$modxPh]);
        }
    }

    public function protectModxPlaceholders($output)
    {
        return str_replace(
            ['[*', '*]', '[(', ')]', '{{', '}}', '[[', ']]', '[!', '!]', '[+', '+]', '[~', '~]'],
            ['&#91;*', '*&#93;', '&#91;(', ')&#93;', '&#123;&#123;', '&#125;&#125;', '&#91;&#91;', '&#93;&#93;', '&#91;!', '!&#93;', '&#91;+', '+&#93;', '&#91;~', '~&#93;'],
            $output
        );
    }

    public function unprotectModxPlaceholders($output)
    {
        return str_replace(
            ['&#91;*', '*&#93;', '&#91;(', ')&#93;', '&#123;&#123;', '&#125;&#125;', '&#91;&#91;', '&#93;&#93;', '&#91;!', '!&#93;', '&#91;+', '+&#93;', '&#91;~', '~&#93;'],
            ['[*', '*]', '[(', ')]', '{{', '}}', '[[', ']]', '[!', '!]', '[+', '+]', '[~', '~]'],
            $output
        );
    }

    public function prepareAjaxSecHash($docId)
    {
        if (isset($this->ajaxSecHash[$docId])) return $this->ajaxSecHash[$docId];

        $secHash = md5(rand(0, 999999999) + rand(0, 999999999));
        $_SESSION['modxRTEbridge']['secHash'][$docId] = $secHash;
        $this->ajaxSecHash[$docId] = $secHash;

        return $secHash;
    }

    // Handle debug-modes
    public function setDebug($state)
    {
        if ($state === 'full') {
            $this->debug = 'full';
        } elseif ($state != false) {
            $this->debug = true;
        } else {
            $this->debug = false;
        }
    }

    public function renderDebugMessages($placeholderArr)
    {
        if (!$this->debug) {
            return '';
        }

        $output = "<!-- ##### modxRTEbridge Debug Infos #########\n";
        $output .= " - " . implode("\n - ", $this->debugMessages);

        if ($this->debug === 'full') {
            $output .= "this->modxParams = " . print_r($this->modxParams, true) . "\n";
            $output .= "this->pluginParams = " . print_r($this->pluginParams, true) . "\n";
            $output .= "this->themeConfig = " . print_r($this->themeConfig, true) . "\n";
            $output .= "this->gSettingsCustom = " . print_r($this->gSettingsCustom, true) . "\n";
            $output .= "this->gSettingsDefaultValues = " . print_r($this->gSettingsDefaultValues, true) . "\n";
            $output .= "ph = " . print_r($placeholderArr, true) . "\n";
        }

        $output .= "\n     ##### modxRTEbridge Debug Infos End ##### -->\n";
        return $output;
    }

    /***************************************************************
     * Connectors
     **************************************************************/
    public function getTemplateChunkList()
    {
        global $modx;

        $templatesArr = [];

        if ($modx->getLoginUserType() !== 'manager' && !IN_MANAGER_MODE) {
            return $templatesArr;
        }
        $modx->getSettings();
        $ids = $modx->config[$this->editorKey . '_template_docs'];
        $chunks = $modx->config[$this->editorKey . '_template_chunks'];
        $templatesArr = array();

        if (!empty($ids)) {
            $docs = $modx->getDocuments($modx->db->escape($ids), 1, 0, $fields = 'id,pagetitle,menutitle,description,content');
            foreach ($docs as $i => $a) {
                $newTemplate = array(
                    'title' => ($docs[$i]['menutitle'] !== '') ? $docs[$i]['menutitle'] : $docs[$i]['pagetitle'],
                    'description' => $docs[$i]['description'],
                    'content' => $docs[$i]['content']
                );
                $templatesArr[] = $newTemplate;
            }
        }

        if (empty($chunks)) {
            return $templatesArr;
        }

        $tbl_site_htmlsnippets = $modx->getFullTableName('site_htmlsnippets');
        if (strpos($chunks, ',') !== false) {
            $chunks = array_filter(array_map('trim', explode(',', $chunks)));
            $chunks = $modx->db->escape($chunks);
            $chunks = implode("','", $chunks);
            $where = "`name` IN ('{$chunks}')";
            $orderby = "FIELD(name, '{$chunks}')";
        } else {
            $where = "`name`='{$chunks}'";
            $orderby = '';
        }

        $rs = $modx->db->select('id,name,description,snippet', $tbl_site_htmlsnippets, $where, $orderby);

        while ($row = $modx->db->getRow($rs)) {
            $newTemplate = [
                'title' => $row['name'],
                'description' => $row['description'],
                'content' => $row['snippet']
            ];
            $templatesArr[] = $newTemplate;
        }
        return $templatesArr;
    }

    public function saveContentProcessor($rid, $ppPluginName, $ppEditableIds = 'editableIds')
    {
        global $modx;

        if ($rid <= 0 || ($modx->getLoginUserType() !== 'manager' && !IN_MANAGER_MODE)) {
            return 'Not logged into manager!';
        }

        if (!isset($_POST['secHash'])
            || !isset($_SESSION['modxRTEbridge']['secHash'][$rid])
            || $_POST['secHash'] != $_SESSION['modxRTEbridge']['secHash'][$rid]
        ) {
            return 'secHash invalid';
        }

        $editableIds = explode(',', $_POST['phs']);

        if (!$editableIds) {
            return 'editableIds not given in plugin-configuration with config-key "' . $ppEditableIds . '"';
        }

        include_once(MODX_BASE_PATH . "assets/lib/MODxAPI/modResource.php");

        $modx->doc = new modResource($modx);
        $modx->doc->edit($rid);

        foreach ($editableIds as $modxPh) {
            if ($_POST[$modxPh]??'' !== 'undefined') {
                $modx->doc->set($modxPh, $this->unprotectModxPlaceholders($_POST[$modxPh]));
            }
        }
        return $modx->doc->save(true, true); // Returns ressource-ID

    }
}
