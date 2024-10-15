<?php

namespace EvolutionCMS\Models;

use Illuminate\Database\Eloquent;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * @property int $id
 * @property string $name
 * @property int $service
 * @property string $groupname
 *
 * BelongsToMany
 * @property Collection $plugins
 */
class SystemEventname extends Model
{
    public $timestamps = false;

    protected $casts = [
        'service' => 'int',
    ];

    protected $fillable = [
        'name',
        'service',
        'groupname',
    ];

    public function plugins(): BelongsToMany
    {
        return $this->belongsToMany(
            SitePlugin::class,
            (new SitePluginEvent)->getTable(),
            'evtid',
            'pluginid'
        )->withPivot('priority');
    }
}
