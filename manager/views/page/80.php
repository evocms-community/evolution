<?php

use EvolutionCMS\Facades\ManagerTheme;

// get the delete processor
extract(ManagerTheme::getViewAttributes());
include_once ManagerTheme::getFileProcessor('processors/delete_htmlsnippet.processor.php');
