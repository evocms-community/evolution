<?php namespace EvolutionCMS\Controllers\UserRoles;

use EvolutionCMS\Controllers\AbstractController;
use EvolutionCMS\Interfaces\ManagerTheme\PageControllerInterface;
use EvolutionCMS\Models\Permissions as PermissionsModel;
use EvolutionCMS\Models\PermissionsGroups as PermissionsGroupsModel;
use EvolutionCMS\Facades\ManagerTheme;

class PermissionsGroups extends AbstractController implements PageControllerInterface
{
    protected string $view = 'page.user_roles.permissions_groups';

    /**
     * {@inheritdoc}
     */
    public function canView(): bool
    {
        return ManagerTheme::getCore()->hasPermission('edit_role');
    }

    public function process(): bool
    {
        if (isset($_GET['action']) && $_GET['action'] == 'delete') {
            PermissionsModel::query()->where('group_id', $this->getElementId())->delete();
            PermissionsGroupsModel::query()->where('id', $this->getElementId())->delete();
            header('Location: index.php?a=86&tab=1');
        }
        if (isset($_POST['a'])) {
            $this->updateOrCreate();
            return true;
        }

        return true;
    }

    public function updateOrCreate()
    {
        $id = $this->getElementId();
        $group = PermissionsGroupsModel::query()->firstOrNew(['id' => $id]);
        $group->name = $_POST['name'];
        $group->lang_key = $_POST['lang_key'];
        $group->save();
        header('Location: index.php?a=136&id=' . $group->getKey() . '&r=9');
    }

    public static function findCategoryOrNew($name)
    {
        $group = PermissionsGroupsModel::query()->firstOrNew(['name' => $name]);
        $group->save();
        return $group->getKey();
    }

    /**
     * {@inheritdoc}
     */
    public function getParameters(array $params = []): array
    {
        $id = $this->getElementId();
        return [
            'groups' => PermissionsGroupsModel::findOrNew($id)
        ];
    }
}
