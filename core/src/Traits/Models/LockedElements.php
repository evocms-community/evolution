<?php

namespace EvolutionCMS\Traits\Models;

use Illuminate\Database\Eloquent\Builder;

trait LockedElements
{
    public function scopeLockedView(Builder $builder)
    {
        return evo()->getLoginUserID('mgr') && $_SESSION['mgrRole'] != 1 ?
            $builder->where('locked', '=', 0) : $builder;
    }

    public static function getLockedElements(int $type)
    {
        return evo()->getLockedElements($type);
    }
}
