<?php
if (!defined('IN_MANAGER_MODE') || IN_MANAGER_MODE !== true) {
    die("<b>INCLUDE_ORDERING_ERROR</b><br /><br />Please use the EVO Content Manager instead of accessing this file directly.");
}
if (!$modx->hasPermission('save_document')) {
    $modx->webAlertAndQuit(__('global.error_no_privileges'));
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
    'introtext' => $_POST['introtext'],
    'content' => $_POST['ta'],
    'pagetitle' => $_POST['pagetitle'],
    'longtitle' => $_POST['longtitle'],
    'type' => $_POST['type'],
    'description' => $_POST['description'],
    'alias' => $_POST['alias'],
    'link_attributes' => $_POST['link_attributes'],
    'isfolder' => (int) $_POST['isfolder'],
    'richtext' => (int) $_POST['richtext'],
    'published' => (int) $_POST['published'],
    'parent' => (int) get_by_key($_POST, 'parent', 0, 'is_scalar'),
    'template' => (int) $_POST['template'],
    'menuindex' => !empty($_POST['menuindex']) ? (int) $_POST['menuindex'] : 0,
    'searchable' => (int) $_POST['searchable'],
    'cacheable' => (int) $_POST['cacheable'],
    'pub_date' => $_POST['pub_date'],
    'unpub_date' => $_POST['unpub_date'],
    'contentType' => $_POST['contentType'],
    'content_dispo' => (int) $_POST['content_dispo'],
    'hide_from_tree' => (int) $_POST['hide_from_tree'],
    'menutitle' => $_POST['menutitle'],
    'hidemenu' => (int) $_POST['hidemenu'],
    'alias_visible' => (int) $_POST['alias_visible'],
];

// get document groups for current user
$userGroups = \EvolutionCMS\Models\MemberGroup::query()
    ->join('membergroup_access', 'membergroup_access.membergroup', '=', 'member_groups.user_group')
    ->where('member_groups.member', $modx->getLoginUserID('mgr'))
    ->pluck('documentgroup')
    ->toArray();
$userGroups = array_unique($userGroups);

// get passed document groups
$documentGroups = (isset($_POST['chkalldocs']) && $_POST['chkalldocs'] == 'on')
? []
: get_by_key($_POST, 'docgroups', [], 'is_array');

$actionToTake = 'create';
if ($_POST['mode'] == '73' || $_POST['mode'] == '27') {
    $actionToTake = 'edit';
}

// ensure that user has not made this document inaccessible to themselves
if ($_SESSION['mgrRole'] != 1 && !empty($documentGroups)) {
    // every value is "number,type", have to leave only numbers
    $document_group_list = implode(',', $documentGroups);
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
                $modx->webAlertAndQuit(__('global.resource_permissions_error'), "index.php?a=27&id={$resourceArray['id']}");
                return;
            } else {
                $modx->getManagerApi()->saveFormValues(4);
                $modx->webAlertAndQuit(__('global.resource_permissions_error'), 'index.php?a=4');
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
        $modx->webAlertAndQuit(__('global.error_no_results'));
        return;
    }

    $existingDocument = $existingDocument->toArray();
}

