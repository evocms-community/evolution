<?php

namespace EvolutionCMS\Models;

use EvolutionCMS\Traits;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Carbon;

/**
 * @property int $id
 * @property string $templatename
 * @property string $description
 * @property int $editor_type
 * @property int $category
 * @property string $icon
 * @property int $template_type
 * @property string $content
 * @property int $locked
 * @property int $selectable
 * @property int $createdon
 * @property int $editedon
 *
 * Virtual
 * @property string $name Alias for templatename
 * @property-read \Carbon\Carbon $created_at
 * @property-read \Carbon\Carbon $updated_at
 * @property-read bool $isAlreadyEdit
 * @property-read null|array $alreadyEditInfo
 *
 * BelongsTo
 * @property null|Category $categories
 *
 * BelongsToMany
 * @property Eloquent\Collection $tvs
 * @property-read mixed $already_edit_info
 * @property-read mixed $is_already_edit
 *
 * @method static Builder|SiteTemplate lockedView()
 */
class SiteTemplate extends Model
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
        'template_type' => 'int',
        'locked' => 'int',
        'selectable' => 'int',
        'createdon' => 'int',
        'editedon' => 'int',
    ];

    protected $fillable = [
        'templatename',
        'templatealias',
        'templatecontroller',
        'description',
        'editor_type',
        'category',
        'icon',
        'template_type',
        'content',
        'locked',
        'selectable',
    ];

    protected array $managerActionsMap = [
        'actions.cancel' => 76,
        'actions.new' => 19,
        'id' => [
            'actions.edit' => 16,
            'actions.save' => 20,
            'actions.delete' => 21,
            'actions.duplicate' => 96,
        ],
    ];

    public function getNameAttribute(): string
    {
        return $this->templatename;
    }

    public function setNameAttribute($val): void
    {
        $this->templatename = $val;
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

    /**
     * @return BelongsToMany
     */
    public function tvs(): BelongsToMany
    {
        return $this->belongsToMany(
            SiteTmplvar::class,
            (new SiteTmplvarTemplate())->getTable(),
            'templateid',
            'tmplvarid'
        )->withPivot('rank')
            ->orderBy('pivot_rank', 'ASC');
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
        return array_key_exists($this->getKey(), self::getLockedElements(1));
    }

    public function getAlreadyEditInfoAttribute(): ?array
    {
        return $this->isAlreadyEdit ? self::getLockedElements(1)[$this->getKey()] : null;
    }
}
