<?php

namespace EvolutionCMS\Controllers\UserRoles;

use EvolutionCMS\Controllers\AbstractController;
use EvolutionCMS\Facades\ManagerTheme;
use EvolutionCMS\Interfaces\ManagerTheme\PageControllerInterface;
use EvolutionCMS\Models\Category;
use EvolutionCMS\Models\RolePermissions;
use EvolutionCMS\Models\PermissionsGroups;
use EvolutionCMS\Models\SiteTmplvar;
use EvolutionCMS\Models\UserAttribute;
use EvolutionCMS\Models\UserRole as UserRoleModel;
use EvolutionCMS\Models\UserRoleVar;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Collection;

class UserRole extends AbstractController implements PageControllerInterface
{
    protected string $view = 'page.user_roles.user_role';

    protected int $elementType = 8;
    /**
     * @var UserRoleModel|null
     */
    private ?UserRoleModel $object;

    /**
     * {@inheritdoc}
     */
    public function canView(): bool
    {
        if (!ManagerTheme::getCore()->hasPermission('edit_role')) {
            return false;
        }
        if (!ManagerTheme::getCore()->hasPermission('new_role')) {
            return false;
        }

        return true;
    }

    /**
     * @return bool
     */
    public function process(): bool
    {
        if (isset($_GET['action']) && $_GET['action'] == 'delete') {
            $id = $this->getElementId();
            $count = UserAttribute::where('role',$id)->count();
            if($id==1){
                ManagerTheme::getCore()->webAlertAndQuit->webAlertAndQuit("The role you are trying to delete is the admin role. This role cannot be deleted!", "index.php?a=35&id={$id}");
            }
            if($count>0){
                ManagerTheme::getCore()->webAlertAndQuit("There are users with this role. It can't be deleted.", "index.php?a=35&id={$id}");
            }
            RolePermissions::query()->where('role_id', $id)->delete();
            UserRoleModel::destroy($id);
            header('Location: index.php?a=86&tab=0');
        }

        if (isset($_POST['a'])) {
            $this->updateOrCreate();

            return true;
        }

        return true;
    }

    /**
     * @return void
     */
    public function updateOrCreate()
    {
        $id = $this->getElementId();
        $mode = $this->getIndex();
        ManagerTheme::getCore()->lockElement($this->elementType, $this->getElementId());

        if (!ManagerTheme::getCore()->hasPermission('save_role')) {
            ManagerTheme::alertAndQuit('error_no_privileges');
        }

        if (!isset($_POST['name']) || $_POST['name'] == '') {
            ManagerTheme::getCore()->getManagerApi()->saveFormValues();
            ManagerTheme::getCore()->webAlertAndQuit(
                'Please enter a name for this role!',
                "index.php?a=$mode" . ($mode == 35 ? "&id=$id" : '')
            );
        }

        $role = UserRoleModel::query()->findOrNew($id);
        $role->name = $_POST['name'];
        $role->description = $_POST['description'];
        $role->save();

        if (isset($_POST['permissions']) && is_array($_POST['permissions'])) {
            RolePermissions::query()->where('role_id', $role->getKey())->delete();
            foreach ($_POST['permissions'] as $key => $permission) {
                RolePermissions::query()->create([
                    'role_id' => $role->getKey(),
                    'permission' => $key,
                ]);
            }
        }

        if ($_POST['tvsDirty'] == 1) {
            // Preserve rankings of already assigned TVs
            $exists = UserRoleVar::query()
                ->where('roleid', $role->getKey())
                ->get()
                ->toArray();

            $ranks = [];
            $highest = 0;
            foreach ($exists as $row) {
                $ranks[$row['tmplvarid']] = $row['rank'];
                $highest = max($highest, $row['rank']);
            }

            UserRoleVar::query()
                ->where('roleid', $role->getKey())
                ->delete();

            $newAssignedTvs = $_POST['assignedTv'] ?? '';

            if (empty($newAssignedTvs)) {
                return;
            }

            foreach ($newAssignedTvs as $tvid) {
                if (empty($tvid)) {
                    continue;
                }

                UserRoleVar::query()
                    ->create([
                        'roleid' => $role->getKey(),
                        'tmplvarid' => $tvid,
                        'rank' => $ranks[$tvid] ?? $highest++,
                    ]);
            }
        }

        ManagerTheme::getCore()->getManagerApi()->clearSavedFormValues();

        if (!empty($_POST['stay'])) {
            $a = $_POST['stay'] == '2' ? '35&id=' . $role->getKey() : '38';
            header('Location: index.php?a=' . $a . '&r=2&stay=' . $_POST['stay']);
        } else {
            header('Location: index.php?a=86');
        }
    }

