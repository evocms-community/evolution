<?php

namespace EvolutionCMS\Models;

use EvolutionCMS\Traits;
use Illuminate\Database\Eloquent;
use Illuminate\Support\Str;

/**
 * EvolutionCMS\Models\SiteTemplate
 *
 * @property int $id
 * @property string $templatename
 * @property string $description
 * @property string $templatealias
 * @property string $templatecontroller
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
 * @method static \Illuminate\Database\Eloquent\Builder|\EvolutionCMS\Models\SiteTemplate lockedView()
 *
 * @mixin \Eloquent
 */
class SiteTemplate extends Eloquent\Model
{
    use Traits\Models\ManagerActions,
        Traits\Models\LockedElements,
        Traits\Models\TimeMutator;

    const CREATED_AT = 'createdon';
    const UPDATED_AT = 'editedon';
    protected $dateFormat = 'U';

    protected $attributes = [
        'templatename' => 'Untitled template',
        'templatealias' => '',
        'templatecontroller' => '',
        'description' => 'Template',
        'editor_type' => 0,
        'category' => 0,
        'icon' => '',
        'template_type' => 0,
        'locked' => 0,
        'selectable' => 1,
    ];

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

    protected $managerActionsMap = [
        'actions.cancel' => 76,
        'actions.new' => 19,
        'id' => [
            'actions.edit' => 16,
            'actions.save' => 20,
            'actions.delete' => 21,
            'actions.duplicate' => 96,
        ],
    ];

    public function getNameAttribute()
    {
        return $this->templatename;
    }

    /**
     * @param $value
     *
     * @return $this
     */
    public function setNameAttribute($value): static
    {
        $this->templatename = $value;

        return $this;
    }

    /**
     * @param $value
     *
     * @return $this
     */
    public function setTemplatealiasAttribute($value): static
    {
        $this->attributes['templatealias'] = Str::lower(evo()->stripAlias(trim($value)));

        return $this;
    }

    /**
     * @param $value
     *
     * @return $this
     */
    public function setCategoryAttribute($value): static
    {
        $category = Category::query()->findOrNew($value);

        if ($category->exists) {
            $this->attributes['category'] = $category->getKey();
        } elseif ($value) {
            $this->attributes['category'] = $category->updateOrCreate(['category' => $value])->getKey();
        }

        return $this;
    }

    /**
     * @param $value
     *
     * @return $this
     */
    public function setSelectableAttribute($value): static
    {
        $this->attributes['selectable'] =
            $this->getKey() == evo()->getConfig('default_template') ? 1 : ($value ? 1 : 0);

        return $this;
    }

    public function categories(): Eloquent\Relations\BelongsTo
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

    /**
     * @return Eloquent\Relations\BelongsToMany
     */
    public function tvs(): Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(
            SiteTmplvar::class,
            (new SiteTmplvarTemplate())->getTable(),
            'templateid',
            'tmplvarid'
        )
            ->withPivot('rank')
            ->orderBy('pivot_rank', 'ASC');
    }

    public function getCreatedAtAttribute()
    {
        return $this->convertTimestamp($this->createdon);
    }

    public function getUpdatedAtAttribute()
    {
        return $this->convertTimestamp($this->editedon);
    }

    public function getIsAlreadyEditAttribute()
    {
        return array_key_exists($this->getKey(), self::getLockedElements(1));
    }

    public function getAlreadyEditInfoAttribute(): ?array
    {
        return $this->isAlreadyEdit ? self::getLockedElements(1)[$this->getKey()] : null;
    }
}
