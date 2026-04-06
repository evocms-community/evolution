<?php
if (!defined('IN_MANAGER_MODE') || IN_MANAGER_MODE !== true) {
    die("<b>INCLUDE_ORDERING_ERROR</b><br /><br />Please use the EVO Content Manager instead of accessing this file directly.");
}
if (!$modx->hasPermission('delete_template')) {
    $modx->webAlertAndQuit(__('global.error_no_privileges'));
}

$id = isset($_GET['id']) ? (int) $_GET['id'] : 0;
if ($id == 0) {
    $modx->webAlertAndQuit(__('global.error_no_id'));
}

// delete the template, but first check it doesn't have any documents using it
$siteContents = EvolutionCMS\Models\SiteContent::select('id', 'pagetitle', 'introtext')->where('template', $id)->where('deleted', 0)->get();

$count = $siteContents->count();
if ($count > 0) {
    echo ManagerTheme::view('page.processors.delete_template', [
        'tabPageName' => 'delete_template',
        'rows' => $siteContents,
    ])->render();
    exit;
}

$default_template = $modx->getConfig('default_template');
if ($id == $default_template) {
    $modx->webAlertAndQuit("This template is set as the default template. Please choose a different default template in the MODX configuration before deleting this template.");
}

// Set the item name for logger
$name = EvolutionCMS\Models\SiteTemplate::where('id', $id)->first()->templatename;
$_SESSION['itemname'] = $name;

// invoke OnBeforeTempFormDelete event
$modx->invokeEvent('OnBeforeTempFormDelete', [
    'id' => $id,
]);

// delete the document.
EvolutionCMS\Models\SiteTemplate::where('id', $id)->delete();

EvolutionCMS\Models\SiteTmplvarTemplate::where('templateid', $id)->delete();
// invoke OnTempFormDelete event
$modx->invokeEvent('OnTempFormDelete', [
    'id' => $id,
]);

// empty cache
$modx->clearCache('full');

// finished emptying cache - redirect
$header = "Location: index.php?a=76&r=2";
header($header);
