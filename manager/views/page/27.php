<?php

use EvolutionCMS\Facades\ManagerTheme;

// get the mutate page for changing content
extract(ManagerTheme::getViewAttributes());
echo view('manager::partials.header')->render();
include_once ManagerTheme::getFileProcessor('actions/mutate_content.dynamic.php');
echo view('manager::partials.footer')->render();
