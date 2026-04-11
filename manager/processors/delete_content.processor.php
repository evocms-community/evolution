<?php
if (!defined('IN_MANAGER_MODE') || IN_MANAGER_MODE !== true) {
    die("<b>INCLUDE_ORDERING_ERROR</b><br /><br />Please use the EVO Content Manager instead of accessing this file directly.");
}
if (!evo()->hasPermission('delete_document')) {
    evo()->webAlertAndQuit(__('global.error_no_privileges'));
}

$id = isset($_GET['id']) ? (int) $_GET['id'] : 0;
if ($id == 0) {
    evo()->webAlertAndQuit(__('global.error_no_id'));
}

/*******ищем родителя чтобы к нему вернуться********/
$document = \EvolutionCMS\Models\SiteContent::withTrashed()->findOrFail($id);
$pid = ($document->parent == 0 ? $id : $document->parent);

/************ а заодно и путь возврата (сам путь внизу файла) **********/
$sd = isset($_REQUEST['dir']) ? '&dir=' . $_REQUEST['dir'] : '&dir=DESC';
$sb = isset($_REQUEST['sort']) ? '&sort=' . $_REQUEST['sort'] : '&sort=createdon';
$pg = isset($_REQUEST['page']) ? '&page=' . (int) $_REQUEST['page'] : '';
$add_path = $sd . $sb . $pg;

// check permissions on the document
$udperms = new EvolutionCMS\Legacy\Permissions();
$udperms->user = evo()->getLoginUserID('mgr');
$udperms->document = $id;
$udperms->role = $_SESSION['mgrRole'];

if (!$udperms->checkPermissions()) {
    evo()->webAlertAndQuit(__('global.access_permission_denied'));
}

// Run deleter
try {
    $document = \DocumentManager::delete(['id' => $id]);
} catch (EvolutionCMS\Exceptions\ServiceActionException $e) {
    // \Log::error('Unexpected error: ' . $e->getMessage());

    $action = 4;
    evo()->getManagerApi()->saveFormValues($action);
    evo()->webAlertAndQuit($e->getMessage(), "index.php?a={$action}");
    return;
} catch (EvolutionCMS\Exceptions\ServiceValidationException $e) {
    // \Log::error('Validation errors: ' . $e->getValidationErrors());

    $action = 4;
    evo()->getManagerApi()->saveFormValues($action);
    $errors = implode('<br />', array_reduce($e->getValidationErrors(), 'array_merge', []));
    evo()->webAlertAndQuit($errors, "index.php?a={$action}");
    return;
}

// Set the item name for logger
$_SESSION['itemname'] = $document->pagetitle;

// finished emptying cache - redirect
$header = "Location: index.php?a=3&r=1&id={$pid}{$add_path}";
header($header);
