<?php

namespace EvolutionCMS\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $module
 * @property int $usergroup
 */
class SiteModuleAccess extends Model
{
    protected $table = 'site_module_access';

    public $timestamps = false;

    protected $casts = [
        'module' => 'int',
        'usergroup' => 'int',
    ];

    protected $fillable = [
        'module',
        'usergroup',
    ];
}
