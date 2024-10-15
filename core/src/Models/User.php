<?php

namespace EvolutionCMS\Models;

use EvolutionCMS\Traits;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 * @property int $id
 * @property string $username
 * @property string $password
 * @property string $cachepwd
 * @property string $refresh_token
 * @property string $access_token
 * @property string $valid_to
 */
class User extends Model
{
    use Traits\Models\ManagerActions;

    public $timestamps = false;

    protected $hidden = [
        'password',
        'cachepwd',
        'verified_key',
    ];

    protected $fillable = [
        'username',
        'password',
        'cachepwd',
        'verified_key',
        'refresh_token',
        'access_token',
        'valid_to',
    ];

    public function attributes(): HasOne
    {
        return $this->hasOne(UserAttribute::class, 'internalKey', 'id');
    }

    public function memberGroups(): HasMany
    {
        return $this->hasMany(MemberGroup::class, 'member', 'id');
    }

    public function settings(): HasMany
    {
        return $this->hasMany(UserSetting::class, 'user', 'id');
    }

    public function values(): HasMany
    {
        return $this->hasMany(UserValue::class, 'userid', 'id');
    }

    public function delete(): ?bool
    {
        $this->memberGroups()->delete();
        $this->attributes()->delete();
        $this->settings()->delete();

        return parent::delete();
    }
}
