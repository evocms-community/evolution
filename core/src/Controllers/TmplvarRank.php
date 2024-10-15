<?php

namespace EvolutionCMS\Controllers;

use EvolutionCMS\Interfaces\ManagerTheme\PageControllerInterface;
use EvolutionCMS\Models\SiteTmplvar;
use Illuminate\Database\Eloquent\Collection;

class TmplvarRank extends AbstractController implements PageControllerInterface
{
    protected string $view = 'page.tmplvar_rank';

    public function canView(): bool
    {
        if ($this->getIndex() == 305) {
            return evo()->hasPermission('save_template');
        }

        return false;
    }

    public function process(): bool
    {
        $this->parameters = [
            'actionButtons' => $this->parameterActionButtons(),
            'tmplvars' => $this->getTmplvars(),
            'updated' => $this->update(),
        ];

        return true;
    }

    protected function parameterActionButtons(): array
    {
        return [
            'save' => 1,
            'cancel' => 1,
        ];
    }

    protected function getTmplvars(): Collection | array
    {
        return SiteTmplvar::query()
            ->select('name', 'caption', 'id', 'rank')
            ->orderBy('rank')
            ->orderBy('id')
            ->get();
    }

    protected function update(): bool
    {
        $reset = isset($_POST['reset']) && $_POST['reset'] == 'true' ? 1 : 0;
        $updated = false;

        if (isset($_POST['listSubmitted'])) {
            foreach ($_POST as $listName => $listValue) {
                if ($listName == 'listSubmitted' || $listName == 'reset') {
                    continue;
                }
                $orderArray = explode(';', rtrim($listValue, ';'));
                foreach ($orderArray as $key => $item) {
                    if (strlen($item) == 0) {
                        continue;
                    }
                    $key = $reset ? 0 : $key;
                    $id = ltrim($item, 'item_');
                    SiteTmplvar::where('id', $id)
                        ->update(['rank' => $key]);
                }
                $updated = true;
            }
            // empty cache
            evo()->clearCache('full');
        }

        return $updated;
    }
}
