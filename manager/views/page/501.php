<?php

use EvolutionCMS\Facades\ManagerTheme;

//delete category
extract(ManagerTheme::getViewAttributes());
include_once ManagerTheme::getFileProcessor('processors/delete_category.processor.php');
