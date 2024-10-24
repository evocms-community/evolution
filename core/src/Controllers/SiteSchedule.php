<?php

namespace EvolutionCMS\Controllers;

use EvolutionCMS\Interfaces\ManagerTheme\PageControllerInterface;
use EvolutionCMS\Models\SiteContent;
use Illuminate\Database\Eloquent\Collection;

class SiteSchedule extends AbstractController implements PageControllerInterface
{
    protected string $view = 'page.site_schedule';

    /**
     * {@inheritdoc}
     */
    public function canView(): bool
    {
        return evo()->hasPermission('view_eventlog');
    }

    /**
     * {@inheritdoc}
     */
    public function getParameters(array $params = []): array
    {
        $pub = $this->publishDocuments();
        $unPub = $this->unPublishDocuments();

        return [
            'publishedDocs' => $pub,
            'unpublishedDocs' => $unPub,
            'allDocs' => $pub->merge($unPub),
        ];
    }

    /**
     * @return Collection
     */
    protected function publishDocuments(): Collection
    {
        return SiteContent::query()
            ->where('pub_date', '>', evo()->timestamp())
            ->orderBy('pub_date')
            ->get();
    }

    /**
     * @return Collection
     */
    protected function unPublishDocuments(): Collection
    {
        return SiteContent::query()
            ->where('unpub_date', '>', evo()->timestamp())
            ->orderBy('unpub_date')
            ->get();
    }
}
