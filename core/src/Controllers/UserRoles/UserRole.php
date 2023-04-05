<?php

namespace EvolutionCMS\Controllers\UserRoles;

use EvolutionCMS\Controllers\AbstractController;
use EvolutionCMS\Interfaces\ManagerTheme;
use EvolutionCMS\Models;
use EvolutionCMS\Models\UserAttribute;
use Illuminate\Database\Eloquent;
use Illuminate\Support\Collection;

class UserRole extends AbstractController implements ManagerTheme\PageControllerInterface
{
    protected $view = 'page.user_roles.user_role';

    protected int $elementType = 8;
    /**
     * @var Models\UserRole|null
     */
    private ?Models\UserRole $object;

    /**
     * {@inheritdoc}
     */
    public function canView(): bool
    {
        if (!$this->managerTheme->getCore()->hasPermission('edit_role')) {
            return false;
        }
        if (!$this->managerTheme->getCore()->hasPermission('new_role')) {
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
                $this->managerTheme->getCore()->webAlertAndQuit->webAlertAndQuit("The role you are trying to delete is the admin role. This role cannot be deleted!", "index.php?a=35&id={$id}");
            }
            if($count>0){
                $this->managerTheme->getCore()->webAlertAndQuit("There are users with this role. It can't be deleted.", "index.php?a=35&id={$id}");
            }
            Models\RolePermissions::query()->where('role_id', $id)->delete();
            Models\UserRole::destroy($id);
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
        $this->managerTheme->getCore()->lockElement($this->elementType, $this->getElementId());

        if (!$this->managerTheme->getCore()->hasPermission('save_role')) {
            $this->managerTheme->alertAndQuit('error_no_privileges');
        }

        if (!isset($_POST['name']) || $_POST['name'] == '') {
            $this->managerTheme->getCore()->getManagerApi()->saveFormValues();
            $this->managerTheme->getCore()->webAlertAndQuit(
                'Please enter a name for this role!',
                "index.php?a=$mode" . ($mode == 35 ? "&id=$id" : '')
            );
        }

        $role = Models\UserRole::query()->findOrNew($id);
        $role->name = $_POST['name'];
        $role->description = $_POST['description'];
        $role->save();

        if (isset($_POST['permissions']) && is_array($_POST['permissions'])) {
            Models\RolePermissions::query()->where('role_id', $role->getKey())->delete();
            foreach ($_POST['permissions'] as $key => $permission) {
                Models\RolePermissions::query()->create([
                    'role_id' => $role->getKey(),
                    'permission' => $key,
                ]);
            }
        }

        if ($_POST['tvsDirty'] == 1) {
            // Preserve rankings of already assigned TVs
            $exists = Models\UserRoleVar::query()
                ->where('roleid', $role->getKey())
                ->get()
                ->toArray();

            $ranks = [];
            $highest = 0;
            foreach ($exists as $row) {
                $ranks[$row['tmplvarid']] = $row['rank'];
                $highest = max($highest, $row['rank']);
            }

            Models\UserRoleVar::query()
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

                Models\UserRoleVar::query()
                    ->create([
                        'roleid' => $role->getKey(),
                        'tmplvarid' => $tvid,
                        'rank' => $ranks[$tvid] ?? $highest++,
                    ]);
            }
        }

        $this->managerTheme->getCore()->getManagerApi()->clearSavedFormValues();

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
        $this->managerTheme->getCore()->getManagerApi()->loadFormValues();

        $id = $this->getElementId();
        $permissionsRole = [];
        if ($id != 0) {
            $permissionsRoleTemp =
                Models\RolePermissions::query()->where('role_id', $id)->get()->pluck('permission')->toArray();
            foreach ($permissionsRoleTemp as $role) {
                $permissionsRole[$role] = 1;
            }
        }
        if (isset($_POST['a'])) {
            foreach ($_POST['permissions'] as $role => $key) {
                $permissionsRole[$role] = 1;
            }
        }

        $this->object = Models\UserRole::with('tvs')->findOrNew($id);

        return [
            'role' => $this->object,
            'groups' => Models\PermissionsGroups::query()->get(),
            'permissionsRole' => $permissionsRole,
            'categories' => $this->parameterCategories(),
            'tvSelected' => $this->parameterTvSelected(),
            'categoriesWithTv' => $this->parameterCategoriesWithTv(
                $this->object->tvs->reject(
                    function (Models\SiteTmplvar $item) {
                        return $item->category === 0;
                    }
                )->pluck('id')->toArray()
            ),
            'tvOutCategory' => $this->parameterTvOutCategory(
                $this->object->tvs->reject(
                    function (Models\SiteTmplvar $item) {
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
        return Models\Category::query()
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
        $query = Models\SiteTmplvar::with('userRoles')
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
        $query = Models\Category::with('tvs.userRoles')
            ->whereHas('tvs', function (Eloquent\Builder $builder) use ($ignore) {
                if (!empty($ignore)) {
                    $builder = $builder->whereNotIn(
                        (new Models\SiteTmplvar())->getTable() . '.id',
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
            'save' => $this->managerTheme->getCore()->hasPermission('save_role'),
            'new' => $this->managerTheme->getCore()->hasPermission('new_role'),
            'delete' => !empty($this->object->getKey()) && $this->managerTheme->getCore()->hasPermission('delete_role'),
            'cancel' => 1,
        ];
    }
}
