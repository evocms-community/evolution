<?php

use EvolutionCMS\Facades\ManagerTheme;

// get the sort menuindex action
extract(ManagerTheme::getViewAttributes());
echo ManagerTheme::view('partials.header')->render();
include_once ManagerTheme::getFileProcessor('actions/mutate_menuindex_sort.dynamic.php');
echo ManagerTheme::view('partials.footer')->render();
