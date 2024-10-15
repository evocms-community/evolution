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
 * @property string $editor_name
 * @property int $category
 * @property bool $cache_type
 * @property string $snippet
 * @property int $locked
 * @property int $createdon
 * @property int $editedon
 * @property int $disabled
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
 * @method static Builder|SiteHtmlsnippet lockedView()
 */
class SiteHtmlsnippet extends Model
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
        'createdon' => 'int',
        'editedon' => 'int',
        'disabled' => 'int',
    ];

    protected $fillable = [
        'name',
        'description',
        'editor_type',
        'editor_name',
        'category',
        'cache_type',
        'snippet',
        'locked',
        'disabled',
    ];

    protected array $managerActionsMap = [
        'actions.cancel' => 76,
        'actions.new' => 77,
        'id' => [
            'actions.edit' => 78,
            'actions.save' => 79,
            'actions.enable' => 79,
            'actions.disable' => 79,
            'actions.delete' => 80,
            'actions.duplicate' => 97,
        ],
    ];

    public function categories(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'category', 'id');
    }

    public function categoryName($default = '')
    {
        return $this->categories === null ? $default : $this->categories->category;
    }

    public function categoryId()
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

    public function getIsAlreadyEditAttribute(): bool
    {
        return array_key_exists($this->getKey(), self::getLockedElements(3));
    }

    public function getAlreadyEditInfoAttribute(): ?array
    {
        return $this->isAlreadyEdit ? self::getLockedElements(3)[$this->getKey()] : null;
    }
}
