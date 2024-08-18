<?php

use EvolutionCMS\Facades\ManagerTheme;
use EvolutionCMS\Facades\UrlProcessor;
use EvolutionCMS\Models\SiteContent;
use EvolutionCMS\Models\SiteTemplate;
use EvolutionCMS\Models\User;
use EvolutionCMS\Support\MakeTable;
use Illuminate\Support\Facades\Lang;

/** get the page to show document's data */
?>
@extends('manager::template.page')
@section('content')
    <?php
    /*include_once ManagerTheme::getFileProcessor('actions/document_data.static.php'); */ ?>
    <?php
    $id = (int) ($_REQUEST['id'] ?? 0);

    if (isset($_GET['opened'])) {
        $_SESSION['openedArray'] = $_GET['opened'];
    }

    if ($_SESSION['tree_show_only_folders']) {
        /** @var SiteContent $resource */
        $resource = SiteContent::query()->find($id);
        $parent = $id ? $resource->parent : 0;
        $isfolder = $resource->isfolder;
        if (!$isfolder && $parent != 0) {
            $id = $_REQUEST['id'] = $parent;
        }
    }

    // Get the document content
    $resources = SiteContent::withTrashed()->select('site_content.*')->distinct()
        ->leftJoin('document_groups', 'document_groups.document', '=', 'site_content.id')
        ->where('site_content.id', $id);
    if ($_SESSION['mgrRole'] != 1) {
        if (is_array($_SESSION['mgrDocgroups']) && count($_SESSION['mgrDocgroups']) > 0) {
            $resources = $resources->where(function ($q) {
                $q->where('site_content.privatemgr', 0)
                    ->orWhereIn('document_groups.document_group', $_SESSION['mgrDocgroups']);
            });
        } else {
            $resources = $resources->where('site_content.privatemgr', 0);
        }
    }

    $content = $resources->first();
    if (!$content) {
        evo()->webAlertAndQuit(__('global.access_permission_denied'));
    }
    $content = $content->toArray();

    $sd = isset($_REQUEST['dir']) ? '&dir=' . $_REQUEST['dir'] : '&dir=DESC';
    $sb = isset($_REQUEST['sort']) ? '&sort=' . $_REQUEST['sort'] : '&sort=createdon';
    $pg = isset($_REQUEST['page']) ? '&page=' . (int) $_REQUEST['page'] : '';
    $add_path = $sd . $sb . $pg;

    $actions = [
        'new' => 'index.php?pid=' . $_REQUEST['id'] . '&a=4',
        'newlink' => 'index.php?pid=' . $_REQUEST['id'] . '&a=72',
        'edit' => 'index.php?id=' . $_REQUEST['id'] . '&a=27',
        'save' => '',
        'delete' => 'index.php?id=' . $_REQUEST['id'] . '&a=6',
        'cancel' => 'index.php?' . ($id == 0 ? 'a=2' : 'a=3&r=1&id=' . $id . $add_path),
        'move' => 'index.php?id=' . $_REQUEST['id'] . '&a=51',
        'duplicate' => 'index.php?id=' . $_REQUEST['id'] . '&a=94',
        'view' => config('global.friendly_urls') ? UrlProcessor::makeUrl($id)
            : MODX_SITE_URL . 'index.php?id=' . $id,
    ];

    /**
     * "General" tab setup
     */

    // Get Creator's username
    $createdbyname = '';
    if ($user = User::query()->find($content['createdby'])) {
        $createdbyname = $user->username;
    }

    // Get Editor's username
    $editedbyname = '';
    if ($user = User::query()->find($content['editedby'])) {
        $editedbyname = $user->username;
    }

    // Get Template name
    $templatename = SiteTemplate::query()->where(
        'id',
        '=',
        $content['template']
    )->get()->toArray();
    if (!is_null($templatename)) {
        $templatename = $templatename[0]['templatename'];
    }

    // Set the item name for logger
    $_SESSION['itemname'] = $content['pagetitle'];

    if ($content['isfolder']) {
        /**
         * "View Children" tab setup
         */
        $maxpageSize = config('global.number_of_results');
        define('MAX_DISPLAY_RECORDS_NUM', $maxpageSize);

        // predefined constants
        $filter_sort = [
            'createdon' => __('global.createdon'),
            'pub_date' => __('global.page_data_publishdate'),
            'pagetitle' => __('global.pagetitle'),
            'menuindex' => __('global.resource_opt_menu_index'),
            'published' => __('global.resource_opt_is_published'),
        ];
        $filter_dir = [
            'ASC' => __('global.sort_asc'),
            'DESC' => __('global.sort_desc'),
        ];

        if ($_SESSION['mgrRole'] != 1) {
            if (is_array($_SESSION['mgrDocgroups']) && count($_SESSION['mgrDocgroups']) > 0) {
                $childs = $resources->where(function ($q) {
                    $q->where('site_content.privatemgr', 0)
                        ->orWhereIn('document_groups.document_group', $_SESSION['mgrDocgroups']);
                });
            } else {
                $childs = $resources->where('site_content.privatemgr', 0);
            }
        } else {
            // Get child document count
            $childs = SiteContent::query()->select('site_content.*')->distinct()
                ->leftJoin('document_groups', 'document_groups.document', '=', 'site_content.id')
                ->where('site_content.parent', $id);
        }

        $numRecords = $childs->count();

        $sort = $_REQUEST['sort'] ?? 'createdon';
        $dir = $_REQUEST['dir'] ?? 'DESC';
        $pg = isset($_REQUEST['page']) ? (int) $_REQUEST['page'] - 1 : 0;

        // Get child documents (with paging)

        if ($numRecords > 0) {
            $childs = $childs->orderBy(
                $sort,
                $dir
            )->offset($pg * MAX_DISPLAY_RECORDS_NUM)->limit(MAX_DISPLAY_RECORDS_NUM)->get();

            $resource = $childs->toArray();

            // CSS style for table
            //	$tableClass = 'grid';
            //	$rowHeaderClass = 'gridHeader';
            //	$rowRegularClass = 'gridItem';
            //	$rowAlternateClass = 'gridAltItem';
            $tableClass = 'table data nowrap';
            $columnHeaderClass = [
                'text-center',
                'text-left',
                'text-center',
                'text-center',
                'text-center',
                'text-center'
            ];
            $table = new MakeTable();
            $table->setTableClass($tableClass);
            $table->setColumnHeaderClass($columnHeaderClass);
            //	evo()->getMakeTable()->setRowHeaderClass($rowHeaderClass);
            //	evo()->getMakeTable()->setRowRegularClass($rowRegularClass);
            //	evo()->getMakeTable()->setRowAlternateClass($rowAlternateClass);

            // Table header
            $listTableHeader = [
                'docid' => __('global.id'),
                'title' => __('global.resource_title'),
                'createdon' => __('global.createdon'),
                'pub_date' => __('global.page_data_publishdate'),
                'status' => __('global.page_data_status'),
                'edit' => __('global.mgrlog_action'),
            ];
            $tbWidth = [
                '1%',
                '',
                '1%',
                '1%',
                '1%',
                '1%'
            ];
            $table->setColumnWidths($tbWidth);

            $icons = [
                'text/plain' => '<i class="' . ManagerTheme::getStyle('icon_document') . '"></i>',
                'text/html' => '<i class="' . ManagerTheme::getStyle('icon_document') . '"></i>',
                'text/xml' => '<i class="' . ManagerTheme::getStyle('icon_code_file') . '"></i>',
                'text/css' => '<i class="' . ManagerTheme::getStyle('icon_code_file') . '"></i>',
                'text/javascript' => '<i class="' . ManagerTheme::getStyle('icon_code_file') . '"></i>',
                'image/gif' => '<i class="' . ManagerTheme::getStyle('icon_image') . '"></i>',
                'image/jpg' => '<i class="' . ManagerTheme::getStyle('icon_image') . '"></i>',
                'image/png' => '<i class="' . ManagerTheme::getStyle('icon_image') . '"></i>',
                'application/pdf' => '<i class="' . ManagerTheme::getStyle('icon_pdf') . '"></i>',
                'application/rss+xml' => '<i class="' . ManagerTheme::getStyle('icon_code_file') . '"></i>',
                'application/vnd.ms-word' => '<i class="' . ManagerTheme::getStyle('icon_word') . '"></i>',
                'application/vnd.ms-excel' => '<i class="' . ManagerTheme::getStyle('icon_excel') . '"></i>',
            ];

            $listDocs = [];
            foreach ($resource as $k => $children) {
                switch ($children['id']) {
                    case config('global.site_start')            :
                        $icon = '<i class="' . ManagerTheme::getStyle('icon_home') . '"></i>';
                        break;
                    case config('global.error_page')            :
                        $icon = '<i class="' . ManagerTheme::getStyle('icon_info_triangle') . '"></i>';
                        break;
                    case config('global.site_unavailable_page') :
                        $icon = '<i class="' . ManagerTheme::getStyle('icon_clock') . '"></i>';
                        break;
                    case config('global.unauthorized_page')     :
                        $icon = '<i class="' . ManagerTheme::getStyle('icon_info') . '"></i>';
                        break;
                    default:
                        if ($children['isfolder']) {
                            $icon = '<i class="' . ManagerTheme::getStyle('icon_folder') . '"></i>';
                        } else {
                            $icon = $icons[$children['contentType']] ??
                                '<i class="' . ManagerTheme::getStyle('icon_document') . '"></i>';
                        }
                }

                $private = ($children['privateweb'] || $children['privatemgr'] ? ' private' : '');

                // дописываем в заголовок класс для неопубликованных плюс по всем ссылкам обратный путь
                // для сохранения сортировки
                $class = ($children['deleted']
                    ? 'text-danger text-decoration-through'
                    : (!$children['published'] ? ' font-italic text-muted'
                        : ' publish'));
                //$class .= ($children['hidemenu'] ? ' text-muted' : ' text-primary');
                //$class .= ($children['isfolder'] ? ' font-weight-bold' : '');
                if (evo()->hasPermission('edit_document')) {
                    $title = '<span class="doc-item' . $private . '">' . $icon . '<a href="index.php?a=27&id=' .
                        $children['id'] . $add_path . '">' . '<span class="' . $class . '">' . e(
                            $children['pagetitle']
                        ) . '</span></a></span>';
                } else {
                    $title =
                        '<span class="doc-item' . $private . '">' . $icon . '<span class="' . $class . '">' . e(
                            $children['pagetitle']
                        ) . '</span></span>';
                }

                $icon_pub_unpub = (!$children['published'])
                    ? '<a href="index.php?a=61&id=' . $children['id'] . $add_path . '" title="' .
                    __('global.publish_resource') . '"><i class="' .
                    ManagerTheme::getStyle('icon_check') . '"></i></a>'
                    : '<a href="index.php?a=62&id=' . $children['id'] . $add_path . '" title="' .
                    __('global.unpublish_resource') . '"><i class="' .
                    ManagerTheme::getStyle('icon_close') . '" ></i></a>';

                $icon_del_undel = (!$children['deleted'])
                    ? '<a onclick="return confirm(`' . __('global.confirm_delete_resource') .
                    '`)" href="index.php?a=6&id=' . $children['id'] . $add_path . '" title="' .
                    __('global.delete_resource') . '"><i class="' .
                    ManagerTheme::getStyle('icon_trash') . '"></i></a>'
                    : '<a onclick="return confirm(`' . __('global.confirm_undelete') .
                    '`)" href="index.php?a=63&id=' . $children['id'] . $add_path . '" title="' .
                    __('global.undelete_resource') . '"><i class="' .
                    ManagerTheme::getStyle('icon_undo') . '"></i></a>';

                $listDocs[] = [
                    'docid' => '<div class="text-right">' . $children['id'] . '</div>',
                    'title' => $title,
                    'createdon' => '<div class="text-right">' . (evo()->toDateFormat(
                            strtotime($children['createdon']),
                            'dateOnly'
                        )) . '</div>',
                    'pub_date' => '<div class="text-right">' . ($children['pub_date'] ? (evo()->toDateFormat(
                            $children['pub_date'] + evo()->timestamp(0),
                            'dateOnly'
                        )) : '') . '</div>',
                    'status' => '<div class="text-nowrap">' . ($children['published'] == 0
                            ? '<span class="unpublishedDoc">' . __('global.page_data_unpublished') .
                            '</span>'
                            : '<span class="publishedDoc">' . __('global.page_data_published') .
                            '</span>') . '</div>',
                    'edit' => '<div class="actions text-center text-nowrap">' .
                        (evo()->hasPermission('edit_document') ? '<a href="index.php?a=27&id=' . $children['id'] .
                            $add_path . '" title="' . __('global.edit') . '"><i class="' .
                            ManagerTheme::getStyle('icon_edit') . '"></i></a>
                    <a href="index.php?a=51&id=' . $children['id'] . $add_path . '" title="' .
                            __('global.move') . '"><i
                    class="' . ManagerTheme::getStyle('icon_move') . '"></i></a>' . $icon_pub_unpub : '') .
                        (evo()->hasPermission('delete_document') ? $icon_del_undel : '') . '</div>'
                ];
            }

            $table->createPagingNavigation($numRecords, 'a=3&id=' . $content['id'] . '&dir=' . $dir . '&sort=' . $sort);
            $children_output = $table->create($listDocs, $listTableHeader, 'index.php?a=3&id=' . $content['id']);
        } else {
            // No Child documents
            $children_output =
                '<div class="container"><p>' . __('global.resources_in_container_no') . '</p></div>';
            $add_path = '';
        }
    }

    ?>
    <script>
      var actions = {
        new: function () {
          document.location.href = "{!! $actions['new'] !!}"
        },
        newlink: function () {
          document.location.href = "{!! $actions['newlink'] !!}"
        },
        edit: function () {
          document.location.href = "{!! $actions['edit'] !!}"
        },
        save: function () {
          documentDirty = false
          form_save = true
          document.mutate.save.click()
        },
        delete: function () {
          if (confirm(`{{ __('global.confirm_delete_resource') }}`) === true) {
            document.location.href = "{!! $actions['delete'] !!}"
          }
        },
        cancel: function () {
          documentDirty = false
          document.location.href = "{!! $actions['cancel'] !!}"
        },
        move: function () {
          document.location.href = "{!! $actions['move'] !!}"
        },
        duplicate: function () {
          if (confirm(`{{ __('global.confirm_resource_duplicate') }}`) === true) {
            document.location.href = "{!! $actions['duplicate'] !!}"
          }
        },
        view: function () {
          window.open('{!! $actions['view'] !!}', 'previewWin')
        }
      }
    </script>
    <script src="media/script/tablesort.js"></script>

    <h1>
        <i class="{{ ManagerTheme::getStyle('icon_info') }}"></i>
        {{ Str::limit($content['pagetitle'], 50, '...') }}
        <small>({{ (int)$_REQUEST['id'] }})</small>
    </h1>

    {!! ManagerTheme::getStyle('actionbuttons')['static']['document'] !!}

    <div class="tab-pane" id="childPane">
        <script>
          docSettings = new WebFXTabPane(
            document.getElementById('childPane'), @if(config('global.remember_last_tab')) true
          @else false @endif
          );
        </script>

        <!-- General -->
        <div class="tab-page" id="tabdocGeneral">
            <h2 class="tab">{{ __('global.settings_general') }}</h2>
            <script>docSettings.addTabPage(document.getElementById('tabdocGeneral'))</script>
            <div class="container container-body">
                <table>
                    <tr>
                        <td colspan="2"><b>{{ __('global.page_data_general') }}</b></td>
                    </tr>
                    <tr>
                        <td width="200" valign="top">{{ __('global.resource_title') }}:</td>
                        <td><b><?= e($content['pagetitle']) ?></b></td>
                    </tr>
                    <tr>
                        <td width="200" valign="top">{{ __('global.long_title') }}:</td>
                        <td>
                            <small><?= $content['longtitle'] != '' ? e(
                                    $content['longtitle']
                                ) : "(<i>" . __('global.not_set') . "</i>)" ?></small>
                        </td>
                    </tr>
                    <tr>
                        <td valign="top">{{ __('global.resource_description') }}:</td>
                        <td><?= $content['description'] != '' ? e(
                                $content['description']
                            ) : "(<i>" . __('global.not_set') . "</i>)" ?></td>
                    </tr>
                    <tr>
                        <td valign="top">{{ __('global.resource_summary') }}:</td>
                        <td><?= $content['introtext'] != '' ? e(
                                $content['introtext']
                            ) : "(<i>" . __('global.not_set') . "</i>)" ?></td>
                    </tr>
                    <tr>
                        <td valign="top">{{ __('global.type') }}:</td>
                        <td><?= $content['type'] == 'reference' ? __('global.weblink')
                                : __('global.resource') ?></td>
                    </tr>
                    <tr>
                        <td valign="top">{{ __('global.resource_alias') }}:</td>
                        <td><?= $content['alias'] != '' ? e(
                                $content['alias']
                            ) : "(<i>" . __('global.not_set') . "</i>)" ?></td>
                    </tr>
                    <tr>
                        <td colspan="2">&nbsp;</td>
                    </tr>
                    <tr>
                        <td colspan="2"><b>{{ __('global.page_data_changes') }}</b></td>
                    </tr>
                    <tr>
                        <td>{{ __('global.page_data_created') }}:</td>
                        <td><?= evo()->toDateFormat(strtotime($content['createdon'])) ?>
                            (<b><?= e($createdbyname) ?></b>)
                        </td>
                    </tr>
                    <?php
                    if ($editedbyname != '') { ?>
                    <tr>
                        <td>{{ __('global.page_data_edited') }}:</td>
                        <td><?= evo()->toDateFormat(strtotime($content['editedon'])) ?>
                            (<b><?= e($editedbyname) ?></b>)
                        </td>
                    </tr>
                        <?php
                    } ?>
                    <tr>
                        <td colspan="2">&nbsp;</td>
                    </tr>
                    <tr>
                        <td colspan="2"><b>{{ __('global.page_data_status') }}</b></td>
                    </tr>
                    <tr>
                        <td>{{ __('global.page_data_status') }}:</td>
                        <td><?= $content['published'] == 0
                                ? '<span class="unpublishedDoc">' . __('global.page_data_unpublished') .
                                '</span>'
                                : '<span class="publisheddoc">' . __('global.page_data_published') .
                                '</span>' ?></td>
                    </tr>
                    <tr>
                        <td>{{ __('global.page_data_publishdate') }}:</td>
                        <td><?= $content['pub_date'] == 0 ? "(<i>" . __('global.not_set') . "</i>)"
                                : evo()->toDateFormat($content['pub_date']) ?></td>
                    </tr>
                    <tr>
                        <td>{{ __('global.page_data_unpublishdate') }}:</td>
                        <td><?= $content['unpub_date'] == 0 ? "(<i>" . __('global.not_set') . "</i>)"
                                : evo()->toDateFormat($content['unpub_date']) ?></td>
                    </tr>
                    <tr>
                        <td>{{ __('global.page_data_cacheable') }}:</td>
                        <td><?= $content['cacheable'] == 0
                                ? __('global.no')
                                : __('global.yes') ?></td>
                    </tr>
                    <tr>
                        <td>{{ __('global.page_data_searchable') }}:</td>
                        <td><?= $content['searchable'] == 0
                                ? __('global.no')
                                : __('global.yes') ?></td>
                    </tr>
                    <tr>
                        <td>{{ __('global.resource_opt_menu_index') }}:</td>
                        <td><?= e($content['menuindex']) ?></td>
                    </tr>
                    <tr>
                        <td>{{ __('global.resource_opt_show_menu') }}:</td>
                        <td><?= $content['hidemenu'] == 1
                                ? __('global.no')
                                : __('global.yes') ?></td>
                    </tr>
                    <tr>
                        <td>{{ __('global.page_data_web_access') }}:</td>
                        <td><?= $content['privateweb'] == 0
                                ? __('global.public')
                                : '<b style="color: #821517">' . __('global.private') .
                                '</b><i class="' . ManagerTheme::getStyle('icon_lock') . '"></i>' ?></td>
                    </tr>
                    <tr>
                        <td>{{ __('global.page_data_mgr_access') }}:</td>
                        <td><?= $content['privatemgr'] == 0
                                ? __('global.public')
                                : '<b style="color: #821517">' . __('global.private') .
                                '</b><i class="' . ManagerTheme::getStyle('icon_lock') . '"></i>' ?></td>
                    </tr>
                    <tr>
                        <td colspan="2">&nbsp;</td>
                    </tr>
                    <tr>
                        <td colspan="2"><b>{{ __('global.page_data_markup') }}</b></td>
                    </tr>
                    <tr>
                        <td>{{ __('global.page_data_template') }}:</td>
                        <td><?= $content['template'] == 0
                                ? "(<i>" . __('global.not_set') . "</i>)"
                                : e(
                                    $templatename
                                ) ?></td>
                    </tr>
                    <tr>
                        <td>{{ __('global.page_data_editor') }}:</td>
                        <td><?= $content['richtext'] == 0
                                ? __('global.no')
                                : __('global.yes') ?></td>
                    </tr>
                    <tr>
                        <td>{{ __('global.page_data_folder') }}:</td>
                        <td><?= $content['isfolder'] == 0
                                ? __('global.no')
                                : __('global.yes') ?></td>
                    </tr>
                </table>
            </div>
        </div><!-- end tab-page -->

        @if($content['isfolder'])
            <!-- View Children -->
            <div class="tab-page" id="tabChildren">
                <h2 class="tab">{{ __('global.view_child_resources_in_container') }}</h2>
                <script>docSettings.addTabPage(document.getElementById('tabChildren'))</script>
                <div class="container container-body">
                    <div class="form-group clearfix">
                        @if($numRecords > 0)
                            <div class="float-xs-left">
                                <span class="publishedDoc">{{ $numRecords }} {{ __('global.resources_in_container') }} (<strong>{{ e($content['pagetitle']) }}</strong>)</span>
                            </div>
                        @endif
                        <div class="float-right">
                            @if($numRecords > 0)
                                <select size="1" name="sort" class="form-control form-control-sm"
                                        onchange="document.location='index.php?a=3&id={{ $id }}&dir={{ $dir }}&sort=' + this.options[this.selectedIndex].value">
                                    @foreach($filter_sort as $key => $val)
                                        <option value="{{ $key }}"
                                                @if($key == $sort) selected @endif>{{ $val }}</option>
                                    @endforeach
                                </select>
                                <select size="1" name="dir" class="form-control form-control-sm"
                                        onchange="document.location='index.php?a=3&id={{ $id }}&sort={{ $sort }}&dir=' + this.options[this.selectedIndex].value">
                                    @foreach($filter_dir as $key => $val)
                                        <option value="{{ $key }}" @if($key == $dir) selected @endif>{{ $val }}</option>
                                    @endforeach
                                </select>
                            @endif
                        </div>
                    </div>
                    <div class="row">
                        <div class="table-responsive">{!! $children_output !!}</div>
                    </div>
                </div>
            </div><!-- end tab-page -->
        @endif

    </div><!-- end documentPane -->

    @if(is_numeric(get_by_key($_GET, 'tab')))
        <script>
          docSettings.setSelectedIndex({{ $_GET['tab'] }})
        </script>
    @endif

    @if(!empty($show_preview))
        <div class="sectionHeader">{{ __('global.preview') }}</div>
        <div class="sectionBody" id="lyr2">
            <iframe src="{{ MODX_SITE_URL }}index.php?id={{ $id }}&z=manprev" frameborder="0" border="0"
                    id="previewIframe"></iframe>
        </div>
    @endif
@endsection
