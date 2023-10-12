<?php

use EvolutionCMS\Facades\ManagerTheme;
use EvolutionCMS\Legacy\Permissions;
use EvolutionCMS\Models\SiteContent;
use Illuminate\Database\Eloquent\ModelNotFoundException;

if (!defined('IN_MANAGER_MODE') || IN_MANAGER_MODE !== true) {
    die('<b>INCLUDE_ORDERING_ERROR</b><br /><br />Please use the EVO Content Manager instead of accessing this file directly.');
}
if (!evo()->hasPermission('edit_document') || !evo()->hasPermission('save_document')) {
    evo()->webAlertAndQuit(ManagerTheme::getLexicon('error_no_privileges'));
}

$id = isset($_REQUEST['id']) ? (int) $_REQUEST['id'] : null;
$reset = isset($_POST['reset']) && $_POST['reset'] == 'true' ? 1 : 0;
$items = $_POST['list'] ?? '';
$resourcesList = '';
$updateMsg = '';

// check permissions on the document
$udperms = new Permissions();
$udperms->user = evo()->getLoginUserID('mgr');
$udperms->document = $id;
$udperms->role = $_SESSION['mgrRole'];

if (!$udperms->checkPermissions()) {
    evo()->webAlertAndQuit(ManagerTheme::getLexicon('access_permission_denied'));
}

if (isset($_POST['listSubmitted'])) {
    $updateMsg .= '<div class="text-success" id="updated">' . ManagerTheme::getLexicon('sort_updated') . '</div>';
    if (strlen($items) > 0) {
        $items = explode(';', $items);
        foreach ($items as $key => $value) {
            $docid = ltrim($value, 'item_');
            $key = $reset ? 0 : $key;
            if (is_numeric($docid)) {
                SiteContent::withTrashed()->where('id', $docid)->update(['menuindex' => $key]);
            }
        }
    }
}

$disabled = 'true';
$pagetitle = '';
$resourcesList = '';
if ($id !== null) {
    if ($id !== 0) {
        try {
            /** @var SiteContent $doc */
            $doc = SiteContent::withTrashed()->findOrFail($id);
        } catch (ModelNotFoundException $e) {
            evo()->webAlertAndQuit(ManagerTheme::getLexicon('access_permission_denied'));
        }
        $pagetitle = $doc->pagetitle;
    } else {
        $pagetitle = evo()->getConfig('site_name');
    }

    $mgrRole = (isset ($_SESSION['mgrRole']) && (string) $_SESSION['mgrRole'] === '1') ? '1' : '0';
    $resources = SiteContent::withTrashed()
        ->select([
            'site_content.id',
            'site_content.pagetitle',
            'site_content.parent',
            'site_content.menuindex',
            'site_content.published',
            'site_content.hidemenu',
            'site_content.deleted',
            'site_content.isfolder',
        ])
        ->leftJoin('document_groups', 'document_groups.document', '=', 'site_content.id')
        ->where('site_content.parent', $id)
        ->orderBy('menuindex', 'ASC')
        ->groupBy([
            'site_content.id',
            'site_content.pagetitle',
            'site_content.parent',
            'site_content.menuindex',
            'site_content.published',
            'site_content.hidemenu',
            'site_content.deleted',
            'site_content.isfolder',
        ]);
    if ($mgrRole != 1) {
        if (is_array($_SESSION['mgrDocgroups']) && count($_SESSION['mgrDocgroups']) > 0) {
            $resources = $resources->where(function ($q) {
                $q->where('site_content.privatemgr', 0)
                    ->orWhereIn('document_groups.document_group', $_SESSION['mgrDocgroups']);
            });
        } else {
            $resources = $resources->where('site_content.privatemgr', 0);
        }
    }

    if ($resources->count() > 0) {
        $resourcesList .= '<div class="clearfix"><ul id="sortlist" class="sortableList">';
        foreach ($resources->get()->toArray() as $row) {
            $classes = ($row['hidemenu']) ? ' notInMenuNode ' : ' inMenuNode';
            $classes .= ($row['published']) ? ' publishedNode ' : ' unpublishedNode ';
            $classes = ($row['deleted']) ? ' deletedNode ' : $classes;
            $icon = $row['isfolder']
                ? '<i class="' . ManagerTheme::getStyle('icon_folder') . '"></i> '
                : ' <i class="' .
                ManagerTheme::getStyle('icon_document') . '"></i> ';
            $resourcesList .= '<li id="item_' . $row['id'] . '" class="' . $classes . '">' . $icon . $row['pagetitle'] .
                ' <small>(' . $row['id'] . ')</small></li>';
        }
        $resourcesList .= '</ul></div>';
    } else {
        $updateMsg = '<p class="text-danger">' . ManagerTheme::getLexicon('sort_nochildren') . '</p>';
    }
}

