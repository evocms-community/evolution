<?php

use EvolutionCMS\Facades\ManagerTheme;

extract(ManagerTheme::getViewAttributes());
echo ManagerTheme::view('partials.header')->render();
include_once ManagerTheme::getFileProcessor('actions/web_user_management.static.php');
echo ManagerTheme::view('partials.footer')->render();
