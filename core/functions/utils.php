<?php

use EvolutionCMS\Parser;
use Illuminate\Contracts\Filesystem\FileNotFoundException;

if (!function_exists('evo_guest')) {
    /**
     * @param $content
     *
     * @return mixed|string
     */
    function evo_guest($content)
    {
        if (!evo()->getLoginUserID()) {
            $content = '';
        }

        return $content;
    }
}

if (!function_exists('evo_auth')) {
    /**
     * @param $content
     *
     * @return mixed|string
     */
    function evo_auth($content)
    {
        if (!evo()->getLoginUserID()) {
            $content = '';
        }

        return $content;
    }
}

if (!function_exists('var_debug')) {
    /**
     * Dumps information about a variable in Tracy Debug Bar.
     *
     * @tracySkipLocation
     *
     * @param mixed $var
     * @param null $title
     * @param array|null $options
     *
     * @return mixed  variable itself
     */
    function var_debug($var, $title = null, array $options = null)
    {
        return EvolutionCMS\Tracy\Debugger::barDump($var, $title, $options);
    }
}

if (!function_exists('evo_parser')) {
    /**
     * @param $content
     *
     * @return mixed|string
     */
    function evo_parser($content)
    {
        $core = evo();
        $minParserPasses = $core->minParserPasses;
        $maxParserPasses = $core->maxParserPasses;

        $core->minParserPasses = 2;
        $core->maxParserPasses = 10;

        $out = Parser::getInstance($core)->parseDocumentSource($content, $core);

        $core->minParserPasses = $minParserPasses;
        $core->maxParserPasses = $maxParserPasses;

        return $out;
    }
}

if (!function_exists('evo_raw_config_settings')) {
    /**
     * @return array
     * @throws FileNotFoundException
     */
    function evo_raw_config_settings(): array
    {
        $configFile = config_path('cms/settings.php', !app()->isProduction());

        /** @var Illuminate\Filesystem\Filesystem $files */
        $files = app('files');

        if ($files->isFile($configFile)) {
            $config = $files->getRequire($configFile);
        }

        return isset($config) && is_array($config) ? $config : [];
    }
}

if (!function_exists('evo_save_config_settings')) {
    /**
     * @param array $config
     *
     * @return bool
     */
    function evo_save_config_settings(array $config = []): bool
    {
        /** @var Illuminate\Filesystem\Filesystem $files */
        $files = app('files');

        $data = $files->put(
            config_path('cms/settings.php', !app()->isProduction()),
            '<?php return ' . var_export($config, true) . ';'
        );

        return is_bool($data) ? $data : true;
    }
}

if (!function_exists('evo_update_config_settings')) {
    /**
     * @param string $key
     * @param $data
     *
     * @return bool
     * @throws FileNotFoundException
     */
    function evo_update_config_settings(string $key, $data = null): bool
    {
        $config = evo_raw_config_settings();
        $config[$key] = $data;

        return evo_save_config_settings($config);
    }
}

if (!function_exists('evo_delete_config_settings')) {
    /**
     * @param string $key
     *
     * @return bool
     * @throws FileNotFoundException
     */
    function evo_delete_config_settings(string $key): bool
    {
        $config = evo_raw_config_settings();
        unset($config[$key]);

        return evo_save_config_settings($config);
    }
}
