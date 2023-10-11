<?php

use EvolutionCMS\Facades\ManagerTheme;
use EvolutionCMS\Models\SiteSnippet;
use Illuminate\Database\Eloquent\ModelNotFoundException;

if (!defined('IN_MANAGER_MODE') || IN_MANAGER_MODE !== true) {
    die('<b>INCLUDE_ORDERING_ERROR</b><br /><br />Please use the EVO Content Manager instead of accessing this file directly.');
}
if (!evo()->hasPermission('save_snippet')) {
    evo()->webAlertAndQuit(ManagerTheme::getLexicon('error_no_privileges'));
}

if (isset($_GET['disabled'])) {
    $disabled = $_GET['disabled'] == 1 ? 1 : 0;
    $id = (int) ($_REQUEST['id'] ?? 0);
    // Set the item name for logger
    try {
        $snippet = SiteSnippet::query()->findOrFail($id);
        // invoke OnBeforeChunkFormSave event
        evo()->invokeEvent('OnBeforeSnipFormSave', [
            'mode' => 'upd',
            'id' => $id,
        ]);
        $_SESSION['itemname'] = $snippet->name;
        $snippet->update(['disabled' => $disabled]);
        // invoke OnChunkFormSave event
        evo()->invokeEvent('OnSnipFormSave', [
            'mode' => 'upd',
            'id' => $id,
        ]);
    } catch (ModelNotFoundException $e) {
        evo()->webAlertAndQuit(ManagerTheme::getLexicon('error_no_id'));
    }
    // empty cache
    evo()->clearCache('full');

    // finished emptying cache - redirect
    header('Location: index.php?a=76&tab=3&r=2');
    exit;
}

$id = (int) $_POST['id'];
$snippet = trim($_POST['post']);
$name = trim($_POST['name']);
$description = $_POST['description'];
$locked = isset($_POST['locked']) && $_POST['locked'] == 'on' ? 1 : 0;
$disabled = isset($_POST['disabled']) && $_POST['disabled'] == "on" ? '1' : '0';
$createdon = $editedon = time() + evo()->config['server_offset_time'];

// strip out PHP tags from snippets
if (strncmp($snippet, '<?', 2) == 0) {
    $snippet = substr($snippet, 2);
    if (strncmp($snippet, 'php', 3) == 0) {
        $snippet = substr($snippet, 3);
    }
}

if (substr($snippet, -2) == '?>') {
    $snippet = substr($snippet, 0, -2);
}

$properties = $_POST['properties'];
$moduleguid = $_POST['moduleguid'];
$parse_docblock = isset($_POST['parse_docblock']) && $_POST['parse_docblock'] == '1' ? '1' : '0';

//Kyle Jaebker - added category support
if (empty($_POST['newcategory']) && $_POST['categoryid'] > 0) {
    $category = (int) $_POST['categoryid'];
} elseif (empty($_POST['newcategory']) && $_POST['categoryid'] <= 0) {
    $category = 0;
} else {
    include_once MODX_MANAGER_PATH . 'includes/categories.inc.php';
    $category = checkCategory($_POST['newcategory']);
    if (!$category) {
        $category = newCategory($_POST['newcategory']);
    }
}

if ($name == '') {
    $name = 'Untitled snippet';
}

if ($parse_docblock) {
    $parsed = DocBlock::parseFromString($snippet);
    $name = $parsed['name'] ?? $name;
    $properties = $parsed['properties'] ?? $properties;
    $moduleguid = $parsed['guid'] ?? $moduleguid;

    $description = $parsed['description'] ?? $description;
    $version = isset($parsed['version']) ? '<b>' . $parsed['version'] . '</b> ' : '';
    if ($version) {
        $description = $version . trim(preg_replace('/(<b>.+?)+(<\/b>)/i', '', $description));
    }
    if (isset($parsed['modx_category'])) {
        include_once MODX_MANAGER_PATH . 'includes/categories.inc.php';
        $category = getCategory($parsed['modx_category']);
    }
}

switch ($_POST['mode']) {
    case '23': // Save new snippet
        // invoke OnBeforeSnipFormSave event
        evo()->invokeEvent('OnBeforeSnipFormSave', [
            'mode' => 'new',
            'id' => $id,
        ]);

        // disallow duplicate names for new snippets
        if (SiteSnippet::query()->firstWhere('name', $name)) {
            evo()->getManagerApi()->saveFormValues(23);
            evo()->webAlertAndQuit(
                sprintf(
                    ManagerTheme::getLexicon('duplicate_name_found_general'),
                    ManagerTheme::getLexicon('snippet'),
                    $name
                ),
                'index.php?a=23'
            );
        }

        //do stuff to save the new doc
        $newid = SiteSnippet::query()->create(
            compact(
                'name',
                'description',
                'snippet',
                'moduleguid',
                'locked',
                'properties',
                'category',
                'disabled',
                'createdon',
                'editedon'
            )
        )->getKey();

        // invoke OnSnipFormSave event
        evo()->invokeEvent('OnSnipFormSave', [
            'mode' => 'new',
            'id' => $newid,
        ]);

        // Set the item name for logger
        $_SESSION['itemname'] = $name;

        // empty cache
        evo()->clearCache('full');

        // finished emptying cache - redirect
        if ($_POST['stay'] != '') {
            $a = ($_POST['stay'] == '2') ? '22&id=' . $newid : '23';
            $header = 'Location: index.php?a=' . $a . '&r=2&stay=' . $_POST['stay'];
        } else {
            $header = 'Location: index.php?a=76&tab=3&r=2';
        }
        header($header);
        break;
    case '22': // Save existing snippet
        // invoke OnBeforeSnipFormSave event
        evo()->invokeEvent('OnBeforeSnipFormSave', [
            'mode' => 'upd',
            'id' => $id,
        ]);

        // disallow duplicate names for snippets
        if (SiteSnippet::query()->where('id', '!=', $id)->where('name', '=', $name)->first()) {
            evo()->getManagerApi()->saveFormValues(22);
            evo()->webAlertAndQuit(
                sprintf(
                    ManagerTheme::getLexicon('duplicate_name_found_general'),
                    ManagerTheme::getLexicon('snippet'),
                    $name
                ),
                'index.php?a=22&id=' . $id
            );
        }

        //do stuff to save the edited doc
        $siteSnippet = SiteSnippet::query()->find($id);

        $siteSnippet->update(
            compact(
                'name',
                'description',
                'snippet',
                'moduleguid',
                'locked',
                'properties',
                'category',
                'disabled',
                'editedon'
            )
        );

        // invoke OnSnipFormSave event
        evo()->invokeEvent('OnSnipFormSave', [
            'mode' => 'upd',
            'id' => $id,
        ]);

        // Set the item name for logger
        $_SESSION['itemname'] = $name;

        // empty cache
        evo()->clearCache('full');

        // finished emptying cache - redirect
        if ($_POST['stay'] != '') {
            $a = ($_POST['stay'] == '2') ? '22&id=' . $id : '23';
            $header = 'Location: index.php?a=' . $a . '&r=2&stay=' . $_POST['stay'];
        } else {
            evo()->unlockElement(4, $id);
            $header = 'Location: index.php?a=76&tab=3&r=2';
        }
        header($header);
        break;
    default:
        evo()->webAlertAndQuit('No operation set in request.');
}
