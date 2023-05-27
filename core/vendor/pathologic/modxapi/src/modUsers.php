<?php

namespace Pathologic\EvolutionCMS\MODxAPI;

use Carbon\Carbon;
use DocumentParser;
use Illuminate\Support\Str;
use Pathologic\EvolutionCMS\MODxAPI\Traits\RoleTV;

/**
 * Class modUsers
 */
class modUsers extends MODxAPI
{
    use RoleTV;

    const ON_CHANGE_PASSWORD_EVENT = 'OnWebChangePassword';
    const ON_SAVE_USER_EVENT = 'OnWebSaveUser';
    const ON_DELETE_USER_EVENT = 'OnWebDeleteUser';
    const ON_USER_LOGIN_EVENT = 'OnWebLogin';
    const ON_USER_AUTHENTICATION_EVENT = 'OnWebAuthentication';

    /**
     * @var array
     */
    protected $default_field = [
        'user'      => [
            'username'      => '',
            'password'      => '',
            'cachepwd'      => '',
            'refresh_token' => '',
            'access_token'  => '',
            'valid_to'      => null,
            'verified_key'  => ''
        ],
        'attribute' => [
            'fullname'         => '',
            'first_name'       => '',
            'last_name'        => '',
            'middle_name'      => '',
            'role'             => 0,
            'email'            => '',
            'phone'            => '',
            'mobilephone'      => '',
            'blocked'          => 0,
            'blockeduntil'     => 0,
            'blockedafter'     => 0,
            'logincount'       => 0,
            'lastlogin'        => 0,
            'thislogin'        => 0,
            'failedlogincount' => 0,
            'sessionid'        => '',
            'dob'              => 0,
            'gender'           => 0,
            'country'          => '',
            'state'            => '',
            'city'             => '',
            'street'           => '',
            'zip'              => '',
            'fax'              => '',
            'photo'            => '',
            'comment'          => '',
            'createdon'        => 0,
            'editedon'         => 0,
            'verified'         => 0
        ],
        'settings'  => [],
        'hidden'    => [
            'internalKey'
        ]
    ];

    /**
     * @var string
     */
    protected $givenPassword = '';
    protected $groups;
    protected $groupIds = [];
    protected $userIdCache = [
        'attribute.internalKey' => '',
        'attribute.email'       => '',
        'user.username'         => ''
    ];

    /**
     * @var integer
     */
    private $rememberTime;

    protected $context = 'web';

    /**
     * MODxAPI constructor.
     * @param  DocumentParser  $modx
     * @param  bool  $debug
     * @throws Exception
     */
    public function __construct(DocumentParser $modx, $debug = false)
    {
        $this->setRememberTime(60 * 60 * 24 * 365 * 5);
        parent::__construct($modx, $debug);
        $this->get_TV();
    }

    /**
     * @param $val
     * @return $this
     */
    protected function setRememberTime($val)
    {
        $this->rememberTime = (int) $val;
        return $this;
    }

    /**
     * @return integer
     */
    public function getRememberTime()
    {
        return $this->rememberTime;
    }

    /**
     * @param $key
     * @return bool
     */
    public function issetField($key)
    {
        return (
            array_key_exists($key, $this->default_field['user'])
            || array_key_exists($key, $this->default_field['attribute'])
            || in_array($key, $this->default_field['hidden'])
            || (array_key_exists($key, $this->tv) && $this->belongsToTemplate($this->tv[$key]))
        );
    }

    /**
     * @param  string  $data
     * @return string|false
     */
    protected function findUser($data)
    {
        switch (true) {
            case (is_int($data)):
                $find = 'attribute.internalKey';
                break;
            case filter_var($data, FILTER_VALIDATE_EMAIL):
                $find = 'attribute.email';
                break;
            case is_scalar($data):
                $find = 'user.username';
                break;
            default:
                $find = false;
        }

        return $find;
    }

    /**
     * @param  array  $data
     * @return $this
     */
    public function create($data = [])
    {
        parent::create($data);
        $this->set('createdon', time());
        $fld = [];
        foreach ($this->tvd as $name => $tv) {
            $fld[$name] = $tv['default'];
        };
        $this->store($fld);
        $this->fromArray(array_merge($fld, $data));

        return $this;
    }

