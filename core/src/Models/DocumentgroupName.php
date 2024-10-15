<?php

namespace EvolutionCMS\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * @property int $id
 * @property string $name
 * @property Collection $documents
 */
class DocumentgroupName extends Model
{
    public $timestamps = false;

    protected $casts = [
        'private_memgroup' => 'int',
        'private_webgroup' => 'int',
    ];

    protected $fillable = [
        'name',
        'private_memgroup',
        'private_webgroup',
    ];

    public function documents(): BelongsToMany
    {
        return $this->belongsToMany(SiteContent::class, 'document_groups', 'document_group', 'document')->withTrashed();
    }
}
