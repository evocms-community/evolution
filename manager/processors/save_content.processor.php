<?php
if (!defined('IN_MANAGER_MODE') || IN_MANAGER_MODE !== true) {
    die("<b>INCLUDE_ORDERING_ERROR</b><br /><br />Please use the EVO Content Manager instead of accessing this file directly.");
}
if (!$modx->hasPermission('save_document')) {
    $modx->webAlertAndQuit($_lang["error_no_privileges"]);
    return;
}

/************* webber ********/
$sd = isset($_POST['dir']) && strtolower($_POST['dir']) === 'asc' ? '&dir=ASC' : '&dir=DESC';
$sb = isset($_POST['sort']) ? '&sort=' . entities($_POST['sort'], $modx->getConfig('modx_charset')) : '&sort=pub_date';
$pg = isset($_POST['page']) ? '&page=' . (int) $_POST['page'] : '';
$add_path = $sd . $sb . $pg;

$resourceArray = [
    'id' => is_numeric($_POST['id']) ? $_POST['id'] : '',
    //
    "introtext" => $_POST['introtext'],
    "content" => $_POST['ta'],
    "pagetitle" => $_POST['pagetitle'],
    "longtitle" => $_POST['longtitle'],
    "type" => $_POST['type'],
    "description" => $_POST['description'],
    "alias" => $_POST['alias'],
    "link_attributes" => $_POST['link_attributes'],
    "isfolder" => (int) $_POST['isfolder'],
    "richtext" => (int) $_POST['richtext'],
    "published" => (int) $_POST['published'],
    "parent" => (int) get_by_key($_POST, 'parent', 0, 'is_scalar'),
    "template" => (int) $_POST['template'],
    "menuindex" => !empty($_POST['menuindex']) ? (int) $_POST['menuindex'] : 0,
    "searchable" => (int) $_POST['searchable'],
    "cacheable" => (int) $_POST['cacheable'],
    "pub_date" => $_POST['pub_date'],
    "unpub_date" => $_POST['unpub_date'],
    "contentType" => $_POST['contentType'],
    "content_dispo" => (int) $_POST['content_dispo'],
    "hide_from_tree" => (int) $_POST['hide_from_tree'],
    "menutitle" => $_POST['menutitle'],
    "hidemenu" => (int) $_POST['hidemenu'],
    "alias_visible" => (int) $_POST['alias_visible'],
];

// get document groups for current user
$docgrp = array_unique(\EvolutionCMS\Models\MemberGroup::query()
        ->join('membergroup_access', 'membergroup_access.membergroup', '=', 'member_groups.user_group')
        ->where('member_groups.member', $modx->getLoginUserID('mgr'))->pluck('documentgroup')->toArray());

$document_groups = (isset($_POST['chkalldocs']) && $_POST['chkalldocs'] == 'on')
    ? []
    : get_by_key($_POST, 'docgroups', [], 'is_array');

$actionToTake = 'create';
if ($_POST['mode'] == '73' || $_POST['mode'] == '27') {
    $actionToTake = 'edit';
}

// ensure that user has not made this document inaccessible to themselves
if ($_SESSION['mgrRole'] != 1 && !empty($document_groups)) {
    // every value is "number,type", have to leave only numbers
    $document_group_list = implode(',', $document_groups);
    $document_group_list = array_filter(explode(',', $document_group_list), 'is_numeric');

    if (!empty($document_group_list)) {
        $exist = \EvolutionCMS\Models\MembergroupAccess::query()
            ->select('member_groups.id')
            ->join('member_groups', 'membergroup_access.membergroup', '=', 'member_groups.user_group')
            ->whereIn('membergroup_access.documentgroup', $document_group_list)
            ->where('member_groups.member', $_SESSION['mgrInternalKey'])
            ->exists();

        if (!$exist) {
            if ($actionToTake == 'edit') {
                $modx->getManagerApi()->saveFormValues(27);
                $modx->webAlertAndQuit($_lang["resource_permissions_error"], "index.php?a=27&id={$resourceArray['id']}");
                return;
            } else {
                $modx->getManagerApi()->saveFormValues(4);
                $modx->webAlertAndQuit($_lang["resource_permissions_error"], 'index.php?a=4');
                return;
            }
        }
    }
}

