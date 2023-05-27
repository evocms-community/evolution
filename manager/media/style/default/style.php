<?php
/**
 * Filename:       media/style/ManagerTheme::getTheme()/style.php
 * Function:       Manager style variables for images and icons.
 * Encoding:       UTF-8
 * Credit:         icons by Mark James of FamFamFam http://www.famfamfam.com/lab/icons/
 * Date:           18-Mar-2010
 * Version:        1.1
 * MODX version:   1.0.3
 */
$style_path = 'media/style/' . ManagerTheme::getTheme() . '/images/';
$modx->config['mgr_date_picker_path'] = 'media/calendar/datepicker.inc.php';

if (!empty($_GET['a']) && $_GET['a'] == 2) {
    $modx->config['enable_filter'] = 1;

    $modx->addSnippet('hasPermission', 'return $modx->hasPermission($key);');

    if ($modx->hasPermission('new_template') || $modx->hasPermission('edit_template') || $modx->hasPermission('new_snippet') || $modx->hasPermission('edit_snippet') || $modx->hasPermission('new_plugin') || $modx->hasPermission('edit_plugin') || $modx->hasPermission('manage_metatags')) {
        $hasAnyPermission = 1;
    } else {
        $hasAnyPermission = 0;
    }

    $modx->addSnippet('hasAnyPermission', 'global $hasAnyPermission; return $hasAnyPermission;');

    $modx->addSnippet('getLoginUserName', 'return $modx->getLoginUserName();');
}

// Favicon
$_style['favicon'] = (file_exists(MODX_BASE_PATH . 'favicon.ico') ? MODX_SITE_URL . 'favicon.ico' : 'media/style/' . ManagerTheme::getTheme() . '/images/favicon.ico');

// Icons
$_style['icon_size_2x'] = ' fa-2x';
$_style['icon_size_fix'] = ' fa-fw';
$_style['icon_spin'] = ' fa-spin';

