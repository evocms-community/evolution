<?php

namespace EvolutionCMS\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $permission
 * @property string $role_id
 * @property int $createdon
 * @property int $editedon
 *
 * Virtual
 * @property-read \Carbon\Carbon $created_at
 * @property-read \Carbon\Carbon $updated_at
 */
class RolePermissions extends Model
{
    protected $fillable = [
        'permission',
        'role_id',
    ];
}
