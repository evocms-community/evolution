<?php

namespace EvolutionCMS\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $module
 * @property int $resource
 * @property int $type
 */
class SiteModuleDepobj extends Model
{
    protected $table = 'site_module_depobj';

    public $timestamps = false;

    protected $casts = [
        'module' => 'int',
        'resource' => 'int',
        'type' => 'int',
    ];

    protected $fillable = [
        'module',
        'resource',
        'type',
    ];
}
