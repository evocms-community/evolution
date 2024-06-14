<?php

namespace Pathologic\EvolutionCMS\MODxAPI;

use EvolutionCMS\UrlProcessor;
use Pathologic\EvolutionCMS\MODxAPI\Traits\ContentTV;

/**
 * Class modResource
 */
class modResource extends MODxAPI
{
    use ContentTV;

    /**
     * @var string
     */
    protected $mode = 'new';
    /**
     * @var array
     */
    protected $default_field = [
        'type'            => 'document',
        'contentType'     => 'text/html',
        'pagetitle'       => 'New document',
        'longtitle'       => '',
        'description'     => '',
        'alias'           => '',
        'link_attributes' => '',
        'published'       => 1,
        'pub_date'        => 0,
        'unpub_date'      => 0,
        'parent'          => 0,
        'isfolder'        => 0,
        'introtext'       => '',
        'content'         => '',
        'richtext'        => 1,
        'template'        => 0,
        'menuindex'       => 0,
        'searchable'      => 1,
        'cacheable'       => 1,
        'createdon'       => 0,
        'createdby'       => 0,
        'editedon'        => 0,
        'editedby'        => 0,
        'deleted'         => 0,
        'deletedon'       => 0,
        'deletedby'       => 0,
        'publishedon'     => 0,
        'publishedby'     => 0,
        'menutitle'       => '',
        'hide_from_tree'  => 0,
        'privateweb'      => 0,
        'privatemgr'      => 0,
        'content_dispo'   => 0,
        'hidemenu'        => 0,
        'alias_visible'   => 1
    ];
    /**
     * @var array
     */
    private $table = [
        '"' => '-',
        "'" => '-',
        ' ' => '-',
        '.' => '-',
        ',' => '-',
        'а' => 'a',
        'б' => 'b',
        'в' => 'v',
        'г' => 'g',
        'д' => 'd',
        'е' => 'e',
        'ё' => 'e',
        'ж' => 'zh',
        'з' => 'z',
        'и' => 'i',
        'й' => 'y',
        'к' => 'k',
        'л' => 'l',
        'м' => 'm',
        'н' => 'n',
        'о' => 'o',
        'п' => 'p',
        'р' => 'r',
        'с' => 's',
        'т' => 't',
        'у' => 'u',
        'ф' => 'f',
        'х' => 'h',
        'ц' => 'c',
        'ч' => 'ch',
        'ш' => 'sh',
        'щ' => 'sch',
        'ь' => '',
        'ы' => 'y',
        'ъ' => '',
        'э' => 'e',
        'ю' => 'yu',
        'я' => 'ya',
        'А' => 'A',
        'Б' => 'B',
        'В' => 'V',
        'Г' => 'G',
        'Д' => 'D',
        'Е' => 'E',
        'Ё' => 'E',
        'Ж' => 'Zh',
        'З' => 'Z',
        'И' => 'I',
        'Й' => 'Y',
        'К' => 'K',
        'Л' => 'L',
        'М' => 'M',
        'Н' => 'N',
        'О' => 'O',
        'П' => 'P',
        'Р' => 'R',
        'С' => 'S',
        'Т' => 'T',
        'У' => 'U',
        'Ф' => 'F',
        'Х' => 'H',
        'Ц' => 'C',
        'Ч' => 'Ch',
        'Ш' => 'Sh',
        'Щ' => 'Sch',
        'Ь' => '',
        'Ы' => 'Y',
        'Ъ' => '',
        'Э' => 'E',
        'Ю' => 'Yu',
        'Я' => 'Ya',
    ];

    /** @var array группы документов */
    protected $groupIds = [];

    /**
     * modResource constructor.
     * @param  DocumentParser  $modx
     * @param  bool  $debug
     */
    public function __construct($modx, $debug = false)
    {
        parent::__construct($modx, $debug);
        $this->get_TV();
    }

    /**
     * @return array
     */
    public function toArrayMain()
    {
        $out = array_intersect_key(parent::toArray(), $this->default_field);

        return $out;
    }

