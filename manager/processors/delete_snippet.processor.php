<?php

use EvolutionCMS\Facades\ManagerTheme;
use EvolutionCMS\Models\SiteSnippet;

if (!defined('IN_MANAGER_MODE') || IN_MANAGER_MODE !== true) {
    die('<b>INCLUDE_ORDERING_ERROR</b><br /><br />Please use the EVO Content Manager instead of accessing this file directly.');
}
if (!evo()->hasPermission('delete_snippet')) {
    evo()->webAlertAndQuit(ManagerTheme::getLexicon('error_no_privileges'));
}

$id = (int) ($_GET['id'] ?? 0);

if (!$id) {
    evo()->webAlertAndQuit(ManagerTheme::getLexicon('error_no_id'));
}

// Set the item name for logger
$name = SiteSnippet::query()->findOrFail($id)->name;
$_SESSION['itemname'] = $name;

// invoke OnBeforeSnipFormDelete event
evo()->invokeEvent(
    'OnBeforeSnipFormDelete',
    [
        'id' => $id,
    ]
);

// delete the snippet.
SiteSnippet::destroy($id);

// invoke OnSnipFormDelete event
evo()->invokeEvent(
    'OnSnipFormDelete',
    [
        'id' => $id,
    ]
);

// empty cache
evo()->clearCache('full');

// finished emptying cache - redirect
header('Location: index.php?a=76&r=2&tab=3');
