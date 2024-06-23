<?php

use EvolutionCMS\Facades\ManagerTheme;
use EvolutionCMS\Models\SiteModule;
use EvolutionCMS\Models\SiteModuleAccess;
use EvolutionCMS\Models\SiteModuleDepobj;

if (!defined('IN_MANAGER_MODE') || IN_MANAGER_MODE !== true) {
    die('<b>INCLUDE_ORDERING_ERROR</b><br /><br />Please use the EVO Content Manager instead of accessing this file directly.');
}
if (!evo()->hasPermission('delete_module')) {
    evo()->webAlertAndQuit(__('global.error_no_privileges'));
}

$id = (int) ($_GET['id'] ?? 0);

if (!$id) {
    evo()->webAlertAndQuit(__('global.error_no_id'));
}

// Set the item name for logger
$name = SiteModule::query()->select('name')->firstOrFail($id)->name;
$_SESSION['itemname'] = $name;

// invoke OnBeforeModFormDelete event
evo()->invokeEvent(
    'OnBeforeModFormDelete',
    [
        'id' => $id,
    ]
);

// delete the module.
SiteModule::destroy($id);
// delete the module dependencies.
SiteModuleDepobj::query()->where('module', $id)->delete();
// delete the module user group access.
SiteModuleAccess::query()->where('module', $id)->delete();

// invoke OnModFormDelete event
evo()->invokeEvent(
    'OnModFormDelete',
    [
        'id' => $id,
    ]
);

// empty cache
evo()->clearCache('full');

// finished emptying cache - redirect
header('Location: index.php?a=76&r=2&tab=5');
