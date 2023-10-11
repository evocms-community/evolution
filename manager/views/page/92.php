<?php

use EvolutionCMS\Facades\ManagerTheme;

extract(ManagerTheme::getViewAttributes());
include_once ManagerTheme::getFileProcessor('processors/web_access_groups.processor.php');
