<?php

use EvolutionCMS\Facades\ManagerTheme;
use EvolutionCMS\Models\SiteHtmlsnippet;
use Illuminate\Database\Eloquent\ModelNotFoundException;

if (!defined('IN_MANAGER_MODE') || IN_MANAGER_MODE !== true) {
    die('<b>INCLUDE_ORDERING_ERROR</b><br /><br />Please use the EVO Content Manager instead of accessing this file directly.');
}
if (!evo()->hasPermission('save_chunk')) {
    evo()->webAlertAndQuit(ManagerTheme::getLexicon('error_no_privileges'));
}

if (isset($_GET['disabled'])) {
    $disabled = $_GET['disabled'] == 1 ? 1 : 0;
    $id = (int) ($_REQUEST['id'] ?? 0);
    // Set the item name for logger
    try {
        /** @var SiteHtmlsnippet $chunk */
        $chunk = SiteHtmlsnippet::query()->findOrFail($id);
        // invoke OnBeforeChunkFormSave event
        evo()->invokeEvent('OnBeforeChunkFormSave', [
            'mode' => "upd",
            'id' => $id,
        ]);
        $_SESSION['itemname'] = $chunk->name;
        $chunk->update(['disabled' => $disabled]);
        // invoke OnChunkFormSave event
        evo()->invokeEvent('OnChunkFormSave', [
            'mode' => 'upd',
            'id' => $id,
        ]);
    } catch (ModelNotFoundException $e) {
        evo()->webAlertAndQuit(ManagerTheme::getLexicon('error_no_id'));
    }
    // empty cache
    evo()->clearCache('full');

    // finished emptying cache - redirect
    header('Location: index.php?a=76&tab=2&r=2');
    exit;
}

$id = (int) $_POST['id'];
$snippet = $_POST['post'];
$name = trim($_POST['name']);
$description = $_POST['description'];
$locked = isset($_POST['locked']) && $_POST['locked'] == 'on' ? 1 : 0;
$disabled = isset($_POST['disabled']) && $_POST['disabled'] == "on" ? '1' : '0';
$createdon = $editedon = time() + evo()->config['server_offset_time'];

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

if ($name == '' || $name == 'null') {
    $name = 'Untitled chunk';
}

$editor_type = $_POST['which_editor'] != 'none' ? 1 : 2;
$editor_name = $_POST['which_editor'] != 'none' ? $_POST['which_editor'] : 'none';

switch ($_POST['mode']) {
    case '77':
        // invoke OnBeforeChunkFormSave event
        evo()->invokeEvent('OnBeforeChunkFormSave', [
            'mode' => 'new',
            'id' => $id,
        ]);

        // disallow duplicate names for new chunks
        if (SiteHtmlsnippet::query()->firstWhere('name', $name)) {
            evo()->getManagerApi()->saveFormValues(77);
            evo()->webAlertAndQuit(
                sprintf(
                    ManagerTheme::getLexicon('duplicate_name_found_general'),
                    ManagerTheme::getLexicon('chunk'),
                    $name
                ),
                'index.php?a=77'
            );
        }

        //do stuff to save the new doc
        $id = SiteHtmlsnippet::query()
            ->create(
                compact(
                    'name',
                    'description',
                    'snippet',
                    'locked',
                    'category',
                    'editor_type',
                    'editor_name',
                    'disabled',
                    'createdon',
                    'editedon'
                )
            )
            ->getKey();

        // invoke OnChunkFormSave event
        evo()->invokeEvent('OnChunkFormSave', [
            'mode' => 'new',
            'id' => $id,
        ]);

        // Set the item name for logger
        $_SESSION['itemname'] = $name;

        // empty cache
        evo()->clearCache('full');

        // finished emptying cache - redirect
        if ($_POST['stay'] != '') {
            $a = ($_POST['stay'] == '2') ? "78&id=$id" : "77";
            $header = 'Location: index.php?a=' . $a . '&r=2&stay=' . $_POST['stay'];
        } else {
            $header = 'Location: index.php?a=76&r=2';
        }
        header($header);
        break;
    case '78':
        // invoke OnBeforeChunkFormSave event
        evo()->invokeEvent('OnBeforeChunkFormSave', [
            'mode' => 'upd',
            'id' => $id,
        ]);

        // disallow duplicate names for chunks
        if (SiteHtmlsnippet::query()->where('id', '!=', $id)->where('name', '=', $name)->first()) {
            evo()->getManagerApi()->saveFormValues(78);
            evo()->webAlertAndQuit(
                sprintf(
                    ManagerTheme::getLexicon('duplicate_name_found_general'),
                    ManagerTheme::getLexicon('chunk'),
                    $name
                ),
                'index.php?a=78&id=' . $id
            );
        }

        //do stuff to save the edited doc
        $chunk = SiteHtmlsnippet::query()->find($id);

        $chunk->update(
            compact(
                'name',
                'description',
                'snippet',
                'locked',
                'category',
                'editor_type',
                'editor_name',
                'disabled',
                'editedon'
            )
        );

        // invoke OnChunkFormSave event
        evo()->invokeEvent('OnChunkFormSave', [
            'mode' => 'upd',
            'id' => $id,
        ]);

        // Set the item name for logger
        $_SESSION['itemname'] = $name;

        // empty cache
        evo()->clearCache('full');

        // finished emptying cache - redirect
        if ($_POST['stay'] != '') {
            $a = ($_POST['stay'] == '2') ? '78&id=' . $id : '77';
            $header = 'Location: index.php?a=' . $a . '&r=2&stay=' . $_POST['stay'];
        } else {
            evo()->unlockElement(3, $id);
            $header = 'Location: index.php?a=76&r=2';
        }
        header($header);
        break;
    default:
        evo()->webAlertAndQuit('No operation set in request.');
}
