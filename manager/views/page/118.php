<?php

use EvolutionCMS\Facades\ManagerTheme;

// call settings ajax include
ob_clean();
extract(ManagerTheme::getViewAttributes());
include_once ManagerTheme::getFileProcessor('includes/mutate_settings.ajax.php');
