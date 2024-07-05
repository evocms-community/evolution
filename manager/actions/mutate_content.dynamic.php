<?php

use EvolutionCMS\Facades\ManagerTheme;
use EvolutionCMS\Facades\UrlProcessor;
use EvolutionCMS\Legacy\Permissions;
use EvolutionCMS\Models\DocumentGroup;
use EvolutionCMS\Models\DocumentgroupName;
use EvolutionCMS\Models\MemberGroup;
use EvolutionCMS\Models\SiteContent;
use EvolutionCMS\Models\SiteTemplate;
use EvolutionCMS\Models\SiteTmplvar;
use Illuminate\Support\Facades\DB;

$sd = isset($_REQUEST['dir']) ? '&dir=' . $_REQUEST['dir'] : '&dir=DESC';
$sb = isset($_REQUEST['sort']) ? '&sort=' . $_REQUEST['sort'] : '&sort=createdon';
$pg = isset($_REQUEST['page']) ? '&page=' . (int) $_REQUEST['page'] : '';
$add_path = $sd . $sb . $pg;
/*******************/
global $content, $richtexteditorIds, $richtexteditorOptions;
$richtexteditorIds = [];
$defaultContentType = 'document';
// check permissions
switch (evo()->getManagerApi()->action) {
    case 27:
        if (!evo()->hasPermission('edit_document')) {
            evo()->webAlertAndQuit(__('global.error_no_privileges'));
        }
        break;
    case 85:
    case 72:
        $defaultContentType = 'reference';
    // no break
    case 4:
        if (!evo()->hasPermission('new_document')) {
            evo()->webAlertAndQuit(__('global.error_no_privileges'));
        } elseif (isset($_REQUEST['pid']) && $_REQUEST['pid'] != '0') {
            // check user has permissions for parent
            $udperms = new Permissions();
            $udperms->user = evo()->getLoginUserID('mgr');
            $udperms->document = empty($_REQUEST['pid']) ? 0 : $_REQUEST['pid'];
            $udperms->role = $_SESSION['mgrRole'];
            if (!$udperms->checkPermissions()) {
                evo()->webAlertAndQuit(__('global.access_permission_denied'));
            }
        }
        break;
    default:
        evo()->webAlertAndQuit(__('global.error_no_privileges'));
}

$id = (int) ($_REQUEST['id'] ?? 0);

if (evo()->getManagerApi()->action == 27) {
    //editing an existing document
    // check permissions on the document
    $udperms = new Permissions();
    $udperms->user = evo()->getLoginUserID('mgr');
    $udperms->document = $id;
    $udperms->role = $_SESSION['mgrRole'];

    if (!$udperms->checkPermissions()) {
        evo()->webAlertAndQuit(__('global.access_permission_denied'));
    }
}

// check to see if resource isn't locked
if ($lockedEl = evo()->elementIsLocked(7, $id)) {
    evo()->webAlertAndQuit(
        sprintf(__('global.lock_msg'), $lockedEl['username'], __('global.resource'))
    );
}
// end check for lock

// Lock resource for other users to edit
evo()->lockElement(7, $id);

// get document groups for current user
if ($_SESSION['mgrDocgroups']) {
    $docgrp = implode(',', $_SESSION['mgrDocgroups']);
}

if (!empty ($id)) {
    $documentObjectQuery = SiteContent::withTrashed()
        ->select('site_content.*')
        ->leftJoin('document_groups', 'site_content.id', '=', 'document_groups.document')
        ->where('site_content.id', $id);

    if ($_SESSION['mgrRole'] != 1) {
        $documentObjectQuery->where(function ($query) {
            $query->where('privatemgr', 0)
                ->orWhereIn('document_groups.document_group', $_SESSION['mgrDocgroups']);
        });
    }
    $content = $documentObjectQuery->first();
    if (empty($content)) {
        evo()->webAlertAndQuit(__('global.access_permission_denied'));
    }
    $content = $content->toArray();
    evo()->documentObject = &$content;
    $_SESSION['itemname'] = $content['pagetitle'];
} else {
    $content = [];

    if (isset($_REQUEST['newtemplate'])) {
        $content['template'] = $_REQUEST['newtemplate'];
    } else {
        $content['template'] = getDefaultTemplate();
    }

    $_SESSION['itemname'] = __('global.new_resource');
}

// restore saved form
$formRestored = evo()->getManagerApi()->loadFormValues();
if (isset($_REQUEST['newtemplate'])) {
    $formRestored = true;
}

// retain form values if template was changed
// edited to convert pub_date and unpub_date
// sottwell 02-09-2006
if ($formRestored) {
    $content = array_merge($content, $_POST);
    $content['content'] = $_POST['ta'];
    if (empty ($content['pub_date'])) {
        unset ($content['pub_date']);
    } else {
        $content['pub_date'] = evo()->toTimeStamp($content['pub_date']);
    }
    if (empty ($content['unpub_date'])) {
        unset ($content['unpub_date']);
    } else {
        $content['unpub_date'] = evo()->toTimeStamp($content['unpub_date']);
    }
}

// increase menu index if this is a new document
if (!isset($_REQUEST['id'])) {
    if (evo()->getConfig('auto_menuindex')) {
        $pid = (int) get_by_key($_REQUEST, 'pid', 0, 'is_scalar');
        $content['menuindex'] = SiteContent::withTrashed()->where('parent', $pid)->count();
    } else {
        $content['menuindex'] = 0;
    }
}

$content['type'] = get_by_key($content, 'type', $defaultContentType, 'is_scalar');

if (isset ($_POST['which_editor'])) {
    evo()->setConfig('which_editor', get_by_key($_POST, 'which_editor', '', 'is_scalar'));
}

