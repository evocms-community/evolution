<?php namespace EvolutionCMS\Controllers\Resources;

use EvolutionCMS\Controllers\AbstractResources;
use EvolutionCMS\Interfaces\ManagerTheme\TabControllerInterface;
use EvolutionCMS\Models\Category;
use EvolutionCMS\Models\SiteHtmlsnippet;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Collection;

//'actions'=>array('edit'=>array(78,'edit_chunk'), 'duplicate'=>array(97,'new_chunk'), 'remove'=>array(80,'delete_chunk')),
class Chunks extends AbstractResources implements TabControllerInterface
{
    protected string $view = 'page.resources.chunks';

    /**
     * {@inheritdoc}
     */
    public function getTabName($withIndex = true): string
    {
        if ($withIndex) {
            return 'tabChunks-' . $this->getIndex();
        }

        return 'tabChunks';
    }

    /**
     * {@inheritdoc}
     */
    public function canView(): bool
    {
        return evo()->hasAnyPermissions([
            'new_chunk',
            'edit_chunk'
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
    public function getParameters(array $params = []): array
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

    protected function parameterOutCategory(): Collection
    {
        return SiteHtmlsnippet::where('category', '=', 0)
            ->orderBy('name', 'ASC')
            ->lockedView()
            ->get();
    }

    protected function parameterCategories(): Collection
    {
        return Category::with('chunks')
            ->whereHas('chunks', function (Builder $builder) {
                return $builder->lockedView();
            })->orderBy('rank', 'ASC')
            ->get();
    }
}
