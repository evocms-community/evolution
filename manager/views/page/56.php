<?php

use EvolutionCMS\Facades\ManagerTheme;

// get the sort menuindex action
extract(ManagerTheme::getViewAttributes());
echo view('manager::partials.header')->render();
include_once ManagerTheme::getFileProcessor('actions/mutate_menuindex_sort.dynamic.php');
echo view('manager::partials.footer')->render();
