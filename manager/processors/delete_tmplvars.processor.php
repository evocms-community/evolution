<?php
if (!defined('IN_MANAGER_MODE') || IN_MANAGER_MODE !== true) {
    die("<b>INCLUDE_ORDERING_ERROR</b><br /><br />Please use the EVO Content Manager instead of accessing this file directly.");
}
if (!evo()->hasPermission('delete_template')) {
    evo()->webAlertAndQuit(__('global.error_no_privileges'));
}

$id = isset($_GET['id']) ? (int) $_GET['id'] : 0;
if ($id == 0) {
    evo()->webAlertAndQuit(__('global.error_no_id'));
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
evo()->invokeEvent('OnBeforeTVFormDelete', [
    'id' => $id,
]);

// delete variable
EvolutionCMS\Models\SiteTmplvar::destroy($id);

// invoke OnTVFormDelete event
evo()->invokeEvent('OnTVFormDelete', [
    'id' => $id,
]);

// empty cache
evo()->clearCache('full');

// finished emptying cache - redirect
$header = "Location: index.php?a=76&r=2&tab=1";
header($header);
