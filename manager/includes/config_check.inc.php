<?php

use EvolutionCMS\Facades\ManagerTheme;
use EvolutionCMS\Models\SiteContent;
use EvolutionCMS\Models\SitePlugin;

if (!defined('IN_MANAGER_MODE') || IN_MANAGER_MODE !== true) {
    die('<b>INCLUDE_ORDERING_ERROR</b><br /><br />Please use the EVO Content Manager instead of accessing this file directly.');
}

// PROCESSOR FIRST
if ($_SESSION['mgrRole'] == 1) {
    if (!empty($_REQUEST['b']) && $_REQUEST['b'] == 'resetSysfilesChecksum' && evo()->hasPermission('settings')) {
        $current = evo()->getManagerApi()->getSystemChecksum(evo()->config['check_files_onlogin']);
        if (!empty($current)) {
            evo()->getManagerApi()->setSystemChecksum($current);
            evo()->clearCache('full');
            evo()->config['sys_files_checksum'] = $current;
        }
    }
}

// NOW CHECK CONFIG
$warnings = [];
$systemFilesCheck = evo()->getManagerApi()->checkSystemChecksum();
if ($systemFilesCheck !== '0') {
    $warnings[] = [ManagerTheme::getLexicon('configcheck_sysfiles_mod')];
}

if (file_exists('../install/')) {
    $warnings[] = [ManagerTheme::getLexicon('configcheck_installer')];
}

if (!extension_loaded('gd') || !extension_loaded('zip')) {
    $warnings[] = [ManagerTheme::getLexicon('configcheck_php_gdzip')];
}

if (!isset(evo()->config['_hide_configcheck_validate_referer']) ||
    evo()->config['_hide_configcheck_validate_referer'] !== '1'
) {
    if (isset($_SESSION['mgrPermissions']['settings']) && $_SESSION['mgrPermissions']['settings'] == '1') {
        if (evo()->getConfig('validate_referer') == '0') {
            $warnings[] = [ManagerTheme::getLexicon('configcheck_validate_referer')];
        }
    }
}

// check for Template Switcher plugin
if (!isset(evo()->config['_hide_configcheck_templateswitcher_present']) ||
    evo()->config['_hide_configcheck_templateswitcher_present'] !== '1'
) {
    if (isset($_SESSION['mgrPermissions']['edit_plugin']) && $_SESSION['mgrPermissions']['edit_plugin'] == '1') {
        $row = SitePlugin::query()
            ->select('name', 'disabled')
            ->firstWhere(function ($q) {
                $q
                    ->whereIn(
                        'name',
                        [
                            'TemplateSwitcher',
                            'Template Switcher',
                            'templateswitcher',
                            'template_switcher',
                            'template switcher',
                        ]
                    )
                    ->orWhere('plugincode', 'LIKE', '%TemplateSwitcher%');
            });

        if (!is_null($row) && $row->disabled == 0) {
            $warnings[] = [ManagerTheme::getLexicon('configcheck_templateswitcher_present')];
            $tplName = $row->name;
            $confirm_delete_plugin = ManagerTheme::getLexicon('confirm_delete_plugin');
            $script = <<<JS
<script>
function deleteTemplateSwitcher() {
    if(confirm('$confirm_delete_plugin')) {
        var myAjax = new Ajax('index.php?a=118', {
            method: 'post',
            data: 'action=updateplugin&key=_delete_&lang=$tplName'
        });
        myAjax.addEvent('onComplete', function(resp){
            fieldset = $('templateswitcher_present_warning_wrapper').getParent().getParent();
            var sl = new Fx.Slide(fieldset);
            sl.slideOut();
        });
        myAjax.request();
    }
}
function disableTemplateSwitcher() {
    var myAjax = new Ajax('index.php?a=118', {
        method: 'post',
        data: 'action=updateplugin&lang=$tplName&key=disabled&value=1'
    });
    myAjax.addEvent('onComplete', function(resp){
        fieldset = $('templateswitcher_present_warning_wrapper').getParent().getParent();
        var sl = new Fx.Slide(fieldset);
        sl.slideOut();
    });
    myAjax.request();
}
</script>

JS;
            evo()->regClientScript($script);
        }
    }
}

$unauthorizedPageId = evo()->getConfig('unauthorized_page');
$error_page_id = evo()->getConfig('error_page');
$pages = SiteContent::query()
    ->select(['id', 'published', 'privateweb'])
    ->whereIn('id', [$unauthorizedPageId, $error_page_id])
    ->get();

