<?php namespace EvolutionCMS\Legacy;

use EvolutionCMS\Models;

/**
 * @class: synccache
 */
class Cache
{
    public $cachePath;
    public $showReport;
    public $deletedfiles = array();
    /**
     * @var array
     */
    public $aliases = array();
    /**
     * @var array
     */
    public $parents = array();
    /**
     * @var array
     */
    public $aliasVisible = array();
    public $request_time;
    public $cacheRefreshTime;

    /**
     * synccache constructor.
     */
    public function __construct()
    {
        $this->request_time = $_SERVER['REQUEST_TIME'] + evolutionCMS()->getConfig('server_offset_time');
    }

    /**
     * @param string $path
     */
    public function setCachepath($path)
    {
        $this->cachePath = $path;
    }

    /**
     * @param bool $bool
     */
    public function setReport($bool)
    {
        $this->showReport = $bool;
    }

    /**
     * @param string $s
     * @return string
     */
    public function escapeSingleQuotes($s)
    {
        if ($s === '') {
            return $s;
        }
        $q1 = array("\\", "'");
        $q2 = array("\\\\", "\\'");

        return str_replace($q1, $q2, $s);
    }

    /**
     * @param string $s
     * @return string
     */
    public function escapeDoubleQuotes($s)
    {
        $q1 = array("\\", "\"", "\r", "\n", "\$");
        $q2 = array("\\\\", "\\\"", "\\r", "\\n", "\\$");

        return str_replace($q1, $q2, (string)$s);
    }

    /**
     * @param int|string $id
     * @param string $path
     * @return string
     */
    public function getParents($id, $path = '')
    {
        // modx:returns child's parent
        if (empty($this->aliases)) {
            $db = evolutionCMS()->getDatabase();
            $q = $db->query("SELECT `id`, `alias`, `parent`, `alias_visible` FROM {$db->getFullTableName('site_content')} WHERE `deleted` = 0 AND `isfolder` = 1");

            while ($row = $db->getRow($q)) {
                if ($row['alias'] == '') {
                    $row['alias'] = $row['id'];
                }

                $this->aliases[$row['id']] = $row['alias'];
                $this->parents[$row['id']] = $row['parent'];
                $this->aliasVisible[$row['id']] = $row['alias_visible'];
            }
        }
        if (isset($this->aliases[$id])) {
            if ($this->aliasVisible[$id] == 1) {
                if ($path != '') {
                    $path = $this->aliases[$id] . '/' . $path;
                } else {
                    $path = $this->aliases[$id];
                }
            }

            return $this->getParents($this->parents[$id], $path);
        }

        return $path;
    }

    /**
     * @param null|DocumentParser $modx
     */
    public function emptyCache($modx = null)
    {
        if (!($modx instanceof Interfaces\CoreInterface)) {
            $modx = $GLOBALS['modx'];
        }
        if (!isset($this->cachePath)) {
            $modx->getService('ExceptionHandler')->messageQuit("Cache path not set.");
        }
        \Illuminate\Support\Facades\Cache::flush();
        Models\UserSetting::query()->whereIn('setting_name', ['password', 'password_confirmation', 'clearPassword'])->delete();
        $files = glob(realpath($this->cachePath) . '/*.pageCache.php');
        $filesincache = count($files);
        $deletedfiles = array();
        while ($file = array_shift($files)) {
            $name = basename($file);
            clearstatcache();
            if (is_file($file)) {
                if (unlink($file)) {
                    $deletedfiles[] = $name;
                }
            }
        }
        $opcache_restrict_api = trim(ini_get('opcache.restrict_api'));
        $opcache_restrict_api = $opcache_restrict_api && mb_stripos(__FILE__, $opcache_restrict_api) !== 0;

        if (!$opcache_restrict_api && function_exists('opcache_get_status')) {
            $opcache = opcache_get_status();
            if (!empty($opcache['opcache_enabled'])) {
                opcache_reset();
            }
        }

        $this->buildCache($modx);

        $this->publishTimeConfig();

        // finished cache stuff.
        if ($this->showReport == true) {
            global $_lang;
            $total = count($deletedfiles);
            echo sprintf($_lang['refresh_cache'], $filesincache, $total);
            if ($total > 0) {
                if (isset($opcache)) {
                    echo '<p>Opcache empty.</p>';
                }
                echo '<p>' . $_lang['cache_files_deleted'] . '</p><ul>';
                foreach ($deletedfiles as $deletedfile) {
                    echo '<li>' . $deletedfile . '</li>';
                }
                echo '</ul>';
            }
        }
    }

