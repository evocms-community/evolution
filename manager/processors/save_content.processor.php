<?php

use EvolutionCMS\Facades\ManagerTheme;
use EvolutionCMS\Legacy\Permissions;
use EvolutionCMS\Models\DocumentGroup;
use EvolutionCMS\Models\MemberGroup;
use EvolutionCMS\Models\MembergroupAccess;
use EvolutionCMS\Models\SiteContent;
use EvolutionCMS\Models\SiteTmplvar;
use EvolutionCMS\Models\SiteTmplvarContentvalue;
use Illuminate\Support\Facades\DB;

if (!defined('IN_MANAGER_MODE') || IN_MANAGER_MODE !== true) {
    die('<b>INCLUDE_ORDERING_ERROR</b><br /><br />Please use the EVO Content Manager instead of accessing this file directly.');
}

if (!evo()->hasPermission('save_document')) {
    evo()->webAlertAndQuit(__('global.error_no_privileges'));
}

// preprocess POST values
$id = is_numeric($_POST['id']) ? $_POST['id'] : '';

$introtext = $_POST['introtext'];
$content = $_POST['ta'];
$pagetitle = $_POST['pagetitle'];
$description = $_POST['description'];
$alias = $_POST['alias'];
$link_attributes = $_POST['link_attributes'];
$isfolder = (int) $_POST['isfolder'];
$richtext = (int) $_POST['richtext'];
$published = (int) $_POST['published'];
$parentId = $parent = (int) get_by_key($_POST, 'parent', 0, 'is_scalar');
$template = (int) $_POST['template'];
$menuindex = !empty($_POST['menuindex']) ? (int) $_POST['menuindex'] : 0;
$searchable = (int) $_POST['searchable'];
$cacheable = (int) $_POST['cacheable'];
$syncsite = (int) $_POST['syncsite'];
$pub_date = $_POST['pub_date'];
$unpub_date = $_POST['unpub_date'];
$document_groups = (isset($_POST['chkalldocs']) && $_POST['chkalldocs'] == 'on')
    ? []
    : get_by_key(
        $_POST,
        'docgroups',
        [],
        'is_array'
    );
$type = $_POST['type'];
$contentType = $_POST['contentType'];
$contentdispo = (int) $_POST['content_dispo'];
$longtitle = $_POST['longtitle'];
$hide_from_tree = (int) $_POST['hide_from_tree'];
$menutitle = $_POST['menutitle'];
$hidemenu = (int) $_POST['hidemenu'];
$aliasvisible = (int) $_POST['alias_visible'];

/************* webber ********/
$sd = isset($_POST['dir']) && strtolower($_POST['dir']) === 'asc' ? '&dir=ASC' : '&dir=DESC';
$sb = isset($_POST['sort']) ? '&sort=' . e($_POST['sort']) : '&sort=pub_date';
$pg = isset($_POST['page']) ? '&page=' . (int) $_POST['page'] : '';
$add_path = $sd . $sb . $pg;

$no_esc_pagetitle = $_POST['pagetitle'];
if (trim($no_esc_pagetitle) == '') {
    if ($type == 'reference') {
        $no_esc_pagetitle = $pagetitle = __('global.untitled_weblink');
    } else {
        $no_esc_pagetitle = $pagetitle = __('global.untitled_resource');
    }
}

$actionToTake = 'new';
if ($_POST['mode'] == '73' || $_POST['mode'] == '27') {
    $actionToTake = 'edit';
}