// check to see if the user is allowed to save the document in the place he wants to save it in
if ($modx->getConfig('use_udperms')) {
    $parent = (int) get_by_key($_POST, 'parent', 0, 'is_scalar');

    if ($existingDocument && $existingDocument['parent'] != $parent) {
        $udperms = new EvolutionCMS\Legacy\Permissions();
        $udperms->user = $modx->getLoginUserID('mgr');
        $udperms->document = $parent;
        $udperms->role = $_SESSION['mgrRole'];

        if (!$udperms->checkPermissions()) {
            if ($actionToTake == 'edit') {
                $modx->getManagerApi()->saveFormValues(27);
                $modx->webAlertAndQuit(__('global.access_permission_parent_denied'), "index.php?a=27&id={$resourceArray['id']}");
                return;
            } else {
                $modx->getManagerApi()->saveFormValues(4);
                $modx->webAlertAndQuit(__('global.access_permission_parent_denied'), 'index.php?a=4');
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

        // permissions is on
        if ($modx->getConfig('use_udperms')) {
            // parent document access permissions
            $parentGroups = [];
            if ($resourceArray['parent'] != 0) {
                $parentGroups = \EvolutionCMS\Models\DocumentGroup::query()
                    ->select('document_group', 'document')
                    ->where('document', $resourceArray['parent'])
                    ->pluck('document_group')
                    ->toArray();
            }

            if ($modx->hasAnyPermissions(['manage_groups', 'manage_document_permissions'])) {
                // check if document has groups checked
                if (!empty($documentGroups)) {
                    $groups = [];

                    foreach ($documentGroups as $value_pair) {
                        // first, split the pair (this is a new document, so ignore the second value $link_id)
                        // @see actions/mutate_content.dynamic.php @ line 1421 (permissions list)
                        [$group, $link_id] = explode(',', $value_pair);
                        $group = (int) $group;

                        // - The current user belongs to this group (in $userGroups), OR
                        // - The user has the global 'manage_groups' permission (e.g., admin)
                        if (in_array($group, $userGroups) || $modx->hasPermission('manage_groups')) {
                            $groups[] = $group;
                        }
                    }

                    // If user has 'manage_document_permissions' permission,
                    // automatically include ALL parent document's groups — even if the user isn't in them.
                    // This allows privileged users to inherit or assign parent-level permissions.
                    if ($modx->hasPermission('manage_document_permissions')) {
                        foreach ($parentGroups as $group) {
                            // also inherit every $group from parent
                            $groups[] = $group;
                        }
                    }

                    // If the user does NOT have 'manage_groups' permission,
                    // and they have NO overlap between their selected groups and their own groups ($userGroups),
                    // then fall back to inheriting ALL parent groups.
                    // This ensures non-admin users don't accidentally remove themselves from access.
                    if (!$modx->hasPermission('manage_groups')) {
                        // Check if there's ANY common group between selected groups and user's groups
                        if (!array_intersect($groups, $userGroups)) {
                            // If no overlap, restore all parent groups to prevent lockout
                            foreach ($parentGroups as $group) {
                                $groups[] = $group;
                            }
                        }
                    }

                    try {
                        \DocumentManager::setGroups([
                            'id' => $document->id,
                            'document_groups' => array_unique($groups),
                        ]);
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
                }
            } else {
                // inherit document access permissions
                try {
                    \DocumentManager::setGroups([
                        'id' => $document->id,
                        'document_groups' => $parentGroups,
                        'check_permissions' => false, // ignore permissions
                    ]);
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
            }
        }

        // redirect/stay options
        if ($_POST['stay'] != '') {
            // weblink
            if ($_POST['mode'] == "72") {
                $a = ($_POST['stay'] == '2') ? "27&id={$document->id}" : "72&pid={$resourceArray['parent']}";
            }

            // document
            if ($_POST['mode'] == "4") {
                $a = ($_POST['stay'] == '2') ? "27&id={$document->id}" : "4&pid={$resourceArray['parent']}";
            }

            $header = "Location: index.php?a={$a}&r=1&stay={$_POST['stay']}";
        } else {
            $header = "Location: index.php?a=3&r=1&id={$document->id}";
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
        if ($modx->getConfig('use_udperms')) {
            if ($modx->hasAnyPermissions(['manage_groups', 'manage_document_permissions'])) {
                $groups = [];

                // process the new input
                foreach ($documentGroups as $value_pair) {
                    // @see actions/mutate_content.dynamic.php @ line 1418 (permissions list)
                    [$group, $link_id] = explode(',', $value_pair);

                    // selected $group is in $userGroups or can manage groups in general
                    if (in_array($group, $userGroups) || $modx->hasPermission('manage_groups')) {
                        $groups[] = $group;
                    }
                }

                try {
                    \DocumentManager::setGroups([
                        'id' => $document->id,
                        'document_groups' => array_unique($groups),
                    ]);
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