    /**
     * @param string|int $cacheRefreshTime
     */
    public function publishTimeConfig($cacheRefreshTime = '')
    {
        $cacheRefreshTimeFromDB = $this->getCacheRefreshTime();
        if (!preg_match('@^[0-9]+$]@', $cacheRefreshTime) || $cacheRefreshTimeFromDB < $cacheRefreshTime) {
            $cacheRefreshTime = $cacheRefreshTimeFromDB;
        }

        // write the file
        $content = '<?php' . "\n";
        $content .= '$recent_update=\'' . $this->request_time . '\';' . "\n";
        $content .= '$cacheRefreshTime=\'' . $cacheRefreshTime . '\';' . "\n";

        $filename = evolutionCMS()->getSitePublishingFilePath();
        if (!$handle = fopen($filename, 'w')) {
            exit("Cannot open file ({$filename}");
        }

        $content .= "\n";

        // Write $somecontent to our opened file.
        if (fwrite($handle, $content) === false) {
            exit("Cannot write publishing info file! Make sure the assets/cache directory is writable!");
        }
    }

    /**
     * @return int
     */
    public function getCacheRefreshTime()
    {
        // update publish time file
        $timesArr = array();

        $minpub = Models\SiteContent::query()
            ->where('pub_date', '>', $this->request_time)->min('pub_date');

        if ($minpub != null) {
            $timesArr[] = $minpub;
        }

        $minpub = Models\SiteContent::query()
            ->where('unpub_date', '>', $this->request_time)->min('unpub_date');

        if ($minpub != null) {
            $timesArr[] = $minpub;
        }

        if (isset($this->cacheRefreshTime) && !empty($this->cacheRefreshTime)) {
            $timesArr[] = $this->cacheRefreshTime;
        }

        if (count($timesArr) > 0) {
            $cacheRefreshTime = min($timesArr);
        } else {
            $cacheRefreshTime = 0;
        }

        return $cacheRefreshTime;
    }

