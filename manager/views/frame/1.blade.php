<?php

use EvolutionCMS\Facades\ManagerTheme;

?><!DOCTYPE html>
<html lang="{{ config('global.manager_language') }}" xml:lang="{{ config('global.manager_language') }}">
<head>
    <title>{{ config('global.site_name') }} - (Evolution CMS Manager)</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport" content="initial-scale=1.0,user-scalable=no,maximum-scale=1,width=device-width"/>
    <meta name="theme-color" content="#1d2023"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <link rel="stylesheet" type="text/css" href="{{ $css }}"/>
    @if (config('global.show_picker'))
        <link rel="stylesheet" href="media/style/common/spectrum/spectrum.css"/>
        <link rel="stylesheet" type="text/css" href="{{ ManagerTheme::getThemeUrl() }}css/color.switcher.css"/>
    @endif
    <link rel="icon" type="image/ico" href="{{ ManagerTheme::getStyle('favicon') }}"/>
    <style>
        #tree {
            width: {{ $MODX_widthSideBar }}rem
        }
        #main,
        #resizer {
            left: {{ $MODX_widthSideBar }}rem
        }
        .ios #main {
            -webkit-overflow-scrolling: touch;
            overflow-y: scroll;
        }
    </style>
    <script>
      if (/iPhone|iPad|iPod/i.test(navigator.userAgent)) {
        document.documentElement.className += ' ios'
      }
    </script>
    <script src="media/script/jquery/jquery.min.js"></script>
    <script>
      // GLOBAL variable modx
      var modx = {
        MGR_DIR: '{{ MGR_DIR }}',
        MODX_SITE_URL: '{{ MODX_SITE_URL }}',
        MODX_MANAGER_URL: '{{ MODX_MANAGER_URL }}',
        user: {
          role: {{ (int) $user['role'] }},
          username: '{{ $user['username'] }}',
          groups: {!! json_encode(evo()->getUserDocGroups()) !!}
        },
        config: {
          manager_title: '{{ config('global.site_name') }} - (Evolution CMS Manager)',
          menu_height: {{ (int) config('global.manager_menu_height') }},
          tree_width: {{ (int) $MODX_widthSideBar }},
          tree_min_width: {{ (int) $tree_min_width }},
          session_timeout: {{ (int) config('global.session_timeout') }},
          site_start: {{ (int) config('global.site_start') }},
          tree_page_click: {{ config('global.tree_page_click') }},
          theme: '{{ ManagerTheme::getTheme() }}',
          theme_mode: '{{ ManagerTheme::getThemeStyle() }}',
          which_browser: '{{ $user['which_browser'] }}',
          layout: {{ (int) config('global.manager_layout') }},
          textdir: 'ltr',
          global_tabs: {{ (int) config('global.global_tabs') }}
        },
        lang: {
          already_deleted: "{{ __('global.already_deleted') }}",
          cm_unknown_error: "{{ __('global.cm_unknown_error') }}",
          collapse_tree: "{{ __('global.collapse_tree') }}",
          confirm_delete_resource: "{{ __('global.confirm_delete_resource') }}",
          confirm_empty_trash: "{{ __('global.confirm_empty_trash') }}",
          confirm_publish: "{!! __('global.confirm_publish') !!}",
          confirm_remove_locks: "{!! __('global.confirm_remove_locks') !!}",
          confirm_resource_duplicate: "{{ __('global.confirm_resource_duplicate') }}",
          confirm_undelete: "{{ __('global.confirm_undelete') }}",
          confirm_unpublish: "{!! __('global.confirm_unpublish') !!}",
          empty_recycle_bin: "{{ __('global.empty_recycle_bin') }}",
          empty_recycle_bin_empty: "{{ __('global.empty_recycle_bin_empty') }}",
          error_no_privileges: "{{ __('global.error_no_privileges') }}",
          expand_tree: "{{ __('global.expand_tree') }}",
          loading_doc_tree: "{{ __('global.loading_doc_tree') }}",
          loading_menu: "{{ __('global.loading_menu') }}",
          not_deleted: "{{ __('global.not_deleted') }}",
          unable_set_link: "{{ __('global.unable_set_link') }}",
          unable_set_parent: "{{ __('global.unable_set_parent') }}",
          working: "{{ __('global.working') }}",
          paging_prev: "{{ __('global.paging_prev') }}"
        },
        style: {
          actions_file: '<?= addslashes(ManagerTheme::getStyle('icon_file')) ?>',
          actions_pencil: '<?= addslashes(ManagerTheme::getStyle('icon_pencil')) ?>',
          actions_plus: '<?= addslashes(ManagerTheme::getStyle('icon_plus')) ?>',
          actions_reply: '<?= addslashes(ManagerTheme::getStyle('icon_reply')) ?>',
          collapse_tree: '<?= addslashes('<i class="' . ManagerTheme::getStyle('icon_arrow_up_circle') . '"></i>') ?>',
          email: '<?= addslashes('<i class="' . ManagerTheme::getStyle('icon_mail') . '"></i>') ?>',
          expand_tree: '<?= addslashes('<i class="' . ManagerTheme::getStyle('icon_arrow_down_circle') . '"></i>') ?>',

          icon_angle_left: '<?= addslashes(ManagerTheme::getStyle('icon_angle_left')) ?>',
          icon_angle_right: '<?= addslashes(ManagerTheme::getStyle('icon_angle_right')) ?>',
          icon_chunk: '<?= addslashes(ManagerTheme::getStyle('icon_chunk')) ?>',
          icon_circle: '<?= addslashes(ManagerTheme::getStyle('icon_circle')) ?>',
          icon_code: '<?= addslashes(ManagerTheme::getStyle('icon_code')) ?>',
          icon_edit: '<?= addslashes(ManagerTheme::getStyle('icon_edit')) ?>',
          icon_element: '<?= addslashes(ManagerTheme::getStyle('icon_elements')) ?>',
          icon_folder: '<?= addslashes('<i class="' . ManagerTheme::getStyle('icon_folder') . '"></i>') ?>',
          icon_plugin: '<?= addslashes(ManagerTheme::getStyle('icon_plugin')) ?>',
          icon_refresh: '<?= addslashes(ManagerTheme::getStyle('icon_refresh')) ?>',
          icon_spin: '<?= addslashes(ManagerTheme::getStyle('icon_spin')) ?>',
          icon_template: '<?= addslashes(ManagerTheme::getStyle('icon_template')) ?>',
          icon_trash: '<?= addslashes('<i class="' . ManagerTheme::getStyle('icon_trash') . '"></i>') ?>',
          icon_trash_alt: '<?= addslashes('<i class="' . ManagerTheme::getStyle('icon_trash_alt') . '"></i>') ?>',
          icon_tv: '<?= addslashes(ManagerTheme::getStyle('icon_tv')) ?>',
          icons_external_link: '<?= addslashes(
              '<i class="' . ManagerTheme::getStyle('icon_external_link') . '"></i>'
          ) ?>',
          icons_working: '<?= addslashes('<i class="' . ManagerTheme::getStyle('icon_info_triangle') . '"></i>') ?>',

          tree_folder: '<?= addslashes('<i class="' . ManagerTheme::getStyle('icon_folder') . '"></i>') ?>',
          tree_folder_secure: '<?= addslashes('<i class="' . ManagerTheme::getStyle('icon_folder') . '"></i>') ?>',
          tree_folderopen: '<?= addslashes('<i class="' . ManagerTheme::getStyle('icon_folder_open') . '"></i>') ?>',
          tree_folderopen_secure: '<?= addslashes(
              '<i class="' . ManagerTheme::getStyle('icon_folder_open') . '"></i>'
          ) ?>',
          tree_info: '<?= addslashes('<i class="' . ManagerTheme::getStyle('icon_info_circle') . '"></i>') ?>',
          tree_minusnode: '<?= addslashes('<i class="' . ManagerTheme::getStyle('icon_angle_down') . '"></i>') ?>',
          tree_plusnode: '<?= addslashes('<i class="' . ManagerTheme::getStyle('icon_angle_right') . '"></i>') ?>',
          tree_preview_resource: '<?= addslashes('<i class="' . ManagerTheme::getStyle('icon_eye') . '"></i>') ?>'
        },
        permission: {
          assets_images: <?= (int) evo()->hasPermission('assets_images') ?>,
          delete_document: <?= (int) evo()->hasPermission('delete_document') ?>,
          edit_chunk: <?= (int) evo()->hasPermission('edit_chunk') ?>,
          edit_plugin: <?= (int) evo()->hasPermission('edit_plugin') ?>,
          edit_snippet: <?= (int) evo()->hasPermission('edit_snippet') ?>,
          edit_template: <?= (int) evo()->hasPermission('edit_template') ?>,
          new_document: <?= (int) evo()->hasPermission('new_document') ?>,
          publish_document: <?= (int) evo()->hasPermission('publish_document') ?>,
          dragndropdocintree: <?= (int) evo()->hasPermission('new_document') && evo()->hasPermission('edit_document') &&
          evo()->hasPermission('save_document') ?>
        },
        plugins: {
          ElementsInTree: <?= (int) isset(evo()->pluginCache['ElementsInTree']) ?>,
          EVOmodal: <?= (int) isset(evo()->pluginCache['EVO.modal']) ?>
        },
        extend: function () {
          for (var i = 1; i < arguments.length; i++) {
            for (var key in arguments[i]) {
              if (arguments[i].hasOwnProperty(key)) {
                arguments[0][key] = arguments[i][key]
              }
            }
          }
          return arguments[0]
        },
        extended: function (a) {
          for (var b in a) {
            this[b] = a[b]
          }
          delete a[b]
        },
        openedArray: [],
        lockedElementsTranslation: <?= json_encode($unlockTranslations, JSON_FORCE_OBJECT | JSON_UNESCAPED_UNICODE) .
        "\n" ?>
      }
        <?php
        $opened = array_filter(
            array_map(
                'intval',
                explode(
                    '|',
                    isset($_SESSION['openedArray']) && is_scalar($_SESSION['openedArray']) ? $_SESSION['openedArray']
                        : ''
                )
            )
        );
        echo (empty($opened) ? ''
                : 'modx.openedArray[' . implode("] = 1;\n		modx.openedArray[", $opened) . '] = 1;') . "\n";
        ?>
    </script>
    <script src="{{ ManagerTheme::getThemeUrl() }}js/modx.js?v={{ evo()->getVersionData('version') }}">
    </script>
    @if (config('global.show_picker'))
        <script src="media/script/bootstrap/js/bootstrap.min.js"></script>
        <script src="media/script/spectrum/spectrum.evo.min.js"></script>
        <script src="{{ ManagerTheme::getThemeUrl() }}js/color.switcher.js"></script>
    @endif
    <?php
    // invoke OnManagerTopPrerender event
    $evtOut = evo()->invokeEvent('OnManagerTopPrerender', $_REQUEST);
    if (is_array($evtOut)) {
        echo implode("\n", $evtOut);
    }
    ?>
