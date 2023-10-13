<?php

use EvolutionCMS\Facades\ManagerTheme;
use EvolutionCMS\Models\SiteTmplvar;

if (!defined('IN_MANAGER_MODE') || IN_MANAGER_MODE !== true) {
    die('<b>INCLUDE_ORDERING_ERROR</b><br /><br />Please use the EVO Content Manager instead of accessing this file directly.');
}
if (!evo()->hasPermission('save_template')) {
    evo()->webAlertAndQuit(ManagerTheme::getLexicon('error_no_privileges'));
}

$id = (int) ($_POST['id'] ?? 0);
$name = trim($_POST['name']);
$description = $_POST['description'];
$caption = $_POST['caption'];
$type = $_POST['type'];
$elements = $_POST['elements'];
$default_text = $_POST['default_text'];
$rank = $_POST['rank'] ?? 0;
$display = $_POST['display'];
$params = $_POST['params'];
$locked = isset($_POST['locked']) && $_POST['locked'] == 'on' ? 1 : 0;
$origin = isset($_REQUEST['or']) ? (int) $_REQUEST['or'] : 76;
$originId = isset($_REQUEST['oid']) ? (int) $_REQUEST['oid'] : null;
$currentdate = time() + evo()->config['server_offset_time'];
$properties = $_POST['properties'];

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

$name = $name != '' ? $name : 'Untitled variable';
$caption = $caption != '' ? $caption : $name;

