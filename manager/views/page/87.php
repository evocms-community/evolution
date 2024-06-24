<?php

use EvolutionCMS\Facades\ManagerTheme;

// get the new web user page
extract(ManagerTheme::getViewAttributes());
echo view('manager::partials.header')->render();
include_once ManagerTheme::getFileProcessor('actions/mutate_web_user.dynamic.php');
echo view('manager::partials.footer')->render();
