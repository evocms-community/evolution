<?php

use EvolutionCMS\Facades\ManagerTheme;

// get the purge processor
extract(ManagerTheme::getViewAttributes());
include_once ManagerTheme::getFileProcessor('processors/purge_plugin.processor.php');
