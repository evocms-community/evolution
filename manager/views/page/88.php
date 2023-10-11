<?php

use EvolutionCMS\Facades\ManagerTheme;

// get the edit web user page
extract(ManagerTheme::getViewAttributes());
echo ManagerTheme::view('partials.header')->render();
include_once ManagerTheme::getFileProcessor('actions/mutate_web_user.dynamic.php');
echo ManagerTheme::view('partials.footer')->render();
