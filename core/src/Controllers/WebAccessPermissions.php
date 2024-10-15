<?php

namespace EvolutionCMS\Controllers;

use EvolutionCMS\Interfaces\ManagerTheme\PageControllerInterface;
use EvolutionCMS\Models\DocumentGroup;
use EvolutionCMS\Models\DocumentgroupName;
use EvolutionCMS\Models\MemberGroup;
use EvolutionCMS\Models\MembergroupName;
use EvolutionCMS\Models\SiteContent;
use EvolutionCMS\Models\User;
use Illuminate\Support\Facades\Config;

class WebAccessPermissions extends AbstractController implements PageControllerInterface
{
    protected string $view = 'page.web_access_permissions';

    /**
     * {@inheritdoc}
     */
    public function canView(): bool
    {
        return evo()->hasPermission('manage_groups');
    }

    public function process(): bool
    {
        $search = $_POST['search'] ?? false;
        $delete = $_POST['delete'] ?? false;

        if (isset($_GET['list'])) {
            $list = null;
            $groupId = $this->getElementId();
            $this->view = 'page.web_access_permissions_groupslist';

            switch ($_GET['list']) {
                case 'users':
                    $memberGroup = MembergroupName::with('users')->where('id', $groupId)->first();
                    $this->parameters['group'] = $memberGroup;

                    if (isset($delete) && $delete) {
                        MemberGroup::query()->where('member', $delete)
                            ->where('user_group', $groupId)
                            ->delete();
                    }

                    $list = User::query()->whereHas('memberGroups', function ($q) use ($groupId) {
                        $q->where('user_group', $groupId);
                    });
                    if (isset($search) && $search) {
                        $list = $list->where('username', 'LIKE', '%' . $search . '%');
                    }
                    $list = $list->paginate(Config::get('global.number_of_results'));
                    break;

                case 'documents':
                    $memberGroup = DocumentgroupName::with('documents')->where('id', $groupId)->first();
                    $this->parameters['group'] = $memberGroup;

                    if (isset($delete) && $delete) {
                        DocumentGroup::query()->where('document', $delete)
                            ->where('document_group', $groupId)
                            ->delete();
                    }

                    $list = SiteContent::query()->whereHas('documentGroups', function ($q) use ($groupId) {
                        $q->where('document_group', $groupId);
                    });

                    if (isset($search) && $search) {
                        $list = $list->where('pagetitle', 'LIKE', '%' . $search . '%');
                    }
                    $list = $list->paginate(Config::get('global.number_of_results'));
                    break;

                default:
                    break;
            }

            $list?->setPath('index.php?a=' . $_GET['a'] . '&list=' . $_GET['list'] . '&id=' . $groupId);

            $this->parameters['list'] = $list;

            return true;
        }

        $this->parameters['userGroups'] = MembergroupName::with(['users', 'documentGroups'])
            ->orderBy('name')
            ->get();

        $this->parameters['documentGroups'] = DocumentgroupName::with('documents')
            ->orderBy('name')
            ->get();

        return true;
    }
}
