<?php

use EvolutionCMS\Facades\ManagerTheme;
use Illuminate\Support\Facades\DB;

if (!defined('IN_MANAGER_MODE') || IN_MANAGER_MODE !== true) {
    die('<b>INCLUDE_ORDERING_ERROR</b><br /><br />Please use the EVO Content Manager instead of accessing this file directly.');
}
if (!(evo()->hasPermission('settings') && (evo()->hasPermission('logs') || evo()->hasPermission('bk_manager')))) {
    evo()->webAlertAndQuit(__('global.error_no_privileges'));
}

if (isset($_REQUEST['t'])) {
    if (empty($_REQUEST['t'])) {
        evo()->webAlertAndQuit(__('global.error_no_optimise_tablename'));
    }

    // Set the item name for logger
    $_SESSION['itemname'] = $_REQUEST['t'];

    if (evo()->getDatabase()->getConfig('driver') != 'pgsql') {
        evo()->getDatabase()->optimize($_REQUEST['t']);
    }
} elseif (isset($_REQUEST['u'])) {
    if (empty($_REQUEST['u'])) {
        evo()->webAlertAndQuit(__('global.error_no_truncate_tablename'));
    }

    // Set the item name for logger
    $_SESSION['itemname'] = $_REQUEST['u'];
    DB::table(DB::raw($_REQUEST['u']))->truncate();
} else {
    evo()->webAlertAndQuit(__('global.error_no_optimise_tablename'));
}

$mode = (int) get_by_key($_REQUEST, 'mode', 93, 'is_scalar');
header('Location: index.php?a=' . $mode . '&s=4');
