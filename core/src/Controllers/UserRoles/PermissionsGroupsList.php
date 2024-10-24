<?php

namespace EvolutionCMS\Controllers\UserRoles;

use EvolutionCMS\Controllers\AbstractResources;
use EvolutionCMS\Interfaces\ManagerTheme\TabControllerInterface;
use EvolutionCMS\Models\PermissionsGroups;

class PermissionsGroupsList extends AbstractResources implements TabControllerInterface
{
    protected string $view = 'page.user_roles.permission_group_list';

    /**
     * {@inheritdoc}
     */
    public function getTabName($withIndex = true): string
    {
        if ($withIndex) {
            return 'tabPermissionsGroups-' . $this->getIndex();
        }

        return 'tabPermissionsGroups';
    }

    /**
     * {@inheritdoc}
     */
    public function canView(): bool
    {
        return evo()->hasPermission('edit_user');
    }

    /**
     * {@inheritdoc}
     */
    public function getParameters(array $params = []): array
    {
        $params = array_merge($this->getBaseParams(), $params);

        return array_merge([
            'groups' => PermissionsGroups::query()->orderBy('id')->get(),
        ], $params);
    }

    protected function getBaseParams(): array
    {
        return array_merge(
            parent::getParameters(),
            [
                'tabPageName' => $this->getTabName(false),
                'tabIndexPageName' => $this->getTabName(),
            ]
        );
    }
}
