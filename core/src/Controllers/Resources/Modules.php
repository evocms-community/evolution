<?php namespace EvolutionCMS\Controllers\Resources;

use EvolutionCMS\Controllers\AbstractResources;
use EvolutionCMS\Interfaces\ManagerTheme\TabControllerInterface;
use EvolutionCMS\Models\Category;
use EvolutionCMS\Models\SiteModule;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Collection;

//'actions'=>array('edit'=>array(108,'edit_module'), 'duplicate'=>array(111,'new_module'), 'remove'=>array(110,'delete_module')),
class Modules extends AbstractResources implements TabControllerInterface
{
    protected string $view = 'page.resources.modules';
    /**
     * {@inheritdoc}
     */
    public function getTabName($withIndex = true): string
    {
        if ($withIndex) {
            return 'tabModules-' . $this->getIndex();
        }

        return 'tabModules';
    }

    /**
     * {@inheritdoc}
     */
    public function canView(): bool
    {
        return evo()->hasAnyPermissions([
            'exec_module',
            'new_module',
            'edit_module',
            'save_module',
            'delete_module'
        ]);
    }

    protected function getBaseParams()
    {
        return array_merge(
            parent::getParameters(),
            [
                'tabPageName' => $this->getTabName(false),
                'tabIndexPageName' => $this->getTabName()
            ]
        );
    }

    /**
     * {@inheritdoc}
     */
    public function getParameters(array $params = []) : array
    {
        $params = array_merge($this->getBaseParams(), $params);

        if ($this->isNoData()) {
            return $params;
        }

        return array_merge([
            'categories' => $this->parameterCategories(),
            'outCategory' => $this->parameterOutCategory(),
            'action' => $this->parameterActionName()
        ], $params);
    }

    protected function parameterOutCategory() : Collection
    {
        return SiteModule::where('category', '=', 0)
            ->orderBy('name', 'ASC')
            ->lockedView()
            ->get();
    }

    protected function parameterCategories() : Collection
    {
        return Category::with('modules')
            ->whereHas('modules', function (Builder $builder) {
                return $builder->lockedView();
            })->orderBy('rank', 'ASC')
            ->get();
    }

    protected function parameterActionName() : string
    {
        if (evo()->hasPermission('edit_module')) {
            return 'actions.edit';
        }
        if (evo()->hasPermission('exec_module')) {
            return 'actions.run';
        }
        return '';
    }
}