// get the document, but only if it already exists
$existingDocument = null;
if ($actionToTake != 'create') {
    $existingDocument = \EvolutionCMS\Models\SiteContent::query()
        ->withTrashed()
        ->find($resourceArray['id']);

    if (is_null($existingDocument)) {
        $modx->webAlertAndQuit($_lang["error_no_results"]);
        return;
    }

    $existingDocument = $existingDocument->toArray();
}

// check to see if the user is allowed to save the document in the place he wants to save it in
if ($modx->getConfig('use_udperms') == 1) {
    $parent = (int) get_by_key($_POST, 'parent', 0, 'is_scalar');

    if ($existingDocument && $existingDocument['parent'] != $parent) {
        $udperms = new EvolutionCMS\Legacy\Permissions();
        $udperms->user = $modx->getLoginUserID('mgr');
        $udperms->document = $parent;
        $udperms->role = $_SESSION['mgrRole'];

        if (!$udperms->checkPermissions()) {
            if ($actionToTake == 'edit') {
                $modx->getManagerApi()->saveFormValues(27);
                $modx->webAlertAndQuit($_lang['access_permission_parent_denied'], "index.php?a=27&id={$resourceArray['id']}");
                return;
            } else {
                $modx->getManagerApi()->saveFormValues(4);
                $modx->webAlertAndQuit($_lang['access_permission_parent_denied'], 'index.php?a=4');
                return;
            }
        }
    }
}

$events = true;
$cache = false;

