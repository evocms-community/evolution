<?php

namespace EvolutionCMS\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @property int $webuser
 * @property string $setting_name
 * @property string $setting_value
 */
class UserSetting extends Model
{
    protected $primaryKey = null;

    public $incrementing = false;

    public $timestamps = false;

    protected $casts = [
        'user' => 'int',
    ];

    protected $fillable = [
        'user',
        'setting_name',
        'setting_value',
    ];

    protected function setKeysForSaveQuery($query): Builder
    {
        return $query
            ->where('user', $this->attributes['user'])
            ->where('setting_name', $this->attributes['setting_name']);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user', 'id');
    }
}
