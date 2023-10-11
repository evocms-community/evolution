<?php

use EvolutionCMS\Facades\ManagerTheme;

// get the Recycle bin emptier
extract(ManagerTheme::getViewAttributes());
include_once ManagerTheme::getFileProcessor('processors/remove_content.processor.php');
