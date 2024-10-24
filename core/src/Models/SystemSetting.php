<?php

namespace EvolutionCMS\Models;

use EvolutionCMS\Traits;
use Illuminate\Database\Eloquent\Model;

/**
 * @property string $setting_name
 * @property string $setting_value
 */
class SystemSetting extends Model
{
    use Traits\Models\ManagerActions;

    protected $primaryKey = 'setting_name';

    public $incrementing = false;

    public $timestamps = false;

    protected $fillable = [
        'setting_name',
        'setting_value',
    ];
}
