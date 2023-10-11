<?php

use EvolutionCMS\Facades\ManagerTheme;

// get the save settings processor
extract(ManagerTheme::getViewAttributes());
include_once ManagerTheme::getFileProcessor('processors/save_settings.processor.php');
