<?php

namespace EvolutionCMS\Models;

use EvolutionCMS\Traits;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $pluginid
 * @property int $evtid
 * @property int $priority
 */
class SitePluginEvent extends Model
{
    use Traits\Models\ManagerActions;

    public $incrementing = false;

    public $timestamps = false;

    protected $casts = [
        'pluginid' => 'int',
        'evtid' => 'int',
        'priority' => 'int',
    ];

    protected $fillable = [
        'pluginid',
        'evtid',
        'priority',
    ];
}
