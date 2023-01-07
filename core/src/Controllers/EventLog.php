<?php namespace EvolutionCMS\Controllers;

use EvolutionCMS\Interfaces\ManagerTheme;

class EventLog extends AbstractController implements ManagerTheme\PageControllerInterface
{
    protected $view = 'page.eventlog';

    /**
     * {@inheritdoc}
     */
    public function canView(): bool
    {
        return $this->managerTheme->getCore()->hasPermission('view_eventlog');
    }
}
