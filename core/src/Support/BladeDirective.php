<?php namespace EvolutionCMS\Support;

class BladeDirective
{

    public static function evoParser($content) : string
    {
        return '<?php echo evo_parser(' . $content . ');?>';
    }

    public static function makeUrl($params) : string
    {
        return '<?php echo app("UrlProcessor")->makeUrlWithString(' . $params . ');?>';
    }

    public static function config(string $params): string
    {
        return '<?php echo evo()->getConfig("' . $params . '");?>';
    }

    public static function phpthumb(string $params): string
    {
        return '<?php echo EvolutionCMS\Facades\HelperProcessor::phpthumb(' . $params . ');?>';
    }

}
