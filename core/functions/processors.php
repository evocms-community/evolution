<?php

use EvolutionCMS\Models\SiteContent;
use EvolutionCMS\Models\SiteModuleAccess;
use EvolutionCMS\Models\SitePluginEvent;
use EvolutionCMS\Models\SiteTmplvarAccess;
use EvolutionCMS\Models\SiteTmplvarTemplate;
use EvolutionCMS\Models\SystemEventname;
use EvolutionCMS\Models\User;
use EvolutionCMS\Models\UserAttribute;
use EvolutionCMS\Models\UserRoleVar;

if (!function_exists('evalModule')) {
    /**
     * evalModule
     *
     * @param string $moduleCode
     * @param array $params
     *
     * @return string
     */
    function evalModule(string $moduleCode, array $params): string
    {
        $modx = evo();
        $modx->event->params = &$params; // store params inside event object
        if (is_array($params)) {
            extract($params, EXTR_SKIP);
        }
        ob_start();
        $mod = eval($moduleCode);
        $msg = ob_get_contents();
        ob_end_clean();
        if (isset($php_errormsg)) {
            $error_info = error_get_last();
            switch ($error_info['type']) {
                case E_NOTICE :
                    $error_level = 1;
                    break;
                case E_USER_NOTICE :
                    break;
                case E_DEPRECATED :
                case E_USER_DEPRECATED :
                case E_STRICT :
                    $error_level = 2;
                    break;
                default:
                    $error_level = 99;
            }
            if ($modx->getConfig('error_reporting') >= 99 || 2 < $error_level) {
                $modx->messageQuit(
                    'PHP Parse Error',
                    '',
                    true,
                    $error_info['type'],
                    $error_info['file'],
                    $_SESSION['itemname'] . ' - Module',
                    $error_info['message'],
                    $error_info['line'],
                    $msg
                );
                $modx->event->alert(
                    'An error occurred while loading. Please see the event log for more information<p>' . $msg . '</p>'
                );
            }
        }
        unset($modx->event->params);

        return $mod . $msg;
    }
}

if (!function_exists('allChildren')) {
    /**
     * @param int $currDocID
     *
     * @return array
     */
    function allChildren(int $currDocID): array
    {
        $children = [];
        $found = collect();

        $docs = SiteContent::withTrashed()
            ->where('parent', '=', $currDocID)
            ->pluck('id')
            ->toArray();

        foreach ($docs as $id) {
            $children[] = $id;
            $found->push(allChildren($id));
        }

        return array_merge($children, $found->collapse()->toArray());
    }
}

if (!function_exists('jsAlert')) {
    /**
     * show javascript alert
     *
     * @param string $msg
     */
    function jsAlert(string $msg)
    {
        if ((int) get_by_key($_POST, 'ajax', 0) !== 1) {
            echo '<script>window.setTimeout("alert(\'' . addslashes($msg) . '\')",10);history.go(-1)</script>';
        } else {
            echo $msg . "\n";
        }
    }
}

if (!function_exists('login')) {
    /**
     * @param string $username
     * @param string $givenPassword
     * @param string $dbasePassword
     *
     * @return bool
     */
    function login(string $username, string $givenPassword, string $dbasePassword)
    {
        $modx = evo();

        return $modx->getPasswordHash()->CheckPassword($givenPassword, $dbasePassword);
    }
}

if (!function_exists('loginV1')) {
    /**
     * @param int $internalKey
     * @param string $givenPassword
     * @param string $dbasePassword
     * @param string $username
     *
     * @return bool
     */
    function loginV1(int $internalKey, string $givenPassword, string $dbasePassword, string $username): bool
    {
        $modx = evo();

        $user_algo = $modx->getManagerApi()->getV1UserHashAlgorithm($internalKey);

        if (!isset($modx->config['pwd_hash_algo']) || empty($modx->config['pwd_hash_algo'])) {
            $modx->setConfig('pwd_hash_algo', 'UNCRYPT');
        }

        if ($user_algo !== $modx->getConfig('pwd_hash_algo')) {
            $bk_pwd_hash_algo = $modx->getConfig('pwd_hash_algo');
            $modx->setConfig('pwd_hash_algo', $user_algo);
        }

        if ($dbasePassword != $modx->getManagerApi()->genV1Hash($givenPassword, $internalKey)) {
            return false;
        }

        updateNewHash($username, $givenPassword);

        return true;
    }
}

if (!function_exists('loginMD5')) {
    /**
     * @param int $internalKey
     * @param string $givenPassword
     * @param string $dbasePassword
     * @param string $username
     *
     * @return bool
     */
    function loginMD5(int $internalKey, string $givenPassword, string $dbasePassword, string $username): bool
    {
        if ($dbasePassword != md5($givenPassword)) {
            return false;
        }

        updateNewHash($username, $givenPassword);

        return true;
    }
}

