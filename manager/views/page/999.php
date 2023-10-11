<?php

use EvolutionCMS\Facades\ManagerTheme;

// get the test page
extract(ManagerTheme::getViewAttributes());
echo ManagerTheme::view('partials.header')->render();
include_once ManagerTheme::getFileProcessor('test_page.php');
echo ManagerTheme::view('partials.footer')->render();