foreach ($pages as $page) {
    if ($page->id == $unauthorizedPageId && !$page->published) {
        $warnings[] = [ManagerTheme::getLexicon('configcheck_unauthorizedpage_unpublished')];
    }
    if ($page->id == $unauthorizedPageId && $page->privateweb) {
        $warnings[] = [ManagerTheme::getLexicon('configcheck_unauthorizedpage_unavailable')];
    }
    if ($page->id == $error_page_id && !$page->published) {
        $warnings[] = [ManagerTheme::getLexicon('configcheck_errorpage_unavailable')];
    }
    if ($page->id == $error_page_id && $page->privateweb) {
        $warnings[] = [ManagerTheme::getLexicon('configcheck_errorpage_unavailable')];
    }
}

if (!function_exists('checkSiteCache')) {
    /**
     * @return bool
     */
    function checkSiteCache(): bool
    {
        $checked = true;
        if (file_exists(MODX_BASE_PATH . 'assets/cache/siteCache.idx.php')) {
            $checked = @include_once(MODX_BASE_PATH . 'assets/cache/siteCache.idx.php');
        }

        return $checked;
    }
}

if (!is_writable(MODX_BASE_PATH . 'assets/cache/')) {
    $warnings[] = [ManagerTheme::getLexicon('configcheck_cache')];
}

if (!checkSiteCache()) {
    $warnings[] = [ManagerTheme::getLexicon('configcheck_sitecache_integrity')];
}

if (!is_writable(MODX_BASE_PATH . 'assets/images/')) {
    $warnings[] = [ManagerTheme::getLexicon('configcheck_images')];
}

if (strpos(evo()->config['rb_base_dir'], MODX_BASE_PATH) !== 0) {
    $warnings[] = [ManagerTheme::getLexicon('configcheck_rb_base_dir')];
}
if (strpos(evo()->config['filemanager_path'], MODX_BASE_PATH) !== 0) {
    $warnings[] = [ManagerTheme::getLexicon('configcheck_filemanager_path')];
}