$_style['icon_add'] = 'fas fa-plus-circle';
$_style['icon_angle_down'] = 'fas fa-angle-down';
$_style['icon_angle_left'] = 'fas fa-angle-left';
$_style['icon_angle_right'] = 'fas fa-angle-right';
$_style['icon_angle_up'] = 'fas fa-angle-up';
$_style['icon_archive'] = 'far fa-file-archive-o';
$_style['icon_arrow_down_circle'] = 'fas fa-arrow-circle-down';
$_style['icon_arrow_up_circle'] = 'fas fa-arrow-circle-up';
$_style['icon_ban'] = 'fas fa-ban';
$_style['icon_bars'] = 'fas fa-bars';
$_style['icon_brush'] = 'fas fa-paint-brush';
$_style['icon_calendar'] = 'fas fa-calendar';
$_style['icon_calendar_close'] = 'far fa-calendar-times';
$_style['icon_category'] = 'fas fa-object-group';
$_style['icon_camera'] = 'fas fa-camera';
$_style['icon_cancel'] = 'fas fa-times-circle';
$_style['icon_chain'] = 'fas fa-link';
$_style['icon_chain_broken'] = 'fas fa-chain-broken';
$_style['icon_check'] = 'fas fa-check';
$_style['icon_check_square'] = 'fas fa-check-square';
$_style['icon_chevron_down'] = 'fas fa-chevron-down';
$_style['icon_chevron_right'] = 'fas fa-chevron-right';
$_style['icon_chunk'] = 'fas fa-th-large';
$_style['icon_circle'] = 'fas fa-circle';
$_style['icon_clock'] = 'far fa-clock-o';
$_style['icon_clone'] = 'fas fa-clone';
$_style['icon_close'] = 'fas fa-times';
$_style['icon_code'] = 'fas fa-code';
$_style['icon_code_file'] = 'far fa-file-code-o';
$_style['icon_cog'] = 'fas fa-cog';
$_style['icon_cogs'] = 'fas fa-cogs';
$_style['icon_compress'] = 'fas fa-compress';
$_style['icon_database'] = 'fas fa-database';
$_style['icon_desktop'] = 'fas fa-desktop';
$_style['icon_document'] = 'far fa-file';
$_style['icon_download'] = 'fas fa-download';
$_style['icon_edit'] = 'fas fa-edit';
$_style['icon_disable'] = 'fas fa-times-circle';
$_style['icon_enable'] = 'fas fa-check-circle';
$_style['icon_elements'] = 'fas fa-th';
$_style['icon_excel'] = 'far fa-file-excel-o';
$_style['icon_expand'] = 'fas fa-expand';
$_style['icon_external_link'] = 'fas fa-external-link';
$_style['icon_eye'] = 'fas fa-eye';
$_style['icon_file'] = 'far fa-file';
$_style['icon_files'] = 'far fa-copy';
$_style['icon_folder'] = 'fas fa-folder';
$_style['icon_folder_open'] = 'fas fa-folder-open';
$_style['icon_font'] = 'fas fa-font';
$_style['icon_forward'] = 'fas fa-forward';
$_style['icon_globe'] = 'fas fa-globe';
$_style['icon_home'] = 'fas fa-home';
$_style['icon_hourglass'] = 'fas fa-hourglass-end';
$_style['icon_i_cursor'] = 'fas fa-i-cursor';
$_style['icon_image'] = 'far fa-file-image-o';
$_style['icon_info'] = 'fas fa-info';
$_style['icon_info_circle'] = 'fas fa-info-circle';
$_style['icon_info_triangle'] = 'fas fa-exclamation-triangle';
$_style['icon_loader'] = 'fas fa-spinner';
$_style['icon_lock'] = 'fas fa-lock';
$_style['icon_logout'] = 'fas fa-sign-out-alt';
$_style['icon_mail'] = 'fas fa-envelope';
$_style['icon_module'] = 'fas fa-cube';
$_style['icon_modules'] = 'fas fa-cubes';
$_style['icon_move'] = 'fas fa-arrows-alt';
$_style['icon_pdf'] = 'far fa-file-pdf-o';
$_style['icon_pencil'] = 'fas fa-edit';
$_style['icon_play'] = 'fas fa-play';
$_style['icon_plugin'] = 'fas fa-plug';
$_style['icon_plus'] = 'fas fa-plus';
$_style['icon_question_circle'] = 'fas fa-question-circle';
$_style['icon_recycle'] = 'fas fa-recycle';
$_style['icon_refresh'] = 'fas fa-sync';
$_style['icon_reply'] = 'fas fa-reply';
$_style['icon_role'] = 'fas fa-balance-scale-left';
$_style['icon_save'] = 'fas fa-save';
$_style['icon_search'] = 'fas fa-search';
$_style['icon_sitemap'] = 'fas fa-sitemap';
$_style['icon_sliders'] = 'fas fa-sliders-h';
$_style['icon_sort'] = 'fas fa-sort';
$_style['icon_sort_num_asc'] = 'fas fa-sort-numeric-down';
$_style['icon_stop'] = 'fas fa-stop';
$_style['icon_table'] = 'fas fa-table';
$_style['icon_tachometer'] = 'fas fa-tachometer';
$_style['icon_template'] = 'far fa-newspaper';
$_style['icon_theme'] = 'fas fa-adjust';
$_style['icon_trash'] = 'fas fa-trash-alt';
$_style['icon_trash_alt'] = 'far fa-trash-alt';
$_style['icon_tv'] = 'fas fa-list-alt';
$_style['icon_undo'] = 'fas fa-undo';
$_style['icon_upload'] = 'fas fa-upload';
$_style['icon_user'] = 'far fa-user-circle';
$_style['icon_users'] = 'fas fa-users';
$_style['icon_user_access'] = 'fas fa-universal-access';
$_style['icon_user_secret'] = 'fas fa-user-secret';
$_style['icon_no_user_role'] = 'far fa-user-o';
$_style['icon_web_user'] = 'fas fa-user';
$_style['icon_web_user_access'] = 'fas fa-male';
$_style['icon_word'] = 'far fa-file-word-o';
$_style['icon_wrench'] = 'fas fa-wrench';

$_style['tx'] = $style_path . 'misc/_tx_.gif';

