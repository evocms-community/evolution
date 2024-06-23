<?php

use EvolutionCMS\Facades\ManagerTheme;
use EvolutionCMS\Models\SiteTmplvar;
use EvolutionCMS\Models\SiteTmplvarContentvalue;

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

$forced = $_GET['force'] ?? 0;

// check for relations
if (!$forced) {
    $siteTmlvarTemplates = SiteTmplvarContentvalue::with('resource')->where('tmplvarid', $id)->get();

    $count = $siteTmlvarTemplates->count();
    if ($count > 0) {
        include_once MODX_MANAGER_PATH . 'includes/header.inc.php';
        ?>
        <h1><?= __('global.tmplvars'); ?></h1>

        <script>
          var actions = {
            delete: function () {
              document.location.href = "index.php?id=<?=$id?>&a=303&force=1"
            },
            cancel: function () {
              window.location.href = 'index.php?a=301&id=<?=$id?>'
            }
          }
        </script>
        <?= ManagerTheme::getStyle('actionbuttons')['dynamic']['canceldelete']; ?>

        <div class="tab-page">
            <div class="container container-body">
                <p><?= __('global.tmplvar_inuse') ?></p>
                <ul>
                    <?php
                    foreach ($siteTmlvarTemplates as $siteTmlvarTemplate) {
                        echo '<li><span style="width: 200px"><a href="index.php?id=' .
                            $siteTmlvarTemplate->resource->id . '&a=27">' . $siteTmlvarTemplate->resource->pagetitle .
                            '</a></span>' . ($siteTmlvarTemplate->resource->description != '' ? ' - ' .
                                $siteTmlvarTemplate->resource->description : '') . '</li>';
                    }
                    ?>
                </ul>
            </div>
        </div>
        <?php
        include_once MODX_MANAGER_PATH . "includes/footer.inc.php";
        exit;
    }
}

// Set the item name for logger
$name = SiteTmplvar::query()->findOrFail($id)->name;
$_SESSION['itemname'] = $name;

// invoke OnBeforeTVFormDelete event
evo()->invokeEvent('OnBeforeTVFormDelete', [
    'id' => $id,
]);

// delete variable
SiteTmplvar::destroy($id);

// invoke OnTVFormDelete event
evo()->invokeEvent('OnTVFormDelete', [
    'id' => $id,
]);

// empty cache
evo()->clearCache('full');

// finished emptying cache - redirect
header('Location: index.php?a=76&r=2&tab=1');
