<?php

use EvolutionCMS\Facades\ManagerTheme;

// header and footer will be handled interally
extract(ManagerTheme::getViewAttributes());
include_once ManagerTheme::getFileProcessor('actions/bkmanager.static.php');
