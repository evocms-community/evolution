<?php

use EvolutionCMS\Facades\ManagerTheme;
use EvolutionCMS\Models\SitePlugin;
use Illuminate\Database\Eloquent\ModelNotFoundException;

if (!defined('IN_MANAGER_MODE') || IN_MANAGER_MODE !== true) {
    die('<b>INCLUDE_ORDERING_ERROR</b><br /><br />Please use the EVO Content Manager instead of accessing this file directly.');
}
if (!evo()->hasPermission('save_plugin')) {
    evo()->webAlertAndQuit(ManagerTheme::getLexicon('error_no_privileges'));
}

if (isset($_GET['disabled'])) {
    $disabled = $_GET['disabled'] == 1 ? 1 : 0;
    $id = (int) ($_REQUEST['id'] ?? 0);
    // Set the item name for logger
    try {
        $plugin = SitePlugin::query()->findOrFail($id);
        // invoke OnBeforeChunkFormSave event
        evo()->invokeEvent('OnBeforePluginFormSave', [
            'mode' => 'upd',
            'id' => $id,
        ]);
        $_SESSION['itemname'] = $plugin->name;
        $plugin->update(['disabled' => $disabled]);
        // invoke OnChunkFormSave event
        evo()->invokeEvent('OnPluginFormSave', [
            'mode' => 'upd',
            'id' => $id,
        ]);
    } catch (ModelNotFoundException $e) {
        evo()->webAlertAndQuit(ManagerTheme::getLexicon('error_no_id'));
    }
    // empty cache
    evo()->clearCache('full');

    // finished emptying cache - redirect
    header('Location: index.php?a=76&tab=4&r=2');
    exit;
}

$id = (int) $_POST['id'];
$name = trim($_POST['name']);
$description = $_POST['description'];
$locked = isset($_POST['locked']) && $_POST['locked'] == 'on' ? '1' : '0';
$plugincode = $_POST['post'];
$properties = $_POST['properties'];
$disabled = isset($_POST['disabled']) && $_POST['disabled'] == 'on' ? '1' : '0';
$moduleguid = $_POST['moduleguid'];
$sysevents = !empty($_POST['sysevents']) ? $_POST['sysevents'] : [];
$parse_docblock = isset($_POST['parse_docblock']) && $_POST['parse_docblock'] == '1' ? '1' : '0';
$currentdate = time() + evo()->config['server_offset_time'];

//Kyle Jaebker - added category support
if (empty($_POST['newcategory']) && $_POST['categoryid'] > 0) {
    $categoryid = (int) $_POST['categoryid'];
} elseif (empty($_POST['newcategory']) && $_POST['categoryid'] <= 0) {
    $categoryid = 0;
} else {
    include_once MODX_MANAGER_PATH . 'includes/categories.inc.php';
    $categoryid = getCategory($_POST['newcategory']);
}

if ($name == '') {
    $name = 'Untitled plugin';
}

if ($parse_docblock) {
    $parsed = evo()->parseDocBlockFromString($plugincode, true);
    $name = $parsed['name'] ?? $name;
    $sysevents = isset($parsed['events']) ? explode(',', $parsed['events']) : $sysevents;
    $properties = $parsed['properties'] ?? $properties;
    $moduleguid = $parsed['guid'] ?? $moduleguid;

    $description = $parsed['description'] ?? $description;
    $version = isset($parsed['version']) ? '<b>' . $parsed['version'] . '</b> ' : '';
    if ($version) {
        $description = $version . trim(preg_replace('/(<b>.+?)+(<\/b>)/i', '', $description));
    }
    if (isset($parsed['modx_category'])) {
        include_once MODX_MANAGER_PATH . 'includes/categories.inc.php';
        $categoryid = getCategory($parsed['modx_category']);
    }
}

