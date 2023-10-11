<?php

use EvolutionCMS\Facades\ManagerTheme;

// get the undelete processor
extract(ManagerTheme::getViewAttributes());
include_once ManagerTheme::getFileProcessor('processors/undelete_content.processor.php');
