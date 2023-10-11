<?php

use EvolutionCMS\Facades\ManagerTheme;

class DATEPICKER
{
    function __construct()
    {
    }

    function getDP()
    {
        return evo()->parseText(
            file_get_contents(__DIR__ . '/datepicker.tpl'),
            ManagerTheme::getLexicon(),
            '[%', '%]'
        );
    }
}
