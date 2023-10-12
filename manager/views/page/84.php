<?php

use EvolutionCMS\Facades\ManagerTheme;

extract(ManagerTheme::getViewAttributes());
include_once ManagerTheme::getFileProcessor('actions/resource_selector.static.php');
