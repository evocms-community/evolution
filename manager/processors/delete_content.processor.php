<?php

use EvolutionCMS\Facades\ManagerTheme;
use EvolutionCMS\Legacy\Permissions;
use EvolutionCMS\Models\SiteContent;

if (!defined('IN_MANAGER_MODE') || IN_MANAGER_MODE !== true) {
    die('<b>INCLUDE_ORDERING_ERROR</b><br /><br />Please use the EVO Content Manager instead of accessing this file directly.');
}
if (!evo()->hasPermission('delete_document')) {
    evo()->webAlertAndQuit(__('global.error_no_privileges'));
}

$id = (int) ($_GET['id'] ?? 0);

if (!$id) {
    evo()->webAlertAndQuit(__('global.error_no_id'));
}

/*******ищем родителя чтобы к нему вернуться********/

/** @var SiteContent $document */
$document = SiteContent::withTrashed()->findOrFail($id);
$pid = ($document->parent == 0 ? $id : $document->parent);

/************ а заодно и путь возврата (сам путь внизу файла) **********/
$sd = isset($_REQUEST['dir']) ? '&dir=' . $_REQUEST['dir'] : '&dir=DESC';
$sb = isset($_REQUEST['sort']) ? '&sort=' . $_REQUEST['sort'] : '&sort=createdon';
$pg = isset($_REQUEST['page']) ? '&page=' . (int) $_REQUEST['page'] : '';
$add_path = $sd . $sb . $pg;

/*****************************/

// check permissions on the document
$udperms = new Permissions();
$udperms->user = evo()->getLoginUserID('mgr');
$udperms->document = $id;
$udperms->role = $_SESSION['mgrRole'];

if (!$udperms->checkPermissions()) {
    evo()->webAlertAndQuit(__('global.access_permission_denied'));
}

$children = $document->getAllChildren($document);

// invoke OnBeforeDocFormDelete event
evo()->invokeEvent(
    "OnBeforeDocFormDelete",
    [
        "id" => $id,
        "children" => $children,
    ]
);

$documentDeleteIds = $children;
array_unshift($documentDeleteIds, $id);

foreach ($documentDeleteIds as $deleteId) {
    if (evo()->getConfig('site_start') == $deleteId) {
        evo()->webAlertAndQuit('Document is \'Site start\' and cannot be deleted!');
    }

    if (evo()->getConfig('site_unavailable_page') == $deleteId) {
        evo()->webAlertAndQuit('Document is used as the \'Site unavailable page\' and cannot be deleted!');
    }

    if (evo()->getConfig('error_page') == $deleteId) {
        evo()->webAlertAndQuit('Document is used as the \'Site error page\' and cannot be deleted!');
    }

    if (evo()->getConfig('unauthorized_page') == $deleteId) {
        evo()->webAlertAndQuit('Document is used as the \'Site unauthorized page\' and cannot be deleted!');
    }
}

SiteContent::query()
    ->whereIn('id', $documentDeleteIds)
    ->update([
        'deleted' => 1,
        'deletedby' => evo()->getLoginUserID('mgr'),
        'deletedon' => time(),
    ]);

// invoke OnDocFormDelete event
evo()->invokeEvent(
    'OnDocFormDelete',
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
