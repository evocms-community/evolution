<?php

use EvolutionCMS\Facades\ManagerTheme;

// get the processor for publishing content
extract(ManagerTheme::getViewAttributes());
include_once ManagerTheme::getFileProcessor('processors/unpublish_content.processor.php');
