<?php


namespace Pathologic\EvolutionCMS\MODxAPI\Traits;

use Pathologic\EvolutionCMS\MODxAPI\APIhelpers;

trait ContentTV
{
    /**
     * @var array массив ТВшек где name это ключ массива, а ID это значение
     */
    private $tv = [];
    /**
     * @var array массив ТВшек где ID это ключ массива, а name это значение
     */
    private $tvid = [];
    /**
     * @var array значения по умолчанию для ТВ параметров
     */
    private $tvd = [];

    /** @var array связи ТВ и шаблонов */
    private $tvTpl = [];

    /** @var array параметры ТВ с массивами */
    protected $tvaFields = [];

    /**
     * @param  bool  $reload
     * @return $this
     */
    protected function get_TV($reload = false)
    {
        $this->modx->_TVnames = $this->loadFromCache('_TVnames');
        if ($this->modx->_TVnames === false || empty($this->modx->_TVnames) || $reload) {
            $this->modx->_TVnames = [];
            $result = $this->query('SELECT `id`,`name`,`default_text`,`type`,`display`,`display_params` FROM ' . $this->makeTable('site_tmplvars'));
            while ($row = $this->modx->db->GetRow($result)) {
                $this->modx->_TVnames[$row['name']] = [
                    'id'             => $row['id'],
                    'type'           => $row['type'],
                    'default'        => $row['default_text'],
                    'display'        => $row['display'],
                    'display_params' => $row['display_params']
                ];
            }
            $this->saveToCache($this->modx->_TVnames, '_TVnames');
        }
        $arrayTypes = ['checkbox', 'listbox-multiple'];
        $arrayTVs = [];
        foreach ($this->modx->_TVnames as $name => $data) {
            $this->tvid[$data['id']] = $name;
            $this->tv[$name] = $data['id'];
            if (in_array($data['type'], $arrayTypes)) {
                $arrayTVs[] = $name;
            }
        }
        if (empty($this->tvaFields)) {
            $this->tvaFields = $arrayTVs;
        }
        $this->loadTVTemplate()->loadTVDefault(array_values($this->tv));

        return $this;
    }

    /**
     * @return $this
     */
    protected function loadTVTemplate()
    {
        $this->tvTpl = $this->loadFromCache('_tvTpl');
        if ($this->tvTpl === false) {
            $q = $this->query("SELECT `tmplvarid`, `templateid` FROM " . $this->makeTable('site_tmplvar_templates'));
            $this->tvTpl = [];
            while ($item = $this->modx->db->getRow($q)) {
                $this->tvTpl[$item['templateid']][] = $item['tmplvarid'];
            }
            $this->saveToCache($this->tvTpl, '_tvTpl');
        }

        return $this;
    }

    /**
     * @param  array  $tvId
     * @return $this
     */
    protected function loadTVDefault(array $tvId = [])
    {
        if (is_array($tvId) && !empty($tvId)) {
            $this->tvd = [];
            foreach ($tvId as $id) {
                $name = $this->tvid[$id];
                $this->tvd[$name] = $this->modx->_TVnames[$name];
            }
        }

        return $this;
    }

    /**
     * @param $tvname
     * @return null|string
     */
    public function renderTV($tvname)
    {
        $out = null;
        if ($this->getID() > 0) {
            include_once MODX_MANAGER_PATH . "includes/tmplvars.format.inc.php";
            include_once MODX_MANAGER_PATH . "includes/tmplvars.commands.inc.php";
            $tvval = $this->get($tvname);
            if ($this->isTVarrayField($tvname) && is_array($tvval)) {
                $tvval = implode('||', $tvval);
            }
            $param = APIhelpers::getkey($this->tvd, $tvname, []);
            $display = APIhelpers::getkey($param, 'display', '');
            $display_params = APIhelpers::getkey($param, 'display_params', '');
            $type = APIhelpers::getkey($param, 'type', '');
            $out = getTVDisplayFormat($tvname, $tvval ?? '', $display, $display_params, $type, $this->getID(), '');
        }

        return $out;
    }

    /**
     * @param $tvId
     * @return bool
     */
    protected function belongsToTemplate($tvId)
    {
        $template = $this->get('template');

        return isset($this->tvTpl[$template]) && in_array($tvId, $this->tvTpl[$template]);
    }

    /**
     * Может ли содержать данное поле json массив
     * @param  string  $field  имя поля
     * @return boolean
     */
    public function isTVarrayField($field)
    {
        return (is_scalar($field) && in_array($field, $this->tvaFields));
    }
}
