<?php

use EvolutionCMS\Facades\ManagerTheme;

// get the save user processor
extract(ManagerTheme::getViewAttributes());
include_once ManagerTheme::getFileProcessor('processors/save_user.processor.php');
