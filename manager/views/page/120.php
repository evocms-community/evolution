<?php

use EvolutionCMS\Facades\ManagerTheme;

// get the edit category page
extract(ManagerTheme::getViewAttributes());
echo view('manager::partials.header')->render();
include_once ManagerTheme::getFileProcessor('actions/mutate_categories.dynamic.php');
echo view('manager::partials.footer')->render();
