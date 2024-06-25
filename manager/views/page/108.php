<?php

use EvolutionCMS\Facades\ManagerTheme;

// get the edit module action
extract(ManagerTheme::getViewAttributes());
echo view('manager::partials.header')->render();
include_once ManagerTheme::getFileProcessor('actions/mutate_module.dynamic.php');
echo view('manager::partials.footer')->render();
