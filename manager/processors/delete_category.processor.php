<?php

use EvolutionCMS\Facades\ManagerTheme;
use EvolutionCMS\Models\Category;

if (!defined('IN_MANAGER_MODE') || IN_MANAGER_MODE !== true) {
    die('<b>INCLUDE_ORDERING_ERROR</b><br /><br />Please use the EVO Content Manager instead of accessing this file directly.');
}
if (!evo()->hasPermission('save_plugin') && !evo()->hasPermission('save_snippet') &&
    !evo()->hasPermission('save_template') && !evo()->hasPermission('save_module')
) {
    evo()->webAlertAndQuit(ManagerTheme::getLexicon('error_no_privileges'));
}

$id = (int) ($_GET['catId'] ?? 0);

if (!$id) {
    evo()->webAlertAndQuit(ManagerTheme::getLexicon('error_no_id'));
}

// Set the item name for logger
$name = Category::query()->find($id)->category;
$_SESSION['itemname'] = $name;

include_once MODX_MANAGER_PATH . 'includes/categories.inc.php';
deleteCategory($id);

// finished emptying cache - redirect
header('Location: index.php?a=76');
