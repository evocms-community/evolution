<?php namespace EvolutionCMS\Controllers;

use EvolutionCMS\Facades\ManagerTheme;
use EvolutionCMS\Interfaces\ManagerTheme\PageControllerInterface;
use EvolutionCMS\Interfaces\ManagerThemeInterface;
use EvolutionCMS\Models\SiteContent;

class RefreshSite extends AbstractController implements PageControllerInterface
{
    protected string $view = 'page.refresh_site';

    /**
     * @var \EvolutionCMS\Interfaces\DatabaseInterface
     */
    protected $database;

    public function __construct(ManagerThemeInterface $managerTheme, array $data = [])
    {
        parent::__construct($managerTheme, $data);
        $this->database = ManagerTheme::getCore()->getDatabase();
    }

    /**
     * {@inheritdoc}
     */
    public function canView(): bool
    {
        return true;
    }

    public function process() : bool
    {
        // (un)publishing of documents, version 2!
        // first, publish document waiting to be published
        $time = ManagerTheme::getCore()->timestamp();

        $this->parameters = [
            'num_rows_pub' => $this->publishDocuments($time),
            'num_rows_unpub' => $this->unPublishDocuments($time),
        ];

        ob_start();
            ManagerTheme::getCore()->clearCache('full', true);
            $this->parameters['cache_log'] = ob_get_contents();
        ob_end_clean();

        // invoke OnSiteRefresh event
        ManagerTheme::getCore()->invokeEvent("OnSiteRefresh");

        return true;
    }

    protected function publishDocuments(int $time) : int
    {
        $query = SiteContent::publishDocuments($time);

        $count = $query->count();

        $query->update(['published' => 1, 'pub_date' => 0]);

        return $count;
    }

    protected function unPublishDocuments(int $time) : int
    {
        $query = SiteContent::unPublishDocuments($time);

        $count = $query->count();

        $query->update(['published' => 0, 'unpub_date' => 0]);

        return $count;
    }
}
