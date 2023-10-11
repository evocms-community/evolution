<?php

use EvolutionCMS\Facades\ManagerTheme;

// get the save processor
extract(ManagerTheme::getViewAttributes());
include_once ManagerTheme::getFileProcessor('processors/save_snippet.processor.php');
