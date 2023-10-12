<?php

use EvolutionCMS\Facades\ManagerTheme;

// get the lock remover
extract(ManagerTheme::getViewAttributes());
include_once ManagerTheme::getFileProcessor('processors/remove_locks.processor.php');