// clear file info cache
clearstatcache();
if (!empty($warnings)) {
    if (!isset(evo()->config['send_errormail'])) {
        evo()->config['send_errormail'] = '3';
    }

    $config_check_results = "<h3>" . ManagerTheme::getLexicon('configcheck_notok') . "</h3>";

    for ($i = 0; $i < count($warnings); $i++) {
        switch ($warnings[$i][0]) {
            case ManagerTheme::getLexicon('configcheck_configinc');
                $warnings[$i][1] = ManagerTheme::getLexicon('configcheck_configinc_msg');
                if (empty($_SESSION['mgrConfigCheck'])) {
                    evo()->logEvent(0, 3, $warnings[$i][1], ManagerTheme::getLexicon('configcheck_configinc'));
                }
                break;
            case ManagerTheme::getLexicon('configcheck_installer') :
                $warnings[$i][1] = ManagerTheme::getLexicon('configcheck_installer_msg');
                if (empty($_SESSION['mgrConfigCheck'])) {
                    evo()->logEvent(0, 3, $warnings[$i][1], ManagerTheme::getLexicon('configcheck_installer'));
                }
                break;
            case ManagerTheme::getLexicon('configcheck_cache') :
                $warnings[$i][1] = ManagerTheme::getLexicon('configcheck_cache_msg');
                if (empty($_SESSION['mgrConfigCheck'])) {
                    evo()->logEvent(0, 2, $warnings[$i][1], ManagerTheme::getLexicon('configcheck_cache'));
                }
                break;
            case ManagerTheme::getLexicon('configcheck_images') :
                $warnings[$i][1] = ManagerTheme::getLexicon('configcheck_images_msg');
                if (empty($_SESSION['mgrConfigCheck'])) {
                    evo()->logEvent(0, 2, $warnings[$i][1], ManagerTheme::getLexicon('configcheck_images'));
                }
                break;
            case ManagerTheme::getLexicon('configcheck_sysfiles_mod'):
                $warnings[$i][1] = ManagerTheme::getLexicon('configcheck_sysfiles_mod_msg');
                $warnings[$i][2] = '<ul><li>' . implode('</li><li>', $systemFilesCheck) . '</li></ul>';
                if (evo()->hasPermission('settings')) {
                    $warnings[$i][2] .= '<ul class="actionButtons" style="float:right"><li><a href="index.php?a=2&b=resetSysfilesChecksum" onclick="return confirm(\'' .
                        ManagerTheme::getLexicon('reset_sysfiles_checksum_alert') . '\')">' .
                        ManagerTheme::getLexicon('reset_sysfiles_checksum_button') . '</a></li></ul>';
                }
                if (empty($_SESSION['mgrConfigCheck'])) {
                    evo()->logEvent(
                        0,
                        3,
                        $warnings[$i][1] . " " . implode(', ', $systemFilesCheck),
                        ManagerTheme::getLexicon('configcheck_sysfiles_mod')
                    );
                }
                break;
            case ManagerTheme::getLexicon('configcheck_lang_difference') :
                $warnings[$i][1] = ManagerTheme::getLexicon('configcheck_lang_difference_msg');
                break;
            case ManagerTheme::getLexicon('configcheck_php_gdzip') :
                $warnings[$i][1] = ManagerTheme::getLexicon('configcheck_php_gdzip_msg');
                break;
            case ManagerTheme::getLexicon('configcheck_unauthorizedpage_unpublished') :
                $warnings[$i][1] = ManagerTheme::getLexicon('configcheck_unauthorizedpage_unpublished_msg');
                break;
            case ManagerTheme::getLexicon('configcheck_errorpage_unpublished') :
                $warnings[$i][1] = ManagerTheme::getLexicon('configcheck_errorpage_unpublished_msg');
                break;
            case ManagerTheme::getLexicon('configcheck_unauthorizedpage_unavailable') :
                $warnings[$i][1] = ManagerTheme::getLexicon('configcheck_unauthorizedpage_unavailable_msg');
                break;
            case ManagerTheme::getLexicon('configcheck_errorpage_unavailable') :
                $warnings[$i][1] = ManagerTheme::getLexicon('configcheck_errorpage_unavailable_msg');
                break;
            case ManagerTheme::getLexicon('configcheck_validate_referer') :
                $msg = ManagerTheme::getLexicon('configcheck_validate_referer_msg');
                $msg .= '<br />' . sprintf(ManagerTheme::getLexicon('configcheck_hide_warning'), 'validate_referer');
                $warnings[$i][1] = "<span id=\"validate_referer_warning_wrapper\">$msg</span>\n";
                break;
            case ManagerTheme::getLexicon('configcheck_templateswitcher_present') :
                $msg = ManagerTheme::getLexicon('configcheck_templateswitcher_present_msg');
                if (isset($_SESSION['mgrPermissions']['save_plugin']) &&
                    $_SESSION['mgrPermissions']['save_plugin'] == '1'
                ) {
                    $msg .= '<br />' . ManagerTheme::getLexicon('configcheck_templateswitcher_present_disable');
                }
                if (isset($_SESSION['mgrPermissions']['delete_plugin']) &&
                    $_SESSION['mgrPermissions']['delete_plugin'] == '1'
                ) {
                    $msg .= '<br />' . ManagerTheme::getLexicon('configcheck_templateswitcher_present_delete');
                }
                $msg .= '<br />' .
                    sprintf(ManagerTheme::getLexicon('configcheck_hide_warning'), 'templateswitcher_present');
                $warnings[$i][1] = "<span id=\"templateswitcher_present_warning_wrapper\">$msg</span>\n";
                break;
            case ManagerTheme::getLexicon('configcheck_rb_base_dir') :
                $warnings[$i][1] = ManagerTheme::getLexicon('configcheck_rb_base_dir_msg');
                break;
            case ManagerTheme::getLexicon('configcheck_filemanager_path') :
                $warnings[$i][1] = ManagerTheme::getLexicon('configcheck_filemanager_path_msg');
                break;
            default :
                $warnings[$i][1] = ManagerTheme::getLexicon('configcheck_default_msg');
        }

        $admin_warning = $_SESSION['mgrRole'] != 1 ? ManagerTheme::getLexicon('configcheck_admin') : "";
        $config_check_results .= "
            <fieldset>
            <p><strong>" . ManagerTheme::getLexicon('configcheck_warning') . "</strong> '" . $warnings[$i][0] . "'</p>
            <p style=\"padding-left:1em\"><em>" . ManagerTheme::getLexicon('configcheck_what') . "</em><br />
            " . $warnings[$i][1] . " " . $admin_warning . "</p>
            " . (isset($warnings[$i][2]) ? '<div style="padding-left:1em">' . $warnings[$i][2] . '</div>' : '') . "
            </fieldset>
";
        if ($i != count($warnings) - 1) {
            $config_check_results .= "<br />";
        }
    }
    $_SESSION['mgrConfigCheck'] = true;
} else {
    $config_check_results = ManagerTheme::getLexicon('configcheck_ok');
}