// actions buttons templates
$action = isset($_REQUEST['a']) ? $_REQUEST['a'] : '';
if (!empty($modx->config['global_tabs']) && !isset($_SESSION['stay'])) {
    $_REQUEST['stay'] = 2;
}
if (isset($_REQUEST['stay'])) {
    $_SESSION['stay'] = $_REQUEST['stay'];
} else if (isset($_SESSION['stay'])) {
    $_REQUEST['stay'] = $_SESSION['stay'];
}
$stay = isset($_REQUEST['stay']) ? $_REQUEST['stay'] : '';
$addnew = 0;
$run = 0;
switch ($action) {
    case '3':
    case '4':
    case '27':
    case '72':
        if ($modx->hasPermission('new_document')) {
            $addnew = 1;
        }
        break;
    case '16':
    case '19':
        if ($modx->hasPermission('new_template')) {
            $addnew = 1;
        }
        break;
    case '300':
    case '301':
        if ($modx->hasPermission('new_snippet') && $modx->hasPermission('new_chunk') && $modx->hasPermission('new_plugin')) {
            $addnew = 1;
        }
        break;
    case '77':
    case '78':
        if ($modx->hasPermission('new_chunk')) {
            $addnew = 1;
        }
        break;
    case '22':
    case '23':
        if ($modx->hasPermission('new_snippet')) {
            $addnew = 1;
        }
        break;
    case '101':
    case '102':
        if ($modx->hasPermission('new_plugin')) {
            $addnew = 1;
        }
        break;
    case '106':
    case '107':
    case '108':
        if ($modx->hasPermission('new_module')) {
            $addnew = 1;
        }
        if ($modx->hasPermission('exec_module')) {
            $run = 1;
        }
        break;
    case '88':
        if ($modx->hasPermission('new_user')) {
            $addnew = 1;
        }
        break;
}

$disabled = (
    $action == '19' // creating a new template
    || $action == '300' // create Template Variable
    || $action == '77' // creating a new Chunk
    || $action == '23' // creating a new Snippet
    || $action == '101' // create new plugin
    || $action == '4' // creating a resource
    || $action == '72' // adding a weblink
    || $action == '87' // create new user
    || $action == '107' // create new module
    || $action == '38' // creating new role
) ? ' disabled' : '';