</head>

<body class="{{ $body_class }}">
<input type="hidden" name="sessToken" id="sessTokenInput" value="<?= $_SESSION['mgrToken'] ?? '' ?>"/>
<div id="frameset">
    <div id="mainMenu" class="dropdown">
        <div class="container">
            <div class="row">
                <div class="cell" data-evocp="bgmColor">
                    {!! $menu !!}
                </div>
                <div class="cell" data-evocp="bgmColor">
                    <ul id="settings" class="nav">
                        <li id="searchform">
                            <form action="index.php?a=71" method="post" target="main">
                                @csrf
                                <input type="hidden" value="Search" name="submitok"/>
                                <label for="searchid" class="label_searchid">
                                    <i class="{{ ManagerTheme::getStyle('icon_search') }}"></i>
                                </label>
                                <input type="text" id="searchid" name="searchid" size="25"/>
                                <div class="mask"></div>
                            </form>
                        </li>
                        @if (config('global.show_newresource_btn') && evo()->hasPermission('new_document'))
                            <li id="newresource" class="dropdown newresource">
                                <a href="javascript:;" class="dropdown-toggle" onclick="return false;"
                                   title="{{ __('global.add_resource') }}"><i
                                            class="{{ ManagerTheme::getStyle('icon_plus') }}"></i></a>
                                <ul class="dropdown-menu">
                                    @if (evo()->hasPermission('new_document'))
                                        <li>
                                            <a onclick="" href="index.php?a=4" target="main">
                                                <i class="{{ ManagerTheme::getStyle('icon_document') }}"></i>
                                                {{ __('global.add_resource') }}
                                            </a>
                                        </li>
                                        <li>
                                            <a onclick="" href="index.php?a=72" target="main">
                                                <i class="{{ ManagerTheme::getStyle('icon_chain') }}"></i>
                                                {{ __('global.add_weblink') }}
                                            </a>
                                        </li>
                                    @endif
                                    @if (config('global.use_browser') && evo()->hasPermission('assets_images'))
                                        <li>
                                            <a onclick=""
                                               href="media/browser/{{ config('global.which_browser') }}/browse.php?&type=images"
                                               target="main">
                                                <i class="{{ ManagerTheme::getStyle('icon_camera') }}"></i>
                                                {{ __('global.images_management') }}
                                            </a>
                                        </li>
                                    @endif
                                    @if (config('global.use_browser') && evo()->hasPermission('assets_files'))
                                        <li>
                                            <a onclick=""
                                               href="media/browser/{{ config('global.which_browser') }}/browse.php?&type=files"
                                               target="main">
                                                <i class="{{ ManagerTheme::getStyle('icon_files') }}"></i>
                                                {{ __('global.files_management') }}
                                            </a>
                                        </li>
                                    @endif
                                </ul>
                            </li>
                        @endif
                        <li id="preview">
                            <a href="../" target="_blank" title="{{ __('global.preview') }}">
                                <i class="{{ ManagerTheme::getStyle('icon_desktop') }} position-relative">
                                    @if (!config('global.site_status'))
                                        <i class="fa fa-exclamation-triangle site-status"
                                           title="{{ config('global.site_unavailable_message') }}"></i>
                                    @endif
                                </i>
                            </a>
                        </li>
                        <li id="account" class="dropdown account">
                            <a href="javascript:;" class="dropdown-toggle" onclick="return false;">
                                    <span class="username">
                                        <?= entities($user['username'], config('global.modx_charset')) ?>
                                    </span>
                                @if ($user['photo'])
                                    <span class="icon photo"
                                          style="background-image: url(<?= MODX_SITE_URL . entities($user['photo'], config('global.modx_charset')) ?>);"></span>
                                @else
                                    <span class="icon"><i class="{{ ManagerTheme::getStyle('icon_user') }}"></i></span>
                                @endif
                            </a>
                            <ul class="dropdown-menu">
                                @if (evo()->hasPermission('change_password'))
                                    <li>
                                        <a onclick="" href="index.php?a=28" target="main">
                                            <i lass="{{ ManagerTheme::getStyle('icon_lock') }}"></i>
                                            {{ __('global.change_password') }}
                                        </a>
                                    </li>
                                @endif
                                <li>
                                    <a href="index.php?a=8">
                                        <i class="{{ ManagerTheme::getStyle('icon_logout') }}"></i>
                                        {{ __('global.logout') }}
                                    </a>
                                </li>
                            </ul>
                        </li>
                        @if (
                            evo()->hasPermission('settings') ||
                                evo()->hasPermission('view_eventlog') ||
                                evo()->hasPermission('logs') ||
                                evo()->hasPermission('help'))
                            <li id="system" class="dropdown">
                                <a href="javascript:;" class="dropdown-toggle"
                                   title="{{ __('global.system') }}" onclick="return false;"><i
                                            class="{{ ManagerTheme::getStyle('icon_cogs') }}"></i></a>
                                <ul class="dropdown-menu">
                                    @if (evo()->hasPermission('settings'))
                                        <li>
                                            <a href="index.php?a=17" target="main">
                                                <i class="{{ ManagerTheme::getStyle('icon_sliders') }}"></i>
                                                {{ __('global.edit_settings') }}
                                            </a>
                                        </li>
                                    @endif
                                    @if (evo()->hasPermission('view_eventlog'))
                                        <li>
                                            <a href="index.php?a=70" target="main">
                                                <i class="{{ ManagerTheme::getStyle('icon_calendar') }}"></i>
                                                {{ __('global.site_schedule') }}
                                            </a>
                                        </li>
                                    @endif
                                    @if (evo()->hasPermission('view_eventlog'))
                                        <li>
                                            <a href="index.php?a=114" target="main">
                                                <i class="{{ ManagerTheme::getStyle('icon_info_triangle') }}"></i>
                                                {{ __('global.eventlog_viewer') }}
                                            </a>
                                        </li>
                                    @endif
                                    @if (evo()->hasPermission('logs'))
                                        <li>
                                            <a href="index.php?a=13" target="main">
                                                <i class="{{ ManagerTheme::getStyle('icon_user_secret') }}"></i>
                                                {{ __('global.view_logging') }}
                                            </a>
                                        </li>
                                        <li>
                                            <a href="index.php?a=53" target="main">
                                                <i class="{{ ManagerTheme::getStyle('icon_info_circle') }}"></i>
                                                {{ __('global.view_sysinfo') }}
                                            </a>
                                        </li>
                                    @endif
                                        <?php
                                        $style =
                                            config('global.settings_version') !== evo()->getVersionData('version')
                                                ? 'style="color:#ffff8a;"' : '';
                                        $version = 'Evolution CE';
                                        echo '<li><span class="dropdown-item" title="' .
                                            evo()->getPhpCompat()->entities(config('global.site_name')) .
                                            ' &ndash; ' . evo()->getVersionData('full_appname') . '" ' . $style . '>' .
                                            $version . ' ' . config('global.settings_version') . '</span></li>';
                                        ?>
                                </ul>
                            </li>
                        @endif
                        @if (config('global.show_fullscreen_btn'))
                            <li id="fullscreen">
                                <a href="javascript:;" onclick="toggleFullScreen();" id="toggleFullScreen"
                                   title="{{ __('global.toggle_fullscreen') }}">
                                    <i class="{{ ManagerTheme::getStyle('icon_expand') }}"></i>
                                </a>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div id="tree">@include('manager::frame.tree')</div>
    <div id="main">
        @if (config('global.global_tabs'))
            <div class="tab-row-container evo-tab-row">
                <div class="tab-row">
                    <h2 id="evo-tab-home" class="tab selected" data-target="evo-tab-page-home"><i
                                class="{{ ManagerTheme::getStyle('icon_home') }}"></i></h2>
                </div>
            </div>
            <div id="evo-tab-page-home" class="evo-tab-page show iframe-scroller">
                <iframe id="mainframe" src="index.php?a={{ $initMainframeAction }}" scrolling="auto"
                        frameborder="0" onload="modx.main.onload(event);"></iframe>
            </div>
        @else
            <div class="iframe-scroller">
                <iframe id="mainframe" name="main" src="index.php?a={{ $initMainframeAction }}"
                        scrolling="auto" frameborder="0" onload="modx.main.onload(event);"></iframe>
            </div>
        @endif
        <script>
          if (/iPhone|iPad|iPod/i.test(navigator.userAgent)) {
            document.getElementById('mainframe').setAttribute('scrolling', 'no')
            document.getElementsByClassName('tabframes').setAttribute('scrolling', 'no')
          }
        </script>
        <div id="mainloader"></div>
    </div>
    <div id="resizer"></div>
    <div id="searchresult"></div>

    <div id="floater" class="dropdown">
        <?php
        $sortParams = ['tree_sortby', 'tree_sortdir', 'tree_nodename'];
        foreach ($sortParams as $param) {
            if (isset($_REQUEST[$param])) {
                evo()->getManagerApi()->saveLastUserSetting($param, $_REQUEST[$param]);
                $_SESSION[$param] = $_REQUEST[$param];
            } elseif (!isset($_SESSION[$param])) {
                $_SESSION[$param] = evo()->getManagerApi()->getLastUserSetting($param);
            }
        }
        ?>
        <form name="sortFrm" id="sortFrm">
            <div class="form-group">
                <input type="hidden" name="dt"
                       value="<?= isset($_REQUEST['dt']) ? htmlspecialchars($_REQUEST['dt']) : '' ?>"/>
                <label>{{ __('global.sort_tree') }}</label>
                <select name="sortby" class="form-control">
                    <option value="isfolder"
                        <?= $_SESSION['tree_sortby'] == 'isfolder' ? "selected='selected'" : '' ?>>
                        {{ __('global.folder') }}</option>
                    <option value="pagetitle"
                        <?= $_SESSION['tree_sortby'] == 'pagetitle' ? "selected='selected'" : '' ?>>
                        {{ __('global.pagetitle') }}</option>
                    <option value="longtitle"
                        <?= $_SESSION['tree_sortby'] == 'longtitle' ? "selected='selected'" : '' ?>>
                        {{ __('global.long_title') }}</option>
                    <option value="id" <?= $_SESSION['tree_sortby'] == 'id' ? "selected='selected'" : '' ?>>
                        {{ __('global.id') }}</option>
                    <option value="menuindex"
                        <?= $_SESSION['tree_sortby'] == 'menuindex' ? "selected='selected'" : '' ?>>
                        {{ __('global.resource_opt_menu_index') }}</option>
                    <option value="createdon"
                        <?= $_SESSION['tree_sortby'] == 'createdon' ? "selected='selected'" : '' ?>>
                        {{ __('global.createdon') }}</option>
                    <option value="editedon"
                        <?= $_SESSION['tree_sortby'] == 'editedon' ? "selected='selected'" : '' ?>>
                        {{ __('global.editedon') }}</option>
                    <option value="publishedon"
                        <?= $_SESSION['tree_sortby'] == 'publishedon' ? "selected='selected'" : '' ?>>
                        {{ __('global.page_data_publishdate') }}</option>
                    <option value="alias"
                        <?= $_SESSION['tree_sortby'] == 'alias' ? "selected='selected'" : '' ?>>
                        {{ __('global.page_data_alias') }}</option>
                </select>
            </div>
            <div class="form-group">
                <select name="sortdir" class="form-control">
                    <option value="DESC"
                        <?= $_SESSION['tree_sortdir'] == 'DESC' ? "selected='selected'" : '' ?>>
                        {{ __('global.sort_desc') }}</option>
                    <option value="ASC" <?= $_SESSION['tree_sortdir'] == 'ASC' ? "selected='selected'" : '' ?>>
                        {{ __('global.sort_asc') }}</option>
                </select>
            </div>
            <div class="form-group">
                <label>{{ __('global.setting_resource_tree_node_name') }}</label>
                <select name="nodename" class="form-control">
                    <option value="default"
                        <?= $_SESSION['tree_nodename'] == 'default' ? "selected='selected'" : '' ?>>
                        {{ __('global.default') }}</option>
                    <option value="pagetitle"
                        <?= $_SESSION['tree_nodename'] == 'pagetitle' ? "selected='selected'" : '' ?>>
                        {{ __('global.pagetitle') }}</option>
                    <option value="longtitle"
                        <?= $_SESSION['tree_nodename'] == 'longtitle' ? "selected='selected'" : '' ?>>
                        {{ __('global.long_title') }}</option>
                    <option value="menutitle"
                        <?= $_SESSION['tree_nodename'] == 'menutitle' ? "selected='selected'" : '' ?>>
                        {{ __('global.resource_opt_menu_title') }}</option>
                    <option value="alias"
                        <?= $_SESSION['tree_nodename'] == 'alias' ? "selected='selected'" : '' ?>>
                        {{ __('global.alias') }}</option>
                    <option value="createdon"
                        <?= $_SESSION['tree_nodename'] == 'createdon' ? "selected='selected'" : '' ?>>
                        {{ __('global.createdon') }}</option>
                    <option value="editedon"
                        <?= $_SESSION['tree_nodename'] == 'editedon' ? "selected='selected'" : '' ?>>
                        {{ __('global.editedon') }}</option>
                    <option value="publishedon"
                        <?= $_SESSION['tree_nodename'] == 'publishedon' ? "selected='selected'" : '' ?>>
                        {{ __('global.page_data_publishdate') }}</option>
                </select>
            </div>
            <div class="form-group">
                <label>
                    <input type="checkbox" name="showonlyfolders"
                           value="<?= $_SESSION['tree_show_only_folders'] ? 1 : '' ?>"
                           onclick="this.value = (this.value ? '' : 1);"
                        <?= $_SESSION['tree_show_only_folders'] ? '' : ' checked="checked"' ?> />
                    {{ __('global.view_child_resources_in_container') }}</label>
            </div>
            <div class="text-center">
                <a href="javascript:;" class="btn btn-primary"
                   onclick="modx.tree.updateTree();modx.tree.showSorter(event);"
                   title="{{ __('global.sort_tree') }}">{{ __('global.sort_tree') }}</a>
            </div>
        </form>
    </div>

    <?php
    if (!function_exists('constructLink')) {
        /**
         * @param string $action
         * @param string $img
         * @param string $text
         * @param bool $allowed
         */
        function constructLink(string $action, string $img, string $text, bool $allowed) {
            if ($allowed) {
                echo '<div class="menuLink" id="item' . $action . '" onclick="modx.tree.menuHandler(' . $action .
                    ');">';
                echo '<i class="' . $img . '"></i> ' . $text . '</div>';
            }
        }
    }
    ?>
            <!-- Contextual Menu Popup Code -->
    <div id="mx_contextmenu" class="dropdown" onselectstart="return false;">
        <div id="nameHolder">&nbsp;</div>
        <?php
        constructLink(
            3,
            ManagerTheme::getStyle('icon_document'),
            __('global.create_resource_here'),
            evo()->hasPermission('new_document')
        ); // new Resource
        constructLink(
            2,
            ManagerTheme::getStyle('icon_edit'),
            __('global.edit_resource'),
            evo()->hasPermission('edit_document')
        ); // edit
        constructLink(
            5,
            ManagerTheme::getStyle('icon_move'),
            __('global.move_resource'),
            evo()->hasPermission('save_document')
        ); // move
        constructLink(
            7,
            ManagerTheme::getStyle('icon_clone'),
            __('global.resource_duplicate'),
            evo()->hasPermission('new_document')
        ); // duplicate
        constructLink(
            11,
            ManagerTheme::getStyle('icon_sort_num_asc'),
            __('global.sort_menuindex'),
            !!(evo()->hasPermission('edit_document') && evo()->hasPermission('save_document'))
        ); // sort menu index
        ?>
        <div class="seperator"></div>
        <?php
        constructLink(
            9,
            ManagerTheme::getStyle('icon_check'),
            __('global.publish_resource'),
            evo()->hasPermission('publish_document')
        ); // publish
        constructLink(
            10,
            ManagerTheme::getStyle('icon_close'),
            __('global.unpublish_resource'),
            evo()->hasPermission('publish_document')
        ); // unpublish
        constructLink(
            4,
            ManagerTheme::getStyle('icon_trash'),
            __('global.delete_resource'),
            evo()->hasPermission('delete_document')
        ); // delete
        constructLink(
            8,
            ManagerTheme::getStyle('icon_undo'),
            __('global.undelete_resource'),
            evo()->hasPermission('delete_document')
        ); // undelete
        ?>
        <div class="seperator"></div>
        <?php
        constructLink(
            6,
            ManagerTheme::getStyle('icon_chain'),
            __('global.create_weblink_here'),
            evo()->hasPermission('new_document')
        ); // new Weblink
        ?>
        <div class="seperator"></div>
        <?php
        constructLink(
            1,
            ManagerTheme::getStyle('icon_info'),
            __('global.resource_overview'),
            evo()->hasPermission('view_document')
        ); // view
        constructLink(
            12,
            ManagerTheme::getStyle('icon_eye'),
            __('global.preview_resource'),
            1
        ); // preview
        ?>

    </div>

    <?php
    $filemanagerUri = MODX_MANAGER_URL . 'media/browser/' . config('global.which_browser') . '/browse.php'
    ?>
    <script>
      if (document.getElementById('treeMenu')) {
          @if (
              evo()->hasPermission('edit_template') ||
                  evo()->hasPermission('edit_snippet') ||
                  evo()->hasPermission('edit_chunk') ||
                  evo()->hasPermission('edit_plugin'))

          document.getElementById('treeMenu_openelements').onclick = function (e) {
            e.preventDefault()
            if (modx.config.global_tabs && !e.shiftKey) {
              modx.tabs({
                url: '{{ MODX_MANAGER_URL }}index.php?a=76',
                title: '{{ __('global.elements') }}'
              })
            } else {
              var randomNum = '{{ __('global.elements') }}'
              if (e.shiftKey) {
                randomNum += ' #' + Math.floor((Math.random() * 999999) + 1)
              }
              modx.openWindow({
                url: '{{ MODX_MANAGER_URL }}index.php?a=76',
                title: randomNum
              })
            }
          }
          @endif
          @if (config('global.use_browser') && evo()->hasPermission('assets_images'))

          document.getElementById('treeMenu_openimages').onclick = function (e) {
            e.preventDefault()
            if (modx.config.global_tabs && !e.shiftKey) {
              modx.tabs({
                url: '{{ $filemanagerUri }}?filemanager={{ $filemanagerUri }}&type=images',
                title: '{{ __('global.images_management') }}'
              })
            } else {
              var randomNum = '{{ __('global.files_files') }}'
              if (e.shiftKey) {
                randomNum += ' #' + Math.floor((Math.random() * 999999) + 1)
              }
              modx.openWindow({
                url: '{{ $filemanagerUri }}?type=images',
                title: randomNum
              })
            }
          }
          @endif
          @if (config('global.use_browser') && evo()->hasPermission('assets_files'))

          document.getElementById('treeMenu_openfiles').onclick = function (e) {
            e.preventDefault()
            if (modx.config.global_tabs && !e.shiftKey) {
              modx.tabs({
                url: '{{ $filemanagerUri }}?filemanager={{ $filemanagerUri }}&type=files',
                title: '{{ __('global.files_files') }}'
              })
            } else {
              var randomNum = '{{ __('global.files_files') }}'
              if (e.shiftKey) {
                randomNum += ' #' + Math.floor((Math.random() * 999999) + 1)
              }
              modx.openWindow({
                url: '{{ $filemanagerUri }}?&type=files',
                title: randomNum
              })
            }
          }
          @endif

      }
    </script>
    @if (config('global.show_fullscreen_btn'))
        <script>
          function toggleFullScreen () {
            if ((document.fullScreenElement && document.fullScreenElement !== null) ||
              (!document.mozFullScreen && !document.webkitIsFullScreen)) {
              if (document.documentElement.requestFullScreen) {
                document.documentElement.requestFullScreen()
              } else if (document.documentElement.mozRequestFullScreen) {
                document.documentElement.mozRequestFullScreen()
              } else if (document.documentElement.webkitRequestFullScreen) {
                document.documentElement.webkitRequestFullScreen(Element.ALLOW_KEYBOARD_INPUT)
              }
            } else {
              if (document.cancelFullScreen) {
                document.cancelFullScreen()
              } else if (document.mozCancelFullScreen) {
                document.mozCancelFullScreen()
              } else if (document.webkitCancelFullScreen) {
                document.webkitCancelFullScreen()
              }
            }
          }

          $('#toggleFullScreen').click(function () {
            var icon = $(this).find('i')
            icon.toggleClass(
              '{{ ManagerTheme::getStyle('icon_expand') }} {{ ManagerTheme::getStyle('icon_compress') }}')
          })
        </script>
    @endif
    {!! evo()->invokeEvent('OnManagerFrameLoader', ['action' => ManagerTheme::getActionId()]) !!}
