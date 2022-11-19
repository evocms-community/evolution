<?php

use \Doctrine\Common\Cache\Cache;

/**
 * user tv extender for DocLister
 *
 * @category extender
 * @license GNU General Public License (GPL), http://www.gnu.org/copyleft/gpl.html
 * @author Agel_Nash <Agel_Nash@xaker.ru>
 *
 * Предзагрузка данных о TV параметрах
 * Обработка TV параметров перед выводом
 *
 */
class utv_DL_Extender extends tv_DL_Extender
{
    /**
     * @var mixed|string
     */
    protected $tvValuesTable = 'user_values';
    protected $tvContentTableField = 'userid';

    /**
     * tv_DL_Extender constructor.
     * @param DocLister $DocLister
     * @param $name
     */
    public function __construct($DocLister, $name)
    {
        extDocLister::__construct($DocLister, $name);
        if (!isset($this->modx->_TVnames)) {
            $this->modx->_TVnames = array();
        }
        $this->_TVprefix = $this->getTVprefix();
        $this->cache = isset($this->modx->cache) && $this->modx->cache instanceof Cache;
    }

    /**
     * @return bool
     */
    protected function run()
    {
        return true;
    }

    /**
     * @return mixed|string
     */
    public function getTVprefix()
    {
        $tvPrefix = $this->DocLister->getCFGDef('userTvPrefix', 'tv');
        if (!empty($tvPrefix)) {
            $tvPrefix .= '.';
        }

        return $tvPrefix;
    }

    /**
     * @return array|mixed
     */
    public function getListRenderTV()
    {
        $tmp = $this->DocLister->getCFGDef('renderUserTV', '');
        if ($tmp != '' && $tmp != '*') {
            $tmp = explode(",", $tmp);
            if (in_array("*", $tmp)) {
                $tmp = array("*");
            } else {
                $out = array_unique($tmp);
                $tmp = array();
                foreach ($out as $item) {
                    $tmp[] = $this->_TVprefix . $item;
                }
            }
        } else {
            $tmp = array($tmp);
        }

        return $tmp;
    }
}
