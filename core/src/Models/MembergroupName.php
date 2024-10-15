<?php

namespace EvolutionCMS\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * @property int $id
 * @property string $name
 *
 * BelongsToMany
 * @property Collection $users
 * @property Collection $documentGroups
 */
class MembergroupName extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'name',
    ];

    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'member_groups', 'user_group', 'member');
    }

    public function documentGroups(): BelongsToMany
    {
        return $this->belongsToMany(DocumentgroupName::class, 'membergroup_access', 'membergroup', 'documentgroup')
            ->withPivot(['id', 'context']);
    }
}