if (!function_exists('updateNewHash')) {
    /**
     * @param string $username
     * @param string $password
     */
    function updateNewHash(string $username, string $password)
    {
        $modx = evo();

        $field = [];
        $field['password'] = $modx->getPasswordHash()->HashPassword($password);
        User::query()->where('username', $username)->update($field);
    }
}

if (!function_exists('saveUserGroupAccessPermissons')) {
    /**
     * saves module user group access
     */
    function saveUserGroupAccessPermissons()
    {
        $modx = evo();
        global $id, $newid;
        global $use_udperms;

        if ($newid) {
            $id = $newid;
        }

        $usrgroups = get_by_key($_POST, 'usrgroups', []);

        // check for permission update access
        if ($use_udperms == 1) {
            // delete old permissions on the module
            SiteModuleAccess::query()->where('module', $id)->delete();

            if (is_array($usrgroups)) {
                foreach ($usrgroups as $value) {
                    SiteModuleAccess::query()->create([
                        'module' => (int) $id,
                        'usergroup' => stripslashes($value),
                    ]);
                }
            }
        }
    }
}

if (!function_exists('saveEventListeners')) {
# Save Plugin Event Listeners
    /**
     * @param $id
     * @param array $sysevents
     * @param string $mode
     *
     * @return void
     */
    function saveEventListeners($id, array $sysevents, string $mode)
    {
        // save selected system events
        $formEventList = [];
        foreach ($sysevents as $evtId) {
            if (!preg_match('@^[1-9][0-9]*$@', $evtId)) {
                $evtId = getEventIdByName($evtId);
            }
            if ($mode == '101') {
                $prevPriority = SitePluginEvent::query()->where('evtid', $evtId)->max('priority');
            } else {
                $prevPriority =
                    SitePluginEvent::query()->where('evtid', $evtId)->where('pluginid', $id)->max('priority');
            }
            if ($mode == '101') {
                $priority = isset($prevPriority) ? $prevPriority + 1 : 1;
            } else {
                $priority = $prevPriority ?? 1;
            }
            $priority = (int) $priority;
            $formEventList[] = ['pluginid' => $id, 'evtid' => $evtId, 'priority' => $priority];
        }

        $evtids = [];
        foreach ($formEventList as $eventInfo) {
            SitePluginEvent::query()->updateOrCreate(
                ['pluginid' => $eventInfo['pluginid'], 'evtid' => $eventInfo['evtid']],
                ['priority' => $eventInfo['priority']]
            );
            $evtids[] = $eventInfo['evtid'];
        }
        $pluginEvents = SitePluginEvent::query()->where('pluginid', $id)->get();

        $del = [];
        foreach ($pluginEvents->toArray() as $row) {
            if (!in_array($row['evtid'], $evtids)) {
                $del[] = $row['evtid'];
            }
        }

        if (empty($del)) {
            return;
        }
        SitePluginEvent::query()->where('pluginid', $id)->whereIn('evtid', $del)->delete();
    }
}

if (!function_exists('getEventIdByName')) {
    /**
     * @param string $name
     *
     * @return string|int
     */
    function getEventIdByName(string $name)
    {
        static $eventIds = [];

        if (isset($eventIds[$name])) {
            return $eventIds[$name];
        }
        $eventIds = SystemEventname::query()->pluck('id', 'name')->toArray();

        return $eventIds[$name];
    }
}

if (!function_exists('saveTemplateAccess')) {
    /**
     * @param int $id
     */
    function saveTemplateAccess(int $id)
    {
        if ($_POST['tvsDirty'] == 1) {
            $newAssignedTvs = $_POST['assignedTv'] ?? '';

            // Preserve rankings of already assigned TVs
            $templates = SiteTmplvarTemplate::query()->where('templateid', $id)->get();
            $ranksArr = [];
            $highest = 0;
            foreach ($templates->toArray() as $row) {
                $ranksArr[$row['tmplvarid']] = $row['rank'];
                $highest = max($highest, $row['rank']);
            };
            SiteTmplvarTemplate::query()->where('templateid', $id)->delete();

            if (empty($newAssignedTvs)) {
                return;
            }
            foreach ($newAssignedTvs as $tvid) {
                if (!$id || !$tvid) {
                    continue;
                }    // Dont link zeros
                SiteTmplvarTemplate::query()->create([
                    'templateid' => $id,
                    'tmplvarid' => $tvid,
                    'rank' => $ranksArr[$tvid] ?? $highest += 1, // append TVs to rank
                ]);
            }
        }
    }
}