switch ($actionToTake) {
    case 'create':
        if ((int) $_POST['syncsite'] == 1) {
            // empty cache
            $cache = true;
        }

        // Run resource creator
        try {
            $document = \DocumentManager::create($resourceArray, $events, $cache);
        } catch (EvolutionCMS\Exceptions\ServiceActionException $e) {
            // \Log::error('Unexpected error: ' . $e->getMessage());

            $modx->getManagerApi()->saveFormValues(4);
            $modx->webAlertAndQuit($e->getMessage(), 'index.php?a=4');
            return;
        } catch (EvolutionCMS\Exceptions\ServiceValidationException $e) {
            // \Log::error('Validation error: ' . $e->getValidationErrors());

            $modx->getManagerApi()->saveFormValues(4);
            $modx->webAlertAndQuit($e->getValidationErrors(), 'index.php?a=4');
            return;
        }

        // create document permissions
        if ($modx->getConfig('use_udperms') == 1) {
            // document access permissions
            $groupsParent = [];
            if ($resourceArray['parent'] != 0) {
                $groupsParent = \EvolutionCMS\Models\DocumentGroup::query()
                    ->select('document_group', 'document')
                    ->where('document', $resourceArray['parent'])
                    ->pluck('document_group')
                    ->toArray();
            }

            if ($modx->hasAnyPermissions(['manage_groups', 'manage_document_permissions'])) {
                if (!empty($document_groups)) {
                    $new_groups = [];
                    $groupsToInsert = [];
                    foreach ($document_groups as $value_pair) {
                        // first, split the pair (this is a new document, so ignore the second value
                        [$group] = explode(',', $value_pair); // @see actions/mutate_content.dynamic.php @ line 1138 (permissions list)
                        $group = (int) $group;

                        if ($modx->hasPermission('manage_groups')) {
                            $new_groups[] = ['document_group' => $group, 'document' => $key];
                            $groupsToInsert[] = $group;
                            continue;
                        }

                        if ($modx->hasPermission('manage_document_permissions')) {
                            if (in_array($group, $docgrp)) {
                                $new_groups[] = ['document_group' => $group, 'document' => $key];
                                $groupsToInsert[] = $group;
                            }
                        }
                    }

                    if ($modx->hasPermission('manage_document_permissions')) {
                        foreach ($groupsParent as $group) {
                            if (!in_array($group, $docgrp)) {
                                $new_groups[] = ['document_group' => $group, 'document' => $key];
                                $groupsToInsert[] = $group;
                            }
                        }
                    }

                    if (!$modx->hasPermission('manage_groups')) {
                        if (!array_intersect($groupsToInsert, $docgrp)) {
                            foreach ($groupsParent as $group) {
                                $new_groups[] = ['document_group' => $group, 'document' => $key];
                            }
                        }
                    }

                    if (!empty($new_groups)) {
                        \EvolutionCMS\Models\DocumentGroup::query()
                            ->insertOrIgnore($new_groups);
                    }
                }
            } else {
                // inherit document access permissions
                foreach ($groupsParent as $group) {
                    \EvolutionCMS\Models\DocumentGroup::query()
                        ->insert(['document_group' => $group, 'document' => $key]);
                }
            }
        }

        // redirect/stay options
        if ($_POST['stay'] != '') {
            // weblink
            if ($_POST['mode'] == "72") {
                $a = ($_POST['stay'] == '2') ? "27&id={$document['id']}" : "72&pid={$resourceArray['parent']}";
            }

            // document
            if ($_POST['mode'] == "4") {
                $a = ($_POST['stay'] == '2') ? "27&id={$document['id']}" : "4&pid={$resourceArray['parent']}";
            }

            $header = "Location: index.php?a={$a}&r=1&stay={$_POST['stay']}";
        } else {
            $header = "Location: index.php?a=3&r=1&id={$document['id']}";
        }

        if (headers_sent()) {
            $header = str_replace('Location: ', '', $header);
            echo "<script>document.location.href=\"{$header}\";</script>\r\n";
        } else {
            header($header);
        }
        break;

    case 'edit':
        if ($resourceArray['id'] == $modx->getConfig('site_start') && $resourceArray['published'] == 0) {
            $modx->getManagerApi()->saveFormValues(27);
            $modx->webAlertAndQuit("Document is linked to site_start variable and cannot be unpublished!");
            return;
        }

        $today = $modx->timestamp();
        if ($resourceArray['id'] == $modx->getConfig('site_start') && ($resourceArray['pub_date'] > $today || $resourceArray['unpub_date'] != "0")) {
            $modx->getManagerApi()->saveFormValues(27);
            $modx->webAlertAndQuit("Document is linked to site_start variable and cannot have publish or unpublish dates set!");
            return;
        }

        if ($resourceArray['parent'] == $resourceArray['id']) {
            $modx->getManagerApi()->saveFormValues(27);
            $modx->webAlertAndQuit("Document can not be it's own parent!");
            return;
        }

        $parents = $modx->getParentIds($resourceArray['parent']);
        if (in_array($resourceArray['id'], $parents)) {
            $modx->webAlertAndQuit("Document descendant can not be it's parent!");
            return;
        }

        if ((int) $_POST['syncsite'] == 1) {
            // empty cache
            $cache = true;
        }

        // save resource
        try {
            $document = \DocumentManager::edit($resourceArray, $events, $cache);
        } catch (EvolutionCMS\Exceptions\ServiceActionException $e) {
            // \Log::error('Unexpected error: ' . $e->getMessage());

            $modx->getManagerApi()->saveFormValues(27);
            $modx->webAlertAndQuit($e->getMessage(), "index.php?a=27&id={$resourceArray['id']}");
            return;
        } catch (EvolutionCMS\Exceptions\ServiceValidationException $e) {
            // \Log::error('Validation error: ' . $e->getValidationErrors());

            $modx->getManagerApi()->saveFormValues(27);
            $modx->webAlertAndQuit($e->getValidationErrors(), "index.php?a=27&id={$resourceArray['id']}");
            return;
        }

        // set document permissions
        if ($modx->getConfig('use_udperms') == 1) {
            if ($modx->hasAnyPermissions(['manage_groups', 'manage_document_permissions']) && is_array($document_groups)) {
                // process the new input
                $new_groups = [];
                foreach ($document_groups as $value_pair) {
                    // @see actions/mutate_content.dynamic.php @ line 1138 (permissions list)
                    [$group, $link_id] = explode(',', $value_pair);
                    if (in_array($group, $docgrp) || $modx->hasPermission('manage_groups')) {
                        $new_groups[$group] = $link_id;
                    }
                }

                // grab the current set of permissions on this document the user can access
                $old_groups = [];
                $documentGroups = \EvolutionCMS\Models\DocumentGroup::query()
                    ->select('id', 'document_group')
                    ->where('document', $resourceArray['id'])
                    ->get();
                foreach ($documentGroups as $documentGroup) {
                    if (in_array($documentGroup->document_group, $docgrp) || $modx->hasPermission('manage_groups')) {
                        $old_groups[$documentGroup->document_group] = $documentGroup->id;
                    }
                }

                // update the permissions in the database
                $insertions = $deletions = [];
                foreach ($new_groups as $group => $link_id) {
                    if (in_array($group, $docgrp) || $modx->hasPermission('manage_groups')) {
                        if (array_key_exists($group, $old_groups)) {
                            unset($old_groups[$group]);
                            continue;
                        } elseif ($link_id == 'new') {
                            $insertions[] = [
                                'document_group' => (int) $group,
                                'document' => $resourceArray['id']
                            ];
                        }
                    }
                }

                if (!empty($insertions)) {
                    \EvolutionCMS\Models\DocumentGroup::query()
                        ->insert($insertions);
                }

                if (!$modx->hasPermission('manage_groups')) {
                    $remainingGroups = \EvolutionCMS\Models\DocumentGroup::query()
                        ->select('document_groups.document_group')
                        ->whereNotIn('id', $old_groups)
                        ->where('document_groups.document', $resourceArray['id'])
                        ->pluck('document_group')
                        ->toArray();
                    if (!empty($docgrp) && !array_intersect($docgrp, $remainingGroups)) {
                        $modx->webAlertAndQuit($_lang["resource_permissions_error"], "index.php?a=27&id={$resourceArray['id']}");
                        return;
                    }
                }

                if (!empty($old_groups)) {
                    \EvolutionCMS\Models\DocumentGroup::query()
                        ->whereIn('id', $old_groups)
                        ->delete();
                }

                // necessary to remove all permissions as document is public
                if (empty($document_groups)) {
                    \EvolutionCMS\Models\DocumentGroup::query()
                        ->where('document', $resourceArray['id'])
                        ->delete();
                }
            }
        }

        // make redirect
        if ($_POST['refresh_preview'] == '1') {
            $header = "Location: {MODX_SITE_URL}index.php?id={$resourceArray['id']}&z=manprev";
        } else {
            if ($_POST['stay'] != '2' && $resourceArray['id'] > 0) {
                $modx->unlockElement(7, $resourceArray['id']);
            }
            if ($_POST['stay'] != '') {
                if ($resourceArray['type'] == "reference") {
                    // weblink
                    $a = ($_POST['stay'] == '2') ? "27&id={$resourceArray['id']}" : "72&pid={$resourceArray['parent']}";
                } else {
                    // document
                    $a = ($_POST['stay'] == '2') ? "27&id={$resourceArray['id']}" : "4&pid={$resourceArray['parent']}";
                }
                $header = "Location: index.php?a={$a}&r=1&stay={$_POST['stay']}{$add_path}";
            } else {
                $header = "Location: index.php?a=3&r=1&id={$resourceArray['id']}{$add_path}";
            }
        }
        if (headers_sent()) {
            $header = str_replace('Location: ', '', $header);
            echo "<script>document.location.href=\"{$header}\";</script>\r\n";
        } else {
            header($header);
        }
        break;

    default:
        $modx->webAlertAndQuit("No operation set in request.");
        return;
}
