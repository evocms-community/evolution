<?php

use EvolutionCMS\Facades\ManagerTheme;
use EvolutionCMS\Models\SiteContent;
use EvolutionCMS\Models\SystemSetting;
use Illuminate\Support\Facades\File;

if (!defined('IN_MANAGER_MODE') || IN_MANAGER_MODE !== true) {
    die('<b>INCLUDE_ORDERING_ERROR</b><br /><br />Please use the EVO Content Manager instead of accessing this file directly.');
}
if (!evo()->hasPermission('settings')) {
    evo()->webAlertAndQuit(__('global.error_no_privileges'));
}
$defaultSettings = config('cms.settings', []);
$data = $_POST + $defaultSettings;

// lose the POST now, gets rid of quirky issue with Safari 3 - see FS#972
unset($_POST);
if (File::missing(MODX_MANAGER_PATH . '.htaccess')) {
    $sample_htaccess = File::get(MODX_MANAGER_PATH . 'ht.access');
    if (!empty($sample_htaccess)) {
        File::put(MODX_MANAGER_PATH . '.htaccess', str_replace('/manager/', '/' . MGR_DIR . '/', $sample_htaccess));
    }
}
if ($data['friendly_urls'] === '1' && strpos($_SERVER['SERVER_SOFTWARE'], 'IIS') === false) {
    $htaccess = MODX_BASE_PATH . '.htaccess';
    $sample_htaccess = MODX_BASE_PATH . 'ht.access';
    $dir = '/' . trim(MODX_BASE_URL, '/');
    if (is_file($htaccess)) {
        $_ = file_get_contents($htaccess);
        if (strpos($_, 'RewriteBase') === false) {
            $warnings[] = __('global.settings_friendlyurls_alert2');
        } elseif (is_writable($htaccess)) {
            $_ = preg_replace('@RewriteBase.+@', 'RewriteBase ' . $dir, $_);
            if (!@file_put_contents($htaccess, $_)) {
                $warnings[] = __('global.settings_friendlyurls_alert2');
            }
        }
    } elseif (is_file($sample_htaccess)) {
        if (!@rename($sample_htaccess, $htaccess)) {
            $warnings[] = __('global.settings_friendlyurls_alert');
        } elseif (MODX_BASE_URL !== '/') {
            $_ = file_get_contents($htaccess);
            $_ = preg_replace('@RewriteBase.+@', 'RewriteBase ' . $dir, $_);
            if (!@file_put_contents($htaccess, $_)) {
                $warnings[] = __('global.settings_friendlyurls_alert2');
            }
        }
    }
}

if (file_exists(MODX_MANAGER_PATH . 'media/style/' . evo()->getConfig('manager_theme') . '/css/styles.min.css')) {
    unlink(MODX_MANAGER_PATH . 'media/style/' . evo()->getConfig('manager_theme') . '/css/styles.min.css');
}

$data['filemanager_path'] = str_replace('[(base_path)]', MODX_BASE_PATH, $data['filemanager_path']);
$data['rb_base_dir'] = str_replace('[(base_path)]', MODX_BASE_PATH, $data['rb_base_dir']);

if (isset($data) && count($data) > 0) {
    if (isset($data['manager_language'])) {
        $lang_path = EVO_CORE_PATH . 'lang/' . $data['manager_language'] . '/global.php';
        if (is_file($lang_path)) {
            include $lang_path;
            $data['lang_code'] = $data['manager_language'];
        }
    }
    $data['sys_files_checksum'] = evo()->getManagerApi()->getSystemChecksum($data['check_files_onlogin']);
    foreach ($data as $k => $v) {
        if (isset($defaultSettings[$k])) {
            continue;
        }

        switch ($k) {
            case 'settings_version':
                if (evo()->getVersionData('version') != $data['settings_version']) {
                    evo()->logEvent(
                        17,
                        2,
                        '<pre>' . var_export($data['settings_version'], true) . '</pre>',
                        'fake settings_version'
                    );
                    $v = evo()->getVersionData('version');
                }
                break;
            case 'error_page':
            case 'unauthorized_page':
                if (trim($v) == '' || !is_numeric($v)) {
                    $v = $data['site_start'];
                }
                break;
            case 'lst_custom_contenttype':
            case 'txt_custom_contenttype':
                // Skip these
                $k = '';
                break;
            case 'rb_base_dir':
            case 'rb_base_url':
            case 'filemanager_path':
                $v = trim($v);
                $v = rtrim($v, '/') . '/';
                break;
            case 'manager_language':
                $langDir = realpath(EVO_CORE_PATH . 'lang/' . $v);
                $langFile = realpath(EVO_CORE_PATH . 'lang/' . $v . '/global.php');
                $langFileDir = dirname($langFile);
                if ($langDir !== $langFileDir || !file_exists($langFile)) {
                    $v = 'en';
                }
                break;
            case 'smtppw':
                if ($v !== '********************' && $v !== '') {
                    $v = trim($v);
                    $v = base64_encode($v) .
                        substr(str_shuffle('abcdefghjkmnpqrstuvxyzABCDEFGHJKLMNPQRSTUVWXYZ23456789'), 0, 7);
                    $v = str_replace('=', '%', $v);
                } elseif ($v === '********************') {
                    $k = '';
                }
                break;
            default:
                break;
        }
        $v = is_array($v) ? implode(',', $v) : $v;

        evo()->config[$k] = $v;

        if (!empty($k)) {
            SystemSetting::query()->updateOrCreate(['setting_name' => $k], ['setting_value' => $v]);
        }
    }

    // Reset Template Pages
    if (isset($data['reset_template'])) {
        $newtemplate = (int) $data['default_template'];
        $oldtemplate = (int) $data['old_template'];
        $reset = $data['reset_template'];
        if ($reset == 1) {
            SiteContent::query()->where('type', 'document')->update(['template' => $newtemplate]);
        } else {
            if ($reset == 2) {
                SiteContent::query()->where('template', $oldtemplate)->update(['template' => $newtemplate]);
            }
        }
    }

    // empty cache
    evo()->clearCache('full');
    cache()->store('rss')->flush();
}
header('Location: index.php?a=7&r=10');
