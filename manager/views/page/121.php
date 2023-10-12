<?php

use EvolutionCMS\Facades\ManagerTheme;

// for ajax-requests
extract(ManagerTheme::getViewAttributes());
include_once ManagerTheme::getFileProcessor('actions/mutate_categories.dynamic.php');
