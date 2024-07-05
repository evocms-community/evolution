<?php

use EvolutionCMS\Facades\ManagerTheme;
use EvolutionCMS\Models\ActiveUserSession;

?>
@extends('manager::template.page')
@section('content')
    <?php
    /*include_once ManagerTheme::getFileProcessor('actions/welcome.static.php');*/ ?>
    <?php
    unset($_SESSION['itemname']); // clear this, because it's only set for logging purposes

    if (evo()->hasPermission('settings') && config('global.settings_version') !== evo()->getVersionData('version')) {
        // seems to be a new install - send the user to the configuration page
        exit('<script>document.location.href="index.php?a=17";</script>');
    }

    // set placeholders
    $ph = __('global');

    $iconTpl = evo()->getChunk('manager#welcome\WrapIcon');

    // setup icons
    if (evo()->hasPermission('new_user') || evo()->hasPermission('edit_user')) {
        $icon = '<i class="' . ManagerTheme::getStyle('icon_user') . ManagerTheme::getStyle('icon_size_2x') .
            ManagerTheme::getStyle('icon_size_fix') .
            '" alt="[%user_management_title%]"> </i>[%user_management_title%]';
        $ph['SecurityIcon'] = sprintf($iconTpl, $icon, 75);
    }

    if (evo()->hasPermission('new_user') || evo()->hasPermission('edit_user')) {
        $icon = '<i class="' . ManagerTheme::getStyle('icon_web_user') . ManagerTheme::getStyle('icon_size_2x') .
            ManagerTheme::getStyle('icon_size_fix') .
            '" alt="[%web_user_management_title%]"> </i>[%web_user_management_title%]';
        $ph['WebUserIcon'] = sprintf($iconTpl, $icon, 99);
    }

    if (evo()->hasPermission('new_module') || evo()->hasPermission('edit_module')) {
        $icon = '<i class="' . ManagerTheme::getStyle('icon_modules') . ManagerTheme::getStyle('icon_size_2x') .
            ManagerTheme::getStyle('icon_size_fix') . '" alt="[%manage_modules%]"> </i>[%modules%]';
        $ph['ModulesIcon'] = sprintf($iconTpl, $icon, 106);
    }

    if (evo()->hasPermission('new_template') || evo()->hasPermission('edit_template') ||
        evo()->hasPermission('new_snippet') || evo()->hasPermission('edit_snippet') ||
        evo()->hasPermission('new_plugin') || evo()->hasPermission('edit_plugin') ||
        evo()->hasPermission('manage_metatags')
    ) {
        $icon = '<i class="' . ManagerTheme::getStyle('icon_elements') . ManagerTheme::getStyle('icon_size_2x') .
            ManagerTheme::getStyle('icon_size_fix') . '" alt="[%element_management%]"> </i>[%elements%]';
        $ph['ResourcesIcon'] = sprintf($iconTpl, $icon, 76);
    }

    if (evo()->hasPermission('bk_manager')) {
        $icon = '<i class="' . ManagerTheme::getStyle('icon_database') . ManagerTheme::getStyle('icon_size_2x') .
            ManagerTheme::getStyle('icon_size_fix') . '" alt="[%bk_manager%]"> </i>[%backup%]';
        $ph['BackupIcon'] = sprintf($iconTpl, $icon, 93);
    }

    if (evo()->hasPermission('help')) {
        $icon = '<i class="' . ManagerTheme::getStyle('icon_question_circle') . ManagerTheme::getStyle('icon_size_2x') .
            ManagerTheme::getStyle('icon_size_fix') . '" alt="[%help%]" /> </i>[%help%]';
        $ph['HelpIcon'] = sprintf($iconTpl, $icon, 9);
    }

    if (evo()->hasPermission('new_document')) {
        $icon = '<i class="' . ManagerTheme::getStyle('icon_document') . ManagerTheme::getStyle('icon_size_2x') .
            ManagerTheme::getStyle('icon_size_fix') . '"></i>[%add_resource%]';
        $ph['ResourceIcon'] = sprintf($iconTpl, $icon, 4);
        $icon = '<i class="' . ManagerTheme::getStyle('icon_chain') . ManagerTheme::getStyle('icon_size_2x') .
            ManagerTheme::getStyle('icon_size_fix') . '"></i>[%add_weblink%]';
        $ph['WeblinkIcon'] = sprintf($iconTpl, $icon, 72);
    }

    if (evo()->hasPermission('assets_images')) {
        $icon = '<i class="' . ManagerTheme::getStyle('icon_camera') . ManagerTheme::getStyle('icon_size_2x') .
            ManagerTheme::getStyle('icon_size_fix') . '"></i>[%images_management%]';
        $ph['ImagesIcon'] = sprintf($iconTpl, $icon, 72);
    }

    if (evo()->hasPermission('assets_files')) {
        $icon = '<i class="' . ManagerTheme::getStyle('icon_files') . ManagerTheme::getStyle('icon_size_2x') .
            ManagerTheme::getStyle('icon_size_fix') . '"></i>[%files_management%]';
        $ph['FilesIcon'] = sprintf($iconTpl, $icon, 72);
    }

    if (evo()->hasPermission('change_password')) {
        $icon = '<i class="' . ManagerTheme::getStyle('icon_lock') . ManagerTheme::getStyle('icon_size_2x') .
            ManagerTheme::getStyle('icon_size_fix') . '"></i>[%change_password%]';
        $ph['PasswordIcon'] = sprintf($iconTpl, $icon, 28);
    }

    $icon = '<i class="' . ManagerTheme::getStyle('icon_logout') . ManagerTheme::getStyle('icon_size_2x') .
        ManagerTheme::getStyle('icon_size_fix') . '"></i>[%logout%]';
    $ph['LogoutIcon'] = sprintf($iconTpl, $icon, 8);

    // do some config checks
    if (config('global.warning_visibility') || $_SESSION['mgrRole'] == 1) {
        include_once MODX_MANAGER_PATH . 'includes/config_check.inc.php';
        if ($config_check_results != __('global.configcheck_ok')) {
            $ph['config_check_results'] = $config_check_results;
            $ph['config_display'] = 'block';
        } else {
            $ph['config_display'] = 'none';
        }
    } else {
        $ph['config_display'] = 'none';
    }

    if (evo()->isSafemode()) {
        $ph['show_safe_mode'] = 'block';
        $ph['safe_mode_msg'] = __('global.safe_mode_warning');
    } else {
        $ph['show_safe_mode'] = 'none';
    }

    if (!config('global.site_status') && evo()->hasPermission('settings')) {
        $ph['show_site_status'] = 'block';
        $ph['site_status_msg'] =
            strip_tags(config('global.site_unavailable_message')) . ' ' . __('global.update_settings_from_language') .
            ' <a href="?a=17&tab=0" target="main" class="btn btn-sm btn-success">' . __('global.online') . '</a>';
    } else {
        $ph['show_site_status'] = 'none';
    }

    // Check logout-reminder
    if (isset($_SESSION['show_logout_reminder'])) {
        switch ($_SESSION['show_logout_reminder']['type']) {
            case 'logout_reminder':
                $date = evo()->toDateFormat($_SESSION['show_logout_reminder']['lastHit'], 'dateOnly');
                $ph['logout_reminder_msg'] = str_replace('[+date+]', $date, __('global.logout_reminder_msg'));
                break;
        }
        $ph['show_logout_reminder'] = 'block';
        unset($_SESSION['show_logout_reminder']);
    } else {
        $ph['show_logout_reminder'] = 'none';
    }

    // Check multiple sessions

    $ph['show_multiple_sessions'] = 'none';

    $ph['RecentInfo'] = evo()->getChunk('manager#welcome\RecentInfo');

    $tpl = '
    <table class="">
        <tr>
            <td width="150">[%yourinfo_username%]</td>
            <td><b>[+username+]</b></td>
        </tr>
        <tr>
            <td>[%yourinfo_role%]</td>
            <td><b>[+role+]</b></td>
        </tr>
        <tr>
            <td>[%yourinfo_previous_login%]</td>
            <td><b>[+lastlogin+]</b></td>
        </tr>
        <tr>
            <td>[%yourinfo_total_logins%]</td>
            <td><b>[+logincount+]</b></td>
        </tr>
    </table>';

    $loginCount = $_SESSION['mgrLogincount'] + 1;
    $ph['UserInfo'] = evo()->parseText($tpl, [
        'username' => evo()->getLoginUserName(),
        'role' => $_SESSION['mgrPermissions']['name'],
        'lastlogin' => $loginCount > 1 ? $modx->toDateFormat($modx->timestamp($_SESSION['mgrLastlogin'])) : '-',
        'logincount' => $loginCount,
    ]);

    $activeUsers = ActiveUserSession::query()
        ->join('active_users', 'active_users.sid', '=', 'active_user_sessions.sid')
        ->where('active_users.action', '<>', 8)
        ->orderBy('username', 'ASC')
        ->orderBy('active_users.sid', 'ASC');
    if ($activeUsers->count() < 1) {
        $html = '<p>[%no_active_users_found%]</p>';
    } else {
        $now = evo()->timestamp($_SERVER['REQUEST_TIME']);
        if (extension_loaded('intl')) {
            // https://www.php.net/manual/en/class.intldateformatter.php
            // https://www.php.net/manual/en/datetime.createfromformat.php
            $formatter = new IntlDateFormatter(
                config('global.manager_language'),
                IntlDateFormatter::MEDIUM,
                IntlDateFormatter::MEDIUM,
                null,
                null,
                'HH:mm:ss'
            );
            $ph['now'] = $formatter->format($now);
        } else {
            $ph['now'] = date('H:i:s', $now);
        }
        $timetocheck = $now - 60 * 20; //+$server_offset_time;
        $html = '
        <div class="card-body">
            [%onlineusers_message%]
            <b>[+now+]</b>):
        </div>
        <div class="table-responsive">
        <table class="table data">
        <thead>
            <tr>
                <th>[%onlineusers_user%]</th>
                <th>ID</th>
                <th>[%onlineusers_ipaddress%]</th>
                <th>[%onlineusers_lasthit%]</th>
                <th>[%onlineusers_action%]&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
            </tr>
        </thead>
        <tbody>';

        $userList = [];
        $userCount = [];
        // Create userlist with session-count first before output
        foreach ($activeUsers->get()->toArray() as $activeUser) {
            $userCount[$activeUser['internalKey']] =
                isset($userCount[$activeUser['internalKey']]) ? $userCount[$activeUser['internalKey']] + 1 : 1;

            $idle = $activeUser['lasthit'] < $timetocheck ? ' class="userIdle"' : '';
            $webicon = $activeUser['internalKey'] < 0 ? '<i class="[&icon_globe&]"></i>' : '';
            $ip = $activeUser['ip'] === '::1' ? '127.0.0.1' : $activeUser['ip'];
            $currentaction = EvolutionCMS\Legacy\LogHandler::getAction($activeUser['action'], $activeUser['id']);
            if (extension_loaded('intl')) {
                // https://www.php.net/manual/en/class.intldateformatter.php
                // https://www.php.net/manual/en/datetime.createfromformat.php
                $formatter = new IntlDateFormatter(
                    config('global.manager_language'),
                    IntlDateFormatter::MEDIUM,
                    IntlDateFormatter::MEDIUM,
                    null,
                    null,
                    'HH:mm:ss'
                );
                $lasthit = $formatter->format(evo()->timestamp($activeUser['lasthit']));
            } else {
                $lasthit = date('H:i:s', evo()->timestamp($activeUser['lasthit']));
            }
            $userList[] = [
                $idle,
                '',
                $activeUser['username'],
                $webicon,
                abs($activeUser['internalKey']),
                $ip,
                $lasthit,
                $currentaction
            ];
        }
        foreach ($userList as $params) {
            $params[1] = $userCount[$params[4]] > 1 ? ' class="userMultipleSessions"' : '';
            $html .= "\n\t\t" . vsprintf(
                    '<tr%s><td><strong%s>%s</strong></td><td>%s%s</td><td>%s</td><td>%s</td><td>%s</td></tr>',
                    $params
                );
        }

        $html .= '
        </tbody>
        </table>
    </div>
    ';
    }

    $ph['OnlineInfo'] = $html;

    // include rss feeds for important forum topics
    // Here you can set the urls to retrieve the RSS from. Simply add a $urls line following the numbering progress in the square brakets.

    $urls['modx_news_content'] = config('global.rss_url_news');
    $urls['modx_security_notices_content'] = config('global.rss_url_security');

    // How many items per Feed?
    $itemsNumber = 3;


    $feedData = cache()->store('rss')->remember('feeddata', 24 * 3600, function () use ($urls, $itemsNumber) {
        // create Feed
        $feedData = [];
        $feed = new \SimplePie\SimplePie();
        foreach ($urls as $section => $url) {
            if (empty($url)) {
                continue;
            }
            $output = '';
            $feed->set_feed_url($url);
            $feed->enable_cache(false);
            $feed->init();
            $items = $feed->get_items(0, $itemsNumber);
            if (empty($items)) {
                $feedData[$section] = 'Failed to retrieve ' . $url;
                continue;
            }
            $output = '<ul>';
            foreach ($items as $item) {
                $href = $item->get_link();
                $title = $item->get_title();
                $pubdate = $item->get_date();
                $pubdate = evo()->toDateFormat(strtotime($pubdate));
                $description = strip_tags($item->get_content());
                if (strlen($description) > 199) {
                    $description = \Illuminate\Support\Str::words($description, 15, '...');
                    $description .= '<br />Read <a href="' . $href . '" target="_blank">more</a>.';
                }
                $output .= '<li><a href="' . $href . '" target="_blank">' . $title . '</a> - <b>' . $pubdate .
                    '</b><br />' . $description . '</li>';
            }
            $output .= '</ul>';
            $feedData[$section] = $output;
        }

        return $feedData;
    });

    $ph['modx_security_notices_content'] = $feedData['modx_security_notices_content'] ?? [];
    $ph['modx_news_content'] = $feedData['modx_news_content'] ?? [];
    $ph['theme'] = config('global.manager_theme');
    $ph['site_name'] = e(config('global.site_name'));

    $ph['modx_security_notices'] = __('global.security_notices_tab');
    $ph['modx_security_notices_title'] = __('global.security_notices_title');
    $ph['modx_news'] = __('global.modx_news_tab');
    $ph['modx_news_title'] = __('global.modx_news_title');

    evo()->toPlaceholders($ph);

    evo()->regClientScript(evo()->getChunk('manager#welcome\StartUpScript'));

    // invoke event OnManagerWelcomePrerender
    $evtOut = evo()->invokeEvent('OnManagerWelcomePrerender');
    if (is_array($evtOut)) {
        $output = implode('', $evtOut);
        $ph['OnManagerWelcomePrerender'] = $output;
    }

    $widgets['welcome'] = [
        'menuindex' => '10',
        'id' => 'welcome',
        'cols' => 'col-lg-6',
        'icon' => 'fa-home',
        'title' => '[%welcome_title%]',
        'body' =>
            '
                <div class="wm_buttons card-body">' .
            (evo()->hasPermission('new_document')
                ? '
                    <span class="wm_button">
                        <a target="main" href="index.php?a=4">
                            <i class="' .
                ManagerTheme::getStyle('icon_document') .
                ManagerTheme::getStyle('icon_size_2x') .
                ManagerTheme::getStyle('icon_size_fix') .
                '"></i>
                            <span>[%add_resource%]</span>
                        </a>
                    </span>
                    <span class="wm_button">
                        <a target="main" href="index.php?a=72">
                            <i class="' .
                ManagerTheme::getStyle('icon_chain') .
                ManagerTheme::getStyle('icon_size_2x') .
                ManagerTheme::getStyle('icon_size_fix') .
                '"></i>
                            <span>[%add_weblink%]</span>
                        </a>
                    </span>
                    '
                : '') .
            (evo()->hasPermission('assets_images')
                ? '
                    <span class="wm_button">
                        <a target="main" href="media/browser/mcpuk/browse.php?filemanager=media/browser/mcpuk/browse.php&type=images">
                            <i class="' .
                ManagerTheme::getStyle('icon_camera') .
                ManagerTheme::getStyle('icon_size_2x') .
                ManagerTheme::getStyle('icon_size_fix') .
                '"></i>
                            <span>[%images_management%]</span>
                        </a>
                    </span>
                    '
                : '') .
            (evo()->hasPermission('assets_files')
                ? '
                    <span class="wm_button">
                        <a target="main" href="media/browser/mcpuk/browse.php?filemanager=media/browser/mcpuk/browse.php&type=files">
                            <i class="' .
                ManagerTheme::getStyle('icon_files') .
                ManagerTheme::getStyle('icon_size_2x') .
                ManagerTheme::getStyle('icon_size_fix') .
                '"></i>
                            <span>[%files_management%]</span>
                        </a>
                    </span>
                    '
                : '') .
            (evo()->hasPermission('bk_manager')
                ? '
                    <span class="wm_button">
                        <a target="main" href="index.php?a=93">
                            <i class="' .
                ManagerTheme::getStyle('icon_database') .
                ManagerTheme::getStyle('icon_size_2x') .
                ManagerTheme::getStyle('icon_size_fix') .
                '"></i>
                            <span>[%bk_manager%]</span>
                        </a>
                    </span>
                    '
                : '') .
            (evo()->hasPermission('change_password')
                ? '
                    <span class="wm_button">
                        <a target="main" href="index.php?a=28">
                            <i class="' .
                ManagerTheme::getStyle('icon_lock') .
                ManagerTheme::getStyle('icon_size_2x') .
                ManagerTheme::getStyle('icon_size_fix') .
                '"></i>
                            <span>[%change_password%]</span>
                        </a>
                    </span>
                    '
                : '') .
            '
                    <span class="wm_button">
                        <a target="_top" href="index.php?a=8">
                            <i class="' .
            ManagerTheme::getStyle('icon_logout') .
            ManagerTheme::getStyle('icon_size_2x') .
            ManagerTheme::getStyle('icon_size_fix') .
            '"></i>
                            <span>[%logout%]</span>
                        </a>
                    </span>
                </div>
                <div class="userprofiletable card-body">
                    [+UserInfo+]
                </div>
            ',
        'hide' => '0',
    ];

    $widgets['onlineinfo'] = [
        'menuindex' => '20',
        'id' => 'onlineinfo',
        'cols' => 'col-lg-6',
        'icon' => 'fa-user',
        'title' => '[%onlineusers_title%]',
        'body' => '<div class="userstable">[+OnlineInfo+]</div>',
        'hide' => '0',
    ];

    $widgets['recentinfo'] = [
        'menuindex' => '30',
        'id' => 'modxrecent_widget',
        'cols' => 'col-sm-12',
        'icon' => 'fa-pencil-square-o',
        'title' => '[%activity_title%]',
        'body' => '<div class="widget-stage">[+RecentInfo+]</div>',
        'hide' => '0',
    ];

    if (config('global.rss_url_news')) {
        $widgets['news'] = [
            'menuindex' => '40',
            'id' => 'news',
            'cols' => 'col-sm-6',
            'icon' => 'fa-rss',
            'title' => '[%modx_news_title%]',
            'body' => '<div style="max-height:200px;overflow-y: scroll;padding: 1rem .5rem">[+modx_news_content+]</div>',
            'hide' => '0',
        ];
    }
    if (config('global.rss_url_security')) {
        $widgets['security'] = [
            'menuindex' => '50',
            'id' => 'security',
            'cols' => 'col-sm-6',
            'icon' => 'fa-exclamation-triangle',
            'title' => '[%security_notices_title%]',
            'body' => '<div style="max-height:200px;overflow-y: scroll;padding: 1rem .5rem">[+modx_security_notices_content+]</div>',
            'hide' => '0',
        ];
    }

    // invoke OnManagerWelcomeHome event
    $sitewidgets = evo()->invokeEvent('OnManagerWelcomeHome', ['widgets' => $widgets]);
    if (is_array($sitewidgets)) {
        $newwidgets = [];
        foreach ($sitewidgets as $widget) {
            $newwidgets = array_merge($newwidgets, unserialize($widget));
        }
        $widgets = count($newwidgets) > 0 ? $newwidgets : $widgets;
    }

    usort($widgets, function ($a, $b) {
        return $a['menuindex'] - $b['menuindex'];
    });

    $tpl = evo()->getChunk('manager#welcome\Widget');
    $output = '';
    foreach ($widgets as $widget) {
        if ((bool) get_by_key($widget, 'hide', false) !== true) {
            $output .= evo()->parseText($tpl, $widget);
        }
    }
    $ph['widgets'] = $output;
    ?>
    {!! ManagerTheme::makeTemplate('welcome', 'manager_welcome_tpl', $ph, false) !!}
@endsection
