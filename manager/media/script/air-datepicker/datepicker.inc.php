<?php

use EvolutionCMS\Facades\ManagerTheme;

class DATEPICKER
{
    /**
     * @return string
     */
    public function getDP(): string
    {
        $load_script = file_get_contents(__DIR__ . '/datepicker.tpl');
        if (!isset(evo()->config['lang_code'])) {
            evo()->config['lang_code'] = $this->getLangCode();
        }
        evo()->config['datetime_format_lc'] =
            isset(evo()->config['datetime_format']) ? strtolower(evo()->config['datetime_format']) : 'dd-mm-yyyy';

        return evo()->mergeSettingsContent($load_script);
    }

    /**
     * @return string
     */
    public function getLangCode(): string
    {
        $lang = ManagerTheme::getLang();

        if ($lang === 'uk') {
            $lang = 'ru';
        }

        $dp_path = str_replace('\\', '/', __DIR__);

        return is_file("$dp_path/i18n/datepicker.$lang.js") ? $lang : 'en';
    }
}
