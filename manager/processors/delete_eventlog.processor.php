<?php

use EvolutionCMS\Facades\ManagerTheme;
use EvolutionCMS\Models\EventLog;

if (!defined('IN_MANAGER_MODE') || IN_MANAGER_MODE !== true) {
    die('<b>INCLUDE_ORDERING_ERROR</b><br /><br />Please use the EVO Content Manager instead of accessing this file directly.');
}
if (!evo()->hasPermission('delete_eventlog')) {
    evo()->webAlertAndQuit(ManagerTheme::getLexicon('error_no_privileges'));
}

$query = EventLog::query();

if (!(isset($_GET['cls']) && $_GET['cls'] == 1)) {
    $id = (int) ($_GET['id'] ?? 0);
    if (!$id) {
        evo()->webAlertAndQuit(ManagerTheme::getLexicon('error_no_id'));
    }
    $query = $query->where('id', $id);
}

// delete event log

$query->delete();

header('Location: index.php?a=114');