$eventIds = [];
switch ($_POST['mode']) {
    case '101':
        // invoke OnBeforePluginFormSave event
        evo()->invokeEvent('OnBeforePluginFormSave', [
            'mode' => 'new',
            'id' => $id,
        ]);

        // disallow duplicate names for active plugins
        if ($disabled == '0') {
            $count = SitePlugin::query()->where('name', $name)->where('disabled', 0)->count();
            if ($count > 0) {
                evo()->getManagerApi()->saveFormValues(101);
                evo()->webAlertAndQuit(
                    sprintf(
                        ManagerTheme::getLexicon('duplicate_name_found_general'),
                        ManagerTheme::getLexicon('plugin'),
                        $name
                    ),
                    'index.php?a=101'
                );
            }
        }

        //do stuff to save the new plugin
        $newid = SitePlugin::query()->insertGetId([
            'name' => $name,
            'description' => $description,
            'plugincode' => $plugincode,
            'disabled' => $disabled,
            'moduleguid' => $moduleguid,
            'locked' => $locked,
            'properties' => $properties,
            'category' => $categoryid,
            'createdon' => $currentdate,
            'editedon' => $currentdate,
        ]);

        // save event listeners
        saveEventListeners($newid, $sysevents, $_POST['mode']);

        // invoke OnPluginFormSave event
        evo()->invokeEvent('OnPluginFormSave', [
            'mode' => 'new',
            'id' => $newid,
        ]);

        // Set the item name for logger
        $_SESSION['itemname'] = $name;

        // empty cache
        evo()->clearCache('full');

        // finished emptying cache - redirect
        if ($_POST['stay'] != '') {
            $a = ($_POST['stay'] == '2') ? '102&id=' . $newid : '101';
            $header = 'Location: index.php?a=' . $a . '&r=2&stay=' . $_POST['stay'];
        } else {
            $header = 'Location: index.php?a=76&tab=4&r=2';
        }
        header($header);
        break;
    case '102':
        // invoke OnBeforePluginFormSave event
        evo()->invokeEvent('OnBeforePluginFormSave', [
            'mode' => 'upd',
            'id' => $id,
        ]);

        // disallow duplicate names for active plugins
        if ($disabled == '0') {
            $count = SitePlugin::query()->where('name', $name)->where('disabled', 0)->where(
                'id',
                '!=',
                $id
            )->count();
            if ($count > 0) {
                evo()->getManagerApi()->saveFormValues(102);
                evo()->webAlertAndQuit(
                    sprintf(
                        ManagerTheme::getLexicon('duplicate_name_found_general'),
                        ManagerTheme::getLexicon('plugin'),
                        $name
                    ),
                    'index.php?a=102&id=' . $id
                );
            }
        }

        //do stuff to save the edited plugin
        $newid = SitePlugin::query()->find($id)->update([
            'name' => $name,
            'description' => $description,
            'plugincode' => $plugincode,
            'disabled' => $disabled,
            'moduleguid' => $moduleguid,
            'locked' => $locked,
            'properties' => $properties,
            'category' => $categoryid,
            'editedon' => $currentdate,
        ]);

        // save event listeners
        saveEventListeners($id, $sysevents, $_POST['mode']);

        // invoke OnPluginFormSave event
        evo()->invokeEvent('OnPluginFormSave', [
            'mode' => 'upd',
            'id' => $id,
        ]);

        // Set the item name for logger
        $_SESSION['itemname'] = $name;

        // empty cache
        evo()->clearCache('full');

        // finished emptying cache - redirect
        if ($_POST['stay'] != '') {
            $a = ($_POST['stay'] == '2') ? '102&id=' . $id : '101';
            $header = 'Location: index.php?a=' . $a . '&r=2&stay=' . $_POST['stay'];
        } else {
            evo()->unlockElement(5, $id);
            $header = 'Location: index.php?a=76&tab=4&r=2';
        }
        header($header);
        break;
    default:
        evo()->webAlertAndQuit('No operation set in request.');
}