    /**
     * @param  bool  $render
     * @return array
     */
    public function toArrayTV($render = false)
    {
        $out = array_diff_key(parent::toArray(), $this->default_field);
        $tpl = $this->get('template');
        $tvTPL = APIhelpers::getkey($this->tvTpl, $tpl, []);
        foreach ($tvTPL as $item) {
            if (isset($this->tvid[$item]) && !array_key_exists($this->tvid[$item], $out)) {
                $out[$this->tvid[$item]] = $this->tvd[$this->tvid[$item]]['default'];
            }
        }
        if ($render) {
            foreach ($out as $key => $val) {
                $out[$key] = $this->renderTV($key);
            }
        }

        return $out;
    }

    /**
     * @param  string  $prefix
     * @param  string  $suffix
     * @param  string  $sep
     * @param  bool  $render
     * @return array
     */
    public function toArray($prefix = '', $suffix = '', $sep = '_', $render = false)
    {
        $out = array_merge(
            $this->toArrayMain(),
            $this->toArrayTV($render),
            [$this->fieldPKName() => $this->getID()]
        );

        return APIhelpers::renameKeyArr($out, $prefix, $suffix, $sep);
    }

    /**
     * @return null|string
     */
    public function getUrl()
    {
        $out = null;
        $id = (int) $this->getID();
        if (!empty($id)) {
            $out = UrlProcessor::makeUrl($id);
        }

        return $out;
    }

    /**
     * @param  string  $main
     * @param  string  $second
     * @return mixed
     */
    public function getTitle($main = 'menutitle', $second = 'pagetitle')
    {
        $title = $this->get($main);
        if (empty($title) && $title !== '0') {
            $title = $this->get($second);
        }

        return $title;
    }

    /**
     * @return bool
     */
    public function isWebShow()
    {
        $pub = ($this->get('publishedon') < time() && $this->get('published'));
        $unpub = ($this->get('unpub_date') == 0 || $this->get('unpub_date') > time());
        $del = ($this->get('deleted') == 0 && ($this->get('deletedon') == 0 || $this->get('deletedon') > time()));

        return ($pub && $unpub && $del);
    }

    /**
     * @return $this
     */
    public function touch()
    {
        $this->set('editedon', time());

        return $this;
    }

    /**
     * @param $key
     * @return mixed
     */
    public function get($key)
    {
        $out = parent::get($key);
        if (!isset($this->default_field[$key]) && isset($this->tv[$key])) {
            $tpl = $this->get('template');
            $tvTPL = APIhelpers::getkey($this->tvTpl, $tpl, []);
            $tvID = APIhelpers::getkey($this->tv, $key, 0);
            if (in_array($tvID, $tvTPL) && is_null($out)) {
                $out = APIhelpers::getkey($this->tvd, $key, null);
                $out = $out['default'];
            }
        }

        return $out;
    }

    /**
     * @param $key
     * @param $value
     * @return $this
     */
    public function set($key, $value)
    {
        if ((is_scalar($value) || $this->isTVarrayField($key) || $this->isJsonField($key)) && is_scalar($key) && !empty($key)) {
            switch ($key) {
                case 'donthit':
                    $value = (int) ((bool) $value);
                    break;
                case 'parent':
                    $value = (int) $value;
                    break;
                case 'template':
                    $value = trim($value);
                    $value = $this->setTemplate($value);
                    break;
                case 'published':
                    $value = (int) ((bool) $value);
                    if ($value) {
                        $this->field['publishedon'] = time() + $this->modxConfig('server_offset_time');
                    }
                    break;
                case 'pub_date':
                    $value = $this->getTime($value);
                    if ($value > 0 && time() + $this->modxConfig('server_offset_time') > $value) {
                        $this->field['published'] = 1;
                        $this->field['publishedon'] = $value;
                    }
                    break;
                case 'unpub_date':
                    $value = $this->getTime($value);
                    if ($value > 0 && time() + $this->modxConfig('server_offset_time') > $value) {
                        $this->field['published'] = 0;
                        $this->field['publishedon'] = 0;
                    }
                    break;
                case 'deleted':
                    $value = (int) ((bool) $value);
                    if ($value) {
                        $this->field['deletedon'] = time() + $this->modxConfig('server_offset_time');
                    } else {
                        $this->field['deletedon'] = 0;
                    }
                    break;
                case 'deletedon':
                    $value = $this->getTime($value);
                    if ($value > 0 && time() + $this->modxConfig('server_offset_time') < $value) {
                        $value = 0;
                    }
                    if ($value) {
                        $this->field['deleted'] = 1;
                    }
                    break;
                case 'editedon':
                case 'createdon':
                case 'publishedon':
                    $value = $this->getTime($value);
                    break;
                case 'publishedby':
                case 'editedby':
                case 'createdby':
                case 'deletedby':
                    $value = (int) $value;
                    break;
            }
            $this->field[$key] = $value;
        }

        return $this;
    }

