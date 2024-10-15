<?php

namespace EvolutionCMS\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

/**
 * @property string $sid
 * @property int $internalKey
 * @property string $username
 * @property int $lasthit
 * @property string $action
 * @property int $id
 *
 * @method static Builder|ActiveUser locked($action, $id = null, $userId = null)
 */
class ActiveUser extends Model
{
    protected $primaryKey = 'sid';

    public $incrementing = false;

    public $timestamps = false;

    protected $casts = [
        'internalKey' => 'int',
        'lasthit' => 'int',
        'id' => 'int',
    ];

    protected $fillable = [
        'internalKey',
        'username',
        'lasthit',
        'action',
        'id',
    ];
}
