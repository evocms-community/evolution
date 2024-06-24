<?php

use EvolutionCMS\Facades\ManagerTheme;

// get the module resources (dependencies) action
extract(ManagerTheme::getViewAttributes());
echo view('manager::partials.header')->render();
include_once ManagerTheme::getFileProcessor('actions/mutate_module_resources.dynamic.php');
echo view('manager::partials.footer')->render();
