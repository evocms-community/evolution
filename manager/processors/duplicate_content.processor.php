<?php
if (!defined('IN_MANAGER_MODE') || IN_MANAGER_MODE !== true) {
    die("<b>INCLUDE_ORDERING_ERROR</b><br /><br />Please use the EVO Content Manager instead of accessing this file directly.");
}
if (!$modx->hasPermission('new_document') || !$modx->hasPermission('save_document')) {
    $modx->webAlertAndQuit($_lang["error_no_privileges"]);
}

$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
if ($id == 0) {
    $modx->webAlertAndQuit($_lang["error_no_id"]);
}

// check permissions on the document
$udperms = new EvolutionCMS\Legacy\Permissions();
$udperms->user = $modx->getLoginUserID('mgr');
$udperms->document = $id;
$udperms->role = $_SESSION['mgrRole'];
// EvolutionCMS\Legacy\Permissions:
$udperms->duplicateDoc = true; // непонятно зачем это

if (!$udperms->checkPermissions()) {
    $modx->webAlertAndQuit($_lang["access_permission_denied"]);
}

// Run duplicator
try {
    $document = \DocumentManager::duplicate(['id' => $id]);
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

// finish cloning - redirect
$header = "Location: index.php?a=3&r=1&id={$document->getKey()}";
header($header);
