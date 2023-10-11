<?php

use EvolutionCMS\Facades\ManagerTheme;

// get the edit module action
extract(ManagerTheme::getViewAttributes());
echo ManagerTheme::view('partials.header')->render();
include_once ManagerTheme::getFileProcessor('actions/mutate_module.dynamic.php');
echo ManagerTheme::view('partials.footer')->render();
