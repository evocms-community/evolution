<?php

use EvolutionCMS\Facades\ManagerTheme;
use EvolutionCMS\Models\SiteTemplate;
use Illuminate\Database\Eloquent\ModelNotFoundException;

if (!defined('IN_MANAGER_MODE') || IN_MANAGER_MODE !== true) {
    die("<b>INCLUDE_ORDERING_ERROR</b><br /><br />Please use the EVO Content Manager instead of accessing this file directly.");
}
if (!evo()->hasPermission('save_template')) {
    evo()->webAlertAndQuit(__('global.error_no_privileges'));
}
if (isset($_GET['selectable'])) {
    $selectable = (int) $_GET['selectable'];
    $id = (int) ($_REQUEST['id'] ?? 0);

    try {
        /** @var SiteTemplate $template */
        $template = SiteTemplate::query()->findOrFail($id);

        evo()->invokeEvent('OnBeforeTempFormSave', [
            'mode' => 'upd',
            'id' => $id,
        ]);

        $_SESSION['itemname'] = $template->templatename;

        $template->update(['selectable' => $selectable]);
        evo()->invokeEvent('OnTempFormSave', [
            'mode' => 'upd',
            'id' => $id,
        ]);
    } catch (ModelNotFoundException $e) {
        evo()->webAlertAndQuit(__('global.error_no_id'));
    }

    header('Location: index.php?a=76&tab=0&r=2');
    exit;
}

$id = (int) $_POST['id'];
$template = $_POST['post'];
$templatename = trim($_POST['templatename']);
$templatealias = trim($_POST['templatealias']);
$templatecontroller = trim($_POST['templatecontroller']);
$description = $_POST['description'];
$locked = isset($_POST['locked']) && $_POST['locked'] == 'on' ? 1 : 0;
$selectable = $id == evo()->getConfig('default_template')
    ? 1
    : // Force selectable
    (isset($_POST['selectable']) && $_POST['selectable'] == 'on' ? 1 : 0);
$currentdate = time() + evo()->getConfig('server_offset_time');

//Kyle Jaebker - added category support
if (empty($_POST['newcategory']) && $_POST['categoryid'] > 0) {
    $categoryid = (int) $_POST['categoryid'];
} elseif (empty($_POST['newcategory']) && $_POST['categoryid'] <= 0) {
    $categoryid = 0;
} else {
    include_once MODX_MANAGER_PATH . 'includes/categories.inc.php';
    $categoryid = checkCategory($_POST['newcategory']);
    if (!$categoryid) {
        $categoryid = newCategory($_POST['newcategory']);
    }
}

if ($templatename == '') {
    $templatename = 'Untitled template';
}

function createBladeFile($templatealias)
{
    $filename = $templatealias;
    $filename = preg_replace('/\s*/', '', $filename);
    $filename = preg_replace('/[^a-zA-Z0-9_-]+/', '', $filename);

    if (!empty($filename) && $filename == $templatealias) {
        $filename .= '.blade.php';
        $views = MODX_BASE_PATH . 'views';

        if (!file_exists($views . '/' . $filename)) {
            if (!is_dir($views)) {
                mkdir($views);
            }

            if (is_writeable($views)) {
                file_put_contents($views . '/' . $filename, '');
            }
        }
    }
}

