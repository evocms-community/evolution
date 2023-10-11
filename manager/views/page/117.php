<?php

use EvolutionCMS\Facades\ManagerTheme;

// change the tv rank for selected template
extract(ManagerTheme::getViewAttributes());
echo ManagerTheme::view('partials.header')->render();
include_once ManagerTheme::getFileProcessor('actions/mutate_template_tv_rank.dynamic.php');
echo ManagerTheme::view('partials.footer')->render();
