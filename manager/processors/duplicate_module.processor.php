<?php

use EvolutionCMS\Facades\ManagerTheme;
use EvolutionCMS\Models\SiteModule;
use EvolutionCMS\Models\SiteModuleAccess;
use EvolutionCMS\Models\SiteModuleDepobj;

if (!defined('IN_MANAGER_MODE') || IN_MANAGER_MODE !== true) {
    die('<b>INCLUDE_ORDERING_ERROR</b><br /><br />Please use the EVO Content Manager instead of accessing this file directly.');
}
if (!evo()->hasPermission('new_module')) {
    evo()->webAlertAndQuit(ManagerTheme::getLexicon('error_no_privileges'));
}

$id = isset($_GET['id']) ? (int) $_GET['id'] : 0;
if ($id == 0) {
    evo()->webAlertAndQuit(ManagerTheme::getLexicon('error_no_id'));
}
// count duplicates
$name = SiteModule::query()->select('name')->findOrFail($id)->name;
$count =
    SiteModule::query()->where('name', 'LIKE', $name . ' ' . ManagerTheme::getLexicon('duplicated_el_suffix') . "%'")
        ->count();
if ($count >= 1) {
    $count = ' ' . ($count + 1);
} else {
    $count = '';
}

// duplicate module
$module = SiteModule::query()
    ->select(
        'name',
        'description',
        'category',
        'wrap',
        'icon',
        'enable_resource',
        'resourcefile',
        'createdon',
        'editedon',
        'guid',
        'enable_sharedparams',
        'properties',
        'modulecode'
    )
    ->findOrFail($id);

$moduleNew = $module->replicate();
$moduleNew->name .= ' ' . ManagerTheme::getLexicon('duplicated_el_suffix') . $count;
$moduleNew->guid = createGUID();
$moduleNew->disabled = 1;
$moduleNew->save();
$newid = $moduleNew->id;

// duplicate module dependencies
SiteModuleDepobj::query()
    ->select('module', 'resource', 'type')
    ->where('module', $id)->get()
    ->each(function ($item, $key) use ($newid) {
        $item->module = $newid;
        $item->replicate()->save();
    });

// duplicate module user group access
SiteModuleAccess::query()
    ->select('module', 'usergroup')
    ->where('module', $id)->get()
    ->each(function ($item, $key) use ($newid) {
        $item->module = $newid;
        $item->replicate()->save();
    });

// Set the item name for logger
$name = SiteModule::query()->select('name')->findOrFail($newid)->name;
$_SESSION['itemname'] = $name;

// finish duplicating - redirect to new module
header('Location: index.php?r=2&a=108&id=' . $newid);
