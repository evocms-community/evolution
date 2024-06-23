<?php

use EvolutionCMS\Facades\ManagerTheme;
use EvolutionCMS\Models\ActiveUser;
use EvolutionCMS\Models\ActiveUserLock;

if (!defined('IN_MANAGER_MODE') || IN_MANAGER_MODE !== true) {
    die('<b>INCLUDE_ORDERING_ERROR</b><br /><br />Please use the EVO Content Manager instead of accessing this file directly.');
}

$id = (int) ($_GET['id'] ?? 0);

if (!$id) {
    if (!evo()->hasPermission('remove_locks')) {
        evo()->webAlertAndQuit(__('global.error_no_privileges'));
    }

    // Remove all locks
    ActiveUserLock::query()->truncate();
    ActiveUser::query()->truncate();

    header('Location: index.php?a=2');
} else {
    // Remove single locks via AJAX / window.onbeforeunload
    $type = (int) ($_GET['type'] ?? 0);
    if ($type) {
        // Enables usage of "unlock"-ajax-button
        evo()->unlockElement($type, $id, evo()->hasPermission('remove_locks'));
        echo '1';
        exit;
    } else {
        echo 'No type or id sent with request.';
    }
}
