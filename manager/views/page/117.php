<?php

use EvolutionCMS\Facades\ManagerTheme;

// change the tv rank for selected template
extract(ManagerTheme::getViewAttributes());
echo view('manager::partials.header')->render();
include_once ManagerTheme::getFileProcessor('actions/mutate_template_tv_rank.dynamic.php');
echo view('manager::partials.footer')->render();
