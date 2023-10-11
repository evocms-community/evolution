<?php

use EvolutionCMS\Facades\ManagerTheme;

// get the processor for publishing content
extract(ManagerTheme::getViewAttributes());
include_once ManagerTheme::getFileProcessor('processors/publish_content.processor.php');
