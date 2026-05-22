<?php
if (!defined('IN_MANAGER_MODE') || IN_MANAGER_MODE !== true) {
    die("<b>INCLUDE_ORDERING_ERROR</b><br /><br />Please use the EVO Content Manager instead of accessing this file directly.");
}
if (!evo()->hasPermission('delete_plugin')) {
    evo()->webAlertAndQuit(__('global.error_no_privileges'));
}

$id = isset($_GET['id']) ? (int) $_GET['id'] : 0;
if ($id == 0) {
    evo()->webAlertAndQuit(__('global.error_no_id'));
}

// Set the item name for logger
$name = EvolutionCMS\Models\SitePlugin::select("name")->firstOrFail($id)->name;
$_SESSION['itemname'] = $name;

// invoke OnBeforePluginFormDelete event
evo()->invokeEvent('OnBeforePluginFormDelete', [
    'id' => $id,
]);

// delete the plugin.
EvolutionCMS\Models\SitePlugin::destroy($id);
// delete the plugin events.
EvolutionCMS\Models\SitePluginEvent::where('pluginid', $id)->delete();
// invoke OnPluginFormDelete event
evo()->invokeEvent('OnPluginFormDelete', [
    'id' => $id,
]);

// empty cache
evo()->clearCache('full');

// finished emptying cache - redirect
$header = "Location: index.php?a=76&r=2&tab=4";
header($header);
