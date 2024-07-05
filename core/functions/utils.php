<?php

use EvolutionCMS\Parser;
use Illuminate\Contracts\Filesystem\FileNotFoundException;

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
