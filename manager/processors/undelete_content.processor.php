<?php

use EvolutionCMS\Facades\ManagerTheme;
use EvolutionCMS\Legacy\Permissions;
use EvolutionCMS\Models\SiteContent;
use Illuminate\Support\Facades\DB;

if (!defined('IN_MANAGER_MODE') || IN_MANAGER_MODE !== true) {
    die('<b>INCLUDE_ORDERING_ERROR</b><br /><br />Please use the EVO Content Manager instead of accessing this file directly.');
}
if (!evo()->hasPermission('delete_document')) {
    evo()->webAlertAndQuit(__('global.error_no_privileges'));
}

$id = isset($_REQUEST['id']) ? (int) $_REQUEST['id'] : 0;
if ($id == 0) {
    evo()->webAlertAndQuit(__('global.error_no_id'));
}

/** @var SiteContent $document */
$document = SiteContent::withTrashed()->findOrFail($id);

$pid = ($document->parent == 0 ? $id : $document->parent);
$parentDeleted = $document->parent > 0 && empty(SiteContent::query()->find($document->parent));
if ($parentDeleted) {
    evo()->webAlertAndQuit(__('global.error_parent_deleted'));
}
$sd = isset($_REQUEST['dir']) ? '&dir=' . $_REQUEST['dir'] : '&dir=DESC';
$sb = isset($_REQUEST['sort']) ? '&sort=' . $_REQUEST['sort'] : '&sort=createdon';
$pg = isset($_REQUEST['page']) ? '&page=' . (int) $_REQUEST['page'] : '';
$add_path = $sd . $sb . $pg;

// check permissions on the document
$udperms = new Permissions();
$udperms->user = evo()->getLoginUserID('mgr');
$udperms->document = $id;
$udperms->role = $_SESSION['mgrRole'];

if (!$udperms->checkPermissions()) {
    evo()->webAlertAndQuit(__('global.access_permission_denied'));
}

// get the timestamp on which the document was deleted.
if (!$document->deletedon) {
    evo()->webAlertAndQuit('Couldn\'t find document to determine it\'s date of deletion!');
}

$children = $document->getAllChildren($document);

$documentDeleteIds = $children;
array_unshift($documentDeleteIds, $id);

SiteContent::query()
    ->whereIn('id', $documentDeleteIds)
    ->update([
        'deleted' => 0,
        'deletedby' => 0,
        'deletedon' => 0,
    ]);

evo()->invokeEvent(
    'OnDocFormUnDelete',
    [
        'id' => $id,
        'children' => $children,
    ]
);

// Set the item name for logger
$_SESSION['itemname'] = $document->pagetitle;

// empty cache
evo()->clearCache('full');

// finished emptying cache - redirect
header('Location: index.php?a=3&id=' . $pid . '&r=1' . $add_path);
