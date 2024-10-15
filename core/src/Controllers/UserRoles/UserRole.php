<?php

namespace EvolutionCMS\Controllers\UserRoles;

use EvolutionCMS\Controllers\AbstractController;
use EvolutionCMS\Interfaces\ManagerTheme\PageControllerInterface;
use EvolutionCMS\Models\Category;
use EvolutionCMS\Models\PermissionsGroups;
use EvolutionCMS\Models\RolePermissions;
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
        if (!evo()->hasPermission('edit_role')) {
            return false;
        }
        if (!evo()->hasPermission('new_role')) {
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
            $count = UserAttribute::query()->where('role', $id)->count();
            if ($id == 1) {
                evo()->webAlertAndQuit(
                    "The role you are trying to delete is the admin role. This role cannot be deleted!",
                    "index.php?a=35&id={$id}"
                );
            }
            if ($count > 0) {
                evo()->webAlertAndQuit(
                    "There are users with this role. It can't be deleted.",
                    "index.php?a=35&id={$id}"
                );
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
    public function updateOrCreate(): void
    {
        $id = $this->getElementId();
        $mode = $this->getIndex();
        evo()->lockElement($this->elementType, $this->getElementId());

        if (!evo()->hasPermission('save_role')) {
            evo()->webAlertAndQuit('error_no_privileges');
        }

        if (!isset($_POST['name']) || $_POST['name'] == '') {
            evo()->getManagerApi()->saveFormValues();
            evo()->webAlertAndQuit(
                'Please enter a name for this role!',
                "index.php?a=$mode" . ($mode == 35 ? "&id=$id" : '')
            );
        }

        /** @var UserRoleModel $role */
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

        evo()->getManagerApi()->clearSavedFormValues();

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
        evo()->getManagerApi()->loadFormValues();

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
            ->orderBy('rank')
            ->orderBy('category')
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
            ->where('category', 0)
            ->orderBy('name');

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
            ->orderBy('rank');

        return $query->get();
    }

    /**
     * @return array
     */
    protected function parameterActionButtons(): array
    {
        return [
            'select' => 1,
            'save' => evo()->hasPermission('save_role'),
            'new' => evo()->hasPermission('new_role'),
            'delete' => !empty($this->object->getKey()) && evo()->hasPermission('delete_role'),
            'cancel' => 1,
        ];
    }
}