// friendly url alias checks
if (evo()->getConfig('friendly_urls')) {
    // auto assign alias
    if (!$alias && evo()->getConfig('automatic_alias')) {
        $alias = strtolower(evo()->stripAlias(trim($pagetitle)));
        if (!evo()->getConfig('allow_duplicate_alias')) {
            if (SiteContent::withTrashed()
                    ->where('id', '<>', $id)
                    ->where('alias', $alias)->count() > 0
            ) {
                $cnt = 1;
                $tempAlias = $alias;

                while (SiteContent::withTrashed()
                        ->where('id', '<>', $id)
                        ->where('alias', $tempAlias)->count() > 0) {
                    $tempAlias = $alias;
                    $tempAlias .= $cnt;
                    $cnt++;
                }
                $alias = $tempAlias;
            }
        } else {
            if (SiteContent::withTrashed()
                    ->where('id', '<>', $id)
                    ->where('alias', $alias)
                    ->where('parent', $parent)->count() > 0
            ) {
                $cnt = 1;
                $tempAlias = $alias;
                while (SiteContent::withTrashed()
                        ->where('id', '<>', $id)
                        ->where('alias', $tempAlias)
                        ->where('parent', $parent)->count() > 0) {
                    $tempAlias = $alias;
                    $tempAlias .= $cnt;
                    $cnt++;
                }
                $alias = $tempAlias;
            }
        }
    } elseif ($alias && !evo()->getConfig('allow_duplicate_alias')) {
        // check for duplicate alias name if not allowed
        $alias = evo()->stripAlias($alias);

        /** @var SiteContent $docid */
        $docid = SiteContent::withTrashed()
            ->select('id')
            ->where('id', '<>', $id)
            ->where('alias', $alias)
            ->when(
                evo()->getConfig('use_alias_path'),
                fn($q) => $q->where('parent', $parent)
            )
            ->first();

        if (!is_null($docid)) {
            if ($actionToTake == 'edit') {
                evo()->getManagerApi()->saveFormValues(27);
                evo()->webAlertAndQuit(
                    sprintf(__('global.duplicate_alias_found'), $docid->id, $alias),
                    'index.php?a=27&id=' . $id
                );
            } else {
                evo()->getManagerApi()->saveFormValues(4);
                evo()->webAlertAndQuit(
                    sprintf(__('global.duplicate_alias_found'), $docid->id, $alias),
                    'index.php?a=4'
                );
            }
        }
    } elseif ($alias) {
        // strip alias of special characters
        $alias = evo()->stripAlias($alias);

        /** @var SiteContent $docid */
        $docid = SiteContent::withTrashed()->select('id')
            ->where('id', '<>', $id)
            ->where('alias', $alias)
            ->where('parent', $parent)
            ->first();

        if (!is_null($docid)) {
            if ($actionToTake == 'edit') {
                evo()->getManagerApi()->saveFormValues(27);
                evo()->webAlertAndQuit(
                    sprintf(__('global.duplicate_alias_found'), $docid->id, $alias),
                    'index.php?a=27&id=' . $id
                );
            } else {
                evo()->getManagerApi()->saveFormValues(4);
                evo()->webAlertAndQuit(
                    sprintf(__('global.duplicate_alias_found'), $docid->id, $alias),
                    'index.php?a=4'
                );
            }
        }
    }
} elseif ($alias) {
    $alias = evo()->stripAlias($alias);
}

// determine published status
$currentdate = evo()->timestamp((int) get_by_key($_SERVER, 'REQUEST_TIME', 0));

if (empty($pub_date)) {
    $pub_date = 0;
} else {
    $pub_date = evo()->toTimeStamp($pub_date);

    if ($pub_date < $currentdate) {
        $published = 1;
    } elseif ($pub_date > $currentdate) {
        $published = 0;
    }
}

if (empty($unpub_date)) {
    $unpub_date = 0;
} else {
    $unpub_date = evo()->toTimeStamp($unpub_date);
    if ($unpub_date < $currentdate) {
        $published = 0;
    }
}

// get document groups for current user
$tmplvars = [];
$docgrp = array_unique(
    MemberGroup::query()
        ->join('membergroup_access', 'membergroup_access.membergroup', '=', 'member_groups.user_group')
        ->where('member_groups.member', evo()->getLoginUserID('mgr'))
        ->pluck('documentgroup')
        ->toArray()
);