    /**
     * build siteCache file
     * @param Interfaces\CoreInterface $modx
     * @return boolean success
     */
    public function buildCache($modx)
    {
        $content = "<?php\n";

        // SETTINGS & DOCUMENT LISTINGS CACHE

        // get settings
        $systemSettings = Models\SystemSetting::all();
        $config = array();
        $content .= '$c=&$this->config;';
        foreach ($systemSettings as $systemSetting) {
            $content .= '$c[\'' . $systemSetting->setting_name . '\']="' . $this->escapeDoubleQuotes($systemSetting->setting_value) . '";';
            $config[$systemSetting->setting_name] = $systemSetting->setting_value;
        }

        if (isset($config['enable_filter']) && $config['enable_filter'] == 1) {
            if (Models\SitePlugin::activePhx()->count()) {
                $content .= '$this->config[\'enable_filter\']=\'0\';';
            }
        }

        // enabled = 1, disabled = 0, only folders = 2
        if (!isset($config['alias_listing']) || $config['alias_listing'] != 0) {
            // WRITE Aliases to cache file
            $db = $modx->getDatabase();
            $sql = "SELECT `id`, `alias`, `parent`, `isfolder`, `alias_visible` FROM {$db->getFullTableName('site_content')} WHERE `deleted` = 0";

            if ($config['alias_listing'] == 2) {
                $sql .= ' AND `isfolder` = 1';
            }
            $q = $db->query($sql);
            $content .= '$a=&$this->aliasListing;';
            $content .= '$d=&$this->documentListing;';
            $content .= '$m=&$this->documentMap;';
            while ($doc = $db->getRow($q)) {
                $tmpPath = '';

                if ($doc['alias'] == '') {
                    $doc['alias'] = $doc['id'];
                }
                if ($config['friendly_urls'] && $config['use_alias_path']) {
                    $tmpPath = $this->getParents($doc['parent']);
                    $alias = (strlen($tmpPath) > 0 ? $tmpPath . '/' : '') . $doc['alias'];
                    $key = $alias;
                } else {
                    $key = $doc['alias'];
                }

                $doc['path'] = $tmpPath;

                // alias listing
                $content .= '$a[' . $doc['id'] . ']=array(\'id\'=>' . $doc['id'] . ',\'alias\'=>\'' . $doc['alias'] . '\',\'path\'=>\'' . $doc['path'] . '\',\'parent\'=>' . $doc['parent'] . ',\'isfolder\'=>' . $doc['isfolder'] . ',\'alias_visible\'=>' . $doc['alias_visible'] . ');';
                // document listing
                $content .= '$d[\'' . $key . '\']=' . $doc['id'] . ';';
                // document map
                $content .= '$m[]=array(' . $doc['parent'] . '=>' . $doc['id'] . ');';
            }
        }

        if (!isset($config['disable_chunk_cache']) || $config['disable_chunk_cache'] != 1) {
            // WRITE Chunks to cache file
            $chunks = Models\SiteHtmlsnippet::all();
            $content .= '$c=&$this->chunkCache;';
            foreach ($chunks->toArray() as $doc) {
                $content .= '$c[\'' . $doc['name'] . '\']=\'' . ($doc['disabled'] ? '' : $this->escapeSingleQuotes($doc['snippet'])) . '\';';
            }
        }

        if (!isset($config['disable_snippet_cache']) || $config['disable_snippet_cache'] != 1) {
            // WRITE snippets to cache file
            $snippets = Models\SiteSnippet::query()
                ->select('site_snippets.*', 'site_modules.properties as sharedproperties')
                ->leftJoin('site_modules', 'site_snippets.moduleguid', '=', 'site_modules.guid')
                ->get();
            $content .= '$s=&$this->snippetCache;';
            foreach ($snippets->toArray() as $row) {
                if ($row['disabled']) {
                    $content .= '$s[\'' . $row['name'] . '\']=\'return false;\';';
                } else {
                    $value = trim($row['snippet']);
                    if ($modx->getConfig('minifyphp_incache')) {
                        $value = $this->php_strip_whitespace($value);
                    }
                    $content .= '$s[\'' . $row['name'] . '\']=\'' . $this->escapeSingleQuotes($value) . '\';';
                    $properties = $modx->parseProperties($row['properties']);
                    $sharedproperties = $modx->parseProperties($row['sharedproperties']);
                    $properties = array_merge($sharedproperties, $properties);
                    if (0 < count($properties)) {
                        $content .= '$s[\'' . $row['name'] . 'Props\']=\'' . $this->escapeSingleQuotes(json_encode($properties)) . '\';';
                    }
                }
            }
        }

        if (!isset($config['disable_plugins_cache']) || $config['disable_plugins_cache'] != 1) {
            // WRITE plugins to cache file
            $plugins = Models\SitePlugin::query()
                ->select('site_plugins.*', 'site_modules.properties as sharedproperties')
                ->leftJoin('site_modules', 'site_plugins.moduleguid', '=', 'site_modules.guid')
                ->where('site_plugins.disabled', 0)
                ->get();
            $content .= '$p=&$this->pluginCache;';
            foreach ($plugins->toArray() as $row) {
                $value = trim($row['plugincode']);
                if ($modx->getConfig('minifyphp_incache')) {
                    $value = $this->php_strip_whitespace($value);
                }
                $content .= '$p[\'' . $row['name'] . '\']=\'' . $this->escapeSingleQuotes($value) . '\';';
                if ($row['properties'] != '' || $row['sharedproperties'] != '') {
                    $properties = $modx->parseProperties($row['properties']);
                    $sharedproperties = $modx->parseProperties($row['sharedproperties']);
                    $properties = array_merge($sharedproperties, $properties);
                    if (0 < count($properties)) {
                        $content .= '$p[\'' . $row['name'] . 'Props\']=\'' . $this->escapeSingleQuotes(json_encode($properties)) . '\';';
                    }
                }
            }
        }

        if (true) { // system events
            // WRITE system event triggers
            $systemEvents = Models\SystemEventname::query()
                ->select('system_eventnames.name as evtname', 'site_plugin_events.pluginid', 'site_plugins.name as pname')
                ->leftJoin('site_plugin_events', 'system_eventnames.id', '=', 'site_plugin_events.evtid')
                ->leftJoin('site_plugins', 'site_plugin_events.pluginid', '=', 'site_plugins.id')
                ->where('site_plugins.disabled', 0)
                ->orderBy('system_eventnames.name', 'ASC')
                ->orderBy('site_plugin_events.priority', 'ASC')
                ->get();
            $content .= '$e=&$this->pluginEvent;';
            $events = array();
            foreach ($systemEvents->toArray() as $row) {
                if (!isset($events[$row['evtname']])) {
                    $events[$row['evtname']] = array();
                }
                $events[$row['evtname']][] = $row['pname'];
            }
            foreach ($events as $evtname => $pluginnames) {
                $events[$evtname] = $pluginnames;
                $content .= '$e[\'' . $evtname . '\']=array(\'' . implode('\',\'', $this->escapeSingleQuotes($pluginnames)) . '\');';
            }
        }

        $content .= "\n";

        // close and write the file
        $filename = $modx->getSiteCacheFilePath();

        // invoke OnBeforeCacheUpdate event
        $modx->invokeEvent('OnBeforeCacheUpdate');

        if (@file_put_contents($filename, $content) === false) {
            exit("Cannot write $filename! Make sure file or its directory is writable!");
        }

        if (!is_file(MODX_BASE_PATH . '/assets/cache/.htaccess')) {
            file_put_contents(MODX_BASE_PATH . '/assets/cache/.htaccess', "<ifModule mod_authz_core.c>\nRequire all denied\n</ifModule>\n<ifModule !mod_authz_core.c>\norder deny,allow\ndeny from all\n</ifModule>\n");
        }

        // invoke OnCacheUpdate event
        $modx->invokeEvent('OnCacheUpdate');

        return true;
    }

