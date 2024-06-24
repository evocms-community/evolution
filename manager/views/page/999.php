<?php

use EvolutionCMS\Facades\ManagerTheme;

// get the test page
extract(ManagerTheme::getViewAttributes());
echo view('manager::partials.header')->render();
include_once ManagerTheme::getFileProcessor('test_page.php');
echo view('manager::partials.footer')->render();
