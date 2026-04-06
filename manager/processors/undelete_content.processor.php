<?php
if (!defined('IN_MANAGER_MODE') || IN_MANAGER_MODE !== true) {
    die("<b>INCLUDE_ORDERING_ERROR</b><br /><br />Please use the EVO Content Manager instead of accessing this file directly.");
}
if (!$modx->hasPermission('delete_document')) {
    $modx->webAlertAndQuit(__('global.error_no_privileges'));
}

$id = isset($_REQUEST['id']) ? (int) $_REQUEST['id'] : 0;
if ($id == 0) {
    $modx->webAlertAndQuit(__('global.error_no_id'));
}

$document = \EvolutionCMS\Models\SiteContent::withTrashed()->findOrFail($id);

$pid = ($document->parent == 0 ? $id : $document->parent);
$parentDeleted = $document->parent > 0 && empty(\EvolutionCMS\Models\SiteContent::find($document->parent));
if ($parentDeleted) {
    $modx->webAlertAndQuit(__('global.error_parent_deleted'));
}
$sd = isset($_REQUEST['dir']) ? '&dir=' . $_REQUEST['dir'] : '&dir=DESC';
$sb = isset($_REQUEST['sort']) ? '&sort=' . $_REQUEST['sort'] : '&sort=createdon';
$pg = isset($_REQUEST['page']) ? '&page=' . (int) $_REQUEST['page'] : '';
$add_path = $sd . $sb . $pg;

// check permissions on the document
$udperms = new EvolutionCMS\Legacy\Permissions();
$udperms->user = $modx->getLoginUserID('mgr');
$udperms->document = $id;
$udperms->role = $_SESSION['mgrRole'];

if (!$udperms->checkPermissions()) {
    $modx->webAlertAndQuit(__('global.access_permission_denied'));
}

// get the timestamp on which the document was deleted.
if (!$document->deletedon) {
    $modx->webAlertAndQuit("Couldn't find document to determine it's date of deletion!");
}

// Run undeleter
try {
    $document = \DocumentManager::undelete(['id' => $id]);
} catch (EvolutionCMS\Exceptions\ServiceActionException $e) {
    // \Log::error('Unexpected error: ' . $e->getMessage());

    $modx->getManagerApi()->saveFormValues(4);
    $modx->webAlertAndQuit($e->getMessage(), 'index.php?a=4');
    return;
} catch (EvolutionCMS\Exceptions\ServiceValidationException $e) {
    // \Log::error('Validation error: ' . $e->getValidationErrors());

    $modx->getManagerApi()->saveFormValues(4);
    $modx->webAlertAndQuit($e->getValidationErrors(), 'index.php?a=4');
    return;
}

// Set the item name for logger
$_SESSION['itemname'] = $document->pagetitle;

// finished emptying cache - redirect
$header = "Location: index.php?a=3&r=1&id={$pid}{$add_path}";
header($header);
