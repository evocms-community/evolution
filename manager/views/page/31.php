<?php

use EvolutionCMS\Facades\ManagerTheme;

// get the page to manage files
extract(ManagerTheme::getViewAttributes());
echo view('manager::partials.header')->render();
include_once ManagerTheme::getFileProcessor('actions/files.dynamic.php');
echo view('manager::partials.footer')->render();
