<?php

namespace EvolutionCMS\Models;

use EvolutionCMS\Traits;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Carbon;

/**
 * @property int $id
 * @property string $type
 * @property string $name
 * @property string $caption
 * @property string $description
 * @property int $editor_type
 * @property int $category
 * @property int $locked
 * @property string $elements
 * @property string $properties
 * @property int $rank
 * @property string $display
 * @property string $display_params
 * @property string $default_text
 * @property int $createdon
 * @property int $editedon
 *
 * BelongsTo
 * @property null|Category $categories
 *
 * BelongsToMany
 * @property Collection|SiteTemplate[] $templates
 * @property Collection|UserRole[] $userRoles
 *
 * Virtual
 * @property-read \Carbon\Carbon $created_at
 * @property-read \Carbon\Carbon $updated_at
 * @property-read bool $isAlreadyEdit
 * @property-read null|array $alreadyEditInfo
 * @property-read mixed $already_edit_info
 * @property-read mixed $is_already_edit
 *
 * @method static Builder|SiteTmplvar lockedView()
 */
class SiteTmplvar extends Model
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
        'locked' => 'int',
        'rank' => 'int',
        'createdon' => 'int',
        'editedon' => 'int',
    ];

    protected $fillable = [
        'type',
        'name',
        'caption',
        'description',
        'editor_type',
        'category',
        'locked',
        'elements',
        'rank',
        'display',
        'display_params',
        'default_text',
        'properties',
    ];

    protected array $managerActionsMap = [
        'actions.cancel' => 76,
        'actions.new' => 300,
        'actions.sort' => 305,
        'id' => [
            'actions.edit' => 301,
            'actions.save' => 302,
            'actions.delete' => 303,
            'actions.duplicate' => 304,
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

    /**
     * @return BelongsToMany
     */
    public function templates(): BelongsToMany
    {
        return $this->belongsToMany(
            SiteTemplate::class,
            (new SiteTmplvarTemplate())->getTable(),
            'tmplvarid',
            'templateid'
        )->withPivot('rank')
            ->orderBy('pivot_rank', 'ASC');
    }

    /**
     * @return BelongsToMany
     */
    public function userRoles(): BelongsToMany
    {
        return $this->belongsToMany(
            UserRole::class,
            (new UserRoleVar())->getTable(),
            'tmplvarid',
            'roleid'
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
        return array_key_exists($this->getKey(), self::getLockedElements(2));
    }

    public function getAlreadyEditInfoAttribute(): ?array
    {
        return $this->isAlreadyEdit ? self::getLockedElements(2)[$this->getKey()] : null;
    }

    public function tmplvarContentvalue(): HasMany
    {
        return $this->hasMany(SiteTmplvarContentvalue::class, 'tmplvarid', 'id');
    }

    public function tmplvarAccess(): HasMany
    {
        return $this->hasMany(SiteTmplvarAccess::class, 'tmplvarid', 'id');
    }

    public function tmplvarTemplate(): HasMany
    {
        return $this->hasMany(SiteTmplvarTemplate::class, 'tmplvarid', 'id');
    }

    public function tmplvarUserRole(): HasMany
    {
        return $this->hasMany(UserRoleVar::class, 'tmplvarid', 'id');
    }

    public function tmplvarUservalue(): HasMany
    {
        return $this->hasMany(UserValue::class, 'tmplvarid', 'id');
    }

    public function delete(): ?bool
    {
        $this->tmplvarContentvalue()->delete();
        $this->tmplvarAccess()->delete();
        $this->tmplvarTemplate()->delete();
        $this->tmplvarUserRole()->delete();
        $this->tmplvarUservalue()->delete();

        return parent::delete();
    }

}