switch ($_POST['mode']) {
    case '19':
        // invoke OnBeforeTempFormSave event
        evo()->invokeEvent('OnBeforeTempFormSave', [
            'mode' => 'new',
            'id' => $id,
        ]);

        // disallow duplicate names for new templates
        $count = SiteTemplate::query()->where('templatename', $templatename)->count();
        if ($count > 0) {
            evo()->getManagerApi()->saveFormValues(19);
            evo()->webAlertAndQuit(
                sprintf(
                    __('global.duplicate_name_found_general'),
                    __('global.template'),
                    $templatename
                ),
                'index.php?a=19'
            );
        }

        if ($templatealias == '') {
            $templatealias = $templatename;
        }

        $templatealias = strtolower(evo()->stripAlias(trim($templatealias)));

        $count = SiteTemplate::query()->where('templatealias', $templatealias)->count();

        if ($count > 0) {
            evo()->getManagerApi()->saveFormValues(19);
            evo()->webAlertAndQuit(
                sprintf(__('global.duplicate_template_alias_found'), $id, $templatealias),
                'index.php?a=19'
            );
        }
        //do stuff to save the new doc
        $newid = SiteTemplate::query()->insertGetId([
            'templatename' => $templatename,
            'templatealias' => $templatealias,
            'templatecontroller' => $templatecontroller,
            'description' => $description,
            'content' => $template,
            'locked' => $locked,
            'selectable' => $selectable,
            'category' => $categoryid,
            'createdon' => $currentdate,
            'editedon' => $currentdate,
        ]);

        // invoke OnTempFormSave event
        evo()->invokeEvent('OnTempFormSave', [
            'mode' => 'new',
            'id' => $newid,
        ]);
        // Set new assigned Tvs
        saveTemplateAccess($newid);

        if (!empty($_POST['createbladefile'])) {
            createBladeFile($templatealias);
        }

        // Set the item name for logger
        $_SESSION['itemname'] = $templatename;

        // empty cache
        evo()->clearCache('full');

        // finished emptying cache - redirect
        if ($_POST['stay'] != '') {
            $a = ($_POST['stay'] == '2') ? '16&id=' . $newid : '19';
            $header = 'Location: index.php?a=' . $a . '&r=2&stay=' . $_POST['stay'];
        } else {
            $header = 'Location: index.php?a=76&r=2';
        }
        header($header);

        break;
    case '16':
        // invoke OnBeforeTempFormSave event
        evo()->invokeEvent('OnBeforeTempFormSave', [
            'mode' => 'upd',
            'id' => $id,
        ]);

        // disallow duplicate names for templates
        $count = SiteTemplate::query()->where('templatename', $templatename)->where('id', '!=', $id)->count();
        if ($count > 0) {
            evo()->getManagerApi()->saveFormValues(16);
            evo()->webAlertAndQuit(
                sprintf(
                    __('global.duplicate_name_found_general'),
                    __('global.template'),
                    $templatename
                ),
                'index.php?a=16&id=' . $id
            );
        }

        if ($templatealias == '') {
            $templatealias = $templatename;
        }

        $templatealias = strtolower(evo()->stripAlias(trim($templatealias)));

        $count = SiteTemplate::query()->where('templatealias', $templatealias)->where('id', '!=', $id)->count();

        if ($count > 0) {
            evo()->getManagerApi()->saveFormValues(16);
            evo()->webAlertAndQuit(
                sprintf(__('global.duplicate_template_alias_found'), $id, $templatealias),
                'index.php?a=16&id=' . $id
            );
        }
        //do stuff to save the edited doc
        SiteTemplate::query()->find($id)
            ->update([
                'templatename' => $templatename,
                'templatealias' => $templatealias,
                'description' => $description,
                'content' => $template,
                'locked' => $locked,
                'selectable' => $selectable,
                'category' => $categoryid,
                'editedon' => $currentdate,
            ]);
        // Set new assigned Tvs
        saveTemplateAccess($id);

        if (!empty($_POST['createbladefile'])) {
            createBladeFile($templatealias);
        }

        // invoke OnTempFormSave event
        evo()->invokeEvent('OnTempFormSave', [
            'mode' => "upd",
            'id' => $id,
        ]);

        // Set the item name for logger
        $_SESSION['itemname'] = $templatename;

        // first empty the cache
        evo()->clearCache('full');

        // finished emptying cache - redirect
        if ($_POST['stay'] != '') {
            $a = ($_POST['stay'] == '2') ? '16&id=' . $id : '19';
            $header = 'Location: index.php?a=' . $a . '&r=2&stay=' . $_POST['stay'];
        } else {
            evo()->unlockElement(1, $id);
            $header = 'Location: index.php?a=76&r=2';
        }
        header($header);
        break;
    default:
        evo()->webAlertAndQuit('No operation set in request.');
}
