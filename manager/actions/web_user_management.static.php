<?php
if (!defined('IN_MANAGER_MODE') || IN_MANAGER_MODE !== true) {
    die("<b>INCLUDE_ORDERING_ERROR</b><br /><br />Please use the EVO Content Manager instead of accessing this file directly.");
}
if (!$modx->hasPermission('edit_user')) {
    $modx->webAlertAndQuit($_lang["error_no_privileges"]);
}

// initialize page view state - the $_PAGE object
$modx->getManagerApi()->initPageViewState();

$op = isset($_REQUEST['op']) ? $_REQUEST['op'] : '';

// get and save search string
if ($op == 'reset') {
    $query = '';
    $query_role = 0;
    $_PAGE['vs']['search'] = '';
    $_PAGE['vs']['role'] = '';
} else {
    $query = isset($_REQUEST['search']) ? $_REQUEST['search'] : (isset($_PAGE['vs']['search']) ? $_PAGE['vs']['search'] : '');
    $query_role = isset($_REQUEST['role']) ? $_REQUEST['role'] : (isset($_PAGE['vs']['role']) ? $_PAGE['vs']['role'] : '');
    $_PAGE['vs']['search'] = $query;
    $_PAGE['vs']['role'] = $query_role;
}


// get & save listmode
$listmode = isset($_REQUEST['listmode']) ? $_REQUEST['listmode'] : (isset($_PAGE['vs']['lm']) ? $_PAGE['vs']['lm'] : '');
$_PAGE['vs']['lm'] = $listmode;


// context menu
$cm = new \EvolutionCMS\Support\ContextMenu("cntxm", 150);
$cm->addItem($_lang["edit"], "js:menuAction(1)", $_style["icon_edit"], (!$modx->hasPermission('edit_user') ? 1 : 0));
$cm->addItem($_lang["delete"], "js:menuAction(2)", $_style["icon_trash"], (!$modx->hasPermission('delete_user') ? 1 : 0));
echo $cm->render();

// roles
$role_options = '';
$roles = \EvolutionCMS\Models\UserRole::query()->select('id', 'name')->get()->toArray();
foreach ($roles as $row) {
    $role_options .= '<option value="'.$row['id'].'" '.($row['id'] == $query_role ? 'selected' : '').'>'.$row['name'].'</option>';
}


// prepare data
$managerUsers = \EvolutionCMS\Models\User::query()
    ->select('users.id', 'users.username', 'user_attributes.fullname', 'user_attributes.email', 'user_attributes.blocked', 'user_attributes.thislogin', 'user_attributes.logincount', 'user_attributes.blockeduntil', 'user_attributes.blockedafter')
    ->join('user_attributes', 'user_attributes.internalKey', '=', 'users.id')
    ->join('user_roles', 'user_roles.id', '=', 'user_attributes.role')
    ->orderBy('users.username', 'ASC');
$where = "";

if (!empty($query)) {
    $managerUsers = $managerUsers->where(function ($q) use ($query) {
        $q->where('users.username', 'LIKE', $query.'%')
            ->orWhere('user_attributes.fullname', 'LIKE', '%'.$query.'%')
            ->orWhere('user_attributes.email', 'LIKE', '%'.$query.'%');
    });
}
if (!empty($query_role)) {
    $managerUsers = $managerUsers->where(function ($q) use ($query_role) {
        $q->where('user_attributes.role', '=', $query_role);
    });
}

// NEW
$maxpageSize = $modx->getConfig('number_of_results');
define('MAX_DISPLAY_RECORDS_NUM', $maxpageSize);

$numRecords = $managerUsers->count();

$pg = isset($_REQUEST['page']) ? (int)$_REQUEST['page'] - 1 : 0;