    /**
     * @param string $source
     * @return string
     *
     * @see http://php.net/manual/en/tokenizer.examples.php
     */
    // phpcs:ignore
    public function php_strip_whitespace($source)
    {

        $source = trim($source);
        if (substr($source, 0, 5) !== '<?php') {
            $source = '<?php ' . $source;
        }

        $tokens = token_get_all($source);
        $_ = '';
        $prev_token = 0;
        $chars = explode(' ', '( ) ; , = { } ? :');
        foreach ($tokens as $i => $token) {
            if (is_string($token)) {
                if (in_array($token, array('=', ':'))) {
                    $_ = trim($_);
                } elseif (in_array($token, array('(', '{')) && in_array($prev_token, array(T_IF, T_ELSE, T_ELSEIF))) {
                    $_ = trim($_);
                }
                $_ .= $token;
                if ($prev_token == T_END_HEREDOC) {
                    $_ .= "\n";
                }
                continue;
            }

            list($type, $text) = $token;

            switch ($type) {
                case T_COMMENT:
                case T_DOC_COMMENT:
                    break;
                case T_WHITESPACE:
                    if ($prev_token != T_END_HEREDOC) {
                        $_ = trim($_);
                    }
                    $lastChar = substr($_, -1);
                    if (!in_array($lastChar, $chars)) { // ,320,327,288,284,289
                        if (!in_array($prev_token, array(T_FOREACH, T_WHILE, T_FOR, T_BOOLEAN_AND, T_BOOLEAN_OR, T_DOUBLE_ARROW))) {
                            $_ .= ' ';
                        }
                    }
                    break;
                case T_IS_EQUAL:
                case T_IS_IDENTICAL:
                case T_IS_NOT_EQUAL:
                case T_DOUBLE_ARROW:
                case T_BOOLEAN_AND:
                case T_BOOLEAN_OR:
                case T_START_HEREDOC:
                    if ($prev_token != T_START_HEREDOC) {
                        $_ = trim($_);
                    }
                    $prev_token = $type;
                    $_ .= $text;
                    break;
                default:
                    $prev_token = $type;
                    $_ .= $text;
            }
        }
        $source = preg_replace(
            array('@^<\?php@i', '|\s+|', '|<!--|', '|-->|', '|-->\s+<!--|'),
            array('', ' ', "\n" . '<!--', '-->' . "\n", '-->' . "\n" . '<!--'),
            $_
        );
        $source = trim($source);

        return $source;
    }
}
