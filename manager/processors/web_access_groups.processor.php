<?php

use EvolutionCMS\Facades\ManagerTheme;
use EvolutionCMS\Models\DocumentGroup;
use EvolutionCMS\Models\DocumentgroupName;
use EvolutionCMS\Models\MemberGroup;
use EvolutionCMS\Models\MembergroupAccess;
use EvolutionCMS\Models\MembergroupName;

if (!defined('IN_MANAGER_MODE') || IN_MANAGER_MODE !== true) {
    die('<b>INCLUDE_ORDERING_ERROR</b><br /><br />Please use the EVO Content Manager instead of accessing this file directly.');
}
if (!evo()->hasPermission('manage_groups')) {
    evo()->webAlertAndQuit(ManagerTheme::getLexicon('error_no_privileges'));
}

// web access group processor.
// figure out what the user wants to do...

$updategroupaccess = false;
$operation = $_REQUEST['operation'];

switch ($operation) {
    case 'add_user_group':
        $newgroup = $_REQUEST['newusergroup'] ?? '';
        if (empty($newgroup)) {
            evo()->webAlertAndQuit('No group name specified.');
        } else {
            $id = MembergroupName::query()->insertGetId(['name' => $newgroup]);
            // invoke OnWebCreateGroup event
            evo()->invokeEvent('OnCreateUserGroup', [
                'groupid' => $id,
                'groupname' => $newgroup,
            ]);
        }
        break;
    case 'add_document_group':
        $newgroup = $_REQUEST['newdocgroup'] ?? '';
        if (empty($newgroup)) {
            evo()->webAlertAndQuit('No group name specified.');
        } else {
            $id = DocumentgroupName::query()->insertGetId(['name' => $newgroup]);

            // invoke OnCreateDocGroup event
            evo()->invokeEvent('OnCreateDocGroup', [
                'groupid' => $id,
                'groupname' => $newgroup,
            ]);
        }
        break;
    case "delete_user_group":
        $updategroupaccess = true;
        $usergroup = (int) ($_REQUEST['usergroup'] ?? '');
        if (empty($usergroup)) {
            evo()->webAlertAndQuit('No user group id specified for deletion.');
        } else {
            MembergroupName::query()->where('id', $usergroup)->delete();

            MembergroupAccess::query()->where('membergroup', $usergroup)->delete();

            MemberGroup::query()->where('member', $usergroup)->delete();
        }
        break;
    case 'delete_document_group':
        $group = (int) ($_REQUEST['documentgroup'] ?? '');
        if (empty($group)) {
            evo()->webAlertAndQuit('No document group id specified for deletion.');
        } else {
            DocumentgroupName::query()->where('id', $group)->delete();

            MembergroupAccess::query()->where('documentgroup', $group)->delete();

            DocumentGroup::query()->where('document_group', $group)->delete();
        }
        break;
    case 'rename_user_group':
        $newgroupname = $_REQUEST['newgroupname'] ?? '';
        if (empty($newgroupname)) {
            evo()->webAlertAndQuit('No group name specified.');
        }
        $groupid = (int) $_REQUEST['groupid'];
        if (empty($groupid)) {
            evo()->webAlertAndQuit('No user group id specified for rename.');
        }
        MembergroupName::query()->where('id', $groupid)->update(['name' => $newgroupname]);
        break;
    case 'rename_document_group':
        $newgroupname = $_REQUEST['newgroupname'] ?? '';
        if (empty($newgroupname)) {
            evo()->webAlertAndQuit('No group name specified.');
        }
        $groupid = (int) ($_REQUEST['groupid'] ?? '');
        if (empty($groupid)) {
            evo()->webAlertAndQuit('No document group id specified for rename.');
        }
        DocumentgroupName::query()->where('id', $groupid)->update(['name' => $newgroupname]);
        break;
    case 'add_document_group_to_user_group':
        $updategroupaccess = true;
        $usergroup = (int) ($_REQUEST['usergroup'] ?? 0);
        $docgroup = (int) ($_REQUEST['docgroup'] ?? 0);
        $contexts = isset($_REQUEST['context']) && is_array($_REQUEST['context']) ? $_REQUEST['context'] : [];
        foreach ($contexts as $context) {
            $context = $context == 1 ? 1 : 0;
            $count = MembergroupAccess::query()->where('membergroup', $usergroup)
                ->where('documentgroup', $docgroup)
                ->where('context', $context)
                ->count();
            if ($count <= 0) {
                MembergroupAccess::query()->create([
                    'membergroup' => $usergroup,
                    'documentgroup' => $docgroup,
                    'context' => $context,
                ]);
            }
        }

        break;
    case 'remove_document_group_from_user_group':
        $updategroupaccess = true;
        $coupling = (int) ($_REQUEST['coupling'] ?? 0);
        $context = (int) ($_REQUEST['context'] ?? 0) == 0 ? 0 : 1;
        MembergroupAccess::query()->where('id', $coupling)->delete();
        break;
    default:
        evo()->webAlertAndQuit('No operation set in request.');
}

// secure web documents - flag as private
if ($updategroupaccess) {
    include MODX_MANAGER_PATH . 'includes/secure_web_documents.inc.php';
    if ($context) {
        secureWebDocument();
    } else {
        secureMgrDocument();
    }
    // Update the private group column
    $columnName = $context ? 'private_webgroup' : 'private_memgroup';
    $resp = DocumentgroupName::query()
        ->select(
            'documentgroup_names.id',
            'membergroup_access.membergroup'
        )
        ->join('membergroup_access', function ($join) use ($context) {
            $join->on('membergroup_access.documentgroup', '=', 'documentgroup_names.id')
                ->where('membergroup_access.context', '=', $context);
        })
        ->get();
    foreach ($resp as $item) {
        if (!is_null($item->membergroup)) {
            DocumentgroupName::query()->find($item->id)->update([$columnName => 1]);
        }
    }
}

header('Location: index.php?a=91');
