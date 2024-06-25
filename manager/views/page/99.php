<?php

use EvolutionCMS\Facades\ManagerTheme;

extract(ManagerTheme::getViewAttributes());
echo view('manager::partials.header')->render();
include_once ManagerTheme::getFileProcessor('actions/web_user_management.static.php');
echo view('manager::partials.footer')->render();