    /**
     *
     */
    public function close()
    {
        parent::close();
        $this->userIdCache = [
            'attribute.internalKey' => '',
            'attribute.email'       => '',
            'user.username'         => ''
        ];
    }

    /**
     * @param $id
     * @return mixed
     */
    protected function getUserId($id)
    {
        $find = $this->findUser($id);
        if ($find && !empty($this->userIdCache[$find])) {
            $id = $this->userIdCache[$find];
        } else {
            $id = null;
        }

        return $id;
    }

    /**
     * @param $id
     * @return $this
     */
    public function edit($id)
    {
        if (!is_int($id)) {
            $id = is_scalar($id) ? trim($id) : '';
        }
        if ($this->getUserId($id) != $id) {
            $this->close();
            $this->markAllEncode();
            $this->newDoc = false;

            if (!$find = $this->findUser($id)) {
                $this->id = null;
            } else {
                $this->editQuery($find, $id);
                if (empty($this->field['internalKey'])) {
                    $this->id = null;
                } else {
                    $this->id = $this->field['id'];
                }
                $this->loadUserSettings();
                $this->loadUserTVs();
                $this->decodeFields();
                $this->store($this->field);
                $this->userIdCache['attribute.internalKey'] = $this->getID();
                $this->userIdCache['attribute.email'] = $this->get('email');
                $this->userIdCache['user.username'] = $this->get('username');
                unset($this->field['id']);
                unset($this->field['internalKey']);
            }
        }

        return $this;
    }

    protected function loadUserTVs()
    {
        $id = (int) $this->get('internalKey');
        $result = $this->query("SELECT * from {$this->makeTable('user_values')} where `userid`=" . (int) $id);
        while ($row = $this->modx->db->getRow($result)) {
            if ($this->belongsToTemplate($row['tmplvarid']) && isset($this->tvid[$row['tmplvarid']])) {
                $tv = $this->tvid[$row['tmplvarid']];
                if (!$this->isDefaultField($tv)) {
                    $this->field[$tv] = empty($row['value']) ? $this->tvd[$tv]['default'] : $row['value'];
                }
            }
        }
    }

    protected function isDefaultField($key)
    {
        return $key === 'id' || $key === 'internalKey' || isset($this->default_field['user'][$key]) || isset($this->default_field['attribute'][$key]);
    }

    protected function loadUserSettings()
    {
        $user = $this->getID();

        if (!empty($webUser)) {
            $q = $this->query("SELECT `setting_name`, `setting_value` FROM {$this->makeTable('user_settings')} WHERE `user` = {$webUser}");
            while ($row = $this->modx->db->getRow($q)) {
                $this->default_field['settings'][$row['setting_name']] = $row['setting_value'];
            }
        }
    }

    /**
     * @param $key
     * @param  null  $default
     * @return mixed
     */
    public function getConfig($key, $default = null)
    {
        return APIhelpers::getkey($this->default_field['settings'], $key, $default);
    }

