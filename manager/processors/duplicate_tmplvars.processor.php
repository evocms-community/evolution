<?php

use EvolutionCMS\Facades\ManagerTheme;
use EvolutionCMS\Models\SiteTmplvar;
use Illuminate\Support\Arr;

if (!defined('IN_MANAGER_MODE') || IN_MANAGER_MODE !== true) {
    die('<b>INCLUDE_ORDERING_ERROR</b><br /><br />Please use the EVO Content Manager instead of accessing this file directly.');
}
if (!evo()->hasPermission('edit_template')) {
    evo()->webAlertAndQuit(ManagerTheme::getLexicon('error_no_privileges'));
}

$id = (int) ($_GET['id'] ?? 0);

if (!$id) {
    evo()->webAlertAndQuit(ManagerTheme::getLexicon('error_no_id'));
}

// count duplicates
/** @var SiteTmplvar $tmplvar */
$tmplvar = SiteTmplvar::with(['tmplvarAccess', 'tmplvarTemplate', 'tmplvarUserRole'])->findOrFail($id);
$name = $tmplvar->name;
$count = SiteTmplvar::query()
    ->where('name', 'like', $name . ' ' . ManagerTheme::getLexicon('duplicated_el_suffix') . '%')
    ->count();
if ($count >= 1) {
    $count = ' ' . ($count + 1);
} else {
    $count = '';
}

$newTmplvar = $tmplvar->replicate();
$newTmplvar->name = $tmplvar->name . ' ' . ManagerTheme::getLexicon('duplicated_el_suffix') . $count;
$newTmplvar->caption = $tmplvar->caption . ' Duplicate ' . $count;
$newTmplvar->push();

foreach ($tmplvar->tmplvarTemplate as $tmplvarTemplate) {
    $field = $tmplvarTemplate->attributesToArray();
    Arr::except($field, ['tmplvarid']);
    $newTmplvar->tmplvarTemplate()->create($field);
}
foreach ($tmplvar->tmplvarUserRole as $tmplvarUserRole) {
    $field = $tmplvarUserRole->attributesToArray();
    Arr::except($field, ['tmplvarid']);
    $newTmplvar->tmplvarUserRole()->create($field);
}
foreach ($tmplvar->tmplvarAccess as $tmplvarAccess) {
    $field = $tmplvarAccess->attributesToArray();
    Arr::except($field, ['tmplvarid']);
    $newTmplvar->tmplvarAccess()->create($field);
}

$_SESSION['itemname'] = $newTmplvar->name;

// finish duplicating - redirect to new variable
header('Location: index.php?r=2&a=301&id=' . $newTmplvar->getKey());
