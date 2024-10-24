<?php

namespace EvolutionCMS\Controllers;

use EvolutionCMS\Interfaces\ManagerTheme\PageControllerInterface;
use EvolutionCMS\Interfaces\ManagerThemeInterface;
use EvolutionCMS\Models\SiteContent;

class RefreshSite extends AbstractController implements PageControllerInterface
{
    protected string $view = 'page.refresh_site';

    public function __construct(ManagerThemeInterface $managerTheme, array $data = [])
    {
        parent::__construct($managerTheme, $data);
    }

    /**
     * {@inheritdoc}
     */
    public function canView(): bool
    {
        return true;
    }

    public function process(): bool
    {
        // (un)publishing of documents, version 2!
        // first, publish document waiting to be published
        $time = evo()->timestamp();

        $this->parameters = [
            'num_rows_pub' => $this->publishDocuments($time),
            'num_rows_unpub' => $this->unPublishDocuments($time),
        ];

        ob_start();
        evo()->clearCache('full', true);
        $this->parameters['cache_log'] = ob_get_contents();
        ob_end_clean();

        // invoke OnSiteRefresh event
        evo()->invokeEvent("OnSiteRefresh");

        return true;
    }

    protected function publishDocuments(int $time): int
    {
        $query = SiteContent::publishDocuments($time);

        $count = $query->count();

        $query->update(['published' => 1, 'pub_date' => 0]);

        return $count;
    }

    protected function unPublishDocuments(int $time): int
    {
        $query = SiteContent::unPublishDocuments($time);

        $count = $query->count();

        $query->update(['published' => 0, 'unpub_date' => 0]);

        return $count;
    }
}
