<?php

namespace EvolutionCMS\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property string $sid
 * @property int $internalKey
 * @property int $lasthit
 * @property string $ip
 */
class ActiveUserSession extends Model
{
    protected $primaryKey = 'sid';

    public $incrementing = false;

    public $timestamps = false;

    protected $casts = [
        'internalKey' => 'int',
        'lasthit' => 'int',
    ];

    protected $fillable = [
        'sid',
        'internalKey',
        'lasthit',
        'ip',
    ];
}
