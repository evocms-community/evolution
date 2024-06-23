<?php

use EvolutionCMS\Facades\ManagerTheme;
use EvolutionCMS\Models\SiteContent;
use EvolutionCMS\Models\SiteHtmlsnippet;
use EvolutionCMS\Models\SitePlugin;
use EvolutionCMS\Models\SiteSnippet;
use EvolutionCMS\Models\SiteTemplate;
use EvolutionCMS\Models\SiteTmplvar;

if (!defined('IN_MANAGER_MODE') || IN_MANAGER_MODE !== true) {
    die('<b>INCLUDE_ORDERING_ERROR</b><br /><br />Please use the EVO Content Manager instead of accessing this file directly.');
}
if (!evo()->hasPermission('edit_module')) {
    evo()->webAlertAndQuit(__('global.error_no_privileges'));
}

$mxla = ManagerTheme::getLang();

/**
 * Resource Selector
 * Created by Raymond Irving May, 2005
 *
 * Selects a resource and returns the id values to the window.opener['callback']() function as an array.
 * The name of the callback function is passed via the url as &cb
 */

$id = $_REQUEST['id'] ?? '';

// get name of callback function
$cb = $_REQUEST['cb'];

// get resource type
$rt = strtolower($_REQUEST['rt']);

// get selection method: s - single (default), m - multiple
$sm = strtolower($_REQUEST['sm']);

// get search string
$query = $_REQUEST['search'] ?? '';

$listmode = $_REQUEST['listmode'] ?? '';

$title = '';
$ds = null;

// select SQL
switch ($rt) {
    case 'snip':
        $title = __('global.snippet');
        $ds = SiteSnippet::query()->select('id', 'name', 'description')->orderBy('name');
        if (isset($query) && $query != '') {
            $ds = $ds->where(function ($q) use ($query) {
                $q->where('name', 'LIKE', '%' . $query . '%')
                    ->orWhere('description', 'LIKE', '%' . $query . '%');
            });
        }
        break;

    case 'tpl':
        $title = __('global.template');
        $ds = SiteTemplate::query()->select('id', 'templatename', 'description')->orderBy(
            'templatename'
        );
        break;

    case('tv'):
        $title = __('global.tv');
        $ds = SiteTmplvar::query()->select('id', 'name', 'description')->orderBy('name');
        break;

    case('chunk'):
        $title = __('global.chunk');
        $ds = SiteHtmlsnippet::query()->select('id', 'name', 'description')->orderBy('name');
        break;

    case('plug'):
        $title = __('global.plugin');
        $ds = SitePlugin::query()->select('id', 'name', 'description')->orderBy('name');
        break;

    case('doc'):
        $title = __('global.resource');
        $ds = SiteContent::query()->select('id', 'pagetitle as name', 'longtitle as description')
            ->orderBy('name');
        break;
}

if (isset($query) && $query != '') {
    $ds = $ds->where(function ($q) use ($query, $rt) {
        $q->where($rt == 'tpl' ? 'templatename' : 'name', 'LIKE', '%' . $query . '%')
            ->orWhere('description', 'LIKE', '%' . $query . '%');
    });
}
include_once MODX_MANAGER_PATH . 'includes/header.inc.php';
?>
<script>
  function saveSelection () {
    var ids = []
    var ctrl = document.selector['id[]']
    if (!ctrl.length && ctrl.checked) {
      ids[0] = ctrl.value
    } else {
      for (i = 0; i < ctrl.length; i++) {
        if (ctrl[i].checked) {
          ids[ids.length] = ctrl[i].value
        }
      }
    }
    cb = window.opener['<?= $cb ?>']
    if (cb) cb('<?= $rt ?>', ids)
    window.close()
  }

  function searchResource () {
    document.selector.op.value = 'srch'
    document.selector.submit()
  }

  function resetSearch () {
    document.selector.search.value = ''
    searchResource()
  }

  function changeListMode () {
    var m = parseInt(document.selector.listmode.value) ? 1 : 0
    if (m) document.selector.listmode.value = 0 else document.selector.listmode.value = 1
    document.selector.submit()
  }

  // restore checkbox function
  function restoreChkBoxes () {
    var i, c, chk
    var a = window.opener.chkBoxArray
    var f = document.selector
    chk = f.elements['id[]']
    if (!chk.length) chk.checked = !!(a[chk.value]) else {
      for (i = 0; i < chk.length; i++) {
        c = chk[i]
        c.checked = !!(a[c.value])
      }
    }
  }

  // set checkbox value
  function setCheckbox (chk) {
    var a = window.opener.chkBoxArray
    a[chk.value] = chk.checked
  }

  // restore checkboxes
  setTimeout('restoreChkBoxes();', 100)

  document.addEventListener('DOMContentLoaded', function () {
    var h1help = document.querySelector('h1 > .help')
    h1help.onclick = function () {
      document.querySelector('.element-edit-message').classList.toggle('show')
    }
  })