// Add lock-element JS-Script
$lockElementId = $id;
$lockElementType = 7;
require_once(MODX_MANAGER_PATH . 'includes/active_user_locks.inc.php');
?>
<style>
    .image_for_field[data-image] { display: block; content: ""; width: 120px; height: 120px; margin: .1rem .1rem 0 0; border: 1px #ccc solid; background: #fff 50% 50% no-repeat; background-size: contain; cursor: pointer }
    .image_for_field[data-image=""] { display: none }
</style>
<script>
  /* <![CDATA[ */

  // save tree folder state
  if (parent.tree) parent.tree.saveFolderState()

  function changestate (el) {
    if (parseInt(el.value) === 1) {
      el.value = 0
    } else {
      el.value = 1
    }
    documentDirty = true
  }

  var actions = {
    new: function () {
      document.location.href = "index.php?pid=<?= $_REQUEST['id'] ?? '' ?>&a=4"
    },
    newlink: function () {
      document.location.href = "index.php?pid=<?= $_REQUEST['id'] ?? '' ?>&a=72"
    },
    save: function () {
      documentDirty = false
      form_save = true
      document.mutate.save.click()
    },
    delete: function () {
      if (confirm(`<?= __('global.confirm_delete_resource')?>`) === true) {
        document.location.href = 'index.php?id=' + document.mutate.id.value + "&a=6<?= $add_path ?>"
      }
    },
    cancel: function () {
      documentDirty = false
      document.location.href = 'index.php?<?=($id == 0 ? 'a=2' : 'a=3&r=1&id=' . $id . $add_path) ?>'
    },
    duplicate: function () {
      if (confirm(`<?= __('global.confirm_resource_duplicate')?>`) === true) {
        document.location.href = "index.php?id=<?= (int) get_by_key(
            $_REQUEST,
            'id',
            0,
            'is_scalar'
        ) ?>&a=94<?= $add_path ?>"
      }
    },
    view: function () {
      window.open('<?= evo()->getConfig('friendly_urls')
          ? UrlProcessor::makeUrl($id) : MODX_SITE_URL . 'index.php?id=' . $id ?>', 'previeWin')
    }
  }

  var allowParentSelection = false
  var allowLinkSelection = false

  function enableLinkSelection (b) {
    var llock = document.getElementById('llock')
    if (b) {
      parent.tree.ca = 'link'
      llock.className = "<?= ManagerTheme::getStyle('icon_chain_broken') ?>"
      allowLinkSelection = true
    } else {
      parent.tree.ca = 'open'
      llock.className = "<?= ManagerTheme::getStyle('icon_chain') ?>"
      allowLinkSelection = false
    }
  }

  function setLink (lId) {
    if (!allowLinkSelection) {
      window.location.href = 'index.php?a=3&id=' + lId + "<?= $add_path ?>"
    } else {
      documentDirty = true
      document.mutate.ta.value = lId
    }
  }

  function enableParentSelection (b) {
    var plock = document.getElementById('plock')
    if (b) {
      parent.tree.ca = 'parent'
      plock.className = "<?= ManagerTheme::getStyle('icon_folder_open') ?>"
      allowParentSelection = true
    } else {
      parent.tree.ca = 'open'
      plock.className = "<?= ManagerTheme::getStyle('icon_folder') ?>"
      allowParentSelection = false
    }
  }

  function setParent (pId, pName) {
    if (!allowParentSelection) {
      window.location.href = 'index.php?a=3&id=' + pId + "<?= $add_path ?>"
    } else {
      if (pId === 0 || checkParentChildRelation(pId, pName)) {
        documentDirty = true
        document.mutate.parent.value = pId
        var elm = document.getElementById('parentName')
        if (elm) {
          elm.innerHTML = (pId + ' (' + pName + ')')
        }
      }
    }
  }

  // check if the selected parent is a child of this document
  function checkParentChildRelation (pId, pName) {
    var sp
    var id = document.mutate.id.value
    var tdoc = parent.tree.document
    var pn = (tdoc.getElementById) ? tdoc.getElementById('node' + pId) : tdoc.all['node' + pId]
    if (!pn) return
    if (pn.id.substr(4) === id) {
      alert(`<?= __('global.illegal_parent_self') ?>`)
      return
    } else {
      while (pn.getAttribute('p') > 0) {
        pId = pn.getAttribute('p')
        pn = (tdoc.getElementById) ? tdoc.getElementById('node' + pId) : tdoc.all['node' + pId]
        if (pn.id.substr(4) === id) {
          alert(`<?= __('global.illegal_parent_child') ?>`)
          return
        }
      }
    }
    return true
  }

  var curTemplate = -1
  var curTemplateIndex = 0

  function storeCurTemplate () {
    var dropTemplate = document.getElementById('template')
    if (dropTemplate) {
      for (var i = 0; i < dropTemplate.length; i++) {
        if (dropTemplate[i].selected) {
          curTemplate = dropTemplate[i].value
          curTemplateIndex = i
        }
      }
    }
  }

  var newTemplate

  function templateWarning () {
    var dropTemplate = document.getElementById('template')
    if (dropTemplate) {
      for (var i = 0; i < dropTemplate.length; i++) {
        if (dropTemplate[i].selected) {
          newTemplate = dropTemplate[i].value
          break
        }
      }
    }
    if (curTemplate === newTemplate) {
      return
    }

    if (documentDirty === true) {
      if (confirm(`<?= __('global.tmplvar_change_template_msg')?>`)) {
        documentDirty = false
        document.mutate.a.value = <?= evo()->getManagerApi()->action ?>;
        document.mutate.newtemplate.value = newTemplate
        document.mutate.submit()
      } else {
        dropTemplate[curTemplateIndex].selected = true
      }
    } else {
      document.mutate.a.value = <?= evo()->getManagerApi()->action ?>;
      document.mutate.newtemplate.value = newTemplate
      document.mutate.submit()
    }
  }

  // Added for RTE selection
  function changeRTE () {
    var whichEditor = document.getElementById('which_editor'),
      newEditor,
      i
    if (whichEditor) {
      for (i = 0; i < whichEditor.length; i++) {
        if (whichEditor[i].selected) {
          newEditor = whichEditor[i].value
          break
        }
      }
    }
    var dropTemplate = document.getElementById('template')
    if (dropTemplate) {
      for (i = 0; i < dropTemplate.length; i++) {
        if (dropTemplate[i].selected) {
          newTemplate = dropTemplate[i].value
          break
        }
      }
    }

    documentDirty = false
    document.mutate.a.value = <?= evo()->getManagerApi()->action ?>;
    document.mutate.newtemplate.value = newTemplate
    document.mutate.which_editor.value = newEditor
    document.mutate.submit()
  }

  /**
   * Snippet properties
   */

  var snippetParams = {}     // Snippet Params
  var currentParams = {}     // Current Params
  var lastsp, lastmod = {}

  function showParameters (ctrl) {
    var c, p, df, cp, ar, desc, value, key, dt, f

    cp = {}
    currentParams = {} // reset;

    if (ctrl && ctrl.form) {
      f = ctrl.form
    } else {
      f = document.forms['mutate']
      ctrl = f.snippetlist
    }

    // get display format
    df = ''//lastsp = ctrl.options[ctrl.selectedIndex].value;

    // load last modified param values
    if (lastmod[df]) cp = lastmod[df].split('&')
    for (p = 0; p < cp.length; p++) {
      cp[p] = (cp[p] + '').replace(/^\s|\s$/, '') // trim
      ar = cp[p].split('=')
      currentParams[ar[0]] = ar[1]
    }

    // setup parameters
    var t, dp = (snippetParams[df]) ? snippetParams[df].split('&') : ['']
    if (dp) {
      t = '<table width="100%" class="displayparams"><thead><tr><td width="50%"><?= __('global.parameter') ?><\/td><td width="50%"><?= __('global.value')?><\/td><\/tr><\/thead>'
      for (p = 0; p < dp.length; p++) {
        dp[p] = (dp[p] + '').replace(/^\s|\s$/, '') // trim
        ar = dp[p].split('=')
        key = ar[0]     // param
        ar = (ar[1] + '').split(';')
        desc = ar[0]   // description
        dt = ar[1]     // data type
        value = decode((currentParams[key]) ? currentParams[key] : (dt == 'list') ? ar[3] : (ar[2]) ? ar[2] : '')
        if (value !== currentParams[key]) currentParams[key] = value
        value = (value + '').replace(/^\s|\s$/, '') // trim
        if (dt) {
          switch (dt) {
            case 'int':
              c = '<input type="text" name="prop_' + key + '" value="' + value +
                '" size="30" onchange="setParameter(\'' + key + '\',\'' + dt + '\',this)" \/>'
              break
            case 'list':
              c = '<select name="prop_' + key + '" height="1" style="width:168px" onchange="setParameter(\'' + key +
                '\',\'' + dt + '\',this)">'
              var ls = (ar[2] + '').split(',')
              if (currentParams[key] === ar[2]) currentParams[key] = ls[0] // use first list item as default
              for (var i = 0; i < ls.length; i++) {
                c += '<option value="' + ls[i] + '"' + ((ls[i] === value) ? ' selected="selected"' : '') + '>' + ls[i] +
                  '<\/option>'
              }
              c += '<\/select>'
              break
            default:  // string
              c = '<input type="text" name="prop_' + key + '" value="' + value +
                '" size="30" onchange="setParameter(\'' + key + '\',\'' + dt + '\',this)" \/>'
              break

          }
          t += '<tr><td bgcolor="#FFFFFF" width="50%">' + desc + '<\/td><td bgcolor="#FFFFFF" width="50%">' + c +
            '<\/td><\/tr>'
        }
      }
      t += '<\/table>'
      var td = (document.getElementById) ? document.getElementById('snippetparams') : document.all['snippetparams']
      td.innerHTML = t
    }
    implodeParameters()
  }

  function setParameter (key, dt, ctrl) {
    var v
    if (!ctrl) return null
    switch (dt) {
      case 'int':
        ctrl.value = parseInt(ctrl.value)
        if (isNaN(ctrl.value)) ctrl.value = 0
        v = ctrl.value
        break
      case 'list':
        v = ctrl.options[ctrl.selectedIndex].value
        break
      default:
        v = ctrl.value + ''
        break
    }
    currentParams[key] = v
    implodeParameters()
  }

  function resetParameters () {
    document.mutate.params.value = ''
    lastmod[lastsp] = ''
    showParameters()
  }

  // implode parameters
  function implodeParameters () {
    var v, p, s = ''
    for (p in currentParams) {
      v = currentParams[p]
      if (v) s += '&' + p + '=' + encode(v)
    }
    //document.forms['mutate'].params.value = s;
    if (lastsp) lastmod[lastsp] = s
  }

  function encode (s) {
    s = s + ''
    s = s.replace(/\=/g, '%3D') // =
    s = s.replace(/\&/g, '%26') // &
    return s
  }

  function decode (s) {
    s = s + ''
    s = s.replace(/\%3D/g, '=') // =
    s = s.replace(/\%26/g, '&') // &
    return s
  }

  <?php
  if (get_by_key($content, 'type') === 'reference' || evo()->getManagerApi()->action == '72') {
      $ResourceManagerLoaded = true;
  }
  ?>
  /* ]]> */
</script>
<script>
  function evoRenderTvImageCheck (a) {
    var b = document.getElementById('image_for_' + a.target.id),
      c = new Image
    a.target.value ? (c.src = (a.target.value.search(/^https?:\/\//i) < 0 ? "<?php echo evo()->getConfig('site_url')?>" : '') + a.target.value, c.onerror = function () {
      b.style.backgroundImage = '', b.setAttribute('data-image', '')
    }, c.onload = function () {
      b.style.backgroundImage = 'url(\'' + this.src + '\')', b.setAttribute('data-image', this.src)
    }) : (b.style.backgroundImage = '', b.setAttribute('data-image', ''))
  }
</script>
<form name="mutate" id="mutate" class="content" method="post" enctype="multipart/form-data" action="index.php"
      onsubmit="documentDirty=false;">
    <?= csrf_field() ?>
    <?php
    // invoke OnDocFormPrerender event
    $evtOut = evo()->invokeEvent('OnDocFormPrerender', [
        'id' => $id,
        'template' => $content['template'],
    ]);

    if (is_array($evtOut)) {
        echo implode('', $evtOut);
    }

    /*************************/
    $dir = $_REQUEST['dir'] ?? '';
    $sort = $_REQUEST['sort'] ?? 'createdon';
    $page = isset($_REQUEST['page']) ? (int) $_REQUEST['page'] : '';
    /*************************/

    ?>
    <input type="hidden" name="a" value="5"/>
    <input type="hidden" name="id" id="docid" value="<?= (int) get_by_key($content, 'id', 0, 'is_scalar') ?>"/>
    <input type="hidden" name="mode" value="<?= evo()->getManagerApi()->action ?>"/>
    <input type="hidden" name="MAX_FILE_SIZE" value="<?= evo()->getConfig('upload_maxsize') ?>"/>
    <input type="hidden" name="refresh_preview" value="0"/>
    <input type="hidden" name="newtemplate" value=""/>
    <input type="hidden" name="dir" value="<?= e($dir) ?>"/>
    <input type="hidden" name="sort" value="<?= e($sort) ?>"/>
    <input type="hidden" name="page" value="<?= $page ?>"/>

    <fieldset id="create_edit">

        <h1>
            <i class="<?= ManagerTheme::getStyle('icon_edit') ?>"></i><?php
            if (isset($_REQUEST['id'])) {
                echo e(
                        Str::limit($content['pagetitle'], 50)) .
                    '<small>(' . (int) $_REQUEST['id'] . ')</small>';
            } else {
                if (evo()->getManagerApi()->action == '4') {
                    echo __('global.add_resource');
                } elseif (evo()->getManagerApi()->action == '72') {
                    echo __('global.add_weblink');
                } else {
                    echo __('global.create_resource_title');
                }
            } ?>
        </h1>

        <?= ManagerTheme::getStyle('actionbuttons.dynamic.document') ?>

        <?php
        // breadcrumbs
        if (evo()->getConfig('use_breadcrumbs')) {
            $out = '';
            $temp = [];
            $title = $content['pagetitle'] ?? __('global.create_resource_title');

            if (isset($_REQUEST['id']) && $content['parent'] != 0) {
                $bID = (int) $_REQUEST['id'];
                $temp = evo()->getParentIds($bID);
            } else {
                if (isset($_REQUEST['pid'])) {
                    $bID = (int) $_REQUEST['pid'];
                    $temp = evo()->getParentIds($bID);
                    array_unshift($temp, $bID);
                }
            }

            if ($temp) {
                $parents = implode(',', $temp);

                if (!empty($parents)) {
                    $parentsResult = SiteContent::withTrashed()->select('id', 'pagetitle')->whereIn('id', $temp)->get();
                    foreach ($parentsResult->toArray() as $row) {
                        $out .= '<li class="breadcrumbs__li">
                                <a href="index.php?a=27&id=' . $row['id'] . '" class="breadcrumbs__a">' .
                            e($row['pagetitle'], ENT_QUOTES) . '</a>
                                <span class="breadcrumbs__sep">&gt;</span>
                            </li>';
                    }
                }
            }

            $out .= '<li class="breadcrumbs__li breadcrumbs__li_current">' . $title . '</li>';
            echo '<ul class="breadcrumbs">' . $out . '</ul>';
        }
        ?>

        <!-- start main wrapper -->
        <div class="sectionBody">

            <div class="tab-pane" id="documentPane">
                <script>
                  var tpSettings = new WebFXTabPane(document.getElementById('documentPane'),
                      <?= evo()->getConfig('remember_last_tab') ? 'true' : 'false' ?>)
                </script>

                <!-- General -->
                <?php
                $evtOut = evo()->invokeEvent('OnDocFormTemplateRender', [
                    'id' => $id,
                ]);

                $group_tvs = evo()->getConfig('group_tvs');
                $templateVariables = '';
                $templateVariablesOutput = '';

                if (is_array($evtOut)) {
                    echo implode('', $evtOut);
                } else {
                    ?>
                    <div class="tab-page" id="tabGeneral">
                        <h2 class="tab"><?= __('global.settings_general'); ?></h2>
                        <script>tpSettings.addTabPage(document.getElementById('tabGeneral'))</script>

                        <table>
                            <tr>
                                <td>
                                    <span class="warning"><?= __('global.resource_title'); ?></span>
                                    <i class="<?= ManagerTheme::getStyle('icon_question_circle') ?>"
                                       data-tooltip="<?= __('global.resource_title_help'); ?>"></i>
                                </td>
                                <td>
                                    <input name="pagetitle" type="text" maxlength="255"
                                           value="<?= e(
                                               stripslashes(get_by_key($content, 'pagetitle', '', 'is_scalar'))
                                           ) ?>" class="inputBox" onchange="documentDirty=true;" spellcheck="true"/>
                                    <script>document.getElementsByName('pagetitle')[0].focus()</script>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <span class="warning"><?= __('global.long_title'); ?></span>
                                    <i class="<?= ManagerTheme::getStyle('icon_question_circle') ?>"
                                       data-tooltip="<?= __('global.resource_long_title_help'); ?>"></i>
                                </td>
                                <td>
                                    <input name="longtitle" type="text" maxlength="255"
                                           value="<?= e(
                                               stripslashes(get_by_key($content, 'longtitle', '', 'is_scalar'))
                                           ) ?>" class="inputBox" onchange="documentDirty=true;" spellcheck="true"/>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <span class="warning"><?= __('global.resource_description') ?></span>
                                    <i class="<?= ManagerTheme::getStyle('icon_question_circle') ?>"
                                       data-tooltip="<?= __('global.resource_description_help') ?>"></i>
                                </td>
                                <td>
                                    <input name="description" type="text" maxlength="255"
                                           value="<?= e(
                                               stripslashes(get_by_key($content, 'description', '', 'is_scalar'))
                                           ) ?>" class="inputBox" onchange="documentDirty=true;" spellcheck="true"/>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <span class="warning"><?= __('global.resource_alias'); ?></span>
                                    <i class="<?= ManagerTheme::getStyle('icon_question_circle') ?>"
                                       data-tooltip="<?= __('global.resource_alias_help'); ?>"></i>
                                </td>
                                <td>
                                    <input name="alias" type="text" maxlength="100"
                                           value="<?= stripslashes(get_by_key($content, 'alias', '', 'is_scalar')) ?>"
                                           class="inputBox" onchange="documentDirty=true;"/>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <span class="warning"><?= __('global.link_attributes'); ?></span>
                                    <i class="<?= ManagerTheme::getStyle('icon_question_circle') ?>"
                                       data-tooltip="<?= __('global.link_attributes_help'); ?>"></i>
                                </td>
                                <td>
                                    <input name="link_attributes" type="text" maxlength="255"
                                           value="<?= e(
                                               stripslashes(
                                                   get_by_key($content, 'link_attributes', '', 'is_scalar')
                                               )
                                           ) ?>" class="inputBox" onchange="documentDirty=true;"/>
                                </td>
                            </tr>

                            <?php
                            if ($content['type'] == 'reference' ||
                                evo()->getManagerApi()->action == '72'
                            ) { // Web Link specific ?>

                                <tr>
                                    <td><span class="warning"><?= __('global.weblink'); ?></span>
                                        <i class="<?= ManagerTheme::getStyle('icon_question_circle') ?>"
                                           data-tooltip="<?= __('global.resource_weblink_help'); ?>"></i>
                                    </td>
                                    <td>
                                        <i id="llock" class="<?= ManagerTheme::getStyle('icon_chain') ?>"
                                           onclick="enableLinkSelection(!allowLinkSelection);"></i>
                                        <input name="ta" id="ta" type="text" maxlength="255"
                                               value="<?= (!empty($content['content']) ? e(
                                                   stripslashes($content['content'])
                                               ) : 'http://') ?>" class="inputBox"
                                               onchange="documentDirty=true;"/>
                                        <input type="button"
                                               value="<?= __('global.insert') ?>"
                                               onclick="BrowseFileServer('ta')"/>
                                    </td>
                                </tr>

                            <?php
                            } ?>

                            <tr>
                                <td valign="top">
                                    <span class="warning"><?= __('global.resource_summary'); ?></span>
                                    <i class="<?= ManagerTheme::getStyle('icon_question_circle') ?>"
                                       data-tooltip="<?= __('global.resource_summary_help'); ?>"
                                       spellcheck="true"></i>
                                </td>
                                <td valign="top">
                                        <textarea id="introtext" name="introtext" class="inputBox" rows="3" cols=""
                                                  onchange="documentDirty=true;"><?= e(
                                                    stripslashes(get_by_key($content, 'introtext', '', 'is_scalar'))
                                                ) ?></textarea>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <span class="warning"><?= __('global.page_data_template'); ?></span>
                                    <i class="<?= ManagerTheme::getStyle('icon_question_circle') ?>"
                                       data-tooltip="<?= __('global.page_data_template_help'); ?>"></i>
                                </td>
                                <td>
                                    <select id="template" name="template" class="inputBox"
                                            onchange="templateWarning();">
                                        <option value="0">(blank)</option>
                                        <?php
                                        $templates = SiteTemplate::query()
                                            ->select(
                                                'site_templates.templatename',
                                                'site_templates.selectable',
                                                'site_templates.category',
                                                'site_templates.id',
                                                'categories.category AS category_name'
                                            )
                                            ->leftJoin('categories', 'site_templates.category', '=', 'categories.id')
                                            ->orderBy('categories.category', 'ASC')
                                            ->orderBy('site_templates.templatename', 'ASC')
                                            ->get();

                                        $currentCategory = '';
                                        $thisCategory = '';
                                        $closeOptGroup = false;
                                        foreach ($templates as $template) {
                                            $row = $template->toArray();
                                            if ($row['selectable'] != 1 && $row['id'] != $content['template']) {
                                                continue;
                                            };
                                            // Skip if not selectable but show if selected!
                                            $thisCategory = $row['category_name'];
                                            if ($thisCategory == null) {
                                                $thisCategory = __('global.no_category');
                                            }
                                            if ($thisCategory != $currentCategory) {
                                                if ($closeOptGroup) {
                                                    echo "\t\t\t\t\t</optgroup>\n";
                                                }
                                                echo "\t\t\t\t\t<optgroup label=\"$thisCategory\">\n";
                                                $closeOptGroup = true;
                                            }

                                            $selectedtext =
                                                ($row['id'] == $content['template']) ? ' selected="selected"' : '';

                                            echo "\t\t\t\t\t" . '<option value="' . $row['id'] . '"' . $selectedtext .
                                                '>' . $row['templatename'] . ' (' . $row['id'] . ")</option>\n";
                                            $currentCategory = $thisCategory;
                                        }
                                        if ($thisCategory != '') {
                                            echo "\t\t\t\t\t</optgroup>\n";
                                        }
                                        ?>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <span class="warning"><?= __('global.resource_opt_menu_title') ?></span>
                                    <i class="<?= ManagerTheme::getStyle('icon_question_circle') ?>"
                                       data-tooltip="<?= __('global.resource_opt_menu_title_help') ?>"></i>
                                </td>
                                <td>
                                    <input name="menutitle" type="text" maxlength="255"
                                           value="<?= e(
                                               stripslashes(get_by_key($content, 'menutitle', '', 'is_scalar'))
                                           ) ?>" class="inputBox" onchange="documentDirty=true;"/>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <span class="warning"><?= __('global.resource_opt_menu_index') ?></span>
                                    <i class="<?= ManagerTheme::getStyle('icon_question_circle') ?>"
                                       data-tooltip="<?= __('global.resource_opt_menu_index_help') ?>"></i>
                                </td>
                                <td>
                                    <input name="menuindex" type="text" maxlength="6"
                                           value="<?= $content['menuindex'] ?>" class="inputBox"
                                           onchange="documentDirty=true;"/>
                                    <a href="javascript:;" class="btn btn-secondary"
                                       onclick="var elm = document.mutate.menuindex;var v=parseInt(elm.value+'')-1;elm.value=v>0? v:0;elm.focus();documentDirty=true;return false;"><i
                                                class="<?= ManagerTheme::getStyle('icon_angle_left') ?>"></i></a>
                                    <a href="javascript:;" class="btn btn-secondary"
                                       onclick="var elm = document.mutate.menuindex;var v=parseInt(elm.value+'')+1;elm.value=v>0? v:0;elm.focus();documentDirty=true;return false;"><i
                                                class="<?= ManagerTheme::getStyle('icon_angle_right') ?>"></i></a>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <span class="warning"><?= __('global.resource_opt_show_menu') ?></span>
                                    <i class="<?= ManagerTheme::getStyle('icon_question_circle') ?>"
                                       data-tooltip="<?= __('global.resource_opt_show_menu_help') ?>"></i>
                                </td>
                                <td>
                                    <input name="hidemenucheck" type="checkbox"
                                           class="checkbox" <?= (empty($content['hidemenu']) ? 'checked="checked"'
                                        : '') ?> onclick="changestate(document.mutate.hidemenu);"/>
                                    <input type="hidden"
                                           name="hidemenu"
                                           class="hidden"
                                           value="<?= (empty($content['hidemenu'])
                                               ? 0
                                               : 1) ?>"/>
                                </td>
                            </tr>
                            <tr>
                                <td valign="top">
                                    <span class="warning"><?= __('global.resource_parent'); ?></span>
                                    <i class="<?= ManagerTheme::getStyle('icon_question_circle') ?>"
                                       data-tooltip="<?= __('global.resource_parent_help'); ?>"></i>
                                </td>
                                <td valign="top">
                                    <?php
                                    $parentlookup = false;
                                    if (isset ($_REQUEST['id'])) {
                                        if ($content['parent'] == 0) {
                                            $parentname = evo()->getConfig('site_name');
                                        } else {
                                            $parentlookup = $content['parent'];
                                        }
                                    } elseif (isset ($_REQUEST['pid'])) {
                                        if ($_REQUEST['pid'] == 0) {
                                            $parentname = evo()->getConfig('site_name');
                                        } else {
                                            $parentlookup = $_REQUEST['pid'];
                                        }
                                    } elseif (isset($_POST['parent'])) {
                                        if ($_POST['parent'] == 0) {
                                            $parentname = evo()->getConfig('site_name');
                                        } else {
                                            $parentlookup = $_POST['parent'];
                                        }
                                    } else {
                                        $parentname = evo()->getConfig('site_name');
                                        $content['parent'] = 0;
                                    }
                                    if ($parentlookup !== false && is_numeric($parentlookup)) {
                                        $parentname = SiteContent::withTrashed()->select('pagetitle')->find(
                                            $parentlookup
                                        )->pagetitle;
                                        if (!$parentname) {
                                            evo()->webAlertAndQuit(__('global.error_no_parent'));
                                        }
                                    }
                                    ?>
                                    <i id="plock" class="<?= ManagerTheme::getStyle('icon_folder') ?>"
                                       onclick="enableParentSelection(!allowParentSelection);"></i>
                                    <b><span id="parentName"><?= (isset($_REQUEST['pid']) ? e($_REQUEST['pid'])
                                                : $content['parent']) ?> (<?= e($parentname) ?>)</span></b>
                                    <input type="hidden" name="parent"
                                           value="<?= (isset($_REQUEST['pid']) ? e($_REQUEST['pid'])
                                               : $content['parent']) ?>" onchange="documentDirty=true;"/>
                                </td>
                            </tr>
                            <tr></tr>
                            <?php
                            /*
                            if($content['type'] == 'reference' || evo()->getManagerApi()->action == '72') {
                                ?>
                                <tr>
                                    <td colspan="2">
                                        <div class="split"></div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <span class="warning"><?=__('global.which_editor_title');?></span></td>
                                    <td>
                                        <select id="which_editor" name="which_editor" onchange="changeRTE();">
                                            <?php
                                            // invoke OnRichTextEditorRegister event
                                            $evtOut = evo()->invokeEvent('OnRichTextEditorRegister');
                                            if(is_array($evtOut)) {
                                                for($i = 0; $i < count($evtOut); $i++) {
                                                    $editor = $evtOut[$i];
                                                    echo "\t\t\t", '<option value="', $editor, '"', (evo()->getConfig('which_editor') == $editor ? ' selected="selected"' : ''), '>', $editor, "</option>\n";
                                                }
                                            }
                                            ?>
                                        </select>
                                    </td>
                                </tr>
                                <?php
                            }*/
                            ?>

                            <?php
                            if ($content['type'] == 'document' || evo()->getManagerApi()->action == '4') { ?>
                                <tr>
                                    <td colspan="2">
                                        <hr>
                                        <!-- Content -->
                                        <div class="clearfix">
                                            <span id="content_header"><?= __('global.resource_content') ?></span>
                                            <label class="float-right"><?= __('global.which_editor_title') ?>
                                                <select id="which_editor" class="form-control form-control-sm" size="1"
                                                        name="which_editor" onchange="changeRTE();">
                                                    <option value="none"><?= __('global.none') ?></option>
                                                    <?php
                                                    // invoke OnRichTextEditorRegister event
                                                    $evtOut = evo()->invokeEvent('OnRichTextEditorRegister');
                                                    if (is_array($evtOut)) {
                                                        for ($i = 0; $i < count($evtOut); $i++) {
                                                            $editor = $evtOut[$i];
                                                            echo "\t\t\t", '<option value="', $editor, '"', (evo(
                                                            )->getConfig('which_editor') == $editor
                                                                ? ' selected="selected"'
                                                                : ''), '>', $editor, "</option>\n";
                                                        }
                                                    }
                                                    ?>
                                                </select>
                                            </label>
                                        </div>
                                        <div id="content_body">
                                            <?php
                                            if ((!empty($content['richtext']) ||
                                                    evo()->getManagerApi()->action == '4') &&
                                                evo()->getConfig('use_editor')
                                            ) {
                                                $htmlContent = get_by_key($content, 'content', '', 'is_scalar');
                                                ?>
                                                <div class="section-editor clearfix">
                                                        <textarea id="ta" name="ta"
                                                                  onchange="documentDirty=true;"><?= e(
                                                                    $htmlContent
                                                                ) ?></textarea>
                                                </div>
                                                <?php
                                                // Richtext-[*content*]
                                                $richtexteditorIds = [
                                                    evo()->getConfig('which_editor') => ['ta'],
                                                ];
                                                $richtexteditorOptions = [
                                                    evo()->getConfig('which_editor') => [
                                                        'ta' => '',
                                                    ],
                                                ];
                                            } else {
                                                echo "\t" .
                                                    '<div><textarea class="phptextarea" id="ta" name="ta" rows="20" wrap="soft" onchange="documentDirty=true;">', e(
                                                    get_by_key($content, 'content', '')
                                                ), '</textarea></div>' . "\n";
                                            }
                                            ?>
                                        </div>
                                    </td>
                                </tr>
                                <!-- end .sectionBody -->
                            <?php
                            } ?>
                        </table>

                        <?php

                        if (($content['type'] == 'document' || evo()->getManagerApi()->action == 4) ||
                            ($content['type'] == 'reference' || evo()->getManagerApi()->action == 72)
                        ) {
                            $template = getDefaultTemplate();
                            if (isset ($_REQUEST['newtemplate'])) {
                                $template = $_REQUEST['newtemplate'];
                            } else {
                                if (isset ($content['template'])) {
                                    $template = $content['template'];
                                }
                            }

                            $tvs = SiteTmplvar::query()
                                ->select(
                                    'site_tmplvars.*',
                                    'site_tmplvar_contentvalues.value',
                                    'site_tmplvar_templates.rank as tvrank',
                                    'site_tmplvar_templates.rank',
                                    'site_tmplvars.id',
                                    'site_tmplvars.rank'
                                )
                                ->join(
                                    'site_tmplvar_templates',
                                    'site_tmplvar_templates.tmplvarid',
                                    '=',
                                    'site_tmplvars.id'
                                )
                                ->leftJoin('site_tmplvar_contentvalues', function ($join) use ($id) {
                                    $join->on('site_tmplvar_contentvalues.tmplvarid', '=', 'site_tmplvars.id');
                                    $join->on('site_tmplvar_contentvalues.contentid', '=', DB::raw($id));
                                });

                            if ($group_tvs) {
                                $tvs = $tvs->select(
                                    'site_tmplvars.*',
                                    'site_tmplvar_contentvalues.value',
                                    'categories.id as category_id',
                                    'categories.category as category_name',
                                    'categories.rank as category_rank',
                                    'site_tmplvar_templates.rank',
                                    'site_tmplvars.id',
                                    'site_tmplvars.rank'
                                );
                                $tvs = $tvs->leftJoin('categories', 'categories.id', '=', 'site_tmplvars.category');
                                //$sort = 'category_rank,category_id,' . $sort;
                                $tvs = $tvs->orderBy('category_rank', 'ASC');
                                $tvs = $tvs->orderBy('category_id', 'ASC');
                            }
                            $tvs = $tvs->orderBy('site_tmplvar_templates.rank', 'ASC');
                            $tvs = $tvs->orderBy('site_tmplvars.rank', 'ASC');
                            $tvs = $tvs->orderBy('site_tmplvars.id', 'ASC');
                            $tvs = $tvs->where('site_tmplvar_templates.templateid', $template);

                            if ($_SESSION['mgrRole'] != 1 && !empty($_SESSION['mgrDocgroups'])) {
                                $tvs->leftJoin(
                                    'site_tmplvar_access',
                                    'site_tmplvar_access.tmplvarid',
                                    '=',
                                    'site_tmplvars.id'
                                );
                                $tvs = $tvs->where(function ($query) {
                                    $query->whereNull('site_tmplvar_access.documentgroup')
                                        ->orWhereIn('site_tmplvar_access.documentgroup', $_SESSION['mgrDocgroups']);
                                });
                            }

                            $tvs = $tvs->get();
                            if (count($tvs) > 0) {
                                $tvsArray = $tvs->toArray();

                                $templateVariablesOutput = '';
                                $templateVariablesGeneral = '';

                                $i = $ii = 0;
                                $tab = '';
                                foreach ($tvsArray as $row) {
                                    $row['category'] = $row['category_name'] ?? '';
                                    if (!isset($row['category_id'])) {
                                        $row['category_id'] = 0;
                                        $row['category'] = __('global.no_category');
                                        $row['category_rank'] = 0;
                                    }
                                    if ($row['value'] == '') {
                                        $row['value'] = $row['default_text'];
                                    }
                                    if ($group_tvs && $row['category_id'] != 0) {
                                        $ii = 0;
                                        if ($tab !== $row['category_id']) {
                                            if ($group_tvs == 1 || $group_tvs == 3) {
                                                if ($i === 0) {
                                                    $templateVariablesOutput .= '
                            <div class="tab-section" id="tabTV_' . $row['category_id'] . '">
                                <div class="tab-header">' . e($row['category']) . '</div>
                                <div class="tab-body tmplvars">
                                    <table>' . "\n";
                                                } else {
                                                    $templateVariablesOutput .= '
                                    </table>
                                </div>
                            </div>

                            <div class="tab-section" id="tabTV_' . $row['category_id'] . '">
                                <div class="tab-header">' . e($row['category']) . '</div>
                                <div class="tab-body tmplvars">
                                    <table>';
                                                }
                                            } else {
                                                if ($group_tvs == 2 || $group_tvs == 4) {
                                                    if ($i === 0) {
                                                        $templateVariablesOutput .= '
                            <div id="tabTV_' . $row['category_id'] . '" class="tab-page tmplvars">
                                <h2 class="tab">' . e($row['category']) . '</h2>
                                <script>tpTemplateVariables.addTabPage(document.getElementById(\'tabTV_' .
                                                            $row['category_id'] . '\'));</script>

                                <div class="tab-body tmplvars">
                                    <table>';
                                                    } else {
                                                        $templateVariablesOutput .= '
                                    </table>
                                </div>
                            </div>

                            <div id="tabTV_' . $row['category_id'] . '" class="tab-page tmplvars">
                                <h2 class="tab">' . e($row['category']) . '</h2>
                                <script>tpTemplateVariables.addTabPage(document.getElementById(\'tabTV_' .
                                                            $row['category_id'] . '\'));</script>

                                <div class="tab-body tmplvars">
                                    <table>';
                                                    }
                                                } else {
                                                    if ($group_tvs == 5) {
                                                        if ($i === 0) {
                                                            $templateVariablesOutput .= '
                                <div id="tabTV_' . $row['category_id'] . '" class="tab-page tmplvars">
                                    <h2 class="tab">' . $row['category'] . '</h2>
                                    <script>tpSettings.addTabPage(document.getElementById(\'tabTV_' .
                                                                $row['category_id'] . '\'));</script>
                                    <table>';
                                                        } else {
                                                            $templateVariablesOutput .= '
                                    </table>
                                </div>

                                <div id="tabTV_' . $row['category_id'] . '" class="tab-page tmplvars">
                                    <h2 class="tab">' . e($row['category']) . '</h2>
                                    <script>tpSettings.addTabPage(document.getElementById(\'tabTV_' .
                                                                $row['category_id'] . '\'));</script>

                                    <table>';
                                                        }
                                                    }
                                                }
                                            }
                                            $split = 0;
                                        } else {
                                            $split = 1;
                                        }
                                    }

                                    // Go through and display all Template Variables
                                    if ($row['type'] == 'richtext' || $row['type'] == 'htmlarea') {
                                        // determine TV-options
                                        $tvOptions = evo()->parseProperties($row['elements']);
                                        if (!empty($tvOptions)) {
                                            // Allow different Editor with TV-option {"editor":"CKEditor4"} or &editor=Editor;text;CKEditor4
                                            $editor = $tvOptions['editor'] ?? evo()->getConfig('which_editor');
                                        }
                                        // Add richtext editor to the list
                                        $richtexteditorIds[$editor][] = 'tv' . $row['id'];
                                        $richtexteditorOptions[$editor]['tv' . $row['id']] = $tvOptions;
                                    }

                                    $templateVariablesTmp = '';

                                    // splitter
                                    if ($group_tvs) {
                                        if ((!empty($split) && $i) || $ii) {
                                            $templateVariablesTmp .= '
                                            <tr><td colspan="2"><div class="split"></div></td></tr>' . "\n";
                                        }
                                    } else {
                                        if ($i) {
                                            $templateVariablesTmp .= '
                                        <tr><td colspan="2"><div class="split"></div></td></tr>' . "\n";
                                        }
                                    }

                                    // post back value
                                    if (array_key_exists('tv' . $row['id'], $_POST)) {
                                        if (is_array($_POST['tv' . $row['id']])) {
                                            $tvPBV = implode('||', $_POST['tv' . $row['id']]);
                                        } else {
                                            $tvPBV = $_POST['tv' . $row['id']];
                                        }
                                    } else {
                                        $tvPBV = $row['value'];
                                    }

                                    $tvDescription = (!empty($row['description'])) ? '<br /><span class="comment">' .
                                        e($row['description']) . '</span>' : '';
                                    $tvInherited = (substr($tvPBV, 0, 8) == '@INHERIT')
                                        ? '<br /><span class="comment inherited">(' .
                                        __('global.tmplvars_inherited') . ')</span>' : '';
                                    $tvName = evo()->hasPermission('edit_template')
                                        ? '<br/><small class="protectedNode">[*' . e($row['name']) . '*]</small>'
                                        : '';

                                    $templateVariablesTmp .= '
                                        <tr>
                                            <td><span class="warning">' . e($row['caption']) . $tvName . '</span>' .
                                        $tvDescription . $tvInherited . '</td>
                                            <td><div style="position:relative;' . ($row['type'] == 'date' ? '' : '') .
                                        '">' .
                                        renderFormElement(
                                            $row['type'],
                                            $row['id'],
                                            $row['default_text'],
                                            $row['elements'],
                                            $tvPBV,
                                            '',
                                            $row,
                                            $tvsArray,
                                            $content,
                                            evo()->parseProperties($row['properties'], $row['name'], 'tv')
                                        ) .
                                        '</div></td>
                                        </tr>';

                                    if ($group_tvs && $row['category_id'] == 0) {
                                        $templateVariablesGeneral .= $templateVariablesTmp;
                                        $ii++;
                                    } else {
                                        $templateVariablesOutput .= $templateVariablesTmp;
                                        $tab = $row['category_id'];
                                        $i++;
                                    }
                                }

                                if ($templateVariablesGeneral) {
                                    echo '<table id="tabTV_0" class="tmplvars"><tbody>' . $templateVariablesGeneral .
                                        '</tbody></table>';
                                }

                                $templateVariables .= '
                        <!-- Template Variables -->' . "\n";
                                if (!$group_tvs) {
                                    $templateVariables .= '
                                    <div class="sectionHeader" id="tv_header">' .
                                        __('global.settings_templvars') . '</div>
                                        <div class="sectionBody tmplvars">
                                            <table>';
                                } else {
                                    if ($group_tvs == 2) {
                                        $templateVariables .= '
                    <div class="tab-section">
                        <div class="tab-header" id="tv_header">' . __('global.settings_templvars') . '</div>
                        <div class="tab-pane" id="paneTemplateVariables">
                            <script>
                                tpTemplateVariables = new WebFXTabPane(document.getElementById(\'paneTemplateVariables\'), ' .
                                            (evo()->getConfig('remember_last_tab') ? 'true' : 'false') . ');
                            </script>';
                                    } else {
                                        if ($group_tvs == 3) {
                                            $templateVariables .= '
                        <div id="templateVariables" class="tab-page tmplvars">
                            <h2 class="tab">' . __('global.settings_templvars') . '</h2>
                            <script>tpSettings.addTabPage(document.getElementById(\'templateVariables\'));</script>';
                                        } else {
                                            if ($group_tvs == 4) {
                                                $templateVariables .= '
                    <div id="templateVariables" class="tab-page tmplvars">
                        <h2 class="tab">' . __('global.settings_templvars') . '</h2>
                        <script>tpSettings.addTabPage(document.getElementById(\'templateVariables\'));</script>
                        <div class="tab-pane" id="paneTemplateVariables">
                            <script>
                                tpTemplateVariables = new WebFXTabPane(document.getElementById(\'paneTemplateVariables\'), ' .
                                                    (evo()->getConfig('remember_last_tab') ? 'true' : 'false') . ');
                            </script>';
                                            }
                                        }
                                    }
                                }
                                if ($templateVariablesOutput) {
                                    $templateVariables .= $templateVariablesOutput;
                                    $templateVariables .= '
                                    </table>
                                </div>' . "\n";
                                    if ($group_tvs == 1) {
                                        $templateVariables .= '
                            </div>' . "\n";
                                    } else {
                                        if ($group_tvs == 2 || $group_tvs == 4) {
                                            $templateVariables .= '
                            </div>
                        </div>
                    </div>' . "\n";
                                        } else {
                                            if ($group_tvs == 3) {
                                                $templateVariables .= '
                            </div>
                        </div>' . "\n";
                                            }
                                        }
                                    }
                                }
                                $templateVariables .= '
                        <!-- end Template Variables -->' . "\n";
                            }
                        }

                        // Template Variables
                        if ($group_tvs < 3 && $templateVariablesOutput) {
                            echo $templateVariables;
                        }
                        ?>

                    </div>
                    <!-- end #tabGeneral -->

                    <!-- Settings -->
                    <div class="tab-page" id="tabSettings">
                        <h2 class="tab"><?= __('global.settings_page_settings'); ?></h2>
                        <script>tpSettings.addTabPage(document.getElementById('tabSettings'))</script>

                        <table>
                            <?php
                            $mx_can_pub = evo()->hasPermission('publish_document') ? '' : 'disabled="disabled" ' ?>
                            <tr>
                                <td>
                                    <span class="warning"><?= __('global.resource_opt_published') ?></span>
                                    <i class="<?= ManagerTheme::getStyle('icon_question_circle') ?>"
                                       data-tooltip="<?= __('global.resource_opt_published_help') ?>"></i>
                                </td>
                                <td>
                                    <input <?= $mx_can_pub ?>name="publishedcheck" type="checkbox"
                                           class="checkbox" <?= (isset($content['published']) &&
                                        $content['published'] == 1) ||
                                    (!isset($content['published']) && evo()->getConfig('publish_default'))
                                        ? "checked" : '' ?> onclick="changestate(document.mutate.published);"/>
                                    <input type="hidden" name="published"
                                           value="<?= (isset($content['published']) &&
                                               $content['published'] == 1) ||
                                           (!isset($content['published']) && evo()->getConfig('publish_default'))
                                               ? 1 : 0 ?>"/>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <span class="warning"><?= __('global.page_data_publishdate') ?></span>
                                    <i class="<?= ManagerTheme::getStyle('icon_question_circle') ?>"
                                       data-tooltip="<?= __('global.page_data_publishdate_help') ?>"></i>
                                </td>
                                <td>
                                    <input type="text" id="pub_date" <?= $mx_can_pub ?>name="pub_date"
                                           class="DatePicker"
                                           value="<?= ((int) get_by_key($content, 'pub_date', 0, 'is_scalar') ===
                                           0 || !isset($content['pub_date'])
                                               ? ''
                                               : evo()->toDateFormat(
                                                   $content['pub_date']
                                               )) ?>" onblur="documentDirty=true;"/>
                                    <a href="javascript:" onclick="document.mutate.pub_date.value=''; return true;"
                                       onmouseover="window.status='<?= __('global.remove_date') ?>'; return true;" onmouseout="window.status=''; return true;">
                                        <i class="<?= ManagerTheme::getStyle('icon_calendar_close') ?>"
                                           title="<?= __('global.remove_date'); ?>"></i></a>
                                </td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>
                                    <em> <?= evo()->getConfig('datetime_format') ?> HH:MM:SS</em></td>
                            </tr>
                            <tr>
                                <td>
                                    <span class="warning"><?= __('global.page_data_unpublishdate') ?></span>
                                    <i class="<?= ManagerTheme::getStyle('icon_question_circle') ?>"
                                       data-tooltip="<?= __('global.page_data_unpublishdate_help') ?>"></i>
                                </td>
                                <td>
                                    <input type="text" id="unpub_date" <?= $mx_can_pub ?>name="unpub_date"
                                           class="DatePicker"
                                           value="<?= ((int) get_by_key($content, 'unpub_date', 0, 'is_scalar') ===
                                           0 || !isset($content['unpub_date'])
                                               ? ''
                                               : evo()->toDateFormat(
                                                   $content['unpub_date']
                                               )) ?>" onblur="documentDirty=true;"/>
                                    <a href="javascript:" onclick="document.mutate.unpub_date.value=''; return true;"
                                       onmouseover="window.status='<?= __('global.remove_date') ?>'; return true;" onmouseout="window.status=''; return true;">
                                        <i class="<?= ManagerTheme::getStyle('icon_calendar_close') ?>"
                                           title="<?= __('global.remove_date'); ?>"></i></a>
                                </td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>
                                    <em> <?= evo()->getConfig('datetime_format') ?> HH:MM:SS</em>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <div class='split'></div>
                                </td>
                            </tr>

                            <?php

                            if ($_SESSION['mgrRole'] == 1 || evo()->getManagerApi()->action != '27' ||
                                $_SESSION['mgrInternalKey'] == $content['createdby'] ||
                                evo()->hasPermission('change_resourcetype')
                            ) {
                                ?>
                                <tr>
                                    <td>
                                        <span class="warning"><?= __('global.resource_type'); ?></span>
                                        <i class="<?= ManagerTheme::getStyle('icon_question_circle') ?>"
                                           data-tooltip="<?= __('global.resource_type_message'); ?>"></i>
                                    </td>
                                    <td>
                                        <select name="type" class="inputBox" onchange="documentDirty=true;">
                                            <option value="document"<?= ($content['type'] === 'document' ||
                                                evo()->getManagerApi()->action == '85' ||
                                                evo()->getManagerApi()->action == '4') ? ' selected="selected"'
                                                : '' ?> ><?= __('global.resource_type_webpage') ?></option>
                                            <option value="reference"<?= ($content['type'] === 'reference' ||
                                                evo()->getManagerApi()->action == '72') ? ' selected="selected"'
                                                : '' ?> ><?= __('global.resource_type_weblink') ?></option>
                                        </select>
                                    </td>
                                </tr>

                                <tr>
                                    <td>
                                        <span class="warning"><?= __('global.page_data_contentType') ?></span>
                                        <i class="<?= ManagerTheme::getStyle('icon_question_circle') ?>"
                                           data-tooltip="<?= __('global.page_data_contentType_help') ?>"></i>
                                    </td>
                                    <td>
                                        <select name="contentType" class="inputBox" onchange="documentDirty=true;">
                                            <?php
                                            if (empty($content['contentType'])) {
                                                $content['contentType'] = 'text/html';
                                            }
                                            $custom_content_type =
                                                evo()->getConfig('custom_contenttype', 'text/html,text/plain,text/xml');
                                            $ct = explode(',', $custom_content_type);
                                            for ($i = 0; $i < count($ct); $i++) {
                                                echo "\t\t\t\t\t" . '<option value="' . $ct[$i] . '"' .
                                                    ($content['contentType'] == $ct[$i] ? ' selected="selected"' : '') .
                                                    '>' . $ct[$i] . "</option>\n";
                                            }
                                            ?>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <span class="warning"><?= __('global.resource_opt_contentdispo') ?></span>
                                        <i class="<?= ManagerTheme::getStyle('icon_question_circle') ?>"
                                           data-tooltip="<?= __('global.resource_opt_contentdispo_help') ?>"></i>
                                    </td>
                                    <td>
                                        <select name="content_dispo" class="inputBox" size="1"
                                                onchange="documentDirty=true;">
                                            <option value="0"<?= (empty($content['content_dispo'])
                                                ? ' selected="selected"' : '') ?>><?= __('global.inline') ?></option>
                                            <option value="1"<?= (!empty($content['content_dispo'])
                                                ? ' selected="selected"' : '') ?>><?= __('global.attachment') ?></option>
                                        </select>
                                    </td>
                                </tr>

                                <tr>
                                    <td colspan="2">
                                        <div class='split'></div>
                                    </td>
                                </tr>
                                <?php
                            } else {
                                if ($content['type'] != 'reference' && evo()->getManagerApi()->action != '72') {
                                    // non-admin managers creating or editing a document resource
                                    ?>
                                    <input type="hidden" name="contentType"
                                           value="<?= $content['contentType'] ?? 'text/html' ?>"/>
                                    <input type="hidden" name="type" value="document"/>
                                    <input type="hidden" name="content_dispo"
                                           value="<?= $content['content_dispo'] ?? '0' ?>"/>
                                    <?php
                                } else {
                                    // non-admin managers creating or editing a reference (weblink) resource
                                    ?>
                                    <input type="hidden" name="type" value="reference"/>
                                    <input type="hidden" name="contentType" value="text/html"/>
                                    <?php
                                }
                            }//if mgrRole
                            ?>

                            <tr>
                                <td>
                                    <span class="warning"><?= __('global.resource_opt_folder'); ?></span>
                                    <i class="<?= ManagerTheme::getStyle('icon_question_circle') ?>"
                                       data-tooltip="<?= __('global.resource_opt_folder_help'); ?>"></i>
                                </td>
                                <td>
                                    <input name="isfoldercheck" type="checkbox"
                                           class="checkbox" <?= ((!empty($content['isfolder']) ||
                                        evo()->getManagerApi()->action == '85') ? "checked" : '') ?>
                                           onclick="changestate(document.mutate.isfolder);"/>
                                    <input type="hidden" name="isfolder"
                                           value="<?= ((!empty($content['isfolder']) ||
                                               evo()->getManagerApi()->action == '85') ? 1 : 0) ?>"
                                           onchange="documentDirty=true;"/>
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    <span class="warning"><?= __('global.resource_opt_alvisibled') ?></span>
                                    <i class="<?= ManagerTheme::getStyle('icon_question_circle') ?>"
                                       data-tooltip="<?= __('global.resource_opt_alvisibled_help') ?>"></i>
                                </td>
                                <td>
                                    <input name="alias_visible_check" type="checkbox"
                                           class="checkbox" <?= ((!isset($content['alias_visible']) ||
                                        $content['alias_visible'] == 1) ? "checked" : '') ?>
                                           onclick="changestate(document.mutate.alias_visible);"/><input type="hidden"
                                                                                                         name="alias_visible"
                                                                                                         value="<?= ((!isset($content['alias_visible']) ||
                                                                                                             $content['alias_visible'] ==
                                                                                                             1) ? 1
                                                                                                             : 0) ?>"/>
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    <span class="warning"><?= __('global.resource_opt_richtext') ?></span>
                                    <i class="<?= ManagerTheme::getStyle('icon_question_circle') ?>"
                                       data-tooltip="<?= __('global.resource_opt_richtext_help') ?>"></i>
                                </td>
                                <td>
                                    <input name="richtextcheck" type="checkbox"
                                           class="checkbox" <?= (empty($content['richtext']) &&
                                    evo()->getManagerApi()->action == '27' ? '' : "checked") ?>
                                           onclick="changestate(document.mutate.richtext);"/>
                                    <input type="hidden" name="richtext" value="<?= (empty($content['richtext']) &&
                                    evo()->getManagerApi()->action == '27' ? 0 : 1) ?>"
                                           onchange="documentDirty=true;"/>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <span class="warning"><?= __('global.track_visitors_title') ?></span>
                                    <i class="<?= ManagerTheme::getStyle('icon_question_circle') ?>"
                                       data-tooltip="<?= __('global.resource_opt_trackvisit_help') ?>"></i>
                                </td>
                                <td>
                                    <input name="hide_from_treecheck" type="checkbox"
                                           class="checkbox" <?= empty($content['hide_from_tree']) ? 'checked="checked"'
                                        : '' ?> onclick="changestate(document.mutate.hide_from_tree);"/><input
                                            type="hidden" name="hide_from_tree"
                                            value="<?= empty($content['hide_from_tree']) ? 0 : 1 ?>"
                                            onchange="documentDirty=true;"/>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <span class="warning"><?= __('global.page_data_searchable') ?></span>
                                    <i class="<?= ManagerTheme::getStyle('icon_question_circle') ?>"
                                       data-tooltip="<?= __('global.page_data_searchable_help'); ?>"></i>
                                </td>
                                <td>
                                    <input name="searchablecheck" type="checkbox"
                                           class="checkbox" <?= (isset($content['searchable']) &&
                                        $content['searchable'] == 1) ||
                                    (!isset($content['searchable']) && evo()->getConfig('search_default'))
                                        ? "checked" : '' ?>
                                           onclick="changestate(document.mutate.searchable);"/>
                                    <input type="hidden"
                                           name="searchable"
                                           value="<?= ((isset($content['searchable']) &&
                                               $content['searchable'] ==
                                               1) ||
                                           (!isset($content['searchable']) &&
                                               evo()->getConfig(
                                                   'search_default'
                                               )) ? 1
                                               : 0) ?>"
                                           onchange="documentDirty=true;"/>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <span class="warning"><?= __('global.page_data_cacheable'); ?></span>
                                    <i class="<?= ManagerTheme::getStyle('icon_question_circle') ?>"
                                       data-tooltip="<?= __('global.page_data_cacheable_help'); ?>"></i>
                                </td>
                                <td>
                                    <input name="cacheablecheck" type="checkbox"
                                           class="checkbox" <?= ((isset($content['cacheable']) &&
                                        $content['cacheable'] == 1) ||
                                    (!isset($content['cacheable']) && evo()->getConfig('cache_default')) ? "checked"
                                        : '') ?> onclick="changestate(document.mutate.cacheable);"/>
                                    <input type="hidden" name="cacheable"
                                           value="<?= ((isset($content['cacheable']) &&
                                               $content['cacheable'] == 1) ||
                                           (!isset($content['cacheable']) && evo()->getConfig('cache_default')) ? 1
                                               : 0) ?>" onchange="documentDirty=true;"/>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <span class="warning"><?= __('global.resource_opt_emptycache') ?></span>
                                    <input type="hidden" name="syncsite" value="1"/>
                                    <i class="<?= ManagerTheme::getStyle('icon_question_circle') ?>"
                                       data-tooltip="<?= __('global.resource_opt_emptycache_help') ?>"></i>
                                </td>
                                <td>
                                    <input name="syncsitecheck" type="checkbox" class="checkbox" checked="checked"
                                           onclick="changestate(document.mutate.syncsite);"/>
                                </td>
                            </tr>
                        </table>
                    </div><!-- end #tabSettings -->
                <?php
                } ?>

                <?php
                //Template Variables
                if ($group_tvs > 2 && $templateVariablesOutput) {
                    echo $templateVariables;
                }
                ?>

                <?php
                /*******************************
                 * Document Access Permissions */
                if (evo()->hasAnyPermissions(['manage_groups', 'manage_document_permissions'])
                ) {
                    $groupsarray = [];
                    $sql = '';

                    $userGroups = array_unique(
                        MemberGroup::query()
                            ->join(
                                'membergroup_access',
                                'membergroup_access.membergroup',
                                '=',
                                'member_groups.user_group'
                            )
                            ->where('member_groups.member', evo()->getLoginUserID('mgr'))->pluck('documentgroup')
                            ->toArray()
                    );
                    $documentId = (evo()->getManagerApi()->action == '27'
                        ? $id : (!empty($_REQUEST['pid']) ? (int) $_REQUEST['pid'] : $content['parent'] ?? 0));
                    if ($documentId > 0) {
                        // Load up, the permissions from the parent (if new document) or existing document
                        $documentGroups = DocumentGroup::query()->where('document', $documentId)->get();
                        foreach ($documentGroups as $documentGroup) {
                            $groupsarray[] = $documentGroup->document_group . ',' . $documentGroup->id;
                        }

                        $groups = DocumentgroupName::query()
                            ->select('documentgroup_names.*', 'document_groups.id as link_id')
                            ->leftJoin('document_groups', function ($join) use ($documentId) {
                                $join->on('document_groups.document_group', '=', 'documentgroup_names.id');
                                $join->on('document_groups.document', '=', DB::raw($documentId));
                            })
                            ->orderBy('documentgroup_names.name')
                            ->get();
                    } else {
                        // Just load up the names, we're starting clean
                        $groups = DocumentgroupName::query()
                            ->select('documentgroup_names.*')
                            ->orderBy('documentgroup_names.name')
                            ->get();
                    }

                    // retain selected doc groups between post
                    if (isset($_POST['docgroups'])) {
                        $groupsarray = array_merge($groupsarray, $_POST['docgroups']);
                    }

                    // Setup Basic attributes for each Input box
                    $inputAttributes = [
                        'type' => 'checkbox',
                        'class' => 'checkbox',
                        'name' => 'docgroups[]',
                        'onclick' => 'makePublic(false);',
                    ];
                    $permissions = []; // New Permissions array list (this contains the HTML)
                    $permissions_yes = 0; // count permissions the current mgr user has
                    $permissions_no = 0; // count permissions the current mgr user doesn't have

                    // Loop through the permissions list
                    foreach ($groups as $group) {
                        $row = $group->toArray();
                        // Create an inputValue pair (group ID and group link (if it exists))
                        $inputValue = $row['id'] . ',' . ($row['link_id'] ?? 'new');
                        $inputId = 'group-' . $row['id'];

                        $checked = in_array($inputValue, $groupsarray);
                        if ($checked) {
                            $notPublic = true;
                        }

                        // Setup attributes for this Input box
                        $inputAttributes['id'] = $inputId;
                        $inputAttributes['value'] = $inputValue;
                        if ($checked) {
                            $inputAttributes['checked'] = 'checked';
                        } else {
                            unset($inputAttributes['checked']);
                        }
                        $disabled = !(in_array($row['id'], $userGroups) || evo()->hasPermission('manage_groups'));
                        if ($disabled) {
                            $inputAttributes['disabled'] = 'disabled';
                        } else {
                            unset($inputAttributes['disabled']);
                        }
                        // Create attribute string list
                        $inputString = [];
                        foreach ($inputAttributes as $k => $v) {
                            $inputString[] = $k . '="' . $v . '"';
                        }

                        // Make the <input> HTML
                        $inputHTML = '<input ' . implode(' ', $inputString) . ' />';

                        $permissions[] =
                            "\t\t" . '<li>' . $inputHTML . '<label for="' . $inputId . '">' . e($row['name']) .
                            '</label></li>';
                    }
                    if (count($userGroups) === 0 && !evo()->hasPermission('manage_groups')) {
                        $permissions = [];
                    }
                    // See if the Access Permissions section is worth displaying...
                    if (!empty($permissions)) {
                        // Add the "All Document Groups" item if we have rights in both contexts
                        if (evo()->hasPermission('manage_groups') || count($userGroups) == count($permissions)) {
                            array_unshift(
                                $permissions,
                                "\t\t" .
                                '<li><input type="checkbox" class="checkbox" name="chkalldocs" id="groupall"' .
                                (empty($notPublic) ? ' checked="checked"' : '') .
                                ' onclick="makePublic(true);" /><label for="groupall" class="warning">' .
                                __('global.all_doc_groups') . '</label></li>'
                            );
                        }
                        // Output the permissions list...
                        ?>
                        <!-- Access Permissions -->
                        <div class="tab-page" id="tabAccess">
                            <h2 class="tab" id="tab_access_header"><?= __('global.access_permissions') ?></h2>
                            <script>tpSettings.addTabPage(document.getElementById('tabAccess'))</script>
                            <script>
                              /* <![CDATA[ */
                              function makePublic (b) {
                                var notPublic = false
                                var f = document.forms['mutate']
                                var chkpub = f['chkalldocs']
                                var chks = f['docgroups[]']
                                if (!chks && chkpub) {
                                  chkpub.checked = true
                                  return false
                                } else if (!b && chkpub) {
                                  if (!chks.length) notPublic = chks.checked
                                  else for (var i = 0; i < chks.length; i++) if (chks[i].checked) notPublic = true
                                  chkpub.checked = !notPublic
                                } else {
                                  if (!chks.length) chks.checked = (b) ? false : chks.checked
                                  else for (var i = 0; i < chks.length; i++) if (b) chks[i].checked = false
                                  chkpub.checked = true
                                }
                              }

                              /* ]]> */
                            </script>
                            <p><?= __('global.access_permissions_docs_message'); ?></p>
                            <ul>
                                <?= implode("\n", $permissions) . "\n" ?>
                            </ul>
                        </div><!--div class="tab-page" id="tabAccess"-->
                        <?php
                    } // !empty($permissions)
                }
                /* End Document Access Permissions *
                 ***********************************/
                ?>

                <input type="submit" name="save" style="display:none"/>
                <?php

                // invoke OnDocFormRender event
                $evtOut = evo()->invokeEvent('OnDocFormRender', [
                    'id' => $id,
                    'template' => (int) get_by_key($content, 'template', 0, 'is_scalar'),
                ]);

                if (is_array($evtOut)) {
                    echo implode('', $evtOut);
                }
                ?>
            </div><!--div class="tab-pane" id="documentPane"-->
        </div><!--div class="sectionBody"-->
    </fieldset>
</form>

<script>
  storeCurTemplate()
</script>
<?php
if ((!empty($content['richtext']) || evo()->getManagerApi()->action == '4' || evo()->getManagerApi()->action == '72') &&
    evo()->getConfig('use_editor')
) {
    if (is_array($richtexteditorIds)) {
        foreach ($richtexteditorIds as $editor => $elements) {
            // invoke OnRichTextEditorInit event
            $evtOut = evo()->invokeEvent('OnRichTextEditorInit', [
                'editor' => $editor,
                'elements' => $elements,
                'options' => $richtexteditorOptions[$editor],
            ]);
            if (is_array($evtOut)) {
                echo implode('', $evtOut);
            }
        }
    }
}
?>
