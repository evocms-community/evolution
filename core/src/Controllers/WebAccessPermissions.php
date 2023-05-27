<?php namespace EvolutionCMS\Controllers;

use EvolutionCMS\Facades\ManagerTheme;
use EvolutionCMS\Interfaces\ManagerTheme\PageControllerInterface;
use EvolutionCMS\Models\DocumentgroupName;
use EvolutionCMS\Models\MembergroupName;

class WebAccessPermissions extends AbstractController implements PageControllerInterface
{
    protected string $view = 'page.web_access_permissions';

    /**
     * {@inheritdoc}
     */
    public function canView(): bool
    {
        return ManagerTheme::getCore()->hasPermission('manage_groups');
    }

    public function process() : bool
    {
        $this->parameters['userGroups'] = MembergroupName::with(['users', 'documentGroups'])
            ->orderBy('name', 'ASC')
            ->get();

        $this->parameters['documentGroups'] = DocumentgroupName::with('documents')
            ->orderBy('name', 'ASC')
            ->get();

        return true;
    }
}
