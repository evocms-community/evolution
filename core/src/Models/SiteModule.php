<?php

namespace EvolutionCMS\Models;

use EvolutionCMS\Traits;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Carbon;

/**
 * @property int $id
 * @property string $name
 * @property string $description
 * @property int $editor_type
 * @property int $disabled
 * @property int $category
 * @property int $wrap
 * @property int $locked
 * @property string $icon
 * @property int $enable_resource
 * @property string $resourcefile
 * @property int $createdon
 * @property int $editedon
 * @property string $guid
 * @property int $enable_sharedparams
 * @property string $properties
 * @property string $modulecode
 *
 * BelongsTo
 * @property null|Category $categories
 *
 * Virtual
 * @property-read \Carbon\Carbon $created_at
 * @property-read \Carbon\Carbon $updated_at
 * @property-read bool $isAlreadyEdit
 * @property-read null|array $alreadyEditInfo
 * @property-read mixed $already_edit_info
 * @property-read mixed $is_already_edit
 *
 * @method static Builder|SiteModule lockedView()
 * @method static Builder|SiteModule withoutProtected()
 */
class SiteModule extends Model
{
    use Traits\Models\ManagerActions,
        Traits\Models\LockedElements,
        Traits\Models\TimeMutator;

    const CREATED_AT = 'createdon';
    const UPDATED_AT = 'editedon';

    protected $dateFormat = 'U';

    protected $casts = [
        'editor_type' => 'int',
        'disabled' => 'int',
        'category' => 'int',
        'wrap' => 'int',
        'locked' => 'int',
        'enable_resource' => 'int',
        'createdon' => 'int',
        'editedon' => 'int',
        'enable_sharedparams' => 'int',
    ];

    protected $fillable = [
        'name',
        'description',
        'editor_type',
        'disabled',
        'category',
        'wrap',
        'locked',
        'icon',
        'enable_resource',
        'resourcefile',
        'guid',
        'enable_sharedparams',
        'properties',
        'modulecode',
    ];

    protected array $managerActionsMap = [
        'actions.cancel' => 76,
        'actions.new' => 107,
        'id' => [
            'actions.edit' => 108,
            'actions.save' => 109,
            'actions.enable' => 109,
            'actions.disable' => 109,
            'actions.delete' => 110,
            'actions.duplicate' => 111,
            'actions.run' => 112,
            'actions.dependency' => 113,
        ],
    ];

    public function categories(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'category', 'id');
    }

    public function categoryName($default = ''): string
    {
        return $this->categories === null ? $default : $this->categories->category;
    }

    public function categoryId(): ?int
    {
        return $this->categories === null ? null : $this->categories->getKey();
    }

    public function getCreatedAtAttribute(): ?Carbon
    {
        return $this->convertTimestamp($this->createdon);
    }

    public function getUpdatedAtAttribute(): ?Carbon
    {
        return $this->convertTimestamp($this->editedon);
    }

    public function scopeWithoutProtected(Builder $builder): Builder
    {
        if ($_SESSION['mgrRole'] != 1) {
            $builder->leftJoin('site_module_access', 'site_module_access.module', '=', 'site_modules.id')
                ->leftJoin('member_groups', 'member_groups.user_group', '=', 'site_module_access.usergroup')
                ->whereNull('site_module_access.usergroup')
                ->orWhere('member_groups.member', '=', (int) evo()->getLoginUserID('mgr'));
        }

        return $builder;
    }

    public function getIsAlreadyEditAttribute(): bool
    {
        return array_key_exists($this->getKey(), self::getLockedElements(6));
    }

    public function getAlreadyEditInfoAttribute(): ?array
    {
        return $this->isAlreadyEdit ? self::getLockedElements(6)[$this->getKey()] : null;
    }
}