switch ($_POST['mode']) {
    case '300':
        // invoke OnBeforeTVFormSave event
        evo()->invokeEvent('OnBeforeTVFormSave', [
            'mode' => 'new',
            'id' => $id,
        ]);

        // disallow duplicate names for new tvs
        if (SiteTmplvar::query()->firstWhere('name', $name)) {
            evo()->getManagerApi()->saveFormValues(300);
            evo()->webAlertAndQuit(
                sprintf(
                    ManagerTheme::getLexicon('duplicate_name_found_general'),
                    ManagerTheme::getLexicon('tv'),
                    $name
                ),
                'index.php?a=300'
            );
        }
        // disallow reserved names
        if (in_array(
            $name,
            [
                'id',
                'type',
                'contentType',
                'pagetitle',
                'longtitle',
                'description',
                'alias',
                'link_attributes',
                'published',
                'pub_date',
                'unpub_date',
                'parent',
                'isfolder',
                'introtext',
                'content',
                'richtext',
                'template',
                'menuindex',
                'searchable',
                'cacheable',
                'createdby',
                'createdon',
                'editedby',
                'editedon',
                'deleted',
                'deletedon',
                'deletedby',
                'publishedon',
                'publishedby',
                'menutitle',
                'hide_from_tree',
                'privateweb',
                'privatemgr',
                'content_dispo',
                'hidemenu',
                'alias_visible',
                'id',
                'oldusername',
                'oldemail',
                'newusername',
                'fullname',
                'first_name',
                'middle_name',
                'last_name',
                'verified',
                'newpassword',
                'newpasswordcheck',
                'passwordgenmethod',
                'passwordnotifymethod',
                'specifiedpassword',
                'confirmpassword',
                'email',
                'phone',
                'mobilephone',
                'fax',
                'dob',
                'country',
                'street',
                'city',
                'state',
                'zip',
                'gender',
                'photo',
                'comment',
                'role',
                'failedlogincount',
                'blocked',
                'blockeduntil',
                'blockedafter',
                'user_groups',
                'mode',
                'blockedmode',
                'stay',
                'save',
                'theme_refresher',
                'username',
            ]
        )
        ) {
            $_POST['name'] = '';
            evo()->getManagerApi()->saveFormValues(300);
            evo()->webAlertAndQuit(
                sprintf(ManagerTheme::getLexicon('reserved_name_warning'), ManagerTheme::getLexicon('tv'), $name),
                'index.php?a=300'
            );
        }

        // Add new TV
        $field = [
            'name' => $name,
            'description' => $description,
            'caption' => $caption,
            'type' => $type,
            'elements' => $elements,
            'default_text' => $default_text,
            'display' => $display,
            'display_params' => $params,
            'rank' => $rank,
            'locked' => $locked,
            'category' => $categoryid,
            'createdon' => $currentdate,
            'editedon' => $currentdate,
            'properties' => $properties,
        ];
        $tmplVar = SiteTmplvar::query()->create($field);
        $newid = $tmplVar->getKey();

        // save access permissions
        saveTemplateVarAccess($newid);
        saveDocumentAccessPermissons($newid);
        saveVarRoles($newid);

        // invoke OnTVFormSave event
        evo()->invokeEvent('OnTVFormSave', [
            'mode' => 'new',
            'id' => $newid,
        ]);

        // Set the item name for logger
        $_SESSION['itemname'] = $caption;

        // empty cache
        evo()->clearCache('full');

        // finished emptying cache - redirect
        if ($_POST['stay'] != '') {
            $a = ($_POST['stay'] == '2') ? '301&id=' . $newid : '300';
            $header = 'Location: index.php?a=' . $a . '&r=2&stay=' . $_POST['stay'];
        } else {
            $header = 'Location: index.php?a=76&tab=1&r=2';
        }
        header($header);
        break;
    case '301':
        // invoke OnBeforeTVFormSave event
        evo()->invokeEvent('OnBeforeTVFormSave', [
            'mode' => 'upd',
            'id' => $id,
        ]);

        // disallow duplicate names for tvs
        if (SiteTmplvar::query()->where('name', $name)->where('id', '!=', $id)->first()) {
            evo()->getManagerApi()->saveFormValues(300);
            evo()->webAlertAndQuit(
                sprintf(
                    ManagerTheme::getLexicon('duplicate_name_found_general'),
                    ManagerTheme::getLexicon('tv'),
                    $name
                ),
                'index.php?a=301&id=' . $id
            );
        }
        // disallow reserved names
        if (in_array(
            $name,
            [
                'id',
                'type',
                'contentType',
                'pagetitle',
                'longtitle',
                'description',
                'alias',
                'link_attributes',
                'published',
                'pub_date',
                'unpub_date',
                'parent',
                'isfolder',
                'introtext',
                'content',
                'richtext',
                'template',
                'menuindex',
                'searchable',
                'cacheable',
                'createdby',
                'createdon',
                'editedby',
                'editedon',
                'deleted',
                'deletedon',
                'deletedby',
                'publishedon',
                'publishedby',
                'menutitle',
                'hide_from_tree',
                'privateweb',
                'privatemgr',
                'content_dispo',
                'hidemenu',
                'alias_visible',
                'id',
                'oldusername',
                'oldemail',
                'newusername',
                'fullname',
                'first_name',
                'middle_name',
                'last_name',
                'verified',
                'newpassword',
                'newpasswordcheck',
                'passwordgenmethod',
                'passwordnotifymethod',
                'specifiedpassword',
                'confirmpassword',
                'email',
                'phone',
                'mobilephone',
                'fax',
                'dob',
                'country',
                'street',
                'city',
                'state',
                'zip',
                'gender',
                'photo',
                'comment',
                'role',
                'failedlogincount',
                'blocked',
                'blockeduntil',
                'blockedafter',
                'user_groups',
                'mode',
                'blockedmode',
                'stay',
                'save',
                'theme_refresher',
                'username',
            ]
        )
        ) {
            evo()->getManagerApi()->saveFormValues(300);
            evo()->webAlertAndQuit(
                sprintf(ManagerTheme::getLexicon('reserved_name_warning'), ManagerTheme::getLexicon('tv'), $name),
                'index.php?a=301&id=' . $id
            );
        }

        // update TV
        $field = [
            'name' => $name,
            'description' => $description,
            'caption' => $caption,
            'type' => $type,
            'elements' => $elements,
            'default_text' => $default_text,
            'display' => $display,
            'display_params' => $params,
            'rank' => $rank,
            'locked' => $locked,
            'category' => $categoryid,
            'editedon' => $currentdate,
            'properties' => $properties,
        ];
        $tmplVar = SiteTmplvar::query()->findOrFail($id);
        $tmplVar->update($field);

        // save access permissions
        saveTemplateVarAccess($id);
        saveDocumentAccessPermissons($id);
        saveVarRoles($id);

        // invoke OnTVFormSave event
        evo()->invokeEvent('OnTVFormSave', [
            'mode' => 'upd',
            'id' => $id,
        ]);

        // Set the item name for logger
        $_SESSION['itemname'] = $caption;

        // empty cache
        evo()->clearCache('full');

        // finished emptying cache - redirect
        if ($_POST['stay'] != '') {
            $a = ($_POST['stay'] == '2') ? '301&id=' . $id : '300';
            $header =
                'Location: index.php?a=' . $a . '&r=2&stay=' . $_POST['stay'] . '&or=' . $origin . '&oid=' . $originId;
        } else {
            evo()->unlockElement(2, $id);
            $header = 'Location: index.php?a=' . $origin . '&r=2' . (empty($originId) ? '' : '&id=' . $originId);
        }
        header($header);

        break;
    default:
        evo()->webAlertAndQuit('No operation set in request.');
}
