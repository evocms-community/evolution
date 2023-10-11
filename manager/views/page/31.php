<?php

use EvolutionCMS\Facades\ManagerTheme;

// get the page to manage files
extract(ManagerTheme::getViewAttributes());
echo ManagerTheme::view('partials.header')->render();
include_once ManagerTheme::getFileProcessor('actions/files.dynamic.php');
echo ManagerTheme::view('partials.footer')->render();