    /**
     * @param  array  $data
     * @return $this
     */
    public function create($data = [])
    {
        $this->close();
        $fld = [];
        foreach ($this->tvd as $name => $tv) {
            $fld[$name] = $tv['default'];
        };
        $this->store($fld);

        $this->fromArray(array_merge($fld, $data));
        $this->set('createdby', $this->modx->getLoginUserID())
            ->set('createdon', $this->getTime(time()));

        return $this;
    }

    /**
     * @param $id
     * @return $this
     */
    public function edit($id)
    {
        $id = is_scalar($id) ? trim($id) : '';
        if ($this->getID() != $id) {
            $this->close();
            $this->markAllEncode();
            $this->newDoc = false;
            $result = $this->query("SELECT * from {$this->makeTable('site_content')} where `id`=" . (int) $id);
            $this->fromArray($this->modx->db->getRow($result) ?: []);
            $result = $this->query("SELECT * from {$this->makeTable('site_tmplvar_contentvalues')} where `contentid`=" . (int) $id);
            while ($row = $this->modx->db->getRow($result)) {
                $this->field[$this->tvid[$row['tmplvarid']]] = $row['value'];
            }
            $fld = [];
            foreach ($this->tvd as $name => $tv) {
                if ($this->belongsToTemplate($this->tv[$name])) {
                    $fld[$name] = $tv['default'];
                }
            };
            $this->store(array_merge($fld, $this->field));
            if (empty($this->field['id'])) {
                $this->id = null;
            } else {
                $this->id = $this->field['id'];
                $this->decodeFields();
            }
            unset($this->field['id']);
        }

        return $this;
    }

