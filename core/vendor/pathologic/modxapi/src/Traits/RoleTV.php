<?php


namespace Pathologic\EvolutionCMS\MODxAPI\Traits;

trait RoleTV
{
    use ContentTV;

    /**
     * @return $this
     */
    protected function loadTVTemplate()
    {
        $this->tvTpl = $this->loadFromCache('_tvRole');
        if ($this->tvTpl === false) {
            $q = $this->query("SELECT `tmplvarid`, `roleid` FROM " . $this->makeTable('user_role_vars'));
            $this->tvTpl = [];
            while ($item = $this->modx->db->getRow($q)) {
                $this->tvTpl[$item['roleid']][] = $item['tmplvarid'];
            }
            $this->saveToCache($this->tvTpl, '_tvRole');
        }

        return $this;
    }

    /**
     * @param $tvId
     * @return bool
     */
    protected function belongsToTemplate($tvId)
    {
        $template = $this->get('role');

        return isset($this->tvTpl[$template]) && in_array($tvId, $this->tvTpl[$template]);
    }
}