<?php

namespace EvolutionCMS\Controllers;

use EvolutionCMS\Interfaces\ManagerTheme\PageControllerInterface;
use EvolutionCMS\Models\SitePluginEvent;
use EvolutionCMS\Models\SystemEventname;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class PluginPriority extends AbstractController implements PageControllerInterface
{
    protected string $view = 'page.plugin_priority';

    /**
     * {@inheritdoc}
     */
    public function canView(): bool
    {
        return evo()->hasPermission('save_plugin');
    }

    /**
     * {@inheritdoc}
     */
    public function getParameters(array $params = []): array
    {
        return parent::getParameters([
            'events' => $this->getEventsParameter(),
        ]);
    }

    protected function getEventsParameter(): Collection
    {
        return SystemEventname::with(
            [
                'plugins' => function (BelongsToMany $query) {
                    $query->orderBy('priority');
                },
            ]
        )->whereHas('plugins')->orderBy('name')->get();
    }

    public function process(): bool
    {
        $updateMsg = false;

        if (isset($_POST['priority']) && is_array($_POST['priority'])) {
            $updateMsg = true;

            foreach ($_POST['priority'] as $eventId => $pluginsOrder) {
                if (!is_numeric($eventId) || !is_array($pluginsOrder)) {
                    continue;
                }

                if (count($pluginsOrder) > 0) {
                    foreach ($pluginsOrder as $priority => $pluginId) {
                        SitePluginEvent::query()
                            ->where('pluginid', intval($pluginId))
                            ->where('evtid', intval($eventId))
                            ->update(['priority' => intval($priority)]);
                    }
                }
            }

            // empty cache
            evo()->clearCache('full');
        }

        $this->parameters['updateMsg'] = $updateMsg;

        return true;
    }
}
