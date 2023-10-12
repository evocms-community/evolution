<?php

use EvolutionCMS\Facades\ManagerTheme;
use EvolutionCMS\Models\SitePlugin;
use EvolutionCMS\Models\SitePluginEvent;

if (!defined('IN_MANAGER_MODE') || IN_MANAGER_MODE !== true) {
    die('<b>INCLUDE_ORDERING_ERROR</b><br /><br />Please use the EVO Content Manager instead of accessing this file directly.');
}
if (!evo()->hasPermission('new_plugin')) {
    evo()->webAlertAndQuit(ManagerTheme::getLexicon('error_no_privileges'));
}

$id = (int) ($_GET['id'] ?? 0);

if (!$id) {
    evo()->webAlertAndQuit(ManagerTheme::getLexicon('error_no_id'));
}

// count duplicates
$name = SitePlugin::query()->select('name')->findOrFail($id)->name;
$count =
    SitePlugin::query()->where('name', 'LIKE', $name . ' ' . ManagerTheme::getLexicon('duplicated_el_suffix') . "%'")
        ->count();
if ($count >= 1) {
    $count = ' ' . ($count + 1);
} else {
    $count = '';
}

// duplicate Plugin
$plugin =
    SitePlugin::query()
        ->select([
            'name',
            'description',
            'disabled',
            'moduleguid',
            'plugincode',
            'properties',
            'category',
        ])
        ->findOrFail($id);

/** @var SitePlugin $pluginNew */
$pluginNew = $plugin->replicate();
$pluginNew->name .= ' ' . ManagerTheme::getLexicon('duplicated_el_suffix') . $count;
$pluginNew->disabled = 1;
$pluginNew->save();
$newid = $pluginNew->id;

// duplicate Plugin Event Listeners
SitePluginEvent::query()
    ->select('pluginid', 'evtid', 'priority')
    ->where('pluginid', $id)->get()
    ->each(function ($item) use ($newid) {
        $item->pluginid = $newid;
        $item->replicate()->save();
    });

// Set the item name for logger
$name = SitePlugin::query()->select('name')->findOrFail($newid)->name;
$_SESSION['itemname'] = $name;

// finish duplicating - redirect to new plugin
header('Location: index.php?r=2&a=102&id=' . $newid);
