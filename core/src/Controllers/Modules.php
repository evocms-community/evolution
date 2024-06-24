<?php

declare(strict_types=1);

namespace EvolutionCMS\Controllers;

use EvolutionCMS\Facades\ManagerTheme;
use EvolutionCMS\Interfaces\ManagerTheme\PageControllerInterface;
use EvolutionCMS\Models\Category;
use EvolutionCMS\Models\SiteModule;
use EvolutionCMS\Support\ContextMenu;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Collection;

class Modules extends AbstractController implements PageControllerInterface
{
    /**
     * @var string
     */
    protected string $view = 'page.modules';

    /**
     * @return bool
     */
    public function canView(): bool
    {
        return evo()
            ->hasAnyPermissions([
                'exec_module',
                'new_module',
                'edit_module',
                'save_module',
                'delete_module'
            ]);
    }

    /**
     * @return bool
     */
    public function process(): bool
    {
        $this->parameters = [
            'contextMenu' => $this->getContextMenu(),
            'modules' => $this->getModules()
        ];

        return true;
    }

    /**
     * @return array
     */
    protected function getContextMenu(): array
    {
        // context menu
        $cm = new ContextMenu('cntxm', 150);

        $cm->addItem(__('global.run_module'), "js:menuAction(1)", ManagerTheme::getStyle('icon_play'), (!evo()
            ->hasPermission('exec_module') ? 1 : 0));
        if (evo()
            ->hasAnyPermissions([
                'new_module',
                'edit_module',
                'delete_module'
            ])) {
            $cm->addSeparator();
        }
        $cm->addItem(__('global.edit'), 'js:menuAction(2)', ManagerTheme::getStyle('icon_edit'), (!evo()
            ->hasPermission('edit_module') ? 1 : 0));
        $cm->addItem(__('global.duplicate'), 'js:menuAction(3)', ManagerTheme::getStyle('icon_clone'), (!evo()
            ->hasPermission('new_module') ? 1 : 0));
        $cm->addItem(__('global.delete'), 'js:menuAction(4)', ManagerTheme::getStyle('icon_trash'), (!evo()
            ->hasPermission('delete_module') ? 1 : 0));

        return [
            'menu' => $cm->render(),
            'script' => $cm->getClientScriptObject()
        ];
    }

    protected function getModules() : Collection
    {
        return SiteModule::query()
            ->orderBy('name', 'ASC')
            ->withoutProtected()
            ->lockedView()
            ->get();
    }

    /**
     * @return Collection
     */
    protected function getCategories(): Collection
    {
        return Category::with('modules')
            ->whereHas('modules', function (Builder $builder) {
                return $builder->withoutProtected()->lockedView();
            })
            ->orderBy('rank', 'ASC')
            ->get();
    }
}
