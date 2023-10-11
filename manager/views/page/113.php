<?php

use EvolutionCMS\Facades\ManagerTheme;

// get the module resources (dependencies) action
extract(ManagerTheme::getViewAttributes());
echo ManagerTheme::view('partials.header')->render();
include_once ManagerTheme::getFileProcessor('actions/mutate_module_resources.dynamic.php');
echo ManagerTheme::view('partials.footer')->render();