    /**
     * @param  string  $find
     * @param  string  $id
     */
    protected function editQuery($find, $id)
    {
        $result = $this->query("
            SELECT * from {$this->makeTable('user_attributes')} as attribute
            LEFT JOIN {$this->makeTable('users')} as user ON user.id=attribute.internalKey
            WHERE {$find}='{$this->escape($id)}'
        ");
        $this->field = $this->modx->db->getRow($result) ?: [];
    }

    /**
     * @param  string  $key
     * @param $value
     * @return $this
     */
    public function set($key, $value)
    {
        if ((is_scalar($value) || $this->isTVarrayField($key) || $this->isJsonField($key)) && is_scalar($key) && !empty($key)) {
            switch ($key) {
                case 'password':
                    $this->givenPassword = $value;
                    $value = $this->getPassword($value);
                    break;
                case 'sessionid':
                    //short bug fix when authoring a web user if the manager is logged in
                    $oldSessionId = session_id();
                    session_regenerate_id(false);
                    $value = session_id();
                    if ($mid = $this->modx->getLoginUserID('mgr')) {
                        //short bug fix when authoring a web user if the manager is logged in
                        $this->modx->db->delete($this->makeTable('active_users'),
                            "`internalKey`={$mid} and `sid` != '{$oldSessionId}'  ");
                        $this->modx->db->delete($this->makeTable('active_user_sessions'),
                            "`internalKey`={$mid} and `sid` != '{$oldSessionId}'  ");

                        $this->modx->db->query("UPDATE {$this->makeTable('active_user_locks')} SET `sid`='{$value}' WHERE `internalKey`={$mid}");
                        $this->modx->db->query("UPDATE {$this->makeTable('active_user_sessions')} SET `sid`='{$value}' WHERE `internalKey`={$mid}");
                        $this->modx->db->query("UPDATE {$this->makeTable('active_users')} SET `sid`='{$value}' WHERE `internalKey`={$mid}");
                    }
                    break;
                case 'editedon':
                case 'createdon':
                    $value = $this->getTime($value);
                    break;
            }
            $this->field[$key] = $value;
        }

        return $this;
    }

    /**
     * @param  string  $prefix
     * @param  string  $suffix
     * @param  string  $sep
     * @param  false  $render
     * @return array
     */
    public function toArray($prefix = '', $suffix = '', $sep = '_', $render = false)
    {
        $out = parent::toArray($prefix, $suffix, $sep, $render);
        if ($render) {
            $tpl = $this->get('role');
            $tvTPL = APIhelpers::getkey($this->tvTpl, $tpl, []);
            foreach ($tvTPL as $item) {
                if (isset($this->tvid[$item]) && array_key_exists($this->tvid[$item], $out)) {
                    $out[$this->tvid[$item]] = $this->renderTV($this->tvid[$item]);
                }
            }
        }

        return $out;
    }

    /**
     * @param $key
     * @return mixed
     */
    public function get($key)
    {
        $out = null;
        if ($this->isDefaultField($key)) {
            $out = parent::get($key);
        } elseif (isset($this->tv[$key])) {
            $tpl = $this->get('role');
            $tvTPL = APIhelpers::getkey($this->tvTpl, $tpl, []);
            $tvID = APIhelpers::getkey($this->tv, $key, 0);
            if (!in_array($tvID, $tvTPL)) {
                $out = null;
            } else {
               $out = parent::get($key); 
            }
        }

        return $out;
    }

    /**
     * @param $pass
     * @return string
     */
    public function getPassword($pass)
    {
        return $this->modx->getPasswordHash()->HashPassword($pass);
    }

    /**
     * @param  bool  $fire_events
     * @param  bool  $clearCache
     * @return bool|int|null|void
     */
    public function save($fire_events = false, $clearCache = false)
    {
        if ($this->get('email') == '' || $this->get('username') == '' || $this->get('password') == '') {
            $this->log['EmptyPKField'] = 'Email, username or password is empty <pre>' . print_r(
                    $this->toArray(),
                    true
                ) . '</pre>';

            return false;
        }

        if ($this->isChanged('username') && !$this->isUnique('username')) {
            $this->log['UniqueUsername'] = 'username not unique <pre>' . print_r(
                    $this->get('username'),
                    true
                ) . '</pre>';

            return false;
        }

        if ($this->isChanged('email') && !$this->isUnique('email')) {
            $this->log['UniqueEmail'] = 'Email not unique <pre>' . print_r($this->get('email'), true) . '</pre>';

            return false;
        }
        $this->set('sessionid', '');
        if (!$this->newDoc) {
            $this->set('editedon', time());
        }
        $fld = $this->encodeFields()->toArray();
        foreach ($this->default_field['user'] as $key => $value) {
            $tmp = $this->get($key);
            if ($this->newDoc && (!is_int($tmp) && $tmp == '')) {
                $this->field[$key] = $value;
            }
            $this->Uset($key, 'user');
            unset($fld[$key]);
        }
        if (!empty($this->set['user'])) {
            if ($this->newDoc) {
                $SQL = "INSERT into {$this->makeTable('users')} SET " . implode(', ', $this->set['user']);
            } else {
                $SQL = "UPDATE {$this->makeTable('users')} SET " . implode(
                        ', ',
                        $this->set['user']
                    ) . " WHERE id = " . $this->id;
            }
            $this->query($SQL);
        }

        if ($this->newDoc) {
            $this->id = (int) $this->modx->db->getInsertId();
        }

        $this->saveQuery($fld);
        unset($fld['id']);

        if (!$this->newDoc && $this->givenPassword) {
            $this->invokeEvent(self::ON_CHANGE_PASSWORD_EVENT, [
                'userObj'      => $this,
                'userid'       => $this->id,
                'user'         => $this->toArray(),
                'userpassword' => $this->givenPassword,
                'internalKey'  => $this->id,
                'username'     => $this->get('username')
            ], $fire_events);
        }

        if (!empty($this->groupIds)) {
            $this->setUserGroups($this->id, $this->groupIds);
        }

        $this->invokeEvent(self::ON_SAVE_USER_EVENT, [
            'userObj' => $this,
            'mode'    => $this->newDoc ? "new" : "upd",
            'id'      => $this->id,
            'user'    => $this->toArray()
        ], $fire_events);

        if ($clearCache) {
            $this->clearCache($fire_events);
        }
        $this->decodeFields();

        return $this->id;
    }

    /**
     * @param $field
     * @return bool
     */
    public function isUnique($field)
    {
        $out = false;
        if (isset($this->default_field['user'][$field])) {
            $out = $this->checkUnique('users', $field);
        } elseif (isset($this->default_field['attribute'][$field])) {
            $out = $this->checkUnique('user_attributes', $field, 'internalKey');
        }

        return $out;
    }

    /**
     * @param  array  $fld
     */
    protected function saveQuery(array &$fld)
    {
        foreach ($this->default_field['attribute'] as $key => $value) {
            $tmp = $this->get($key);
            if ($this->newDoc && (!is_int($tmp) && $tmp == '')) {
                $this->field[$key] = $value;
            }
            $this->Uset($key, 'attribute');
            unset($fld[$key]);
        }
        if (!empty($this->set['attribute'])) {
            if ($this->newDoc) {
                $this->set('internalKey', $this->id)->Uset('internalKey', 'attribute');
                $SQL = "INSERT into {$this->makeTable('user_attributes')} SET " . implode(
                        ', ',
                        $this->set['attribute']
                    );
            } else {
                $SQL = "UPDATE {$this->makeTable('user_attributes')} SET " . implode(
                        ', ',
                        $this->set['attribute']
                    ) . " WHERE  internalKey = " . $this->getID();
            }
            $this->query($SQL);
        }
        $_deleteTVs = $_insertTVs = [];
        foreach ($fld as $key => $value) {
            if (empty($this->tv[$key]) || !$this->isChanged($key) || !$this->belongsToTemplate($this->tv[$key])) {
                continue;
            } elseif ($value === '' || is_null($value) || (isset($this->tvd[$key]) && $value == $this->tvd[$key]['default'])) {
                $_deleteTVs[] = $this->tv[$key];
            } else {
                $_insertTVs[$this->tv[$key]] = $this->escape($value);
            }
        }

        if (!empty($_insertTVs)) {
            $values = [];
            foreach ($_insertTVs as $id => $value) {
                $values[] = "({$this->id}, {$id}, '{$value}')";
            }
            $values = implode(',', $values);
            $this->query("INSERT INTO {$this->makeTable('user_values')} (`userid`,`tmplvarid`,`value`) VALUES {$values} ON DUPLICATE KEY UPDATE
    `value` = VALUES(`value`)");
        }

        if (!empty($_deleteTVs)) {
            $ids = implode(',', $_deleteTVs);
            $this->query("DELETE FROM {$this->makeTable('user_values')} WHERE `userid` = '{$this->id}' AND `tmplvarid` IN ({$ids})");
        }

    }

    /**
     * @param $ids
     * @param  bool  $fire_events
     * @return bool|null|void
     */
    public function delete($ids, $fire_events = false)
    {
        if ($this->edit($ids)) {
            $flag = $this->deleteQuery();
            $this->query("DELETE FROM {$this->makeTable('user_values')} WHERE `userid`='{$this->getID()}'");
            $this->query("DELETE FROM {$this->makeTable('member_groups')} WHERE `member`='{$this->getID()}'");
            $this->invokeEvent(self::ON_DELETE_USER_EVENT, [
                'userObj'     => $this,
                'userid'      => $this->getID(),
                'internalKey' => $this->getID(),
                'username'    => $this->get('username'),
                'timestamp'   => time()
            ], $fire_events);
        } else {
            $flag = false;
        }
        $this->close();

        return $flag;
    }

    /**
     * @return mixed
     */
    protected function deleteQuery()
    {
        return $this->query("
          DELETE user,attribute FROM {$this->makeTable('user_attributes')} as attribute
            LEFT JOIN {$this->makeTable('users')} as user ON user.id=attribute.internalKey
            WHERE attribute.internalKey='{$this->escape($this->getID())}'");
    }

    /**
     * @param  int  $id
     * @param  bool|integer  $fulltime
     * @param  string  $cookieName
     * @param  bool  $fire_events
     * @return bool
     */
    public function authUser($id = 0, $fulltime = true, $cookieName = 'WebLoginPE', $fire_events = false)
    {
        $flag = false;
        if (null === $this->getID() && $id) {
            $this->edit($id);
        }
        if (null !== $this->getID()) {
            $flag = true;
            $this->set('refresh_token', hash('sha256', Str::random(32)));
            $this->set('access_token', hash('sha256', Str::random(32)));
            $this->set('valid_to', Carbon::now()->addHours(11));
            $this->save(false);
            $this->SessionHandler('start', $cookieName, $fulltime);
            $this->invokeEvent(self::ON_USER_LOGIN_EVENT, [
                'userObj'      => $this,
                'userid'       => $this->getID(),
                'username'     => $this->get('username'),
                'userpassword' => $this->givenPassword,
                'rememberme'   => $fulltime
            ], $fire_events);
        }

        return $flag;
    }

    /**
     * @param  int  $id
     * @return bool
     */
    public function checkBlock($id = 0)
    {
        if ($this->getID()) {
            $tmp = clone $this;
        } else {
            $tmp = $this;
        }
        if ($id && $tmp->getUserId($id) != $id) {
            $tmp->edit($id);
        }
        $now = time();

        $b = $tmp->get('blocked');
        $bu = $tmp->get('blockeduntil');
        $ba = $tmp->get('blockedafter');
        $flag = (($b && !$bu && !$ba) || ($bu && $now < $bu) || ($ba && $now > $ba));
        unset($tmp);

        return $flag;
    }

    /**
     * @param $id
     * @param $password
     * @param $blocker
     * @param  bool  $fire_events
     * @return bool
     */
    public function testAuth($id, $password, $blocker, $fire_events = false)
    {
        if ($this->getID()) {
            $tmp = clone $this;
        } else {
            $tmp = $this;
        }
        if ($id && $tmp->getUserId($id) != $id) {
            $tmp->edit($id);
        }

        $flag = $pluginFlag = false;
        if ((null !== $tmp->getID()) && (!$blocker || ($blocker && !$tmp->checkBlock($id)))
        ) {
            $eventResult = $this->getInvokeEventResult(self::ON_USER_AUTHENTICATION_EVENT, [
                'userObj'       => $this,
                'userid'        => $tmp->getID(),
                'username'      => $tmp->get('username'),
                'userpassword'  => $password,
                'savedpassword' => $tmp->get('password')
            ], $fire_events);
            if (is_array($eventResult)) {
                foreach ($eventResult as $result) {
                    $pluginFlag = (bool) $result;
                }
            } else {
                $pluginFlag = (bool) $eventResult;
            }
            if (!$pluginFlag) {
                $flag = $this->modx->getPasswordHash()->CheckPassword($password, $tmp->get('password'));
            }
        }
        unset($tmp);

        return $flag || $pluginFlag;
    }

    /**
     * @param  bool|integer  $fulltime
     * @param  string  $cookieName
     * @return bool
     */
    public function AutoLogin($fulltime = true, $cookieName = 'WebLoginPE', $fire_events = null)
    {
        $flag = false;
        if (isset($_COOKIE[$cookieName])) {
            $cookie = explode('|', $_COOKIE[$cookieName], 4);
            if (isset($cookie[0], $cookie[1], $cookie[2]) && strlen($cookie[0]) == 32 && strlen($cookie[1]) == 32) {
                if (!$fulltime && isset($cookie[4])) {
                    $fulltime = (int) $cookie[4];
                }
                $this->close();
                $q = $this->modx->db->query("SELECT id FROM " . $this->makeTable('users') . " WHERE md5(username)='{$this->escape($cookie[0])}'");
                $id = $this->modx->db->getValue($q);
                if ($this->edit($id)
                    && null !== $this->getID()
                    && $this->get('password') == $cookie[1]
                    && $this->get('sessionid') == $cookie[2]
                    && !$this->checkBlock($this->getID())
                ) {
                    $flag = $this->authUser($this->getID(), $fulltime, $cookieName, $fire_events);
                }
            }
        }

        return $flag;
    }

    /**
     * @param  string  $cookieName
     * @param  bool  $fire_events
     */
    public function logOut($cookieName = 'WebLoginPE', $fire_events = false)
    {
        if (!$uid = $this->modx->getLoginUserID('web')) {
            return;
        }
        if ($this->edit($uid)->getID()) {
            $this->fromArray([
                'refresh_token' => '',
                'access_token'  => '',
                'valid_until'   => null
            ])->save(false, false);
        }
        $params = [
            'username'    => $_SESSION['webShortname'],
            'internalKey' => $uid,
            'userid'      => $uid // Bugfix by TS
        ];
        $this->invokeEvent('OnBeforeWebLogout', $params, $fire_events);
        $this->SessionHandler('destroy', $cookieName ? $cookieName : 'WebLoginPE');
        $this->invokeEvent('OnWebLogout', $params, $fire_events);
    }

    /**
     * SessionHandler
     * Starts the user session on login success. Destroys session on error or logout.
     *
     * @param  string  $directive  ('start' or 'destroy')
     * @param  string  $cookieName
     * @param  bool|integer  $remember
     * @return modUsers
     * @author Raymond Irving
     * @author Scotty Delicious
     *
     * remeber может быть числом в секундах
     */
    protected function SessionHandler($directive, $cookieName, $remember = true)
    {
        switch ($directive) {
            case 'start':
                if ($this->getID() !== null) {
                    $_SESSION['webShortname'] = $this->get('username');
                    $_SESSION['webFullname'] = $this->get('fullname');
                    $_SESSION['webEmail'] = $this->get('email');
                    $_SESSION['webValidated'] = 1;
                    $_SESSION['webRole'] = $this->get('role');
                    $_SESSION['webInternalKey'] = $this->getID();
                    $_SESSION['webFailedlogins'] = $this->get('failedlogincount');
                    $_SESSION['webLastlogin'] = $this->get('lastlogin');
                    $_SESSION['webLogincount'] = $this->get('logincount');
                    $_SESSION['webUsrConfigSet'] = [];
                    $_SESSION['webUserGroupNames'] = $this->getUserGroups();
                    $_SESSION['webDocgroups'] = $this->getDocumentGroups();
                    $_SESSION['webPermissions'] = $this->getPermissions();
                        
                    if (!empty($remember)) {
                        $this->setAutoLoginCookie($cookieName, $remember);
                    }
                }
                break;
            case 'destroy':
                unset($_SESSION['webShortname']);
                unset($_SESSION['webFullname']);
                unset($_SESSION['webEmail']);
                unset($_SESSION['webValidated']);
                unset($_SESSION['webRole']);
                unset($_SESSION['webInternalKey']);
                unset($_SESSION['webFailedlogins']);
                unset($_SESSION['webLastlogin']);
                unset($_SESSION['webLogincount']);
                unset($_SESSION['webUsrConfigSet']);
                unset($_SESSION['webUserGroupNames']);
                unset($_SESSION['webDocgroups']);
                unset($_SESSION['webPermissions']);

                setcookie($cookieName, '', time() - 60, MODX_BASE_URL);
                break;
        }

        return $this;
    }
    
    /**
     * @return array
     */
    public function getPermissions()
    {
        $out = [];
        $role = (int)$this->get('role', 0);
        $q = $this->modx->db->query("SELECT `permission` FROM " . $this->makeTable('role_permissions') . " WHERE `role_id`={$role}");
        while($row = $this->modx->db->getRow($q)) {
            $out[$row['permission']] = 1;
        }
        
        return $out;
    }

    /**
     * @return bool
     */
    public function isSecure()
    {
        return strpos(MODX_SITE_URL, 'https') === 0;
    }

    /**
     * @param $cookieName
     * @param  bool|integer  $remember
     * @return $this
     */
    public function setAutoLoginCookie($cookieName, $remember = true)
    {
        if (!empty($cookieName) && $this->getID() !== null) {
            $secure = $this->isSecure();
            $remember = is_bool($remember) ? $this->getRememberTime() : (int) $remember;
            $cookieValue = [md5($this->get('username')), $this->get('password'), $this->get('sessionid'), $remember];
            $cookieValue = implode('|', $cookieValue);
            $cookieExpires = time() + $remember;
            setcookie($cookieName, $cookieValue, $cookieExpires, MODX_BASE_URL, '', $secure, true);
        }

        return $this;
    }

    /**
     * @param  int  $userID
     * @return array
     */
    public function getDocumentGroups($userID = 0)
    {
        $out = [];
        $user = $this->switchObject($userID);
        if (null !== $user->getID()) {
            $groups = $this->modx->getFullTableName('member_groups');
            $group_access = $this->modx->getFullTableName('membergroup_access');

            $sql = "SELECT `uga`.`documentgroup` FROM {$groups} as `ug`
                INNER JOIN {$group_access} as `uga` ON `uga`.`membergroup`=`ug`.`user_group` AND `uga`.`context`= 1
                WHERE `ug`.`member` = " . $user->getID();
            $out = $this->modx->db->getColumn('documentgroup', $this->query($sql));
        }
        unset($user);

        return $out;
    }

    /**
     * @param  int  $userID
     * @return array
     */
    public function getUserGroups($userID = 0)
    {
        $out = [];
        $user = $this->switchObject($userID);
        if (null !== $user->getID()) {
            $groups = $this->makeTable('member_groups');
            $group_names = $this->makeTable('membergroup_names');

            $rs = $this->query("SELECT `ug`.`user_group`, `ugn`.`name` FROM {$groups} as `ug`
                INNER JOIN {$group_names} as `ugn` ON `ugn`.`id`=`ug`.`user_group`
                WHERE `ug`.`member` = " . $user->getID());
            while ($row = $this->modx->db->getRow($rs)) {
                $out[$row['user_group']] = $row['name'];
            }
        }
        unset($user);

        return $out;
    }

    /**
     * @param  int  $userID
     * @param  array  $groupNames
     * @return $this
     * @throws \AgelxNash\Modx\Evo\Database\Exceptions\Exception
     */
    public function setUserGroupsByName($userID = 0, $groupNames = []) {
        if (!is_array($groupNames)) {
            return $this;
        }
        if (empty($this->groups)) {
            $q = $this->query("SELECT `id`,`name` FROM {$this->makeTable('membergroup_names')}");
            while ($row = $this->modx->db->getRow($q)) {
                $this->groups[$row['name']] = $row['id'];
            }
        }
        $groupIds = [];
        foreach ($groupNames as $group) {
            $groupIds[] = $this->groups[$group];
        }
        return $this->setUserGroups($userID, $groupIds);
    }

    /**
     * @param  int  $userID
     * @param  array  $groupIds
     * @return $this
     */
    public function setUserGroups($userID = 0, $groupIds = [])
    {
        if (!is_array($groupIds)) {
            return $this;
        }
        if ($this->newDoc && $userID == 0) {
            $this->groupIds = $groupIds;
        } else {
            $user = $this->switchObject($userID);
            if ($uid = $user->getID()) {
                foreach ($groupIds as $gid) {
                    $this->query("REPLACE INTO {$this->makeTable('member_groups')} (`user_group`, `member`) VALUES ('{$gid}', '{$uid}')");
                }
                if (!$this->newDoc) {
                    $groupIds = empty($groupIds) ? '0' : implode(',', $groupIds);
                    $this->query("DELETE FROM {$this->makeTable('member_groups')} WHERE `member`={$uid} AND `user_group` NOT IN ({$groupIds})");
                }
            }
            unset($user);
            $this->groupIds = [];
        }

        return $this;
    }
}