</div>
@if (config('global.show_picker'))
    <div class="evocp-box">
        <div class="evocp-icon"><i class="evocpicon {{ ManagerTheme::getStyle('icon_brush') }}" aria-hidden="true"></i>
        </div>
        <div class="evocp-frame">
            <h2>COLOR SWITCHER</h2>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 data-toggle="collapse" data-target=".bgmcolors">
                        <i class="togglearrow {{ ManagerTheme::getStyle('icon_chevron_down') }}" aria-hidden="true"></i>
                        <i class="{{ ManagerTheme::getStyle('icon_bars') }}" aria-hidden="true"></i> Menu Background
                    </h3>
                    <a title="{{ __('global.reset') }}" href="javascript:;"
                       onclick="cleanLocalStorageReloadAll('my_evo_bgmcolor')"
                       class="pull-right resetcolor btn btn-secondary">
                        <i class="{{ ManagerTheme::getStyle('icon_refresh') }}"></i>
                    </a>
                </div>
                <div class="panel-body collapse in bgmcolors">
                    <div class="evocp-bgmcolors">
                        <div class="evocp-bgmcolor">#000</div>
                        <div class="evocp-bgmcolor">#222</div>
                        <div class="evocp-bgmcolor">#333</div>
                        <div class="evocp-bgmcolor">#444</div>
                        <div class="evocp-bgmcolor">#555</div>
                        <div class="evocp-bgmcolor">#777</div>
                        <div class="evocp-bgmcolor">#888</div>
                        <div class="evocp-bgmcolor">#0f243e</div>
                        <div class="evocp-bgmcolor">#548dd4</div>
                        <div class="evocp-bgmcolor">#134f5c</div>
                        <div class="evocp-bgmcolor">#0b5394</div>
                        <div class="evocp-bgmcolor">#351c75</div>
                        <div class="evocp-bgmcolor">#741b47</div>
                        <div class="evocp-bgmcolor">#900</div>
                    </div>
                    <input type="color" class="color" id="bgmPicker" name="evocpCustombgmColor"
                           value="#cf2626" placeholder="color code...">
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 span data-toggle="collapse" data-target=".menuColors">
                        <i class="togglearrow {{ ManagerTheme::getStyle('icon_chevron_right') }}"
                           aria-hidden="true"></i>
                        <i class="{{ ManagerTheme::getStyle('icon_bars') }}" aria-hidden="true"></i> Menu links
                    </h3>
                    <a title="{{ __('global.reset') }}" href="javascript:;"
                       onclick="cleanLocalStorageReloadMain('my_evo_menuColor')"
                       class="pull-right resetcolor btn btn-secondary">
                        <i class="{{ ManagerTheme::getStyle('icon_refresh') }}"></i>
                    </a>
                </div>
                <div class="panel-body collapse menuColors">
                    <div class="evocp-menuColors">
                        <div class="evocp-menuColor">#000</div>
                        <div class="evocp-menuColor">#222</div>
                        <div class="evocp-menuColor">#555</div>
                        <div class="evocp-menuColor">#666</div>
                        <div class="evocp-menuColor evocp_light">#dedede</div>
                        <div class="evocp-menuColor evocp_light">#fafafa</div>
                        <div class="evocp-menuColor evocp_light">#fff</div>
                        <div class="evocp-menuColor">#b45f06</div>
                        <div class="evocp-menuColor">#38761d</div>
                        <div class="evocp-menuColor">#134f5c</div>
                        <div class="evocp-menuColor">#0b5394</div>
                        <div class="evocp-menuColor">#351c75</div>
                        <div class="evocp-menuColor">#741b47</div>
                        <div class="evocp-menuColor">#9d2661</div>
                    </div>
                    <input class="color" type="color" id="menucolorPicker" name="evocpCustommenuColor"
                           value="#cf2626" placeholder="color code...">
                </div>
            </div>

            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 data-toggle="collapse" data-target=".menuHColors">
                        <i class="togglearrow {{ ManagerTheme::getStyle('icon_chevron_right') }}"
                           aria-hidden="true"></i>
                        <i class="{{ ManagerTheme::getStyle('icon_bars') }}" aria-hidden="true"></i> Menu
                        links:hover </h3>
                    <a title="{{ __('global.reset') }}" href="javascript:;"
                       onclick="cleanLocalStorageReloadMain('my_evo_menuHColor')"
                       class="pull-right resetcolor btn btn-secondary">
                        <i class="{{ ManagerTheme::getStyle('icon_refresh') }}"></i>
                    </a>
                </div>
                <div class="panel-body collapse menuHColors">
                    <div class="evocp-menuHColors">
                        <div class="evocp-menuHColor">#000</div>
                        <div class="evocp-menuHColor">#222</div>
                        <div class="evocp-menuHColor">#555</div>
                        <div class="evocp-menuHColor">#666</div>
                        <div class="evocp-menuHColor evocp_light">#dedede</div>
                        <div class="evocp-menuHColor evocp_light">#fafafa</div>
                        <div class="evocp-menuHColor evocp_light">#fff</div>
                        <div class="evocp-menuHColor">#b45f06</div>
                        <div class="evocp-menuHColor">#38761d</div>
                        <div class="evocp-menuHColor">#134f5c</div>
                        <div class="evocp-menuHColor">#0b5394</div>
                        <div class="evocp-menuHColor">#351c75</div>
                        <div class="evocp-menuHColor">#741b47</div>
                        <div class="evocp-menuHColor">#9d2661</div>
                    </div>
                    <input class="color" type="color" id="menuHcolorPicker" name="evocpCustommenuHColor"
                           value="#cf2626" placeholder="color code...">
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 data-toggle="collapse" data-target=".cpcolors">
                        <i class="togglearrow {{ ManagerTheme::getStyle('icon_chevron_right') }}"
                           aria-hidden="true"></i>
                        <i class="{{ ManagerTheme::getStyle('icon_font') }}" aria-hidden="true"></i> Text color
                    </h3>
                    <a title="{{ __('global.reset') }}" href="javascript:;"
                       onclick="cleanLocalStorageReloadMain('my_evo_color')"
                       class="pull-right resetcolor btn btn-secondary">
                        <i class="{{ ManagerTheme::getStyle('icon_refresh') }}"></i>
                    </a>
                </div>
                <div class="panel-body collapse cpcolors">
                    <div class="evocp-colors">
                        <div class="evocp-color">#000</div>
                        <div class="evocp-color">#222</div>
                        <div class="evocp-color">#333</div>
                        <div class="evocp-color">#444</div>
                        <div class="evocp-color">#555</div>
                        <div class="evocp-color">#777</div>
                        <div class="evocp-color">#888</div>
                        <div class="evocp-color">#b45f06</div>
                        <div class="evocp-color">#38761d</div>
                        <div class="evocp-color">#134f5c</div>
                        <div class="evocp-color">#0b5394</div>
                        <div class="evocp-color">#351c75</div>
                        <div class="evocp-color">#741b47</div>
                        <div class="evocp-color">#9d2661</div>
                    </div>
                    <input class="color" type="color" id="textcolorPicker" name="textcolorPicker"
                           value="#cf2626" placeholder="color code...">
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 data-toggle="collapse" data-target=".alinkcolors">
                        <i class="togglearrow {{ ManagerTheme::getStyle('icon_chevron_right') }}"
                           aria-hidden="true"></i>
                        <i class="{{ ManagerTheme::getStyle('icon_chain') }}" aria-hidden="true"></i> Links Color
                    </h3>
                    <a title="{{ __('global.reset') }}" href="javascript:;"
                       onclick="cleanLocalStorageReloadMain('my_evo_alinkcolor')"
                       class="pull-right resetcolor btn btn-secondary">
                        <i class="{{ ManagerTheme::getStyle('icon_refresh') }}"></i>
                    </a>
                </div>
                <div class="panel-body collapse alinkcolors">
                    <div class="evocp-alinkcolors">
                        <div class="evocp-alinkcolor">#000</div>
                        <div class="evocp-alinkcolor">#222</div>
                        <div class="evocp-alinkcolor">#555</div>
                        <div class="evocp-alinkcolor">#666</div>
                        <div class="evocp-alinkcolor">#dedede</div>
                        <div class="evocp-alinkcolor">#fafafa</div>
                        <div class="evocp-alinkcolor">#fff</div>
                        <div class="evocp-alinkcolor">#b45f06</div>
                        <div class="evocp-alinkcolor">#38761d</div>
                        <div class="evocp-alinkcolor">#134f5c</div>
                        <div class="evocp-alinkcolor">#0b5394</div>
                        <div class="evocp-alinkcolor">#351c75</div>
                        <div class="evocp-alinkcolor">#741b47</div>
                        <div class="evocp-alinkcolor">#9d2661</div>
                    </div>
                    <input class="color" type="color" id="linkcolorPicker" name="alinkcolorPicker"
                           value="#cf2626" placeholder="color code...">
                </div>
            </div>
            <hr/>
            <input type="reset"
                   onclick="cleanLocalStorageReloadAll('my_evo_alinkcolor,my_evo_menuColor,my_evo_menuHColor,my_evo_bgmcolor,my_evo_color')"
                   class="btn btn-secondary" value="{{ __('global.reset') }}">
        </div>
    </div>
    <script>
      $('#bgmPicker').spectrum({
        showButtons: false,
        preferredFormat: 'hex3',
        containerClassName: 'bgmPicker',
        showInput: true,
        allowEmpty: true
      })
      $('#menucolorPicker').spectrum({
        showButtons: false,
        preferredFormat: 'hex3',
        containerClassName: 'menucolorPicker',
        replacerClassName: 'evo-cp-replacer',
        showInput: true,
        allowEmpty: true
      })
      $('#menuHcolorPicker').spectrum({
        showButtons: false,
        preferredFormat: 'hex3',
        containerClassName: 'menuHcolorPicker',
        replacerClassName: 'evo-cp-replacer',
        showInput: true,
        allowEmpty: true
      })
      $('#textcolorPicker').spectrum({
        showButtons: false,
        preferredFormat: 'hex3',
        containerClassName: 'textcolorPicker',
        replacerClassName: 'evo-cp-replacer',
        showInput: true,
        allowEmpty: true
      })
      $('#linkcolorPicker').spectrum({
        showButtons: false,
        preferredFormat: 'hex3',
        containerClassName: 'linkcolorPicker',
        replacerClassName: 'evo-cp-replacer',
        showInput: true,
        allowEmpty: true
      })
    </script>
@endif
</body>

</html>
