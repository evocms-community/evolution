<?php

use EvolutionCMS\Facades\ManagerTheme;

// get the edit category page
extract(ManagerTheme::getViewAttributes());
echo ManagerTheme::view('partials.header')->render();
include_once ManagerTheme::getFileProcessor('actions/mutate_categories.dynamic.php');
echo ManagerTheme::view('partials.footer')->render();
