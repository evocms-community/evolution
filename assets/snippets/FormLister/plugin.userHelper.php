<?php
/**
 * Created by PhpStorm.
 * User: Pathologic
 * Date: 25.06.2016
 * Time: 18:59
 */
$e = $modx->event;
if (!class_exists('\\FormLister\\Core')) {
    include_once(MODX_BASE_PATH . 'assets/snippets/FormLister/__autoload.php');
}
if (($e->name == 'OnWebAuthentication' || $e->name == 'OnUserAuthentication') && isset($userObj)) {
    /**
     * @var modUsers $userObj
     */
    if ($savedpassword != $userObj->getPassword($userpassword)) {
        $fails = (int)$userObj->get('failedlogincount');
        $userObj->set('failedlogincount', ++$fails);
        if ($fails > $maxFails) {
            $userObj->set('blockeduntil', time() + $blockTime);
            $userObj->set('failedlogincount', 0);
        }
        $userObj->save();
    }
}
if (($e->name == 'OnWebLogin'  || $e->name == 'OnUserLogin') && isset($userObj)) {
    if (!$userObj->get('lastlogin')) {
        $userObj->set('lastlogin', time());
    } else {
        $userObj->set('lastlogin', $userObj->get('thislogin'));
    }
    $userObj->set('thislogin', time());
    $userObj->set('logincount', (int)$userObj->get('logincount') + 1);
    $userObj->set('failedlogincount', 0);
    $userObj->save(false, false);
    if (isset($_COOKIE[$cookieName])) {
        $userObj->setAutoLoginCookie($cookieName, $cookieLifetime);
    }
}
//Updating session_id in cookie, if user is login and just saved
if (($e->name == 'OnWebSaveUser'  || $e->name == 'OnUserSave') && isset($userObj)) {
    if( (int)$modx->getLoginUserID('web') == (int)$id && isset($_COOKIE[$cookieName]) ) { //checking, if current logined user was saved
        $cookieParts = explode("|", $_COOKIE[$cookieName], 4);
        if(isset($cookieParts[2]) && ($userObj->get('sessionid') != $cookieParts[2])) { //checking, if session ids in cookie and in user object became not equals
            $userObj->setAutoLoginCookie($cookieName, $cookieLifetime);
        }
    }
}

if ($e->name == 'OnWebPageInit' || $e->name == 'OnPageNotFound') {
    if (function_exists('app')) {
        $model = isset($params['model']) && class_exists($params['model']) ? $params['model'] : '\\Pathologic\\EvolutionCMS\\MODxAPI\\modUsers';
    } else {
        $model = isset($params['model']) && class_exists($params['model']) ? $params['model'] : '\\modUsers';
    }
    $user = new $model($modx);
    if ($uid = (int)$modx->getLoginUserID('web')) {
        if ($trackWebUserActivity == 'Yes') {
            $sid = $modx->sid = session_id();
            $pageId = (int)$modx->documentIdentifier;
            $uid = function_exists('app') ? $uid : -1 * $uid;
            $name = $modx->db->escape($_SESSION['webShortname'] ?? '');
            $q = $modx->db->query("REPLACE INTO {$modx->getFullTableName('active_users')} (`sid`, `internalKey`, `username`, `lasthit`, `action`, `id`) values('{$sid}', {$uid}, '{$name}', '{$modx->time}', 998, {$pageId})");
            $modx->updateValidatedUserSession();
        }
        if (isset($_REQUEST[$logoutKey])) {
            $user->logOut($cookieName, true);
            $page = $modx->getConfig('site_url') . (isset($_REQUEST['q']) ? $_REQUEST['q'] : '');
            $query = $_GET;
            unset($query[$logoutKey], $query['q']);
            if ($query) {
                $page .= '?' . http_build_query($query);
            }
            $modx->sendRedirect($page);
        } elseif (!$user->edit($uid)->getID() || $user->checkBlock($uid)) {
            $user->logOut($cookieName, true);
        }
    } else {
        $user->AutoLogin($cookieLifetime, $cookieName, true);
    }
}

