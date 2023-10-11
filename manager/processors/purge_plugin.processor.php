<?php

use EvolutionCMS\Legacy\Cache;
use EvolutionCMS\Models\SitePlugin;
use EvolutionCMS\Models\SitePluginEvent;

if (!defined('IN_MANAGER_MODE') || IN_MANAGER_MODE !== true) {
    die('<b>INCLUDE_ORDERING_ERROR</b><br /><br />Please use the EVO Content Manager instead of accessing this file directly.');
}

if (!evo()->hasPermission('delete_plugin')) {
    $e = new EvolutionCMS\Legacy\ErrorHandler();
    $e->setError(3);
    $e->dumpError();
}

// Get unique list of latest added plugins by highest sql-id
$plugins = SitePlugin::query()->select('site_plugins.id')->leftJoin('site_plugins as t2', function ($join) {
    $join->on('site_plugins.name', '=', 't2.name')->on('site_plugins.id', '<', 't2.id');
})->whereNull('t2.id');
$latestIds = [];
foreach ($plugins->get()->toArray() as $row) {
    $latestIds[] = $row['id'];
}

// Get list of plugins with disabled and enabled versions
$plugins = SitePlugin::query()->select('site_plugins.id')->join('site_plugins as t2', function ($join) {
    $join->on('site_plugins.name', '=', 't2.name')->on('site_plugins.id', '!=', 't2.id');
})->where('site_plugins.disabled', 1);

foreach ($plugins->get()->toArray() as $row) {
    $id = $row['id'];

    if (in_array($id, $latestIds)) {
        continue;
    }
    // Keep latest version of disabled plugins

    // invoke OnBeforePluginFormDelete event
    evo()->invokeEvent('OnBeforePluginFormDelete', ['id' => $id]);

    // delete the plugin.

    if (!SitePlugin::query()->where('id', $id)->delete()) {
        echo "Something went wrong while trying to delete plugin {$id}";
        exit;
    } else {
        // delete the plugin events.

        if (!SitePluginEvent::query()->where('pluginid', $id)->delete()) {
            echo "Something went wrong while trying to delete the plugin events for plugin $id";
            exit;
        } else {
            // invoke OnPluginFormDelete event
            evo()->invokeEvent('OnPluginFormDelete', ['id' => $id]);
        }
    }
}

// empty cache
$sync = new Cache();
$sync->setCachepath('../assets/cache/');
$sync->setReport(false);
$sync->emptyCache(); // first empty the cache

header('Location: index.php?a=76&tab=4');
