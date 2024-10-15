<?php

namespace EvolutionCMS\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $sid
 * @property int $internalKey
 * @property int $elementType
 * @property int $elementId
 * @property int $lasthit
 */
class ActiveUserLock extends Model
{
    public $timestamps = false;

    protected $casts = [
        'internalKey' => 'int',
        'elementType' => 'int',
        'elementId' => 'int',
        'lasthit' => 'int',
    ];

    protected $fillable = [
        'sid',
        'internalKey',
        'elementType',
        'elementId',
        'lasthit',
    ];
}
