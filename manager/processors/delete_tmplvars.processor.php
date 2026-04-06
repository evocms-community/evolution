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

$forced = isset($_GET['force']) ? $_GET['force'] : 0;

// check for relations
if (!$forced) {
    $siteTmlvarTemplates = EvolutionCMS\Models\SiteTmplvarContentvalue::with('resource')->where('tmplvarid', '=', $id)->get();

    $count = $siteTmlvarTemplates->count();
    if ($count > 0) {
        echo ManagerTheme::view('page.processors.delete_tmplvars', [
            'tabPageName' => 'delete_tmplvars',
            'id' => $id,
            'buttons' => $_style['actionbuttons']['dynamic']['canceldelete'],
            'rows' => $siteTmlvarTemplates,
        ])->render();
        exit;
    }
}

// Set the item name for logger
$name = EvolutionCMS\Models\SiteTmplvar::findOrFail($id)->name;
$_SESSION['itemname'] = $name;

// invoke OnBeforeTVFormDelete event
$modx->invokeEvent('OnBeforeTVFormDelete', [
    'id' => $id,
]);

// delete variable
EvolutionCMS\Models\SiteTmplvar::destroy($id);

// invoke OnTVFormDelete event
$modx->invokeEvent('OnTVFormDelete', [
    'id' => $id,
]);

// empty cache
$modx->clearCache('full');

// finished emptying cache - redirect
$header = "Location: index.php?a=76&r=2&tab=1";
header($header);
