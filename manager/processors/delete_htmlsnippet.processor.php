<?php

use EvolutionCMS\Facades\ManagerTheme;
use EvolutionCMS\Models\SiteHtmlsnippet;

if (!defined('IN_MANAGER_MODE') || IN_MANAGER_MODE !== true) {
    die('<b>INCLUDE_ORDERING_ERROR</b><br /><br />Please use the EVO Content Manager instead of accessing this file directly.');
}
if (!evo()->hasPermission('delete_snippet')) {
    evo()->webAlertAndQuit(__('global.error_no_privileges'));
}

$id = (int) ($_GET['id'] ?? 0);

if (!$id) {
    evo()->webAlertAndQuit(__('global.error_no_id'));
}

// Set the item name for logger
$name = SiteHtmlsnippet::query()->findOrFail($id)->name;
$_SESSION['itemname'] = $name;

// invoke OnBeforeChunkFormDelete event
evo()->invokeEvent(
    'OnBeforeChunkFormDelete',
    [
        'id' => $id,
    ]
);

// delete the chunk.
SiteHtmlsnippet::destroy($id);

// invoke OnChunkFormDelete event
evo()->invokeEvent(
    'OnChunkFormDelete',
    [
        'id' => $id,
    ]
);

// empty cache
evo()->clearCache('full');

// finished emptying cache - redirect
header('Location: index.php?a=76&r=2&tab=2');