// ensure that user has not made this document inaccessible to themselves
if ($_SESSION['mgrRole'] != 1 && is_array($document_groups)) {
    $document_group_list = implode(',', $document_groups);
    $document_group_list = array_filter(explode(',', $document_group_list), 'is_numeric');
    if (!empty($document_group_list)) {
        $count = MembergroupAccess::query()
            ->join('member_groups', 'membergroup_access.membergroup', '=', 'member_groups.user_group')
            ->whereIn('membergroup_access.documentgroup', $document_group_list)
            ->where('member_groups.member', $_SESSION['mgrInternalKey'])->count('member_groups.id');

        if ($count == 0) {
            if ($actionToTake == 'edit') {
                evo()->getManagerApi()->saveFormValues(27);
                evo()->webAlertAndQuit(
                    __('global.resource_permissions_error'),
                    "index.php?a=27&id=$id"
                );
            } else {
                evo()->getManagerApi()->saveFormValues(4);
                evo()->webAlertAndQuit(__('global.resource_permissions_error'), "index.php?a=4");
            }
        }
    }
}

$tvs = SiteTmplvar::query()->distinct()
    ->select('site_tmplvars.*', 'site_tmplvar_contentvalues.value')
    ->join('site_tmplvar_templates', 'site_tmplvar_templates.tmplvarid', '=', 'site_tmplvars.id')
    ->leftJoin('site_tmplvar_contentvalues', function ($join) use ($id) {
        $join->on('site_tmplvar_contentvalues.tmplvarid', '=', 'site_tmplvars.id');
        $join->on('site_tmplvar_contentvalues.contentid', '=', DB::raw($id));
    })->leftjoin('site_tmplvar_access', 'site_tmplvar_access.tmplvarid', '=', 'site_tmplvars.id')
    ->where('site_tmplvar_templates.templateid', $template)->orderBy('site_tmplvars.rank');
if ($_SESSION['mgrRole'] != 1) {
    $tvs = $tvs->leftJoin('document_groups', 'site_tmplvar_contentvalues.contentid', '=', 'document_groups.document');
    $tvs = $tvs->where(function ($query) {
        $query->whereNull('site_tmplvar_access.documentgroup')
            ->orWhereIn('document_groups.document_group', $_SESSION['mgrDocgroups']);
    });
}
$tvs = $tvs->get();
foreach ($tvs->toArray() as $row) {
    $tmplvar = '';
    switch ($row['type']) {
        case 'url':
            if (isset($_POST['tv' . $row['id']])) {
                $tmplvar = $_POST['tv' . $row['id']];
                if (isset($_POST['tv' . $row['id'] . '_prefix']) && $_POST['tv' . $row['id'] . '_prefix'] != '--') {
                    $tmplvar = str_replace([
                        'feed://',
                        'ftp://',
                        'http://',
                        'https://',
                        'mailto:',
                    ], '', $tmplvar);
                    $tmplvar = $_POST['tv' . $row['id'] . '_prefix'] . $tmplvar;
                }
            }
            break;
        case 'file':
            $tmplvar = $_POST['tv' . $row['id']] ?? '';
            break;
        default:
            $tmp = get_by_key($_POST, 'tv' . $row['id']);
            if (is_array($tmp)) {
                // handles checkboxes & multiple selects elements
                $feature_insert = [];
                foreach ($tmp as $featureValue => $feature_item) {
                    $feature_insert[] = $feature_item;
                }
                $tmplvar = implode('||', $feature_insert);
            } else {
                $tmplvar = $tmp;
            }
            break;
    }
    // save value if it was modified
    if ($tmplvar !== '' && $tmplvar !== $row['default_text']) {
        $tmplvars[$row['id']] = [
            $row['id'],
            $tmplvar,
        ];
    } else {
        // Mark the variable for deletion
        $tmplvars[$row['name']] = $row['id'];
    }
}

$existingDocument = null;

// get the document, but only if it already exists
if ($actionToTake != 'new') {
    $existingDocument = SiteContent::withTrashed()->find($id);
    if (is_null($existingDocument)) {
        evo()->webAlertAndQuit(__('global.error_no_results'));
    }
    $existingDocument = $existingDocument->toArray();
}

