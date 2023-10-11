<?php

use EvolutionCMS\Facades\ManagerTheme;
use EvolutionCMS\Models\SiteSnippet;

if (!defined('IN_MANAGER_MODE') || IN_MANAGER_MODE !== true) {
    die('<b>INCLUDE_ORDERING_ERROR</b><br /><br />Please use the EVO Content Manager instead of accessing this file directly.');
}
if (!evo()->hasPermission('new_snippet')) {
    evo()->webAlertAndQuit(ManagerTheme::getLexicon('error_no_privileges'));
}

$id = isset($_GET['id']) ? (int) $_GET['id'] : 0;
if ($id == 0) {
    evo()->webAlertAndQuit(ManagerTheme::getLexicon('error_no_id'));
}

// count duplicates
$snippet = SiteSnippet::query()->findOrFail($id);
$name = $snippet->name;
$count =
    SiteSnippet::query()->where('name', 'like', $name . ' ' . ManagerTheme::getLexicon('duplicated_el_suffix') . '%')
        ->count();
if ($count >= 1) {
    $count = ' ' . ($count + 1);
} else {
    $count = '';
}

// duplicate Snippet
$newSnippet = $snippet->replicate();
$newSnippet->name = $snippet->name . ' ' . ManagerTheme::getLexicon('duplicated_el_suffix') . $count;
$newSnippet->push();

// Set the item name for logger
$_SESSION['itemname'] = $newSnippet->name;

// finish duplicating - redirect to new snippet
header('Location: index.php?r=2&a=22&id=' . $newSnippet->getKey());