$pagetitle = empty($id) ? evo()->getConfig('site_name') : $pagetitle;
?>

<script>

  parent.tree.updateTree()

  var actions = {
    save: function () {
      var el = document.getElementById('updated')
      if (el) {
        el.style.display = 'none'
      }
      el = document.getElementById('updating')
      if (el) {
        el.style.display = 'block'
      }
      setTimeout('document.sortableListForm.submit()', 1000)
    }, cancel: function () {
      document.location.href = 'index.php?a=2'
    }
  }

  function renderList () {
    var list = ''
    var els = document.querySelectorAll('.sortableList > li')
    for (var i = 0; i < els.length; i++) {
      list += els[i].id + ';'
    }
    document.getElementById('list').value = list
  }

  var sortdir = 'asc'

  function sort () {
    var els = document.querySelectorAll('.sortableList > li')
    var keyA, keyB
    if (sortdir === 'asc') {
      els = [].slice.call(els).sort(function (a, b) {
        keyA = a.innerText.toLowerCase()
        keyB = b.innerText.toLowerCase()
        return keyA.localeCompare(keyB)
      })
      sortdir = 'desc'
    } else {
      els = [].slice.call(els).sort(function (b, a) {
        keyA = a.innerText.toLowerCase()
        keyB = b.innerText.toLowerCase()
        return keyA.localeCompare(keyB)
      })
      sortdir = 'asc'
    }
    var ul = document.getElementById('sortlist')
    var list = ''
    for (var i = 0; i < els.length; i++) {
      ul.appendChild(els[i])
      list += els[i].id + ';'
    }
    document.getElementById('list').value = list
  }

  function resetSortOrder () {
    if (confirm('<?= ManagerTheme::getLexicon('confirm_reset_sort_order') ?>') === true) {
      documentDirty = false
      var input = document.createElement('input')
      input.type = 'hidden'
      input.name = 'reset'
      input.value = 'true'
      document.sortableListForm.appendChild(input)
      actions.save()
    }
  }

</script>

<h1>
    <i class="<?= ManagerTheme::getStyle('icon_sort_num_asc') ?>"></i><?= ($pagetitle ? evo()->getPhpCompat()->entities(
            $pagetitle
        ) . '<small>(' . $id . ')</small>' : ManagerTheme::getLexicon('sort_menuindex')) ?>
</h1>

<?= ManagerTheme::getStyle('actionbuttons.dynamic.save') ?>

<div class="tab-page">
    <div class="container container-body">
        <b><?= evo()->getPhpCompat()->entities($pagetitle) ?> (<?= $id ?>)</b>
        <?php
        if ($resourcesList) {
            ?>
            <p><?= ManagerTheme::getLexicon('sort_elements_msg') ?></p>
            <p>
                <a class="btn btn-secondary" href="javascript:;" onclick="sort();return false;"><i
                            class="<?= ManagerTheme::getStyle('icon_sort') ?>"></i> <?= ManagerTheme::getLexicon(
                        'sort_alphabetically'
                    ) ?></a>
                <a class="btn btn-secondary" href="javascript:;" onclick="resetSortOrder();return false;"><i
                            class="<?= ManagerTheme::getStyle('icon_refresh') ?>"></i> <?= ManagerTheme::getLexicon(
                        'reset_sort_order'
                    ) ?></a>
            </p>
            <?= $updateMsg ?>
            <span class="text-danger" style="display:none;" id="updating"><?= ManagerTheme::getLexicon(
                    'sort_updating'
                ) ?></span>
            <?= $resourcesList ?>
            <?php
        } else {
            echo $updateMsg;
        }
        ?>
    </div>
</div>

<form action="" method="post" name="sortableListForm">
    <input type="hidden" name="listSubmitted" value="true"/>
    <input type="hidden" id="list" name="list" value=""/>
</form>

<script>

  evo.sortable('.sortableList > li', {
    complete: function () {
      renderList()
    }
  })

</script>
