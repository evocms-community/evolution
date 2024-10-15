<?php

namespace EvolutionCMS\Models;

use EvolutionCMS\Traits;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Carbon;

/**
 * @property int $id
 * @property string $name
 * @property string $description
 * @property int $editor_type
 * @property int $category
 * @property bool $cache_type
 * @property string $plugincode
 * @property int $locked
 * @property string $properties
 * @property int $disabled
 * @property string $moduleguid
 * @property int $createdon
 * @property int $editedon
 *
 * BelongsTo
 * @property null|Category $categories
 *
 * HasMeny
 * @property Collection $alternative
 *
 * Virtual
 * @property-read \Carbon\Carbon $created_at
 * @property-read \Carbon\Carbon $updated_at
 * @property-read bool $isAlreadyEdit
 * @property-read null|array $alreadyEditInfo
 * @property-read mixed $already_edit_info
 * @property-read mixed $is_already_edit
 *
 * @method static Builder|SitePlugin activePhx()
 * @method static Builder|SitePlugin disabledAlternative()
 * @method static Builder|SitePlugin lockedView()
 */
class SitePlugin extends Model
{
    use Traits\Models\ManagerActions,
        Traits\Models\LockedElements,
        Traits\Models\TimeMutator;

    const CREATED_AT = 'createdon';
    const UPDATED_AT = 'editedon';

    protected $dateFormat = 'U';

    protected $casts = [
        'editor_type' => 'int',
        'category' => 'int',
        'cache_type' => 'bool',
        'locked' => 'int',
        'disabled' => 'int',
        'createdon' => 'int',
        'editedon' => 'int',
    ];

    protected $fillable = [
        'name',
        'description',
        'editor_type',
        'category',
        'cache_type',
        'plugincode',
        'locked',
        'properties',
        'disabled',
        'moduleguid',
    ];

    protected array $managerActionsMap = [
        'actions.cancel' => 76,
        'actions.new' => 101,
        'actions.sort' => 100,
        'actions.purge' => 119,
        'id' => [
            'actions.edit' => 102,
            'actions.save' => 103,
            'actions.enable' => 103,
            'actions.disable' => 103,
            'actions.delete' => 104,
            'actions.duplicate' => 105,
        ],
    ];

    public function scopeActivePhx(Builder $builder): Builder
    {
        return $builder->where('disabled', '!=', 1)
            ->where('plugincode', 'LIKE', "%phx.parser.class.inc.php%OnParseDocument();%");
    }

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

    public function alternative(): HasMany
    {
        return $this->hasMany(__CLASS__, 'name', 'name')
            ->where('id', '!=', $this->getKey());
    }

    public function scopeDisabledAlternative(Builder $builder): Builder
    {
        return $builder->lockedView()->where('disabled', '0')
            ->whereHas('alternative', function (Builder $builder) {
                return $builder->lockedView()->where('disabled', '1');
            });
    }

    public function getIsAlreadyEditAttribute(): bool
    {
        return array_key_exists($this->getKey(), self::getLockedElements(5));
    }

    public function getAlreadyEditInfoAttribute(): ?array
    {
        return $this->isAlreadyEdit ? self::getLockedElements(5)[$this->getKey()] : null;
    }
}
