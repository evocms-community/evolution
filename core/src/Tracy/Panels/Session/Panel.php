<?php namespace EvolutionCMS\Tracy\Panels\Session;

use EvolutionCMS\Tracy\Panels\AbstractPanel;

class Panel extends AbstractPanel
{
    /**
     * getAttributes.
     *
     * @return array
     */

    public function getPanel()
    {
        if (session_status() === PHP_SESSION_ACTIVE) {
            return $this->render('panel');
        }
    }

    protected function getAttributes()
    {
        $rows = [];
        if (session_status() === PHP_SESSION_ACTIVE) {
            if ($this->hasEvolutionCMS() === true && \defined('SESSION_COOKIE_NAME')) {
                $rows = [
                    'cookieId' => SESSION_COOKIE_NAME
                ];
            }
            $rows['sessionId'] = session_id();
            $rows['data'] = $_SESSION;
        }
        return compact('rows');
    }
}