// check to see if the user is allowed to save the document in the place he wants to save it in
if (!isset($existingDocument) || $existingDocument['parent'] != $parent) {
    $udperms = new Permissions();
    $udperms->user = evo()->getLoginUserID('mgr');
    $udperms->document = $parent;
    $udperms->role = $_SESSION['mgrRole'];

    if (!$udperms->checkPermissions()) {
        if ($actionToTake == 'edit') {
            evo()->getManagerApi()->saveFormValues(27);
            evo()->webAlertAndQuit(
                __('global.access_permission_parent_denied'),
                "index.php?a=27&id=$id"
            );
        } else {
            evo()->getManagerApi()->saveFormValues(4);
            evo()->webAlertAndQuit(__('global.access_permission_parent_denied'), 'index.php?a=4');
        }
    }
}

$resourceArray = [
    'introtext'       => $introtext,
    'content'         => $content,
    'pagetitle'       => $pagetitle,
    'longtitle'       => $longtitle,
    'type'            => $type,
    'description'     => $description,
    'alias'           => $alias,
    'link_attributes' => $link_attributes,
    'isfolder'        => $isfolder,
    'richtext'        => $richtext,
    'published'       => $published,
    'parent'          => $parent,
    'template'        => $template,
    'menuindex'       => $menuindex,
    'searchable'      => $searchable,
    'cacheable'       => $cacheable,
    'pub_date'        => $pub_date,
    'unpub_date'      => $unpub_date,
    'contentType'     => $contentType,
    'content_dispo'   => $contentdispo,
    'hide_from_tree'  => $hide_from_tree,
    'menutitle'       => $menutitle,
    'hidemenu'        => $hidemenu,
    'alias_visible'   => $aliasvisible,
];

