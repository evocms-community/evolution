<?php namespace EvolutionCMS\Controllers;

use EvolutionCMS\Facades\ManagerTheme;
use EvolutionCMS\Interfaces\ManagerTheme\PageControllerInterface;
use EvolutionCMS\Models\EventLog;

class EventLogDetails extends AbstractController implements PageControllerInterface
{
    protected string $view = 'page.eventlog_details';

    /**
     * {@inheritdoc}
     */
    public function canView(): bool
    {
        return ManagerTheme::getCore()->hasPermission('view_eventlog');
    }

    public function process() : bool
    {
        $this->parameters['log'] = EventLog::findOrNew($this->getElementId());

        return true;
    }
}
