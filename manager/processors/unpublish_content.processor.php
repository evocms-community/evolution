<?php

use EvolutionCMS\Facades\ManagerTheme;
use EvolutionCMS\Legacy\Permissions;
use EvolutionCMS\Models\SiteContent;

if (!defined('IN_MANAGER_MODE') || IN_MANAGER_MODE !== true) {
    die('<b>INCLUDE_ORDERING_ERROR</b><br /><br />Please use the EVO Content Manager instead of accessing this file directly.');
}
if (!evo()->hasPermission('save_document') || !evo()->hasPermission('publish_document')) {
    evo()->webAlertAndQuit(ManagerTheme::getLexicon('error_no_privileges'));
}

$id = (int) ($_REQUEST['id'] ?? 0);

if (!$id) {
    evo()->webAlertAndQuit(ManagerTheme::getLexicon('error_no_id'));
}

/************webber ********/
$content = SiteContent::query()->select('parent', 'pagetitle')->where('id', $id)->first()->toArray();
$pid = ($content['parent'] == 0 ? $id : $content['parent']);

/************** webber *************/
$sd = isset($_REQUEST['dir']) ? '&dir=' . $_REQUEST['dir'] : '&dir=DESC';
$sb = isset($_REQUEST['sort']) ? '&sort=' . $_REQUEST['sort'] : '&sort=createdon';
$pg = isset($_REQUEST['page']) ? '&page=' . (int) $_REQUEST['page'] : '';
$add_path = $sd . $sb . $pg;

/***********************************/

// check permissions on the document
$udperms = new Permissions();
$udperms->user = evo()->getLoginUserID('mgr');
$udperms->document = $id;
$udperms->role = $_SESSION['mgrRole'];

if (!$udperms->checkPermissions()) {
    evo()->webAlertAndQuit(ManagerTheme::getLexicon('access_permission_denied'));
}

// update the document
SiteContent::query()->find($id)->update([
    'published' => 0,
    'pub_date' => 0,
    'unpub_date' => 0,
    'editedby' => evo()->getLoginUserID('mgr'),
    'editedon' => time(),
    'publishedby' => 0,
    'publishedon' => 0,
]);

// invoke OnDocUnPublished  event
evo()->invokeEvent('OnDocUnPublished', ['docid' => $id]);

// Set the item name for logger
$_SESSION['itemname'] = $content['pagetitle'];

// empty cache
evo()->clearCache('full');

header('Location: index.php?a=3&id=' . $pid . '&r=1' . $add_path);
