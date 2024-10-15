<?php

namespace EvolutionCMS\Controllers\Resources;

use EvolutionCMS\Controllers\AbstractResources;
use EvolutionCMS\Interfaces\ManagerTheme\TabControllerInterface;
use EvolutionCMS\Models\Category;
use EvolutionCMS\Models\SiteTmplvar;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Collection;

//'actions'=>array('edit'=>array(301,'edit_template'), 'duplicate'=>array(304,'edit_template'), 'remove'=>array(303,'edit_template')),
class Tv extends AbstractResources implements TabControllerInterface
{
    protected string $view = 'page.resources.tv';

    /**
     * {@inheritdoc}
     */
    public function getTabName($withIndex = true): string
    {
        if ($withIndex) {
            return 'tabVariables-' . $this->getIndex();
        }

        return 'tabVariables';
    }

    /**
     * {@inheritdoc}
     */
    public function canView(): bool
    {
        return evo()->hasAnyPermissions([
            'new_template',
            'edit_template',
            'new_role',
            'edit_role',
        ]);
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
            'outCategory' => $this->parameterOutCategory(),
        ], $params);
    }

    protected function parameterOutCategory(): Collection
    {
        return SiteTmplvar::lockedView()
            ->with('templates')
            ->where('category', 0)
            ->orderBy('name')
            ->get();
    }

    protected function parameterCategories(): Collection
    {
        return Category::with('tvs.templates', 'tvs.userRoles')
            ->whereHas('tvs', function (Builder | SiteTmplvar $builder) {
                return $builder->lockedView();
            })
            ->orderBy('rank')
            ->get();
    }
}
