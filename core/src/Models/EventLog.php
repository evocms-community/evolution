<?php

namespace EvolutionCMS\Models;

use EvolutionCMS\Traits;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @property int $id
 * @property int $eventid
 * @property int $createdon
 * @property int $type
 * @property int $user
 * @property int $usertype
 * @property string $source
 * @property string $description
 *
 * BelongsTo
 * @property null|ManagerUser $mgruser
 * @property null|User $webuser
 *
 * Virtual
 * @property-read \Carbon\Carbon $created_at
 */
class EventLog extends Model
{
    use Traits\Models\ManagerActions,
        Traits\Models\TimeMutator;

    const CREATED_AT = 'createdon';
    const UPDATED_AT = null;

    public const TYPE_INFORMATION = 1;
    public const TYPE_WARNING = 2;
    public const TYPE_ERROR = 3;

    public const USER_MGR = 0;
    public const USER_WEB = 1;

    protected $table = 'event_log';

    protected $dateFormat = 'U';

    protected $casts = [
        'eventid' => 'int',
        'type' => 'int',
        'user' => 'int',
        'usertype' => 'int',
    ];

    protected $fillable = [
        'eventid',
        'type',
        'user',
        'usertype',
        'source',
        'description',
    ];

    public function isInformationType(): bool
    {
        return $this->type === static::TYPE_INFORMATION;
    }

    public function isWarningType(): bool
    {
        return $this->type === static::TYPE_WARNING;
    }

    public function isErrorType(): bool
    {
        return $this->type === static::TYPE_ERROR;
    }

    public function getCreatedAtAttribute()
    {
        return $this->convertTimestamp($this->createdon);
    }

    public function getUser()
    {
        $out = null;
        switch ($this->usertype) {
            case static::USER_WEB:
                $out = $this->webuser;
                break;
            case static::USER_MGR:
                $out = $this->mgruser;
                break;
        }

        return $out;
    }

    public function webuser(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user', 'id');
    }

    public function mgruser(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user', 'id');
    }
}
