<?php

use EvolutionCMS\Facades\ManagerTheme;
use EvolutionCMS\Models\SitePlugin;
use EvolutionCMS\Models\SitePluginEvent;

if (!defined('IN_MANAGER_MODE') || IN_MANAGER_MODE !== true) {
    die('<b>INCLUDE_ORDERING_ERROR</b><br /><br />Please use the EVO Content Manager instead of accessing this file directly.');
}
if (!evo()->hasPermission('delete_plugin')) {
    evo()->webAlertAndQuit(__('global.error_no_privileges'));
}

$id = (int) ($_GET['id'] ?? 0);

if (!$id) {
    evo()->webAlertAndQuit(__('global.error_no_id'));
}

// Set the item name for logger
$name = SitePlugin::query()->select('name')->firstOrFail($id)->name;
$_SESSION['itemname'] = $name;

// invoke OnBeforePluginFormDelete event
evo()->invokeEvent(
    'OnBeforePluginFormDelete',
    [
        'id' => $id,
    ]
);

// delete the plugin.
SitePlugin::destroy($id);
// delete the plugin events.
SitePluginEvent::query()->where('pluginid', $id)->delete();
// invoke OnPluginFormDelete event
evo()->invokeEvent(
    'OnPluginFormDelete',
    [
        'id' => $id,
    ]
);

// empty cache
evo()->clearCache('full');

// finished emptying cache - redirect
header('Location: index.php?a=76&r=2&tab=4');
