<?php

use EvolutionCMS\Facades\ManagerTheme;

// execute/run the module
extract(ManagerTheme::getViewAttributes());
//include_once "header.inc.php";
include_once ManagerTheme::getFileProcessor('processors/execute_module.processor.php');
//include_once "footer.inc.php";
