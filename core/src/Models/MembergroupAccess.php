<?php

namespace EvolutionCMS\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $membergroup
 * @property int $documentgroup
 */
class MembergroupAccess extends Model
{
    protected $table = 'membergroup_access';

    public $timestamps = false;

    protected $casts = [
        'membergroup' => 'int',
        'documentgroup' => 'int',
        'context' => 'int',
    ];

    protected $fillable = [
        'membergroup',
        'documentgroup',
        'context',
    ];
}