$_style['actionbuttons'] = array(
    'dynamic' => array(
        'document' => '<div id="actions">
            <div class="btn-group">
            ' . (isset($_REQUEST['id']) ? '
                    <a class="btn btn-secondary" href="javascript:;" onclick="actions.new();">
                        <i class="' . $_style["icon_document"] . '"></i> <span>' . $_lang['create_resource_here'] . '</span>
                    </a>
                    <a class="btn btn-secondary" href="javascript:;" onclick="actions.newlink();">
                        <i class="' . $_style["icon_chain"] . '"></i> <span>' . $_lang['create_weblink_here'] . '</span>
                    </a>
                ' : '') . '
                <div class="btn-group">
                    <a id="Button1" class="btn btn-success" href="javascript:;" onclick="actions.save();">
                        <i class="' . $_style["icon_save"] . '"></i> <span>' . $_lang['save'] . '</span>
                    </a>
                    <span class="btn btn-success plus dropdown-toggle"></span>
                    <select id="stay" name="stay">
                        ' . ($addnew ? '
                            <option id="stay1" value="1" ' . ($stay == '1' ? ' selected="selected"' : '') . '>' . $_lang['stay_new'] . '</option>
                        ' : '') . '
                        <option id="stay2" value="2" ' . ($stay == '2' ? ' selected="selected"' : '') . '>' . $_lang['stay'] . '</option>
                        <option id="stay3" value="" ' . ($stay == '' ? ' selected="selected"' : '') . '>' . $_lang['close'] . '</option>
                    </select>
                </div>' .
        ($addnew ? '
                    <a id="Button6" class="btn btn-secondary' . $disabled . '" href="javascript:;" onclick="actions.duplicate();">
                        <i class="' . $_style["icon_clone"] . '"></i> <span>' . $_lang['duplicate'] . '</span>
                    </a>
                    ' : '') . '
                <a id="Button3" class="btn btn-secondary' . $disabled . '" href="javascript:;" onclick="actions.delete();">
                    <i class="' . $_style["icon_trash"] . '"></i> <span>' . $_lang['delete'] . '</span>
                </a>
                <a id="Button5" class="btn btn-secondary" href="javascript:;" onclick="actions.cancel();">
                    <i class="' . $_style["icon_cancel"] . '"></i> <span>' . $_lang['cancel'] . '</span>
                </a>
                <a id="Button4" class="btn btn-secondary' . $disabled . '" href="javascript:;" onclick="actions.view();">
                    <i class="' . $_style["icon_eye"] . '"></i> <span>' . $_lang['preview'] . '</span>
                </a>
            </div>
        </div>',
        'user' => '<div id="actions">
            <div class="btn-group">
                <div class="btn-group">
                    <a id="Button1" class="btn btn-success" href="javascript:;" onclick="actions.save();">
                        <i class="' . $_style["icon_save"] . '"></i> <span>' . $_lang['save'] . '</span>
                    </a>
                    <span class="btn btn-success plus dropdown-toggle"></span>
                    <select id="stay" name="stay">
                        ' . ($addnew ? '
                            <option id="stay1" value="1" ' . ($stay == '1' ? ' selected="selected"' : '') . '>' . $_lang['stay_new'] . '</option>
                        ' : '') . '
                        <option id="stay2" value="2" ' . ($stay == '2' ? ' selected="selected"' : '') . '>' . $_lang['stay'] . '</option>
                        <option id="stay3" value="" ' . ($stay == '' ? ' selected="selected"' : '') . '>' . $_lang['close'] . '</option>
                    </select>
                </div>
                <a id="Button3" class="btn btn-secondary' . $disabled . '" href="javascript:;" onclick="actions.delete();">
                    <i class="' . $_style["icon_trash"] . '"></i> <span>' . $_lang['delete'] . '</span>
                </a>
                <a id="Button5" class="btn btn-secondary" href="javascript:;" onclick="actions.cancel();">
                    <i class="' . $_style["icon_cancel"] . '"></i> <span>' . $_lang['cancel'] . '</span>
                </a>
            </div>
        </div>',
        'element' => '<div id="actions">
            <div class="btn-group">
                <div class="btn-group">
                    <a id="Button1" class="btn btn-success" href="javascript:;" onclick="actions.save();">
                        <i class="' . $_style["icon_save"] . '"></i> <span>' . $_lang['save'] . '</span>
                    </a>
                    <span class="btn btn-success plus dropdown-toggle"></span>
                    <select id="stay" name="stay">
                        ' . ($addnew ? '
                            <option id="stay1" value="1" ' . ($stay == '1' ? ' selected="selected"' : '') . '>' . $_lang['stay_new'] . '</option>
                        ' : '') . '
                        <option id="stay2" value="2" ' . ($stay == '2' ? ' selected="selected"' : '') . '>' . $_lang['stay'] . '</option>
                        <option id="stay3" value="" ' . ($stay == '' ? ' selected="selected"' : '') . '>' . $_lang['close'] . '</option>
                    </select>
                </div>
                ' . ($addnew ? '
                <a id="Button6" class="btn btn-secondary' . $disabled . '" href="javascript:;" onclick="actions.duplicate();">
                    <i class="' . $_style["icon_clone"] . '"></i> <span>' . $_lang['duplicate'] . '</span>
                </a>
                ' : '') . '
                <a id="Button3" class="btn btn-secondary' . $disabled . '" href="javascript:;" onclick="actions.delete();">
                    <i class="' . $_style["icon_trash"] . '"></i> <span>' . $_lang['delete'] . '</span>
                </a>
                <a id="Button5" class="btn btn-secondary" href="javascript:;" onclick="actions.cancel();">
                    <i class="' . $_style["icon_cancel"] . '"></i> <span>' . $_lang['cancel'] . '</span>
                </a>
                ' . ($run ? '
                <a id="Button4" class="btn btn-secondary' . $disabled . '" href="javascript:;" onclick="actions.run();">
                    <i class="' . $_style["icon_play"] . '"></i> <span>' . $_lang['run_module'] . '</span>
                </a>
                ' : '') . '
            </div>
        </div>',
        'newmodule' => ($addnew ? '<div id="actions">
            <div class="btn-group">
                <a id="newModule" class="btn btn-secondary" href="javascript:;" onclick="actions.new();">
                    <i class="' . $_style["icon_add"] . '"></i> <span>' . $_lang['new_module'] . '</span>
                </a>
            </div>
        </div>' : ''),
        'close' => '<div id="actions">
            <div class="btn-group">
                <a id="Button5" class="btn btn-secondary" href="javascript:;" onclick="actions.close();">
                    <i class="' . $_style["icon_close"] . '"></i> <span>' . $_lang['close'] . '</span>
                </a>
            </div>
        </div>',
        'save' => '<div id="actions">
            <div class="btn-group">
                <a id="Button1" class="btn btn-success" href="javascript:;" onclick="actions.save();">
                    <i class="' . $_style["icon_save"] . '"></i> <span>' . $_lang['save'] . '</span>
                </a>
                <a id="Button5" class="btn btn-secondary" href="javascript:;" onclick="actions.cancel();">
                    <i class="' . $_style["icon_cancel"] . '"></i> <span>' . $_lang['cancel'] . '</span>
                </a>
            </div>
        </div>',
        'savedelete' => '<div id="actions">
            <div class="btn-group">
                <a id="Button1" class="btn btn-success" href="javascript:;" onclick="actions.save();">
                    <i class="' . $_style["icon_save"] . '"></i> <span>' . $_lang['save'] . '</span>
                </a>
                <a id="Button3" class="btn btn-secondary' . $disabled . '" href="javascript:;" onclick="actions.delete();">
                    <i class="' . $_style["icon_trash"] . '"></i> <span>' . $_lang['delete'] . '</span>
                </a>
                <a id="Button5" class="btn btn-secondary" href="javascript:;" onclick="actions.cancel();">
                    <i class="' . $_style["icon_cancel"] . '"></i> <span>' . $_lang['cancel'] . '</span>
                </a>
            </div>
        </div>',
        'cancel' => '<div id="actions">
            <div class="btn-group">
                <a id="Button5" class="btn btn-secondary" href="javascript:;" onclick="actions.cancel();">
                    <i class="' . $_style["icon_cancel"] . '"></i> <span>' . $_lang['cancel'] . '</span>
                </a>
            </div>
        </div>',
        'canceldelete' => '<div id="actions">
            <div class="btn-group">
                <a id="Button3" class="btn btn-secondary' . $disabled . '" href="javascript:;" onclick="actions.delete();">
                    <i class="' . $_style["icon_trash"] . '"></i> <span>' . $_lang['delete'] . '</span>
                </a>
                <a id="Button5" class="btn btn-secondary" href="javascript:;" onclick="actions.cancel();">
                    <i class="' . $_style["icon_cancel"] . '"></i> <span>' . $_lang['cancel'] . '</span>
                </a>
            </div>
        </div>',
    ),
    'static' => array(
        'document' => '<div id="actions">
            <div class="btn-group">' .
        ($addnew ? '
                    <a class="btn btn-secondary" href="javascript:;" onclick="actions.new();">
                        <i class="' . $_style["icon_document"] . '"></i> <span>' . $_lang['create_resource_here'] . '</span>
                    </a>
                    <a class="btn btn-secondary" href="javascript:;" onclick="actions.newlink();">
                        <i class="' . $_style["icon_chain"] . '"></i> <span>' . $_lang['create_weblink_here'] . '</span>
                    </a>
                ' : '') . '
                <a id="Button1" class="btn btn-success" href="javascript:;" onclick="actions.edit();">
                    <i class="' . $_style["icon_edit"] . '"></i> <span>' . $_lang['edit'] . '</span>
                </a>
                <a id="Button2" class="btn btn-secondary" href="javascript:;" onclick="actions.move();">
                    <i class="' . $_style["icon_move"] . '"></i> <span>' . $_lang['move'] . '</span>
                </a>
                <a id="Button6" class="btn btn-secondary" href="javascript:;" onclick="actions.duplicate();">
                    <i class="' . $_style["icon_clone"] . '"></i> <span>' . $_lang['duplicate'] . '</span>
                </a>
                <a id="Button3" class="btn btn-secondary" href="javascript:;" onclick="actions.delete();">
                    <i class="' . $_style["icon_trash"] . '"></i> <span>' . $_lang['delete'] . '</span>
                </a>
                <a id="Button4" class="btn btn-secondary" href="javascript:;" onclick="actions.view();">
                    <i class="' . $_style["icon_eye"] . '"></i> <span>' . $_lang['preview'] . '</span>
                </a>
            </div>
        </div>',
        'cancel' => '<div id="actions">
            <div class="btn-group">
                <a id="Button5" class="btn btn-secondary" href="javascript:;" onclick="actions.cancel();">
                    <i class="' . $_style["icon_cancel"] . '"></i> <span>' . $_lang['cancel'] . '</span>
                </a>
            </div>
        </div>',
    ),
);
