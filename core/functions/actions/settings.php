<?php

if(!function_exists('parseText')) {
    /**
     * @param string $tpl
     * @param array $ph
     *
     * @return string
     */
    function parseText(string $tpl = '', array $ph = []): string
    {
        if (empty($ph) || empty($tpl)) {
            return $tpl;
        }

        foreach ($ph as $k => $v) {
            $k = "[+$k+]";
            $tpl = str_replace($k, $v, $tpl);
        }

        return $tpl;
    }
}
