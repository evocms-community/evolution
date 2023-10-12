<?php

use EvolutionCMS\Facades\ManagerTheme;

// get the table optimizer/truncate processor
extract(ManagerTheme::getViewAttributes());

/**
 * @TODO: White list of tables allowed for truncate operation
 */
include_once ManagerTheme::getFileProcessor('processors/optimize_table.processor.php');
