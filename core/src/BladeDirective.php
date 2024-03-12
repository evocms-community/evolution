<?php namespace EvolutionCMS\Support;

class BladeDirective
{

    public static function evoParser($content) : string
    {
        return '<?php echo evo_parser(' . $content . ');?>';
    }

    public static function evoLang($key) : string
    {
        return '<?php echo ManagerTheme::getLexicon(' . $key . ');?>';
    }

    public static function evoStyle($key) : string
    {
        return '<?php echo ManagerTheme::getStyle(' . $key . ');?>';
    }

    public static function evoAdminLang() : string
    {
        return '<?php echo ManagerTheme::getLangName();?>';
    }

    public static function evoCharset() : string
    {
        return '<?php echo ManagerTheme::getCharset();?>';
    }

    public static function evoAdminThemeUrl() : string
    {
        return '<?php echo ManagerTheme::getThemeUrl();?>';
    }

    public static function evoAdminThemeName() : string
    {
        return '<?php echo ManagerTheme::getTheme();?>';
    }

    public static function makeUrl($params) : string
    {
        return '<?php echo app("UrlProcessor")->makeUrlWithString(' . $params . ');?>';
    }

    public static function csrf() : string
    {
        return '<?php echo csrf_field();?>';
    }

    public static function config(string $key): string
    {
        return '<?php echo evo()->getConfig("' . $key . '");?>';
    }

    public static function phpthumb(string $params): string
    {
        return '<?php echo EvolutionCMS\Facades\HelperProcessor::phpthumb(' . $params . ');?>';
    }
}
