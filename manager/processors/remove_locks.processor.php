<?php

use EvolutionCMS\Facades\ManagerTheme;
use EvolutionCMS\Models\ActiveUser;
use EvolutionCMS\Models\ActiveUserLock;

if (!defined('IN_MANAGER_MODE') || IN_MANAGER_MODE !== true) {
    die('<b>INCLUDE_ORDERING_ERROR</b><br /><br />Please use the EVO Content Manager instead of accessing this file directly.');
}

if (!isset($_GET['id'])) {
    if (!evo()->hasPermission('remove_locks')) {
        evo()->webAlertAndQuit(ManagerTheme::getLexicon('error_no_privileges'));
    }

    // Remove all locks
    ActiveUserLock::query()->truncate();
    ActiveUser::query()->truncate();

    header('Location: index.php?a=2');
} else {
    // Remove single locks via AJAX / window.onbeforeunload
    $type = (int) $_GET['type'];
    $id = (int) $_GET['id'];
    $includeAllUsers = evo()->hasPermission('remove_locks'); // Enables usage of "unlock"-ajax-button
    if ($type && $id) {
        evo()->unlockElement($type, $id, $includeAllUsers);
        echo '1';
        exit;
    } else {
        echo 'No type or id sent with request.';
    }
}
