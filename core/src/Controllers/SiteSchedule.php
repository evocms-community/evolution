<?php namespace EvolutionCMS\Controllers;

use EvolutionCMS\Facades\ManagerTheme;
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
        return ManagerTheme::getCore()->hasPermission('view_eventlog');
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
            'allDocs' => $pub->merge($unPub)
        ];
    }

    /**
     * @return Collection
     */
    protected function publishDocuments()
    {
        return SiteContent::where('pub_date', '>', ManagerTheme::getCore()->timestamp())
            ->orderBy('pub_date', 'asc')
            ->get();
    }

    /**
     * @return Collection
     */
    protected function unPublishDocuments()
    {
        return SiteContent::where('unpub_date', '>', ManagerTheme::getCore()->timestamp())
            ->orderBy('unpub_date', 'asc')
            ->get();
    }
}