if ($numRecords > 0) {
    $managerUsers = $managerUsers->offset($pg * $maxpageSize)->limit($maxpageSize);

    $resource = $managerUsers->get()->toArray();

    // CSS style for table
    // $tableClass = 'grid';
    // $rowHeaderClass = 'gridHeader';
    // $rowRegularClass = 'gridItem';
    // $rowAlternateClass = 'gridAltItem';
    $tableClass = 'table data nowrap';
    $columnHeaderClass = [
        'center',
        '',
        '',
        '',
        'right" nowrap="nowrap,right,center',
    ];
    $table = new \EvolutionCMS\Support\MakeTable();
    $table->setTableClass($tableClass);
    $table->setColumnHeaderClass($columnHeaderClass);
    // $modx->getMakeTable()->setRowHeaderClass($rowHeaderClass);
    // $modx->getMakeTable()->setRowRegularClass($rowRegularClass);
    // $modx->getMakeTable()->setRowAlternateClass($rowAlternateClass);

    // Table header
    $listTableHeader = [
        'icon' => ManagerTheme::getLexicon('icon'),
        'name' => ManagerTheme::getLexicon('name'),
        'user_full_name' => ManagerTheme::getLexicon('user_full_name'),
        'email' => ManagerTheme::getLexicon('email'),
        'user_prevlogin' => ManagerTheme::getLexicon('user_prevlogin'),
        'user_logincount' => ManagerTheme::getLexicon('user_logincount'),
        'user_block' => ManagerTheme::getLexicon('user_block'),
    ];
    $tbWidth = [ '1%', '', '', '', '1%', '1%', '1%' ];
    $table->setColumnWidths($tbWidth);

    $listDocs = [];
    foreach ($resource as $k => $el) {
        $listDocs[] = [
            'icon' => '<a class="gridRowIcon" href="javascript:;" onclick="return showContentMenu(' . $el['id'] . ',event);" title="' . $_lang["click_to_context"] . '"><i class="' . $_style["icon_web_user"] . '"></i></a>',
            'name' => '<a href="index.php?a=88&id=' . $el['id'] . ' title="' . $_lang["click_to_edit_title"] . '">' . $el['username'] . '</a>',
            'user_full_name' => $el['fullname'],
            'email' => $el['email'],
            'user_prevlogin' => $el['thislogin'] ? $modx->toDateFormat($el['thislogin']) : '-',
            'user_logincount' => $el['logincount'],
            'user_block' => $el['blockeduntil'] ? $modx->toDateFormat($el['blockeduntil']) : '-',
        ];
    }

    $table->createPagingNavigation($numRecords, 'a=99');
    $output = $table->create($listDocs, $listTableHeader, 'index.php?a=99');
} else {
    // No Child documents
    $output = '<div class="container"><p>' . ManagerTheme::getLexicon('resources_in_container_no') . '</p></div>';
}
?>
<script language="JavaScript" type="text/javascript">
	function searchResource() {
		document.resource.op.value = "srch";
		document.resource.submit();
	};

	function resetSearch() {
		document.resource.search.value = '';
		document.resource.op.value = "reset";
		document.resource.submit();
	};

	function changeListMode() {
		var m = parseInt(document.resource.listmode.value) ? 1 : 0;
		if(m) document.resource.listmode.value = 0;
		else document.resource.listmode.value = 1;
		document.resource.submit();
	};

	var selectedItem;
	var contextm = <?= $cm->getClientScriptObject() ?>;

	function showContentMenu(id, e) {
		selectedItem = id;
		contextm.style.left = (e.pageX || (e.clientX + (document.documentElement.scrollLeft || document.body.scrollLeft))) + "px";
		contextm.style.top = (e.pageY || (e.clientY + (document.documentElement.scrollTop || document.body.scrollTop))) + "px";
		contextm.style.visibility = "visible";
		e.cancelBubble = true;
		return false;
	};

	function menuAction(a) {
		var id = selectedItem;
		switch(a) {
			case 1:		// edit
				window.location.href = 'index.php?a=88&id=' + id;
				break;
			case 2:		// delete
				if(confirm("<?= $_lang['confirm_delete_user'] ?>") === true) {
					window.location.href = 'index.php?a=90&id=' + id;
				}
				break;
		}
	}

	document.addEventListener('click', function() {
		contextm.style.visibility = "hidden";
	});

	document.addEventListener('DOMContentLoaded', function() {
		var h1help = document.querySelector('h1 > .help');
		h1help.onclick = function() {
			document.querySelector('.element-edit-message').classList.toggle('show')
		}
	});

</script>
<form name="resource" method="post">
    <input type="hidden" name="listmode" value="<?= $listmode ?>" />
    <input type="hidden" name="op" value="" />

    <h1>
        <i class="<?= $_style['icon_web_user'] ?>"></i><?= $_lang['web_user_management_title'] ?> <i class="<?= $_style['icon_question_circle'] ?> help"></i>
    </h1>

    <div class="container element-edit-message">
        <div class="alert alert-info"><?= $_lang['web_user_management_msg'] ?></div>
    </div>

    <div class="tab-page">
        <div class="container container-body">
            <div class="row searchbar form-group">
                <div class="col-sm-6 input-group">
                    <div class="input-group-btn">
                        <a class="btn btn-success btn-sm" href="index.php?a=87"><i class="<?= $_style['icon_add'] ?>"></i> <?= $_lang['new_web_user'] ?></a>
                    </div>
                </div>
                <div class="col-sm-6 ">
                    <div class="input-group float-right w-auto">
                        <select class="form-control form-control-sm" name="role">
                            <option value=""><?= $_lang['web_user_management_select_role'] ?></option>
                            <?= $role_options ?>
                        </select>
                        <input class="form-control form-control-sm" name="search" type="text" value="<?= $query ?>" placeholder="<?= $_lang["search"] ?>" />
                        <div class="input-group-append">
                            <a class="btn btn-secondary btn-sm" href="javascript:;" title="<?= $_lang["search"] ?>" onclick="searchResource();return false;"><i class="<?= $_style['icon_search'] ?>"></i></a>
                            <a class="btn btn-secondary btn-sm" href="javascript:;" title="<?= $_lang["reset"] ?>" onclick="resetSearch();return false;"><i class="<?= $_style['icon_refresh'] ?>"></i></a>
                            <a class="btn btn-secondary btn-sm" href="javascript:;" title="<?= $_lang["list_mode"] ?>" onclick="changeListMode();return false;"><i class="<?= $_style['icon_table'] ?>"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group clearfix">
                <?php if ($numRecords > 0) : ?>
                    <div class="float-xs-left">
                        <span class="publishedDoc"><?php echo $numRecords . ' ' . ManagerTheme::getLexicon('resources_in_container') ?></span>
                    </div>
                <?php endif; ?>
            </div>
            <div class="row">
                <div class="table-responsive">
                <?php echo $output; ?>
                </div>
            </div>
        </div>
    </div>
</form>
