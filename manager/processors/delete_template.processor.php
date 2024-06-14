<?php

use EvolutionCMS\Facades\ManagerTheme;
use EvolutionCMS\Models\SiteContent;
use EvolutionCMS\Models\SiteTemplate;
use EvolutionCMS\Models\SiteTmplvarTemplate;

if (!defined('IN_MANAGER_MODE') || IN_MANAGER_MODE !== true) {
    die('<b>INCLUDE_ORDERING_ERROR</b><br /><br />Please use the EVO Content Manager instead of accessing this file directly.');
}
if (!evo()->hasPermission('delete_template')) {
    evo()->webAlertAndQuit(__('global.error_no_privileges'));
}

$id = (int) ($_GET['id'] ?? 0);

if (!$id) {
    evo()->webAlertAndQuit(__('global.error_no_id'));
}

// delete the template, but first check it doesn't have any documents using it
$siteContents = SiteContent::query()
    ->select([
        'id',
        'pagetitle',
        'introtext',
    ])
    ->where('template', $id)
    ->where('deleted', 0)
    ->get();

$count = $siteContents->count();
if ($count > 0) {
    include MODX_MANAGER_PATH . 'includes/header.inc.php';
    ?>
    <h1><?= __('global.templates'); ?></h1>

    <div class="tab-page">
        <div class="container container-body">
            <p><?= __('global.template_inuse') ?></p>
            <ul>
                <?php
                foreach ($siteContents as $row) {
                    echo '<li><span style="width: 200px"><a href="index.php?id=' . $row->id . '&a=27">' .
                        $row->pagetitle . '</a></span>' . ($row->introtext != '' ? ' - ' . $row->introtext : '') .
                        '</li>';
                }
                ?>
            </ul>
        </div>
    </div>
    <?php
    include_once MODX_MANAGER_PATH . "includes/footer.inc.php";
    exit;
}
$default_template = evo()->getConfig('default_template');
if ($id == $default_template) {
    evo()->webAlertAndQuit(
        "This template is set as the default template. Please choose a different default template in the MODX configuration before deleting this template."
    );
}

// Set the item name for logger
$name = SiteTemplate::query()->find($id)->templatename;
$_SESSION['itemname'] = $name;

// invoke OnBeforeTempFormDelete event
evo()->invokeEvent('OnBeforeTempFormDelete', [
    'id' => $id,
]);

// delete the document.
SiteTemplate::query()->find($id)->delete();

SiteTmplvarTemplate::query()->where('templateid', $id)->delete();
// invoke OnTempFormDelete event
evo()->invokeEvent('OnTempFormDelete', [
    'id' => $id,
]);

// empty cache
evo()->clearCache('full');

// finished emptying cache - redirect
header('Location: index.php?a=76&r=2');