</script>

<h1>
    <?= $title . ' - ' . __('global.element_selector_title') ?><i
            class="<?= ManagerTheme::getStyle('icon_question_circle') ?> help"></i>
</h1>

<div id="actions">
    <div class="btn-group">
        <a id="Button1" class="btn btn-success" href="javascript:;" onclick="saveSelection()">
            <i class="<?= ManagerTheme::getStyle('icon_add') ?>"></i>
            <span><?= __('global.insert') ?></span>
        </a>
        <a id="Button5" class="btn btn-secondary" href="javascript:;" onclick="window.close()">
            <i class="<?= ManagerTheme::getStyle('icon_cancel') ?>"></i>
            <span><?= __('global.cancel') ?></span>
        </a>
    </div>
</div>

<div class="container element-edit-message">
    <div class="alert alert-info"><?= __('global.element_selector_msg') ?></div>
</div>

<form name="selector" method="get">
    <?= csrf_field() ?>
    <input type="hidden" name="id" value="<?= $id ?>"/>
    <input type="hidden" name="a" value="<?= evo()->getManagerApi()->action ?>"/>
    <input type="hidden" name="listmode" value="<?= $listmode ?>"/>
    <input type="hidden" name="op" value=""/>
    <input type="hidden" name="rt" value="<?= $rt ?>"/>
    <input type="hidden" name="rt" value="<?= $rt ?>"/>
    <input type="hidden" name="sm" value="<?= $sm ?>"/>
    <input type="hidden" name="cb" value="<?= $cb ?>"/>

    <div class="tab-page">
        <div class="container container-body">
            <div class="row searchbar form-group">
                <div class="col-sm-12">
                    <div class="input-group float-right w-auto">
                        <input class="form-control form-control-sm" name="search" type="text" value="<?= $query ?>"
                               placeholder="<?= __('global.search') ?>"/>
                        <div class="input-group-append">
                            <a class="btn btn-secondary btn-sm" href="javascript:;"
                               title="<?= __('global.search') ?>"
                               onclick="searchResource();return false;">
                                <i class="<?= ManagerTheme::getStyle('icon_search') ?>"></i>
                            </a>
                            <a class="btn btn-secondary btn-sm" href="javascript:;"
                               title="<?= __('global.reset') ?>"
                               onclick="resetSearch();return false;">
                                <i class="<?= ManagerTheme::getStyle('icon_refresh') ?>"></i>
                            </a>
                            <a class="btn btn-secondary btn-sm" href="javascript:;"
                               title="<?= __('global.list_mode') ?>"
                               onclick="changeListMode();return false;">
                                <i class="<?= ManagerTheme::getStyle('icon_table') ?>"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="table-responsive">
                    <?php
                    $grd = new \EvolutionCMS\Support\DataGrid('', $ds, 0); // set page size to 0 t show all items
                    $grd->noRecordMsg = __('global.no_records_found');
                    $grd->cssClass = "table data nowrap";
                    $grd->columnHeaderClass = "tableHeader";
                    $grd->itemClass = "tableItem";
                    $grd->altItemClass = "tableAltItem";
                    $grd->columns = __('global.name') . ' ,' . __('global.description');
                    $grd->colTypes = "template:<input type='" . ($sm == 'm' ? 'checkbox' : 'radio') .
                        "' name='id[]' value='[+id+]' onclick='setCheckbox(this);'> [+e.value+]||template:[+e.value+]";
                    $grd->colWidths = "45%";
                    $grd->fields = $rt == 'tpl' ? 'templatename,description' : 'name,description';
                    if ($listmode == '1') {
                        $grd->pageSize = 0;
                    }
                    echo $grd->render();
                    ?>
                </div>
            </div>
        </div>
    </div>
</form>
</body>
</html>