if (!function_exists('saveTemplateVarAccess')) {
    /**
     * @return void
     */
    function saveTemplateVarAccess($id)
    {
        $templates = $_POST['template'] ?? []; // get muli-templates based on S.BRENNAN mod

        $siteTmlvarTemplates = SiteTmplvarTemplate::query()->where('tmplvarid', '=', $id)->get();

        $getRankArray = $siteTmlvarTemplates->pluck('rank', 'templateid')->toArray();
        /*foreach ($siteTmlvarTemplates as $siteTmlvarTemplate) {
            $getRankArray[$siteTmlvarTemplate->templateid] = $siteTmlvarTemplate->rank;
        }*/

        SiteTmplvarTemplate::query()->where('tmplvarid', '=', $id)->delete();
        if (!$templates) {
            return;
        }
        foreach ($templates as $iValue) {
            $field = [
                'tmplvarid' => $id,
                'templateid' => $iValue,
                'rank' => get_by_key($getRankArray, $iValue, 0),
            ];
            SiteTmplvarTemplate::query()->create($field);
        }
    }
}

if (!function_exists('saveVarRoles')) {
    /**
     * @return void
     */
    function saveVarRoles($id)
    {
        $roles = $_POST['role'] ?? [];

        $exists = UserRoleVar::query()->where('tmplvarid', '=', $id)->get();

        $getRankArray = $exists->pluck('rank', 'roleid')->toArray();

        UserRoleVar::query()->where('tmplvarid', '=', $id)->delete();
        if (!$roles) {
            return;
        }
        foreach ($roles as $iValue) {
            $field = [
                'tmplvarid' => $id,
                'roleid' => $iValue,
                'rank' => get_by_key($getRankArray, $iValue, 0),
            ];
            UserRoleVar::query()->create($field);
        }
    }
}

if (!function_exists('saveDocumentAccessPermissons')) {
    function saveDocumentAccessPermissons($id)
    {
        $modx = evo();

        $docgroups = $_POST['docgroups'] ?? '';

        // check for permission update access
        if ($modx->getConfig('use_udperms') != 1) {
            return;
        }

        // delete old permissions on the tv
        SiteTmplvarAccess::query()->where('tmplvarid', '=', $id)->delete();
        if (is_array($docgroups)) {
            foreach ($docgroups as $value) {
                $field = ['tmplvarid' => $id, 'documentgroup' => stripslashes($value)];
                SiteTmplvarAccess::query()->create($field);
            }
        }
    }
}

if (!function_exists('sendMailMessageForUser')) {
    /**
     * Send an email to the user
     *
     * @param string $email
     * @param string $uid
     * @param string $pwd
     * @param string $ufn
     * @param $message
     * @param $url
     *
     * @throws \PHPMailer\PHPMailer\Exception
     */
    function sendMailMessageForUser(string $email, string $uid, string $pwd, string $ufn, $message, $url)
    {
        $modx = evo();
        global $_lang;
        global $emailsubject, $emailsender;
        $message = sprintf($message, $uid, $pwd); // use old method
        $last_name = '';
        $first_name = '';
        $middle_name = '';
        $user = UserAttribute::query()->where('email', $email)->first();
        if (!is_null($user)) {
            $last_name = $user->last_name;
            $first_name = $user->first_name;
            $middle_name = $user->middle_name;
        }
        // replace placeholders
        $message = str_replace(
            [
                '[+uid+]',
                '[+pwd+]',
                '[+ufn+]',
                '[+sname+]',
                '[+saddr+]',
                '[+semail+]',
                '[+surl+]',
                '[+u_first_name+]',
                '[+u_last_name+]',
                '[+u_middle_name+]',
            ]
            , [
                $uid,
                $pwd,
                $ufn,
                $modx->getPhpCompat()->entities($modx->getConfig('site_name')),
                $emailsender,
                $emailsender,
                $url,
                $first_name,
                $last_name,
                $middle_name,
            ]
            , $message
        );

        $param = [];
        $param['from'] = $modx->getConfig('site_name') . '<' . $emailsender . '>';
        $param['subject'] = $emailsubject;
        $param['body'] = $message;
        $param['to'] = $email;
        $param['type'] = 'text';
        if ($modx->sendmail($param)) {
            return;
        }
        $modx->getManagerApi()->saveFormValues();
        $modx->messageQuit($email . ' - ' . $_lang['error_sending_email']);
    }
}

if (!function_exists('webAlertAndQuit')) {
    /**
     * Web alert -  sends an alert to web browser
     *
     * @param $msg
     * @param $action int
     * @param $id int|bool
     */
    function webAlertAndQuit($msg, int $action, $id = false)
    {
        $modx = evo();
        $mode = $_POST['mode'];
        $modx->getManagerApi()->saveFormValues($mode);
        $url = 'index.php?a=' . $action;
        if ($id) {
            $url .= '&id=' . $id;
        }
        $modx->webAlertAndQuit($msg, $url);
    }
}
