<?php

use EvolutionCMS\Facades\ManagerTheme;

// get the weblink page
extract(ManagerTheme::getViewAttributes());
echo view('manager::partials.header')->render();
include_once ManagerTheme::getFileProcessor('actions/mutate_content.dynamic.php');
echo view('manager::partials.footer')->render();
