<?php

use EvolutionCMS\Facades\ManagerTheme;

// get the event log delete processor
extract(ManagerTheme::getViewAttributes());
include_once ManagerTheme::getFileProcessor('processors/delete_eventlog.processor.php');