    /**
     * {@inheritdoc}
     */
    public function getParameters(array $params = []): array
    {
        ManagerTheme::getCore()->getManagerApi()->loadFormValues();

        $id = $this->getElementId();
        $permissionsRole = [];
        if ($id != 0) {
            $permissionsRoleTemp =
                RolePermissions::query()->where('role_id', $id)->get()->pluck('permission')->toArray();
            foreach ($permissionsRoleTemp as $role) {
                $permissionsRole[$role] = 1;
            }
        }
        if (isset($_POST['a'])) {
            foreach ($_POST['permissions'] as $role => $key) {
                $permissionsRole[$role] = 1;
            }
        }

        $this->object = UserRoleModel::with('tvs')->findOrNew($id);

        return [
            'role' => $this->object,
            'groups' => PermissionsGroups::query()->get(),
            'permissionsRole' => $permissionsRole,
            'categories' => $this->parameterCategories(),
            'tvSelected' => $this->parameterTvSelected(),
            'categoriesWithTv' => $this->parameterCategoriesWithTv(
                $this->object->tvs->reject(
                    function (SiteTmplvar $item) {
                        return $item->category === 0;
                    }
                )->pluck('id')->toArray()
            ),
            'tvOutCategory' => $this->parameterTvOutCategory(
                $this->object->tvs->reject(
                    function (SiteTmplvar $item) {
                        return $item->category !== 0;
                    }
                )->pluck('id')->toArray()
            ),
            'actionButtons' => $this->parameterActionButtons(),
        ];
    }

    /**
     * @return Collection
     */
    protected function parameterCategories(): Collection
    {
        return Category::query()
            ->orderBy('rank', 'ASC')
            ->orderBy('category', 'ASC')
            ->get();
    }

    /**
     * @return array
     */
    protected function parameterTvSelected(): array
    {
        return array_unique(array_map('intval', get_by_key($_POST, 'assignedTv', [], 'is_array')));
    }

    /**
     * @param array $ignore
     *
     * @return Collection
     */
    protected function parameterTvOutCategory(array $ignore = []): Collection
    {
        $query = SiteTmplvar::with('userRoles')
            ->where('category', '=', 0)
            ->orderBy('name', 'ASC');

        if (!empty($ignore)) {
            $query = $query->whereNotIn('id', $ignore);
        }

        return $query->get();
    }

    /**
     * @param array $ignore
     *
     * @return Collection
     */
    protected function parameterCategoriesWithTv(array $ignore = []): Collection
    {
        $query = Category::with('tvs.userRoles')
            ->whereHas('tvs', function (Builder $builder) use ($ignore) {
                if (!empty($ignore)) {
                    $builder = $builder->whereNotIn(
                        (new SiteTmplvar())->getTable() . '.id',
                        $ignore
                    );
                }

                return $builder;
            })
            ->orderBy('rank', 'ASC');

        return $query->get();
    }

    /**
     * @return array
     */
    protected function parameterActionButtons(): array
    {
        return [
            'select' => 1,
            'save' => ManagerTheme::getCore()->hasPermission('save_role'),
            'new' => ManagerTheme::getCore()->hasPermission('new_role'),
            'delete' => !empty($this->object->getKey()) && ManagerTheme::getCore()->hasPermission('delete_role'),
            'cancel' => 1,
        ];
    }
}