switch ($actionToTake) {
    case 'new':
        // invoke OnBeforeDocFormSave event
        $id = '';

        evo()->invokeEvent('OnBeforeDocFormSave', [
            'mode' => 'new',
            'id'   => $id,
            'doc'  => &$resourceArray,
        ]);

        $parentDeleted = $parentId > 0 && empty(SiteContent::query()->find($parentId));
        if ($parentDeleted) {
            $resourceArray['deleted'] = 1;
        }
        // deny publishing if not permitted
        if (!evo()->hasPermission('publish_document')) {
            $pub_date = 0;
            $unpub_date = 0;
            $published = 0;
        }

        $publishedon = ($published ? $currentdate : 0);
        $publishedby = ($published ? evo()->getLoginUserID('mgr') : 0);

        if ((!empty($pub_date)) && ($published)) {
            $publishedon = $pub_date;
        }

        $resourceArray['pub_date'] = $pub_date;
        $resourceArray['publishedon'] = $publishedon;
        $resourceArray['publishedby'] = $publishedby;
        $resourceArray['unpub_date'] = $unpub_date;

        if ($id != '') {
            $resourceArray['id'] = $id;
        }

        $key = SiteContent::withTrashed()->create($resourceArray)->getKey();

        $tvChanges = [];
        foreach ($tmplvars as $field => $value) {
            if (is_array($value)) {
                $tvId = $value[0];
                $tvVal = $value[1];
                SiteTmplvarContentvalue::query()->create(
                    ['tmplvarid' => $tvId, 'contentid' => $key, 'value' => $tvVal]
                );
            }
        }

        // document access permissions
        if ($parent != 0) {
            $groupsParent = DocumentGroup::query()->select('document_group', 'document')
                ->where('document', $parent)->pluck('document_group')->toArray();
        } else {
            $groupsParent = [];
        }
        if (evo()->hasAnyPermissions(['manage_groups', 'manage_document_permissions']) && is_array($document_groups)
        ) {
            $new_groups = [];
            $groupsToInsert = [];
            foreach ($document_groups as $value_pair) {
                // first, split the pair (this is a new document, so ignore the second value
                [$group] =
                    explode(',', $value_pair); // @see actions/mutate_content.dynamic.php @ line 1138 (permissions list)
                $group = (int) $group;
                if (evo()->hasPermission('manage_groups')) {
                    $new_groups[] = ['document_group' => $group, 'document' => $key];
                    $groupsToInsert[] = $group;
                    continue;
                }
                if (evo()->hasPermission('manage_document_permissions')) {
                    if (in_array($group, $docgrp)) {
                        $new_groups[] = ['document_group' => $group, 'document' => $key];
                        $groupsToInsert[] = $group;
                    }
                }
            }
            if (evo()->hasPermission('manage_document_permissions')) {
                foreach ($groupsParent as $group) {
                    if (!in_array($group, $docgrp)) {
                        $new_groups[] = ['document_group' => $group, 'document' => $key];
                        $groupsToInsert[] = $group;
                    }
                }
            }
            if (!evo()->hasPermission('manage_groups')) {
                if (!array_intersect($groupsToInsert, $docgrp)) {
                    foreach ($groupsParent as $group) {
                        $new_groups[] = ['document_group' => $group, 'document' => $key];
                    }
                }
            }
            if (!empty($new_groups)) {
                DocumentGroup::query()->insertOrIgnore($new_groups);
            }
        } else {
            if (!(evo()->hasAnyPermissions(['manage_groups', 'manage_document_permissions']))) {
                // inherit document access permissions
                foreach ($groupsParent as $group) {
                    DocumentGroup::query()->insert(['document_group' => $group, 'document' => $key]);
                }
            }
        }

        // update parent folder status
        if ($resourceArray['parent'] != 0) {
            $fields = ['isfolder' => 1];
            SiteContent::withTrashed()->where('id', $resourceArray['parent'])->update(
                ['isfolder' => 1]
            );
        }

        // invoke OnDocFormSave event
        evo()->invokeEvent('OnDocFormSave', [
            'mode' => 'new',
            'id'   => $key,
            'doc'  => $resourceArray,
        ]);

        // secure web documents - flag as private
        include MODX_MANAGER_PATH . 'includes/secure_web_documents.inc.php';
        secureWebDocument($key);
        secureMgrDocument($key);

        // Set the item name for logger
        $_SESSION['itemname'] = $no_esc_pagetitle;

        if ($syncsite == 1) {
            // empty cache
            evo()->clearCache('full');
        }

        // redirect/stay options
        if ($_POST['stay'] != '') {
            $a = '';

            // weblink
            if ($_POST['mode'] == '72') {
                $a = ($_POST['stay'] == '2') ? '27&id=' . $key : '72&pid=' . $parentId;
            }

            // document
            if ($_POST['mode'] == '4') {
                $a = ($_POST['stay'] == '2') ? '27&id=' . $key : '4&pid=' . $parentId;
            }

            $header = 'Location: index.php?a=' . $a . '&r=1&stay=' . $_POST['stay'];
        } else {
            $header = 'Location: index.php?a=3&id=' . $key . '&r=1';
        }

        if (headers_sent()) {
            $header = str_replace('Location: ', '', $header);
            echo "<script>document.location.href='$header';</script>\n";
        } else {
            header($header);
        }

        break;
    case 'edit':
        // get the document's current parent
        $oldparent = $existingDocument['parent'];
        $doctype = $existingDocument['type'];

        if ($id == evo()->getConfig('site_start') && $published == 0) {
            evo()->getManagerApi()->saveFormValues(27);
            evo()->webAlertAndQuit('Document is linked to site_start variable and cannot be unpublished!');
        }
        $today = evo()->timestamp();
        if ($id == evo()->getConfig('site_start') && ($pub_date > $today || $unpub_date != "0")) {
            evo()->getManagerApi()->saveFormValues(27);
            evo()->webAlertAndQuit(
                'Document is linked to site_start variable and cannot have publish or unpublish dates set!'
            );
        }
        if ($parent == $id) {
            evo()->getManagerApi()->saveFormValues(27);
            evo()->webAlertAndQuit('Document can not be it\'s own parent!');
        }

        $parents = evo()->getParentIds($parent);
        if (in_array($id, $parents)) {
            evo()->webAlertAndQuit('Document descendant can not be it\'s parent!');
        }

        // check to see document is a folder
        $child = SiteContent::withTrashed()->select('id')->where('parent', $id)->first();
        if (!is_null($child)) {
            $resourceArray['isfolder'] = 1;
        }

        // set publishedon and publishedby
        $was_published = $existingDocument['published'];

        // keep original publish state, if change is not permitted
        if (!evo()->hasPermission('publish_document')) {
            $published = $was_published;
            $pub_date = 'pub_date';
            $unpub_date = 'unpub_date';
        }

        // if it was changed from unpublished to published
        if (!$was_published && $published) {
            $publishedon = $currentdate;
            $publishedby = evo()->getLoginUserID('mgr');
        } elseif ((!empty($pub_date) && $pub_date <= $currentdate && $published)) {
            $publishedon = $pub_date;
            $publishedby = evo()->getLoginUserID('mgr');
        } elseif ($was_published && !$published) {
            $publishedon = 0;
            $publishedby = 0;
        } else {
            $publishedon = $existingDocument['publishedon'];
            $publishedby = $existingDocument['publishedby'];
        }

        $resourceArray['pub_date'] = $pub_date;
        $resourceArray['publishedon'] = $publishedon;
        $resourceArray['publishedby'] = $publishedby;

        // invoke OnBeforeDocFormSave event
        evo()->invokeEvent('OnBeforeDocFormSave', [
            'mode' => 'upd',
            'id'   => $id,
            'doc'  => &$resourceArray,
        ]);
        $parentDeleted = $parentId > 0 && empty(SiteContent::query()->find($parentId));
        if ($parentDeleted) {
            $resourceArray['deleted'] = 1;
        }
        $resource = SiteContent::withTrashed()->find($id);
        foreach ($resourceArray as $key => $value) {
            $resource->{$key} = $value;
        }
        $resource->save();

        // update template variables
        $tvs = SiteTmplvarContentvalue::query()->select('id', 'tmplvarid')->where('contentid', $id)->get();
        $tvIds = [];
        foreach ($tvs as $tv) {
            $tvIds[$tv->tmplvarid] = $tv->id;
        }
        $tvDeletions = [];
        $tvChanges = [];
        $tvAdded = [];

        foreach ($tmplvars as $field => $value) {
            if (!is_array($value)) {
                if (isset($tvIds[$value])) {
                    $tvDeletions[] = $tvIds[$value];
                }
            } else {
                $tvId = $value[0];
                $tvVal = $value[1];
                if (isset($tvIds[$tvId])) {
                    SiteTmplvarContentvalue::query()->find($tvIds[$tvId])->update(
                        ['tmplvarid' => $tvId, 'contentid' => $id, 'value' => $tvVal]
                    );
                } else {
                    SiteTmplvarContentvalue::query()->create(
                        ['tmplvarid' => $tvId, 'contentid' => $id, 'value' => $tvVal]
                    );
                }
            }
        }

        if (!empty($tvDeletions)) {
            SiteTmplvarContentvalue::query()->whereIn('id', $tvDeletions)->delete();
        }

        // set document permissions
        if (evo()->hasAnyPermissions(['manage_groups', 'manage_document_permissions']) && is_array($document_groups)
        ) {
            $new_groups = [];
            // process the new input
            foreach ($document_groups as $value_pair) {
                [$group, $link_id] =
                    explode(',', $value_pair); // @see actions/mutate_content.dynamic.php @ line 1138 (permissions list)
                if (in_array($group, $docgrp) || evo()->hasPermission('manage_groups')) {
                    $new_groups[$group] = $link_id;
                }
            }

            // grab the current set of permissions on this document the user can access
            $documentGroups = DocumentGroup::query()->select('id', 'document_group')
                ->where('document', $id)->get();

            $old_groups = [];
            foreach ($documentGroups as $documentGroup) {
                if (in_array($documentGroup->document_group, $docgrp) || evo()->hasPermission('manage_groups')) {
                    $old_groups[$documentGroup->document_group] = $documentGroup->id;
                }
            }
            // update the permissions in the database
            $insertions = $deletions = [];
            foreach ($new_groups as $group => $link_id) {
                if (in_array($group, $docgrp) || evo()->hasPermission('manage_groups')) {
                    if (array_key_exists($group, $old_groups)) {
                        unset($old_groups[$group]);
                    } elseif ($link_id == 'new') {
                        $insertions[] = ['document_group' => (int) $group, 'document' => $id];
                    }
                }
            }
            if (!empty($insertions)) {
                DocumentGroup::query()->insert($insertions);
            }
            if (!evo()->hasPermission('manage_groups')) {
                $remainingGroups = DocumentGroup::query()->select('document_groups.document_group')
                    ->whereNotIn('id', $old_groups)
                    ->where('document_groups.document', $id)
                    ->pluck('document_group')
                    ->toArray();
                if (!empty($docgrp) && !array_intersect($docgrp, $remainingGroups)) {
                    evo()->webAlertAndQuit(
                        __('global.resource_permissions_error'),
                        'index.php?a=27&id=' . $id
                    );
                }
            }
            if (!empty($old_groups)) {
                DocumentGroup::query()->whereIn('id', $old_groups)->delete();
            }
            // necessary to remove all permissions as document is public
            if ((isset($_POST['chkalldocs']) && $_POST['chkalldocs'] == 'on')) {
                DocumentGroup::query()->where('document', $id)->delete();
            }
        }

        // do the parent stuff
        if ($resourceArray['parent'] != 0) {
            SiteContent::withTrashed()->find($_REQUEST['parent'])->update(['isfolder' => 1]);
        }

        // finished moving the document, now check to see if the old_parent should no longer be a folder
        $countChildOldParent = SiteContent::withTrashed()->where('parent', $oldparent)->count();

        if ($countChildOldParent == 0) {
            SiteContent::withTrashed()->find($oldparent)->update(['isfolder' => 0]);
        }

        // invoke OnDocFormSave event
        evo()->invokeEvent('OnDocFormSave', [
            'mode' => 'upd',
            'id'   => $id,
            'doc'  => $resourceArray,
        ]);

        // secure web documents - flag as private
        include MODX_MANAGER_PATH . 'includes/secure_web_documents.inc.php';
        secureWebDocument($id);
        secureMgrDocument($id);

        // Set the item name for logger
        $_SESSION['itemname'] = $no_esc_pagetitle;

        if ($syncsite == 1) {
            // empty cache
            evo()->clearCache('full');
        }

        if ($_POST['refresh_preview'] == '1') {
            $header = 'Location: ' . MODX_SITE_URL . 'index.php?id=' . $id . '&z=manprev';
        } else {
            if ($_POST['stay'] != '2' && $id > 0) {
                evo()->unlockElement(7, $id);
            }
            if ($_POST['stay'] != '') {
                $id = $_REQUEST['id'];
                if ($type == 'reference') {
                    // weblink
                    $a = ($_POST['stay'] == '2') ? '27&id=' . $id : '72&pid=' . $parentId;
                } else {
                    // document
                    $a = ($_POST['stay'] == '2') ? '27&id=' . $id : '4&pid=' . $parentId;
                }
                $header = 'Location: index.php?a=' . $a . '&r=1&stay=' . $_POST['stay'] . $add_path;
            } else {
                $header = 'Location: index.php?a=3&id=' . $id . '&r=1' . $add_path;
            }
        }
        if (headers_sent()) {
            $header = str_replace('Location: ', '', $header);
            echo "<script>document.location.href='$header';</script>\n";
        } else {
            header($header);
        }
        break;
    default:
        evo()->webAlertAndQuit('No operation set in request.');
}
