<?php namespace EvolutionCMS\Controllers\UserRoles;

use EvolutionCMS\Controllers\AbstractResources;
use EvolutionCMS\Interfaces\ManagerTheme\TabControllerInterface;
use EvolutionCMS\Models\UserRole;

class RoleList extends AbstractResources implements TabControllerInterface
{
    protected string $view = 'page.user_roles.role_management';

    /**
     * {@inheritdoc}
     */
    public function getTabName($withIndex = true): string
    {
        if ($withIndex) {
            return 'tabRoles-'.$this->getIndex();
        }

        return 'tabRoles';
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
            'roles' => UserRole::orderBy('name')->get(),
        ], $params);

    }

    protected function getBaseParams()
    {
        return array_merge(
            parent::getParameters(),
            [
                'tabPageName'      => $this->getTabName(false),
                'tabIndexPageName' => $this->getTabName()
            ]
        );
    }
}
