<?php

use EvolutionCMS\Facades\ManagerTheme;
use EvolutionCMS\Models\DocumentGroup;
use EvolutionCMS\Models\SiteContent;
use EvolutionCMS\Models\SiteTmplvarContentvalue;

if (!defined('IN_MANAGER_MODE') || IN_MANAGER_MODE !== true) {
    die('<b>INCLUDE_ORDERING_ERROR</b><br /><br />Please use the EVO Content Manager instead of accessing this file directly.');
}
if (!evo()->hasPermission('delete_document')) {
    evo()->webAlertAndQuit(ManagerTheme::getLexicon('error_no_privileges'));
}

$ids = SiteContent::withTrashed()->where('deleted', 1)->pluck('id')->toArray();

// invoke OnBeforeEmptyTrash event
evo()->invokeEvent(
    'OnBeforeEmptyTrash',
    [
        'ids' => $ids,
    ]
);

// remove the document groups link.
DocumentGroup::query()->whereIn('document', $ids)->delete();

// remove the TV content values.
SiteTmplvarContentvalue::query()->whereIn('contentid', $ids)->delete();

//'undelete' the document.
SiteContent::query()->where('deleted', 1)->forceDelete();

// invoke OnEmptyTrash event
evo()->invokeEvent(
    'OnEmptyTrash',
    [
        'ids' => $ids,
    ]
);

// empty cache
evo()->clearCache('full');

// finished emptying cache - redirect
header('Location: index.php?a=2&r=1');