    /**
     * @param  bool  $fire_events
     * @param  bool  $clearCache
     * @return mixed
     */
    public function save($fire_events = false, $clearCache = false)
    {
        $parent = null;
        if ($this->field['pagetitle'] == '') {
            $this->log['emptyPagetitle'] = 'Pagetitle is empty in <pre>' . print_r($this->field, true) . '</pre>';

            return false;
        }

        $uid = $this->modx->getLoginUserID();

        if (
            empty($this->field['parent']) &&
            !$this->modxConfig('udperms_allowroot') &&
            !($uid && isset($_SESSION['mgrRole']) && $_SESSION['mgrRole'] == 1)
        ) {
            $this->log['rootForbidden'] = 'Only Administrators can create documents in the root folder because udperms_allowroot setting is off';

            return false;
        }

        $this->set('alias', $this->getAlias());
        if (!$this->newDoc) {
            $this->set('editedby', (int)$this->modx->getLoginUserID())->touch();
        }
        $data = $this->toArray();

        $this->invokeEvent('OnBeforeDocFormSave', [
            'mode'   => $this->newDoc ? "new" : "upd",
            'id'     => isset($this->id) ? $this->id : '',
            'doc'    => &$data,
            'docObj' => $this
        ], $fire_events);

        $this->fromArray($data);

        $fld = $this->encodeFields()->toArray(null, null, null, false);
        foreach ($this->default_field as $key => $value) {
            $tmp = $this->get($key);
            if ($this->newDoc && (!is_int($tmp) && $tmp == '')) {
                if ($tmp == $value) {
                    switch ($key) {
                        case 'cacheable':
                            $value = (int) $this->modxConfig('cache_default');
                            break;
                        case 'template':
                            $value = (int) $this->modxConfig('default_template');
                            break;
                        case 'published':
                            $value = (int) $this->modxConfig('publish_default');
                            break;
                        case 'searchable':
                            $value = (int) $this->modxConfig('search_default');
                            break;
                        case 'donthit':
                            $value = (int) $this->modxConfig('track_visitors');
                            break;
                    }
                }
                $this->field[$key] = $value;
            }
            switch (true) {
                case $key == 'parent':
                    $parent = (int) $this->get($key);
                    $q = $this->query("SELECT count(`id`) FROM {$this->makeTable('site_content')} WHERE `id`='{$parent}'");
                    if ($this->modx->db->getValue($q) != 1) {
                        $parent = 0;
                    }
                    $this->field[$key] = $parent;
                    $this->Uset($key);
                    break;
                case ($key == 'alias_visible' && !$this->checkVersion('1.0.10', true)):
                    $this->eraseField('alias_visible');
                    break;
                default:
                    $this->Uset($key);
            }
            unset($fld[$key]);
        }

        if (!empty($this->set)) {
            if ($this->newDoc) {
                $SQL = "INSERT into {$this->makeTable('site_content')} SET " . implode(', ', $this->set);
            } else {
                $SQL = "UPDATE {$this->makeTable('site_content')} SET " . implode(', ',
                        $this->set) . " WHERE `id` = " . $this->id;
            }
            $this->query($SQL);

            if ($this->newDoc) {
                $this->id = $this->modx->db->getInsertId();
            }

            if ($parent > 0) {
                $this->query("UPDATE {$this->makeTable('site_content')} SET `isfolder`='1' WHERE `id`='{$parent}'");
            }
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
            $this->query("INSERT INTO {$this->makeTable('site_tmplvar_contentvalues')} (`contentid`,`tmplvarid`,`value`) VALUES {$values} ON DUPLICATE KEY UPDATE
    `value` = VALUES(`value`)");
        }

        if (!empty($_deleteTVs)) {
            $ids = implode(',', $_deleteTVs);
            $this->query("DELETE FROM {$this->makeTable('site_tmplvar_contentvalues')} WHERE `contentid` = '{$this->id}' AND `tmplvarid` IN ({$ids})");
        }

        if (!isset($this->mode)) {
            $this->mode = $this->newDoc ? "new" : "upd";
            $this->newDoc = false;
        }

        if (!empty($this->groupIds)) {
            $this->setDocumentGroups($this->id, $this->groupIds);
        }
        $this->invokeEvent('OnDocFormSave', [
            'mode'   => $this->mode,
            'id'     => isset($this->id) ? $this->id : '',
            'doc'    => $this->toArray(),
            'docObj' => $this
        ], $fire_events);


        $this->modx->getAliasListing($this->id);

        if ($clearCache) {
            $this->clearCache($fire_events);
        }
        $this->decodeFields();

        return $this->id;
    }

    /**
     * @param $ids
     * @return $this
     * @throws Exception
     */
    public function toTrash($ids)
    {
        $ignore = $this->systemID();
        $_ids = $this->cleanIDs($ids, ',', $ignore);
        if (is_array($_ids) && $_ids != []) {
            $id = $this->sanitarIn($_ids);
            $uid = (int) $this->modx->getLoginUserId();
            $deletedon = time() + $this->modxConfig('server_offset_time');
            $this->query("UPDATE {$this->makeTable('site_content')} SET `deleted`=1, `deletedby`={$uid}, `deletedon`={$deletedon} WHERE `id` IN ({$id})");
        } else {
            throw new Exception('Invalid IDs list for mark trash: <pre>' . print_r($ids,
                    1) . '</pre> please, check ignore list: <pre>' . print_r($ignore, 1) . '</pre>');
        }

        return $this;
    }

    /**
     * @param  bool  $fire_events
     * @return $this
     */
    public function clearTrash($fire_events = false)
    {
        $q = $this->query("SELECT `id` FROM {$this->makeTable('site_content')} WHERE `deleted`='1'");
        $_ids = $this->modx->db->getColumn('id', $q);
        if (is_array($_ids) && $_ids != []) {
            $this->invokeEvent('OnBeforeEmptyTrash', [
                "ids" => $_ids
            ], $fire_events);

            $id = $this->sanitarIn($_ids);
            $this->query("DELETE from {$this->makeTable('site_content')} where `id` IN ({$id})");
            $this->query("DELETE from {$this->makeTable('site_tmplvar_contentvalues')} where `contentid` IN ({$id})");

            $this->invokeEvent('OnEmptyTrash', [
                "ids" => $_ids
            ], $fire_events);
        }

        return $this;
    }

    /**
     * @param $ids
     * @param  int|bool  $depth
     * @return array
     */
    public function children($ids, $depth)
    {
        $_ids = $this->cleanIDs($ids, ',');
        if (is_array($_ids) && $_ids != []) {
            $id = $this->sanitarIn($_ids);
            if (!empty($id)) {
                $q = $this->query("SELECT `id` FROM {$this->makeTable('site_content')} where `parent` IN ({$id})");
                $id = $this->modx->db->getColumn('id', $q);
                if ($depth > 0 || $depth === true) {
                    $id = $this->children($id, is_bool($depth) ? $depth : ($depth - 1));
                }
                $_ids = array_merge($_ids, $id);
            }
        }

        return $_ids;
    }

    /**
     * @param  string|array  $ids
     * @param  bool  $fire_events
     * @return $this
     * @throws Exception
     */
    public function delete($ids, $fire_events = false)
    {
        $ids = $this->children($ids, true);
        $_ids = $this->cleanIDs($ids, ',', $this->systemID());
        $this->invokeEvent('OnBeforeDocFormDelete', [
            'ids' => $_ids
        ], $fire_events);
        $this->toTrash($_ids);
        $this->invokeEvent('OnDocFormDelete', [
            'ids' => $_ids
        ], $fire_events);

        return $this;
    }

    /**
     * @return array
     */
    private function systemID()
    {
        $ignore = [
            0, //empty document
            (int) $this->modxConfig('site_start'),
            (int) $this->modxConfig('error_page'),
            (int) $this->modxConfig('unauthorized_page'),
            (int) $this->modxConfig('site_unavailable_page')
        ];
        $data = $this->query("SELECT DISTINCT setting_value FROM {$this->makeTable('user_settings')} WHERE `setting_name`='login_home' AND `setting_value`!=''");
        $data = $this->modx->db->makeArray($data);
        foreach ($data as $item) {
            $ignore[] = (int)$item['setting_value'];
        }

        return array_unique($ignore);

    }

    /**
     * @param $alias
     * @return string
     */
    protected function checkAlias($alias)
    {
        $alias = strtolower($alias);
        if ($this->modxConfig('friendly_urls')) {
            $_alias = $this->escape($alias);
            if ((!$this->modxConfig('allow_duplicate_alias') && !$this->modxConfig('use_alias_path')) || ($this->modxConfig('allow_duplicate_alias') && $this->modxConfig('use_alias_path'))) {
                $flag = $this->modx->db->getValue($this->query("SELECT `id` FROM {$this->makeTable('site_content')} WHERE `alias`='{$_alias}' AND `parent`={$this->get('parent')} LIMIT 1"));
            } else {
                $flag = $this->modx->db->getValue($this->query("SELECT `id` FROM {$this->makeTable('site_content')} WHERE `alias`='{$_alias}' LIMIT 1"));
            }
            if (($flag && $this->newDoc) || (!$this->newDoc && $flag && $this->id != $flag)) {
                $suffix = substr($alias, -2);
                if (preg_match('/-(\d+)/', $suffix, $tmp) && isset($tmp[1]) && (int) $tmp[1] > 1) {
                    $suffix = (int) $tmp[1] + 1;
                    $alias = substr($alias, 0, -2) . '-' . $suffix;
                } else {
                    $alias .= '-2';
                }
                $alias = $this->checkAlias($alias);
            }
        }

        return $alias;
    }

    /**
     * @param $key
     * @return bool
     */
    public function issetField($key)
    {
        return (array_key_exists($key, $this->default_field) || (array_key_exists($key,
                    $this->tv) && $this->belongsToTemplate($this->tv[$key])));
    }

    /**
     * @param $tpl
     * @return int
     * @throws Exception
     */
    public function setTemplate($tpl)
    {
        if (!is_numeric($tpl) || $tpl != (int) $tpl) {
            if (is_scalar($tpl)) {
                $sql = "SELECT `id` FROM {$this->makeTable('site_templates')} WHERE `templatename` = '" . $this->escape($tpl) . "'";
                $rs = $this->query($sql);
                if (!$rs || $this->modx->db->getRecordCount($rs) <= 0) {
                    throw new Exception("Template {$tpl} is not exists");
                }
                $tpl = $this->modx->db->getValue($rs);
            } else {
                throw new Exception("Invalid template name: " . print_r($tpl, 1));
            }
        }

        return (int) $tpl;
    }

    /**
     * @return string
     */
    protected function getAlias()
    {
        if ($this->modxConfig('friendly_urls') && $this->modxConfig('automatic_alias') && $this->get('alias') == '') {
            $alias = strtr($this->get('pagetitle'), $this->table);
        } else {
            if ($this->get('alias') != '') {
                $alias = $this->get('alias');
            } else {
                $alias = '';
            }
        }
        $alias = $this->modx->stripAlias($alias);

        return $this->checkAlias($alias);
    }

    /**
     * @param  int  $parent
     * @param  string  $criteria
     * @param  string  $dir
     * @return $this
     *
     * Пересчет menuindex по полю таблицы site_content
     */
    public function updateMenuindex($parent, $criteria = 'id', $dir = 'asc')
    {
        $dir = strtolower($dir) == 'desc' ? 'desc' : 'asc';
        if (is_integer($parent) && $criteria !== '') {
            $this->query("SET @index := 0");
            $this->query("UPDATE {$this->makeTable('site_content')} SET `menuindex` = (@index := @index + 1) WHERE `parent`={$parent} ORDER BY {$criteria} {$dir}");
        }

        return $this;
    }

    /**
     * Устанавливает значение шаблона согласно системной настройке
     *
     * @return $this
     */
    public function setDefaultTemplate()
    {
        $parent = $this->get('parent');
        $template = $this->modxConfig('default_template');
        switch ($this->modxConfig('auto_template_logic')) {
            case 'sibling':
                if (!$parent) {
                    $site_start = $this->modxConfig('site_start');
                    $where = "sc.isfolder=0 AND sc.id!={$site_start}";
                    $sibl = $this->modx->getDocumentChildren($parent, 1, 0, 'template', $where, 'menuindex', 'ASC', 1);
                    if (isset($sibl[0]['template']) && $sibl[0]['template'] !== '') {
                        $template = $sibl[0]['template'];
                    }
                } else {
                    $sibl = $this->modx->getDocumentChildren($parent, 1, 0, 'template', 'isfolder=0', 'menuindex',
                        'ASC', 1);
                    if (isset($sibl[0]['template']) && $sibl[0]['template'] !== '') {
                        $template = $sibl[0]['template'];
                    } else {
                        $sibl = $this->modx->getDocumentChildren($parent, 0, 0, 'template', 'isfolder=0', 'menuindex',
                            'ASC', 1);
                        if (isset($sibl[0]['template']) && $sibl[0]['template'] !== '') {
                            $template = $sibl[0]['template'];
                        }
                    }
                }
                break;
            case 'parent':
                if ($parent) {
                    $_parent = $this->modx->getPageInfo($parent, 0, 'template');
                    if (isset($_parent['template'])) {
                        $template = $_parent['template'];
                    }
                }
                break;
        }
        $this->set('template', $template);

        return $this;
    }

    /**
     * Декодирует конкретное поле
     * @param  string  $field  Имя поля
     * @param  bool  $store  обновить распакованное поле
     * @return array ассоциативный массив с данными из json строки
     */
    public function decodeField($field, $store = false)
    {
        $out = [];
        if ($this->isDecodableField($field)) {
            $data = $this->get($field);
            if ($this->isTVarrayField($field)) {
                $out = explode('||', $data);
            } else {
                $out = jsonHelper::jsonDecode($data, ['assoc' => true], true);
            }
        }
        if ($store) {
            $this->field[$field] = $out;
            $this->markAsDecode($field);
        }

        return $out;
    }

    /**
     * Запаковывает конкретное поле в JSON
     * @param  string  $field  Имя поля
     * @param  bool  $store  обновить запакованное поле
     * @return string|null json строка
     */
    public function encodeField($field, $store = false)
    {
        $out = null;
        if ($this->isEncodableField($field)) {
            $data = $this->get($field);
            if ($this->isTVarrayField($field)) {
                $out = is_array($data) ? implode('||', $data) : (string) $data;
            } else {
                $out = json_encode($data);
            }
        }
        if ($store) {
            $this->field[$field] = $out;
            $this->markAsEncode($field);
        }

        return $out;
    }

    /**
     * Пометить все поля как запакованные
     * @return $this
     */
    public function markAllEncode()
    {
        parent::markAllEncode();
        foreach ($this->tvaFields as $field) {
            $this->markAsEncode($field);
        }

        return $this;
    }

    /**
     * Пометить все поля как распакованные
     * @return $this
     */
    public function markAllDecode()
    {
        parent::markAllDecode();
        foreach ($this->tvaFields as $field) {
            $this->markAsDecode($field);
        }

        return $this;
    }

    /**
     * @param  int  $docId
     */
    public function getDocumentGroups($docId = 0)
    {
        $out = [];
        $doc = $this->switchObject($docId);
        if (null !== $doc->getID()) {
            $doc_groups = $this->makeTable('document_groups');
            $docgroup_names = $this->makeTable('documentgroup_names');

            $rs = $this->query("SELECT `dg`.`document_group`, `dgn`.`name` FROM {$doc_groups} as `dg` INNER JOIN {$docgroup_names} as `dgn` ON `dgn`.`id`=`dg`.`document_group`
                WHERE `dg`.`document` = " . $doc->getID());
            while ($row = $this->modx->db->getRow($rs)) {
                $out[$row['document_group']] = $row['name'];
            }

        }
        unset($doc);

        return $out;
    }

    /**
     * @param  int  $docId
     * @param  array  $groupIds
     * @return $this
     */
    public function setDocumentGroups($docId = 0, $groupIds = [])
    {
        if (!is_array($groupIds)) {
            return $this;
        }
        if ($this->newDoc && $docId == 0) {
            $this->groupIds = $groupIds;
        } else {
            $doc = $this->switchObject($docId);
            if ($id = $doc->getID()) {
                foreach ($groupIds as $gid) {
                    $this->query("REPLACE INTO {$this->makeTable('document_groups')} (`document_group`, `document`) VALUES ('{$gid}', '{$id}')");
                }
                if (!$this->newDoc) {
                    $groupIds = empty($groupIds) ? '0' : implode(',', $groupIds);
                    $this->query("DELETE FROM {$this->makeTable('document_groups')} WHERE `document`={$id} AND `document_group` NOT IN ({$groupIds})");
                }
            }
            unset($doc);
            $this->groupIds = [];
        }

        return $this;
    }
}
