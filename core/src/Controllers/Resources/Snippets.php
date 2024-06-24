<?php namespace EvolutionCMS\Controllers\Resources;

use EvolutionCMS\Controllers\AbstractResources;
use EvolutionCMS\Interfaces\ManagerTheme\TabControllerInterface;
use EvolutionCMS\Models\Category;
use EvolutionCMS\Models\SiteSnippet;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Collection;

//'actions'=>array('edit'=>array(22,'edit_snippet'), 'duplicate'=>array(98,'new_snippet'), 'remove'=>array(25,'delete_snippet')),
class Snippets extends AbstractResources implements TabControllerInterface
{
    protected string $view = 'page.resources.snippets';

    /**
     * {@inheritdoc}
     */
    public function getTabName($withIndex = true): string
    {
        if ($withIndex) {
            return 'tabPlugins-' . $this->getIndex();
        }

        return 'tabSnippets';
    }

    /**
     * {@inheritdoc}
     */
    public function canView(): bool
    {
        return evo()->hasAnyPermissions([
            'new_snippet',
            'edit_snippet'
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
            'outCategory' => $this->parameterOutCategory()
        ], $params);
    }

    protected function parameterOutCategory() : Collection
    {
        return SiteSnippet::where('category', '=', 0)
            ->orderBy('name', 'ASC')
            ->lockedView()
            ->get();
    }

    protected function parameterCategories() : Collection
    {
        return Category::with('snippets')
            ->whereHas('snippets', function (Builder $builder) {
                return $builder->lockedView();
            })->orderBy('rank', 'ASC')
            ->get();
    }
}
