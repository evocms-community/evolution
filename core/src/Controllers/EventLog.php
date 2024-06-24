<?php namespace EvolutionCMS\Controllers;

use EvolutionCMS\Interfaces\ManagerTheme\PageControllerInterface;

class EventLog extends AbstractController implements PageControllerInterface
{
    protected string $view = 'page.eventlog';

    /**
     * {@inheritdoc}
     */
    public function canView(): bool
    {
        return evo()->hasPermission('view_eventlog');
    }
}
