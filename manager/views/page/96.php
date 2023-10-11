<?php

use EvolutionCMS\Facades\ManagerTheme;

// get the duplicate template processor
extract(ManagerTheme::getViewAttributes());
include_once ManagerTheme::getFileProcessor('processors/duplicate_template.processor.php');
