<?php

namespace EvolutionCMS\Models;

use EvolutionCMS\Traits;
use Exception;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Arr;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;
use InvalidArgumentException;
use Throwable;

/**
 * @property int $id
 * @property string $type
 * @property string $contentType
 * @property string $pagetitle
 * @property string $longtitle
 * @property string $description
 * @property string $alias
 * @property string $link_attributes
 * @property int $published
 * @property int $pub_date
 * @property int $unpub_date
 * @property int $parent
 * @property int $isfolder
 * @property string $introtext
 * @property string $content
 * @property bool $richtext
 * @property int $template
 * @property int $menuindex
 * @property int $searchable
 * @property int $cacheable
 * @property int $createdby
 * @property int $createdon
 * @property int $editedby
 * @property int $editedon
 * @property int $deleted
 * @property string $deletedon
 * @property int $deletedby
 * @property int $publishedon
 * @property int $publishedby
 * @property string $menutitle
 * @property bool $hide_from_tree
 * @property bool $privateweb
 * @property bool $privatemgr
 * @property bool $content_dispo
 * @property bool $hidemenu
 * @property int $alias_visible
 *
 * BelongsTo
 * @property SiteContent|null $ancestor
 * @property SiteTemplate|null $tpl
 *
 * HasMany
 * @property Collection $children
 * @property Collection $templateValues
 *
 * BelongsToMany
 * @property Collection $documentGroups
 *
 * Virtual
 * @property-read \Carbon\Carbon $pub_at
 * @property-read \Carbon\Carbon $unPub_at
 * @property-read \Carbon\Carbon $created_at
 * @property-read \Carbon\Carbon $updated_at
 * @property-read \Carbon\Carbon $deleted_at
 * @property-read bool $isAlreadyEdit
 * @property-read null|array $alreadyEditInfo
 * @property-read mixed $already_edit_info
 * @property-read mixed $is_already_edit
 * @property-read mixed $node_name
 * @property-read mixed $un_pub_at
 * @property-read bool $wasNull
 *
 * Scope
 * @method static Builder publishDocuments($time)
 * @method static Builder unPublishDocuments($time)
 */
class SiteContent extends Model
{
    use Traits\Models\SoftDeletes,
        Traits\Models\ManagerActions,
        Traits\Models\TimeMutator;

    const CREATED_AT = 'createdon';
    const UPDATED_AT = 'editedon';
    const DELETED_AT = 'deletedon';
    const DELETED = 'deleted';

    const CHILDREN_RELATION_NAME = 'children';

    protected $table = 'site_content';

    protected $dateFormat = 'U';

    /**
     * ClosureTable model instance.
     *
     * @var ClosureTable
     */
    protected $closure = ClosureTable::class;

    /**
     * Cached "previous" (i.e. before the model is moved) direct ancestor id of this model.
     *
     * @var null|int
     */
    private ?int $previousParentId;

    /**
     * Cached "previous" (i.e. before the model is moved) model position.
     *
     * @var null|int
     */
    private ?int $previousPosition;

    /**
     * Whether this node is being moved to another parent node.
     *
     * @var bool
     */
    private bool $isMoved = false;

    /**
     * Indicates if the model should soft delete.
     *
     * @var bool
     */
    protected bool $softDelete = true;

    protected $fillable = [
        'type',
        'contentType',
        'pagetitle',
        'longtitle',
        'description',
        'alias',
        'link_attributes',
        'published',
        'pub_date',
        'unpub_date',
        'parent',
        'isfolder',
        'introtext',
        'content',
        'richtext',
        'template',
        'menuindex',
        'searchable',
        'cacheable',
        'createdby',
        'editedby',
        'deleted',
        'deletedby',
        'publishedon',
        'publishedby',
        'menutitle',
        'hide_from_tree',
        'privateweb',
        'privatemgr',
        'content_dispo',
        'hidemenu',
        'alias_visible',
    ];

    protected $casts = [
        'published' => 'int',
        'pub_date' => 'int',
        'unpub_date' => 'int',
        'parent' => 'int',
        'isfolder' => 'int',
        'richtext' => 'bool',
        'template' => 'int',
        'menuindex' => 'int',
        'searchable' => 'int',
        'cacheable' => 'int',
        'createdby' => 'int',
        'editedby' => 'int',
        'deleted' => 'int',
        'deletedby' => 'int',
        'publishedon' => 'int',
        'publishedby' => 'int',
        'hide_from_tree' => 'bool',
        'privateweb' => 'bool',
        'privatemgr' => 'bool',
        'content_dispo' => 'bool',
        'hidemenu' => 'bool',
        'alias_visible' => 'int',
    ];

    protected array $managerActionsMap = [
        'id' => [
            'actions.info' => 3,
        ],
    ];

    /**
     * @param array $attributes
     */
    public function __construct(array $attributes = [])
    {
        $position = $this->getPositionColumn();

        $this->fillable(array_merge($this->getFillable(), [$position]));

        if (isset($attributes[$position]) && $attributes[$position] < 0) {
            $attributes[$position] = 0;
        }

        $this->closure = new $this->closure;

        // The default class name of the closure table was not changed
        // so we define and set default closure table name automagically.
        // This can prevent useless copy paste of closure table models.
        if (get_class($this->closure) === ClosureTable::class) {
            $table = $this->getTable() . '_closure';
            $this->closure->setTable($table);
        }

        parent::__construct($attributes);
    }

    // adjust boot function
    public static function boot(): void
    {
        // run parent
        parent::boot();

        static::updating(static function (SiteContent $entity) {
            $entity->editedby = evo()->getLoginUserID();
        });

        static::saving(static function (SiteContent $entity) {
            if ($entity->isDirty($entity->getPositionColumn())) {
                $latest = static::getLatestPosition($entity);
                $entity->menuindex = max(0, min($entity->menuindex, $latest));
            } elseif (!$entity->exists) {
                $entity->menuindex = static::getLatestPosition($entity);
            }
        });

        static::creating(static function (SiteContent $entity) {
            $entity->createdby = evo()->getLoginUserID();
        });
        // When entity is created, the appropriate
        // data will be put into the closure table.
        static::created(static function (SiteContent $entity) {
            $entity->previousParentId = null;
            $entity->previousPosition = null;

            $descendant = $entity->getKey();
            $ancestor = isset($entity->parent) ? $entity->parent : $descendant;

            $entity->closure->insertNode($ancestor, $descendant);
        });

        static::updated(static function (SiteContent $entity) {
            $parentIdChanged = $entity->isDirty($entity->getParentIdColumn());

            if ($parentIdChanged || $entity->isDirty($entity->getPositionColumn())) {
                $entity->reorderSiblings();
            }

            if ($entity->closure->ancestor === null) {
                $primaryKey = $entity->getKey();
                $entity->closure->ancestor = $primaryKey;
                $entity->closure->descendant = $primaryKey;
                $entity->closure->depth = 0;
            }

            if ($parentIdChanged) {
                $entity->closure->moveNodeTo($entity->parent);
            }
        });

        // add in custom deleting
        static::deleting(function ($model) {
            // save custom delete value
            $model->deleted = 1;
            $model->save();
        });

        // add in custom restoring
        static::restoring(function ($model) {
            // save custom delete value
            $model->deleted = 0;
            $model->save();
        });
    }

    /**
     * @return mixed
     */
    public function getNodeNameAttribute(): mixed
    {
        $key = Config::get('global.resource_tree_node_name', 'pagetitle');
        if (mb_strtolower($key) === 'nodename') {
            $key = 'pagetitle';
        }

        return $this->getAttributeValue($key);
    }

    /**
     * @return Carbon|null
     */
    public function getCreatedAtAttribute(): ?Carbon
    {
        return $this->convertTimestamp($this->createdon);
    }

    /**
     * @return Carbon|null
     */
    public function getUpdatedAtAttribute(): ?Carbon
    {
        return $this->convertTimestamp($this->editedon);
    }

    /**
     * @return Carbon|null
     */
    public function getDeletedAtAttribute(): ?Carbon
    {
        return $this->convertTimestamp($this->deletedon);
    }

    /**
     * @return Carbon|null
     */
    public function getPubAtAttribute(): ?Carbon
    {
        return $this->convertTimestamp($this->pub_date);
    }

    /**
     * @return Carbon|null
     */
    public function getUnPubAtAttribute(): ?Carbon
    {
        return $this->convertTimestamp($this->unpub_date);
    }

    /**
     * @return bool
     */
    public function getWasNullAttribute(): bool
    {
        return trim($this->content) === '' && $this->template === 0;
    }

    /**
     * @return bool
     */
    public function getIsAlreadyEditAttribute(): bool
    {
        return array_key_exists($this->getKey(), self::getLockedElements(7));
    }

    /**
     * @return array|null
     */
    public function getAlreadyEditInfoAttribute(): ?array
    {
        return $this->isAlreadyEdit ? self::getLockedElements(7)[$this->getKey()] : null;
    }

    /**
     * @param $parent
     *
     * @return array
     */
    public function getAllChildren($parent): array
    {
        $ids = [];
        foreach ($parent->children as $child) {
            $ids[] = $child->id;
            $ids = array_merge($ids, $this->getAllChildren($child));
        }

        return $ids;
    }

    /**
     * @return Collection
     */
    public function getTvAttribute(): Collection
    {
        if ($this->tpl->tvs === null) {
            return collect();
        }

        $docTv = $this->templateValues->pluck('value', 'tmplvarid');

        return $this->tpl->tvs->map(function (SiteTmplvar $value) use ($docTv) {
            $out = $value->default_text;
            if ($docTv->has($value->getKey())) {
                $out = $docTv->get($value->getKey());
            }

            return ['name' => $value->name, 'value' => $out];
        });
    }

    /**
     * @param Builder $builder
     * @param $time
     *
     * @return Builder
     */
    public function scopePublishDocuments(Builder $builder, $time): Builder
    {
        return $builder->where('pub_date', '<=', $time)
            ->where('pub_date', '>', 0)
            ->where(function (Builder $query) use ($time) {
                $query->where('unpub_date', '>', $time)
                    ->orWhere('unpub_date', '=', 0);
            })
            ->where('published', '=', 0);
    }

    /**
     * @param Builder $builder
     * @param $time
     *
     * @return Builder
     */
    public function scopeUnPublishDocuments(Builder $builder, $time): Builder
    {
        return $builder->where('unpub_date', '<=', $time)
            ->where('unpub_date', '>', 0)
            ->where('published', '=', 1);
    }

    /**
     * @return HasMany
     */
    public function templateValues(): HasMany
    {
        return $this->hasMany(SiteTmplvarContentvalue::class, 'contentid', 'id');
    }

    /**
     * @return BelongsTo
     */
    public function ancestor(): BelongsTo
    {
        return $this->belongsTo(__CLASS__, 'parent')
            ->withTrashed();
    }

    /**
     * @return HasMany
     */
    public function children(): HasMany
    {
        return $this->hasMany(get_class($this), $this->getParentIdColumn())
            ->withTrashed();
    }

    /**
     * @return BelongsToMany
     */
    public function documentGroups(): BelongsToMany
    {
        return $this->belongsToMany(DocumentgroupName::class, 'document_groups', 'document', 'document_group');
    }

    /**
     * @return BelongsTo
     */
    public function tpl(): BelongsTo
    {
        return $this->belongsTo(SiteTemplate::class, 'template', 'id')
            ->withDefault();
    }

    public function newFromBuilder($attributes = [], $connection = null): SiteContent
    {
        $instance = parent::newFromBuilder($attributes);
        $instance->previousParentId = $instance->parent;
        $instance->previousPosition = $instance->menuindex;

        return $instance;
    }

    /**
     * Gets value of the "parent id" attribute.
     *
     * @return int
     */
    public function getParentIdAttribute(): int
    {
        return $this->getAttributeFromArray($this->getParentIdColumn());
    }

    /**
     * Sets new parent id and caches the old one.
     *
     * @param int $value
     */
    public function setParentIdAttribute(int $value): void
    {
        if ($this->parent === $value) {
            return;
        }

        $parentId = $this->getParentIdColumn();
        $this->previousParentId = $this->original[$parentId] ?? null;
        $this->attributes[$parentId] = $value;
    }

    /**
     * Gets the fully qualified "parent id" column.
     *
     * @return string
     */
    public function getQualifiedParentIdColumn(): string
    {
        return $this->getTable() . '.' . $this->getParentIdColumn();
    }

    /**
     * Gets the short name of the "parent id" column.
     *
     * @return string
     */
    public function getParentIdColumn(): string
    {
        return 'parent';
    }

    /**
     * Get the name of the "deleted" column.
     *
     * @return string
     */
    public function getDeletedColumn(): string
    {
        return defined('static::DELETED') ? static::DELETED : 'deleted';
    }

    /**
     * Get the fully qualified "deleted" column.
     *
     * @return string
     */
    public function getQualifiedDeletedColumn(): string
    {
        return $this->qualifyColumn($this->getDeletedColumn());
    }

    /**
     * Gets value of the "position" attribute.
     *
     * @return int
     */
    public function getPositionAttribute(): int
    {
        return $this->getAttributeFromArray($this->getPositionColumn());
    }

    /**
     * Sets new position and caches the old one.
     *
     * @param int $value
     */
    public function setPositionAttribute(int $value): void
    {
        if ($this->menuindex === $value) {
            return;
        }

        $position = $this->getPositionColumn();
        $this->previousPosition = $this->original[$position] ?? null;
        $this->attributes[$position] = max(0, $value);
    }

    /**
     * Gets the fully qualified "position" column.
     *
     * @return string
     */
    public function getQualifiedPositionColumn(): string
    {
        return $this->getTable() . '.' . $this->getPositionColumn();
    }

    /**
     * Gets the short name of the "position" column.
     *
     * @return string
     */
    public function getPositionColumn(): string
    {
        return 'menuindex';
    }

    /**
     * Gets the fully qualified "real depth" column.
     *
     * @return string
     */
    public function getQualifiedRealDepthColumn(): string
    {
        return $this->getTable() . '.' . $this->getRealDepthColumn();
    }

    /**
     * Indicates whether the model is a parent.
     *
     * @return bool
     */
    public function isParent(): bool
    {
        return $this->exists && $this->hasChildren();
    }

    /**
     * Indicates whether the model has no ancestors.
     *
     * @return bool
     */
    public function isRoot(): bool
    {
        return $this->exists && $this->parent === null;
    }

    /**
     * Retrieves direct ancestor of a model.
     *
     * @param array $columns
     *
     * @return SiteContent|null
     */
    public function getParent(array $columns = ['*']): ?SiteContent
    {
        return $this->exists ? $this->find($this->parent, $columns) : null;
    }

    /**
     * Returns query builder for ancestors.
     *
     * @param Builder $builder
     *
     * @return Builder
     */
    public function scopeAncestors(Builder $builder): Builder
    {
        return $this->buildAncestorsQuery($builder, $this->getKey(), false);
    }

    /**
     * Returns query builder for ancestors of the node with the given ID.
     *
     * @param Builder $builder
     * @param int $id
     *
     * @return Builder
     */
    public function scopeAncestorsOf(Builder $builder, int $id): Builder
    {
        return $this->buildAncestorsQuery($builder, $id, false);
    }

    /**
     * Returns query builder for ancestors including the current node.
     *
     * @param Builder $builder
     *
     * @return Builder
     */
    public function scopeAncestorsWithSelf(Builder $builder): Builder
    {
        return $this->buildAncestorsQuery($builder, $this->getKey(), true);
    }

    /**
     * Returns query builder for ancestors of the node with given ID including that node also.
     *
     * @param Builder $builder
     * @param int $id
     *
     * @return Builder
     */
    public function scopeAncestorsWithSelfOf(Builder $builder, int $id): Builder
    {
        return $this->buildAncestorsQuery($builder, $id, true);
    }

    /**
     * Builds base ancestors query.
     *
     * @param Builder $builder
     * @param int $id
     * @param bool $withSelf
     *
     * @return Builder
     */
    private function buildAncestorsQuery(Builder $builder, int $id, bool $withSelf): Builder
    {
        $depthOperator = $withSelf ? '>=' : '>';

        return $builder
            ->join(
                $this->closure->getTable(),
                $this->closure->getAncestorColumn(),
                '=',
                $this->getQualifiedKeyName()
            )
            ->where($this->closure->getDescendantColumn(), '=', $id)
            ->where($this->closure->getDepthColumn(), $depthOperator, 0);
    }

    /**
     * Retrieves all ancestors of a model.
     *
     * @param array $columns
     *
     * @return Collection
     */
    public function getAncestors(array $columns = ['*']): Collection
    {
        return $this->ancestors()->get($columns);
    }

    /**
     * Returns a number of model's ancestors.
     *
     * @return int
     */
    public function countAncestors(): int
    {
        return $this->ancestors()->count();
    }

    /**
     * Indicates whether a model has ancestors.
     *
     * @return bool
     */
    public function hasAncestors(): bool
    {
        return (bool) $this->countAncestors();
    }

    /**
     * Returns query builder for descendants.
     *
     * @param Builder $builder
     *
     * @return Builder
     */
    public function scopeDescendants(Builder $builder): Builder
    {
        return $this->buildDescendantsQuery($builder, $this->getKey(), false);
    }

    /**
     * Returns query builder for descendants of the node with the given ID.
     *
     * @param Builder $builder
     * @param int $id
     *
     * @return Builder
     */
    public function scopeDescendantsOf(Builder $builder, int $id): Builder
    {
        return $this->buildDescendantsQuery($builder, $id, false);
    }

    /**
     * Returns query builder for descendants including the current node.
     *
     * @param Builder $builder
     *
     * @return Builder
     */
    public function scopeDescendantsWithSelf(Builder $builder): Builder
    {
        return $this->buildDescendantsQuery($builder, $this->getKey(), true);
    }

    /**
     * Returns query builder for descendants including the current node of the given ID.
     *
     * @param Builder $builder
     * @param int $id
     *
     * @return Builder
     */
    public function scopeDescendantsWithSelfOf(Builder $builder, int $id): Builder
    {
        return $this->buildDescendantsQuery($builder, $id, true);
    }

    /**
     * Builds base descendants query.
     *
     * @param Builder $builder
     * @param int $id
     * @param bool $withSelf
     *
     * @return Builder
     */
    private function buildDescendantsQuery(Builder $builder, int $id, bool $withSelf): Builder
    {
        $depthOperator = $withSelf ? '>=' : '>';

        return $builder
            ->join(
                $this->closure->getTable(),
                $this->closure->getDescendantColumn(),
                '=',
                $this->getQualifiedKeyName()
            )
            ->where($this->closure->getAncestorColumn(), '=', $id)
            ->where($this->closure->getDepthColumn(), $depthOperator, 0);
    }

    /**
     * Retrieves all descendants of a model.
     *
     * @param array $columns
     *
     * @return Collection
     */
    public function getDescendants(array $columns = ['*']): Collection
    {
        return $this->descendants()->get($columns);
    }

    /**
     * Returns a number of model's descendants.
     *
     * @return int
     */
    public function countDescendants(): int
    {
        return $this->descendants()->count();
    }

    /**
     * Indicates whether a model has descendants.
     *
     * @return bool
     */
    public function hasDescendants(): bool
    {
        return (bool) $this->countDescendants();
    }

    /**
     * Retrieves all children of a model.
     *
     * @param array $columns
     *
     * @return Collection
     */
    public function getChildren(array $columns = ['*']): Collection
    {
        return $this->children()->get($columns);
    }

    /**
     * Returns a number of model's children.
     *
     * @return int
     */
    public function countChildren(): int
    {
        return $this->children()->count();
    }

    /**
     *  Indicates whether a model has children.
     *
     * @return bool
     */
    public function hasChildren(): bool
    {
        return (bool) $this->countChildren();
    }

    /**
     * Returns query builder for child nodes.
     *
     * @param Builder $builder
     *
     * @return Builder
     */
    public function scopeChildNode(Builder $builder): Builder
    {
        return $this->scopeChildNodeOf($builder, $this->getKey());
    }

    /**
     * Returns query builder for child nodes of the node with the given ID.
     *
     * @param Builder $builder
     * @param int $id
     *
     * @return Builder
     */
    public function scopeChildNodeOf(Builder $builder, int $id): Builder
    {
        $parentId = $this->getParentIdColumn();

        return $builder
            ->whereNotNull($parentId)
            ->where($parentId, '=', $id);
    }

    /**
     * Returns query builder for a child at the given position.
     *
     * @param Builder $builder
     * @param int $position
     *
     * @return Builder
     */
    public function scopeChildAt(Builder $builder, int $position): Builder
    {
        return $this
            ->scopeChildNode($builder)
            ->where($this->getPositionColumn(), $position);
    }

    /**
     * Returns query builder for a child at the given position of the node with the given ID.
     *
     * @param Builder $builder
     * @param int $id
     * @param int $position
     *
     * @return Builder
     */
    public function scopeChildOf(Builder $builder, int $id, int $position): Builder
    {
        return $this
            ->scopeChildNodeOf($builder, $id)
            ->where($this->getPositionColumn(), $position);
    }

    /**
     * Retrieves a child with given position.
     *
     * @param int $position
     * @param array $columns
     *
     * @return SiteContent|null
     */
    public function getChildAt(int $position, array $columns = ['*']): ?SiteContent
    {
        return $this->childAt($position)->first($columns);
    }

    /**
     * Returns query builder for the first child node.
     *
     * @param Builder $builder
     *
     * @return Builder
     */
    public function scopeFirstChild(Builder $builder): Builder
    {
        return $this->scopeChildAt($builder, 0);
    }

    /**
     * Returns query builder for the first child node of the node with the given ID.
     *
     * @param Builder $builder
     * @param int $id
     *
     * @return Builder
     */
    public function scopeFirstChildOf(Builder $builder, int $id): Builder
    {
        return $this->scopeChildOf($builder, $id, 0);
    }

    /**
     * Retrieves the first child.
     *
     * @param array $columns
     *
     * @return SiteContent
     */
    public function getFirstChild(array $columns = ['*']): SiteContent
    {
        return $this->getChildAt(0, $columns);
    }

    /**
     * Returns query builder for the last child node.
     *
     * @param Builder $builder
     *
     * @return Builder
     */
    public function scopeLastChild(Builder $builder): Builder
    {
        return $this->scopeChildNode($builder)->orderByDesc($this->getPositionColumn());
    }

    /**
     * Returns query builder for the last child node of the node with the given ID.
     *
     * @param Builder $builder
     * @param int $id
     *
     * @return Builder
     */
    public function scopeLastChildOf(Builder $builder, int $id): Builder
    {
        return $this->scopeChildNodeOf($builder, $id)->orderByDesc($this->getPositionColumn());
    }

    /**
     * Retrieves the last child.
     *
     * @param array $columns
     *
     * @return SiteContent
     */
    public function getLastChild(array $columns = ['*']): SiteContent
    {
        return $this->lastChild()->first($columns);
    }

    /**
     * Returns query builder to child nodes in the range of the given positions.
     *
     * @param Builder $builder
     * @param int $from
     * @param int|null $to
     *
     * @return Builder
     */
    public function scopeChildrenRange(Builder $builder, int $from, int $to = null): Builder
    {
        $position = $this->getPositionColumn();
        $query = $this->scopeChildNode($builder)->where($position, '>=', $from);

        if ($to !== null) {
            $query->where($position, '<=', $to);
        }

        return $query;
    }

    /**
     * Returns query builder to child nodes in the range of the given positions for the node of the given ID.
     *
     * @param Builder $builder
     * @param int $id
     * @param int $from
     * @param int|null $to
     *
     * @return Builder
     */
    public function scopeChildrenRangeOf(Builder $builder, int $id, int $from, int $to = null): Builder
    {
        $position = $this->getPositionColumn();
        $query = $this->scopeChildNodeOf($builder, $id)->where($position, '>=', $from);

        if ($to !== null) {
            $query->where($position, '<=', $to);
        }

        return $query;
    }

    /**
     * Retrieves children within given positions range.
     *
     * @param int $from
     * @param int|null $to
     * @param array $columns
     *
     * @return Collection
     */
    public function getChildrenRange(int $from, int $to = null, array $columns = ['*']): Collection
    {
        return $this->childrenRange($from, $to)->get($columns);
    }

    /**
     * Appends a child to the model.
     *
     * @param SiteContent $child
     * @param int|null $position
     * @param bool $returnChild
     *
     * @return SiteContent
     */
    public function addChild(SiteContent $child, int $position = null, bool $returnChild = false): SiteContent | static
    {
        if ($this->exists) {
            $position = $position !== null ? $position : $this->getLatestChildPosition();

            $child->moveTo($position, $this);
        }

        return $returnChild === true ? $child : $this;
    }

    /**
     * Returns the latest child position.
     *
     * @return int
     */
    private function getLatestChildPosition(): int
    {
        $lastChild = $this->lastChild()->first([$this->getPositionColumn()]);

        return $lastChild !== null ? $lastChild->menuindex + 1 : 0;
    }

    /**
     * Appends a collection of children to the model.
     *
     * @param SiteContent[] $children
     * @param null $from
     *
     * @return SiteContent
     * @throws Throwable
     */
    public function addChildren(array $children, $from = null): static
    {
        if (!$this->exists) {
            return $this;
        }

        $this->transactional(function () use (&$from, $children) {
            foreach ($children as $child) {
                $this->addChild($child, $from);
                $from++;
            }
        });

        return $this;
    }

    /**
     * Appends the given entity to the children relation.
     *
     * @param SiteContent $entity
     *
     * @internal
     */
    public function appendChild(SiteContent $entity): void
    {
        $this->getChildrenRelation()->add($entity);
    }

    /**
     * @return Collection
     */
    private function getChildrenRelation(): Collection
    {
        if (!$this->relationLoaded(static::CHILDREN_RELATION_NAME)) {
            $this->setRelation(static::CHILDREN_RELATION_NAME, new Collection());
        }

        return $this->getRelation(static::CHILDREN_RELATION_NAME);
    }

    /**
     * Removes a model's child with given position.
     *
     * @param int|null $position
     * @param bool $forceDelete
     *
     * @return SiteContent
     * @throws Throwable
     */
    public function removeChild(int $position = null, bool $forceDelete = false): static
    {
        if (!$this->exists) {
            return $this;
        }

        $child = $this->getChildAt($position, [
            $this->getKeyName(),
            $this->getParentIdColumn(),
            $this->getPositionColumn(),
        ]);

        if ($child === null) {
            return $this;
        }

        $this->transactional(function () use ($child, $forceDelete) {
            $action = ($forceDelete === true ? 'forceDelete' : 'delete');

            $child->{$action}();

            $child->nextSiblings()->decrement($this->getPositionColumn());
        });

        return $this;
    }

    /**
     * Removes model's children within a range of positions.
     *
     * @param int $from
     * @param int|null $to
     * @param bool $forceDelete
     *
     * @return SiteContent
     * @throws InvalidArgumentException
     * @throws Throwable
     */
    public function removeChildren(int $from, int $to = null, bool $forceDelete = false): static
    {
        if (!is_numeric($from) || ($to !== null && !is_numeric($to))) {
            throw new InvalidArgumentException(
                '`from` and `to` are the position boundaries. They must be of type int.'
            );
        }

        if (!$this->exists) {
            return $this;
        }

        $this->transactional(function () use ($from, $to, $forceDelete) {
            $action = ($forceDelete === true ? 'forceDelete' : 'delete');

            $this->childrenRange($from, $to)->{$action}();

            if ($to !== null) {
                $this
                    ->childrenRange($to)
                    ->decrement($this->getPositionColumn(), $to - $from + 1);
            }
        });

        return $this;
    }

    /**
     * Returns sibling query builder.
     *
     * @param Builder $builder
     *
     * @return Builder
     */
    public function scopeSibling(Builder $builder): Builder
    {
        return $builder->where($this->getParentIdColumn(), '=', $this->parent);
    }

    /**
     * Returns query builder for siblings of a node with the given ID.
     *
     * @param Builder $builder
     * @param int $id
     *
     * @return Builder
     */
    public function scopeSiblingOf(Builder $builder, int $id): Builder
    {
        return $this->buildSiblingQuery($builder, $id);
    }

    /**
     * Returns siblings query builder.
     *
     * @param Builder $builder
     *
     * @return Builder
     */
    public function scopeSiblings(Builder $builder): Builder
    {
        return $this
            ->scopeSibling($builder)
            ->where($this->getPositionColumn(), '<>', $this->menuindex);
    }

    /**
     * Return query builder for siblings of a node with the given ID.
     *
     * @param Builder $builder
     * @param int $id
     *
     * @return Builder
     */
    public function scopeSiblingsOf(Builder $builder, int $id): Builder
    {
        return $this->buildSiblingQuery($builder, $id, function ($position) {
            return function (Builder $builder) use ($position) {
                $builder->where($this->getPositionColumn(), '<>', $position);
            };
        });
    }

    /**
     * Retrives all siblings of a model.
     *
     * @param array $columns
     *
     * @return Collection
     */
    public function getSiblings(array $columns = ['*']): Collection
    {
        return $this->siblings()->get($columns);
    }

    /**
     * Returns number of model's siblings.
     *
     * @return int
     */
    public function countSiblings(): int
    {
        return $this->siblings()->count();
    }

    /**
     * Indicates whether a model has siblings.
     *
     * @return bool
     */
    public function hasSiblings(): bool
    {
        return (bool) $this->countSiblings();
    }

    /**
     * Returns neighbors query builder.
     *
     * @param Builder $builder
     *
     * @return Builder
     */
    public function scopeNeighbors(Builder $builder): Builder
    {
        $position = $this->menuindex;

        return $this
            ->scopeSiblings($builder)
            ->whereIn($this->getPositionColumn(), [$position - 1, $position + 1]);
    }

    /**
     * Returns query builder for the neighbors of a node with the given ID.
     *
     * @param Builder $builder
     * @param int $id
     *
     * @return Builder
     */
    public function scopeNeighborsOf(Builder $builder, int $id): Builder
    {
        return $this->buildSiblingQuery($builder, $id, function ($position) {
            return function (Builder $builder) use ($position) {
                return $builder->whereIn($this->getPositionColumn(), [$position - 1, $position + 1]);
            };
        });
    }

    /**
     * Retrieves neighbors (immediate previous and immediate next models) of a model.
     *
     * @param array $columns
     *
     * @return Collection
     */
    public function getNeighbors(array $columns = ['*']): Collection
    {
        return $this->neighbors()->get($columns);
    }

    /**
     * Returns query builder for a sibling at the given position.
     *
     * @param Builder $builder
     * @param int $position
     *
     * @return Builder
     */
    public function scopeSiblingAt(Builder $builder, int $position): Builder
    {
        return $this
            ->scopeSiblings($builder)
            ->where($this->getPositionColumn(), '=', $position);
    }

    /**
     * Returns query builder for a sibling at the given position of a node of the given ID.
     *
     * @param Builder $builder
     * @param int $id
     * @param int $position
     *
     * @return Builder
     */
    public function scopeSiblingOfAt(Builder $builder, int $id, int $position): Builder
    {
        return $this
            ->scopeSiblingOf($builder, $id)
            ->where($this->getPositionColumn(), '=', $position);
    }

    /**
     * Retrieves a model's sibling with given position.
     *
     * @param int $position
     * @param array $columns
     *
     * @return SiteContent
     */
    public function getSiblingAt($position, array $columns = ['*']): SiteContent
    {
        return $this->siblingAt($position)->first($columns);
    }

    /**
     * Returns query builder for the first sibling.
     *
     * @param Builder $builder
     *
     * @return Builder
     */
    public function scopeFirstSibling(Builder $builder): Builder
    {
        return $this->scopeSiblingAt($builder, 0);
    }

    /**
     * Returns query builder for the first sibling of a node with the given ID.
     *
     * @param Builder $builder
     * @param mixed $id
     *
     * @return Builder
     */
    public function scopeFirstSiblingOf(Builder $builder, $id): Builder
    {
        return $this->scopeSiblingOfAt($builder, $id, 0);
    }

    /**
     * Retrieves the first model's sibling.
     *
     * @param array $columns
     *
     * @return SiteContent
     */
    public function getFirstSibling(array $columns = ['*']): SiteContent
    {
        return $this->getSiblingAt(0, $columns);
    }

    /**
     * Returns query builder for the last sibling.
     *
     * @param Builder $builder
     *
     * @return Builder
     */
    public function scopeLastSibling(Builder $builder): Builder
    {
        return $this->scopeSiblings($builder)->orderByDesc($this->getPositionColumn());
    }

    /**
     * Returns query builder for the last sibling of a node with the given ID.
     *
     * @param Builder $builder
     * @param mixed $id
     *
     * @return Builder
     */
    public function scopeLastSiblingOf(Builder $builder, $id): Builder
    {
        return $this
            ->scopeSiblingOf($builder, $id)
            ->orderByDesc($this->getPositionColumn())
            ->limit(1);
    }

    /**
     * Retrieves the last model's sibling.
     *
     * @param array $columns
     *
     * @return SiteContent
     */
    public function getLastSibling(array $columns = ['*']): SiteContent
    {
        return $this->lastSibling()->first($columns);
    }

    /**
     * Returns query builder for the previous sibling.
     *
     * @param Builder $builder
     *
     * @return Builder
     */
    public function scopePrevSibling(Builder $builder): Builder
    {
        return $this
            ->scopeSibling($builder)
            ->where($this->getPositionColumn(), '=', $this->menuindex - 1);
    }

    /**
     * Returns query builder for the previous sibling of a node with the given ID.
     *
     * @param Builder $builder
     * @param mixed $id
     *
     * @return Builder
     */
    public function scopePrevSiblingOf(Builder $builder, $id): Builder
    {
        return $this->buildSiblingQuery($builder, $id, function ($position) {
            return function (Builder $builder) use ($position) {
                return $builder->where($this->getPositionColumn(), '=', $position - 1);
            };
        });
    }

    /**
     * Retrieves immediate previous sibling of a model.
     *
     * @param array $columns
     *
     * @return SiteContent
     */
    public function getPrevSibling(array $columns = ['*']): SiteContent
    {
        return $this->prevSibling()->first($columns);
    }

    /**
     * Returns query builder for the previous siblings.
     *
     * @param Builder $builder
     *
     * @return Builder
     */
    public function scopePrevSiblings(Builder $builder): Builder
    {
        return $this
            ->scopeSibling($builder)
            ->where($this->getPositionColumn(), '<', $this->menuindex);
    }

    /**
     * Returns query builder for the previous siblings of a node with the given ID.
     *
     * @param Builder $builder
     * @param mixed $id
     *
     * @return Builder
     */
    public function scopePrevSiblingsOf(Builder $builder, $id): Builder
    {
        return $this->buildSiblingQuery($builder, $id, function ($position) {
            return function (Builder $builder) use ($position) {
                return $builder->where($this->getPositionColumn(), '<', $position);
            };
        });
    }

    /**
     * Retrieves all previous siblings of a model.
     *
     * @param array $columns
     *
     * @return Collection
     */
    public function getPrevSiblings(array $columns = ['*']): Collection
    {
        return $this->prevSiblings()->get($columns);
    }

    /**
     * Returns number of previous siblings of a model.
     *
     * @return int
     */
    public function countPrevSiblings(): int
    {
        return $this->prevSiblings()->count();
    }

    /**
     * Indicates whether a model has previous siblings.
     *
     * @return bool
     */
    public function hasPrevSiblings(): bool
    {
        return (bool) $this->countPrevSiblings();
    }

    /**
     * Returns query builder for the next sibling.
     *
     * @param Builder $builder
     *
     * @return Builder
     */
    public function scopeNextSibling(Builder $builder): Builder
    {
        return $this
            ->scopeSibling($builder)
            ->where($this->getPositionColumn(), '=', $this->menuindex + 1);
    }

    /**
     * Returns query builder for the next sibling of a node with the given ID.
     *
     * @param Builder $builder
     * @param mixed $id
     *
     * @return Builder
     */
    public function scopeNextSiblingOf(Builder $builder, $id): Builder
    {
        return $this->buildSiblingQuery($builder, $id, function ($position) {
            return function (Builder $builder) use ($position) {
                return $builder->where($this->getPositionColumn(), '=', $position + 1);
            };
        });
    }

    /**
     * Retrieves immediate next sibling of a model.
     *
     * @param array $columns
     *
     * @return SiteContent
     */
    public function getNextSibling(array $columns = ['*']): SiteContent
    {
        return $this->nextSibling()->first($columns);
    }

    /**
     * Returns query builder for the next siblings.
     *
     * @param Builder $builder
     *
     * @return Builder
     */
    public function scopeNextSiblings(Builder $builder): Builder
    {
        return $this
            ->scopeSibling($builder)
            ->where($this->getPositionColumn(), '>', $this->menuindex);
    }

    /**
     * Returns query builder for the next siblings of a node with the given ID.
     *
     * @param Builder $builder
     * @param mixed $id
     *
     * @return Builder
     */
    public function scopeNextSiblingsOf(Builder $builder, $id): Builder
    {
        return $this->buildSiblingQuery($builder, $id, function ($position) {
            return function (Builder $builder) use ($position) {
                return $builder->where($this->getPositionColumn(), '>', $position);
            };
        });
    }

    /**
     * Retrieves all next siblings of a model.
     *
     * @param array $columns
     *
     * @return Collection
     */
    public function getNextSiblings(array $columns = ['*']): Collection
    {
        return $this->nextSiblings()->get($columns);
    }

    /**
     * Returns number of next siblings of a model.
     *
     * @return int
     */
    public function countNextSiblings(): int
    {
        return $this->nextSiblings()->count();
    }

    /**
     * Indicates whether a model has next siblings.
     *
     * @return bool
     */
    public function hasNextSiblings(): bool
    {
        return (bool) $this->countNextSiblings();
    }

    /**
     * Returns query builder for a range of siblings.
     *
     * @param Builder $builder
     * @param int $from
     * @param int|null $to
     *
     * @return Builder
     */
    public function scopeSiblingsRange(Builder $builder, int $from, int $to = null): Builder
    {
        $position = $this->getPositionColumn();

        $query = $this
            ->scopeSiblings($builder)
            ->where($position, '>=', $from);

        if ($to !== null) {
            $query->where($position, '<=', $to);
        }

        return $query;
    }

    /**
     * Returns query builder for a range of siblings of a node with the given ID.
     *
     * @param Builder $builder
     * @param int $id
     * @param int $from
     * @param int|null $to
     *
     * @return Builder
     */
    public function scopeSiblingsRangeOf(Builder $builder, int $id, int $from, int $to = null): Builder
    {
        $position = $this->getPositionColumn();

        $query = $this
            ->buildSiblingQuery($builder, $id)
            ->where($position, '>=', $from);

        if ($to !== null) {
            $query->where($position, '<=', $to);
        }

        return $query;
    }

    /**
     * Retrieves siblings within given positions range.
     *
     * @param int $from
     * @param int|null $to
     * @param array $columns
     *
     * @return Collection
     */
    public function getSiblingsRange(int $from, int $to = null, array $columns = ['*']): Collection
    {
        return $this->siblingsRange($from, $to)->get($columns);
    }

    /**
     * Builds query for siblings.
     *
     * @param Builder $builder
     * @param int $id
     * @param callable|null $positionCallback
     *
     * @return Builder
     */
    private function buildSiblingQuery(Builder $builder, int $id, callable $positionCallback = null): Builder
    {
        $parentIdColumn = $this->getParentIdColumn();
        $positionColumn = $this->getPositionColumn();

        $entity = $this
            ->select([$this->getKeyName(), $parentIdColumn, $positionColumn])
            ->from($this->getTable())
            ->where($this->getKeyName(), '=', $id)
            ->limit(1)
            ->first();

        if ($entity === null) {
            return $builder;
        }

        if ($entity->parent === null) {
            $builder->whereNull($parentIdColumn);
        } else {
            $builder->where($parentIdColumn, '=', $entity->parent);
        }

        if (is_callable($positionCallback)) {
            $builder->where($positionCallback($entity->menuindex));
        }

        return $builder;
    }

    /**
     * Appends a sibling within the current depth.
     *
     * @param SiteContent $sibling
     * @param int|null $position
     * @param bool $returnSibling
     *
     * @return SiteContent
     */
    public function addSibling(SiteContent $sibling, int $position = null, bool $returnSibling = false): static
    {
        if ($this->exists) {
            $position = $position === null ? static::getLatestPosition($this) : $position;

            $sibling->moveTo($position, $this->parent);

            if ($position < $this->menuindex) {
                $this->menuindex++;
            }
        }

        return ($returnSibling === true ? $sibling : $this);
    }

    /**
     * Appends multiple siblings within the current depth.
     *
     * @param SiteContent[] $siblings
     * @param null $from
     *
     * @return SiteContent
     * @throws Throwable
     */
    public function addSiblings(array $siblings, $from = null): static
    {
        if (!$this->exists) {
            return $this;
        }

        $from = $from === null ? static::getLatestPosition($this) : $from;

        $this->transactional(function () use ($siblings, &$from) {
            foreach ($siblings as $sibling) {
                $this->addSibling($sibling, $from);
                $from++;
            }
        });

        return $this;
    }

    /**
     * Retrieves root (with no ancestors) models.
     *
     * @param array $columns
     *
     * @return Collection
     */
    public static function getRoots(array $columns = ['*']): Collection
    {
        /** @var Builder $instance */
        $instance = new static;

        return $instance->whereNull($instance->getParentIdColumn())->get($columns);
    }

    /**
     * Makes model a root with given position.
     *
     * @param int $position
     *
     * @return SiteContent
     */
    public function makeRoot(int $position): static
    {
        return $this->moveTo($position);
    }

    /**
     * Adds "parent id" column to columns list for proper tree querying.
     *
     * @param array $columns
     *
     * @return array
     */
    protected function prepareTreeQueryColumns(array $columns): array
    {
        return ($columns === ['*'] ? $columns : array_merge($columns, [$this->getParentIdColumn()]));
    }

    /**
     * Saves models from the given attributes array.
     *
     * @param array $tree
     * @param SiteContent|null $parent
     *
     * @return Collection
     * @throws Throwable
     */
    public static function createFromArray(
        array $tree,
        SiteContent $parent = null): Collection
    {
        $entities = [];

        foreach ($tree as $item) {
            $children = Arr::pull($item, static::CHILDREN_RELATION_NAME);

            $entity = new static($item);
            $entity->parent = $parent?->getKey();
            $entity->save();

            if ($children !== null) {
                $entity->addChildren(static::createFromArray($children, $entity)->all());
            }

            $entities[] = $entity;
        }

        return new Collection($entities);
    }

    /**
     * Makes the model a child or a root with given position. Do not use moveTo to move a node within the same ancestor (call position = value and save instead).
     *
     * @param int $position
     * @param int|SiteContent|null $ancestor
     *
     * @return SiteContent
     * @throws InvalidArgumentException
     */
    public function moveTo(int $position, SiteContent | int $ancestor = null): static
    {
        $parentId = $ancestor instanceof self ? $ancestor->getKey() : $ancestor;

        if ($this->parent === $parentId && $this->parent !== null) {
            return $this;
        }

        if ($this->getKey() === $parentId) {
            throw new InvalidArgumentException('Target entity is equal to the sender.');
        }

        $this->parent = $parentId;
        $this->menuindex = $position;

        $this->isMoved = true;
        $this->save();
        $this->isMoved = false;

        return $this;
    }

    /**
     * Gets the next sibling position after the last one.
     *
     * @param SiteContent $entity
     *
     * @return int
     */
    public static function getLatestPosition(SiteContent $entity): int
    {
        $positionColumn = $entity->getPositionColumn();
        $parentIdColumn = $entity->getParentIdColumn();

        $latest = $entity->select($positionColumn)
            ->where($parentIdColumn, '=', $entity->parent)
            ->latest($positionColumn)
            ->first();

        $position = $latest !== null ? $latest->menuindex : -1;

        return $position + 1;
    }

    /**
     * Reorders node's siblings when it is moved to another position or ancestor.
     *
     * @return void
     */
    private function reorderSiblings(): void
    {
        $position = $this->getPositionColumn();

        if ($this->previousPosition !== null) {
            $this
                ->where($this->getKeyName(), '<>', $this->getKey())
                ->where($this->getParentIdColumn(), '=', $this->previousParentId)
                ->where($position, '>', $this->previousPosition)
                ->decrement($position);
        }

        $this
            ->sibling()
            ->where($this->getKeyName(), '<>', $this->getKey())
            ->where($position, '>=', $this->menuindex)
            ->increment($position);
    }

    /**
     * Deletes a subtree from database.
     *
     * @param bool $withSelf
     * @param bool $forceDelete
     *
     * @return void
     * @throws Exception
     */
    public function deleteSubtree(bool $withSelf = false, bool $forceDelete = false): void
    {
        $action = ($forceDelete === true ? 'forceDelete' : 'delete');

        $query = $withSelf ? $this->descendantsWithSelf() : $this->descendants();
        $ids = $query->pluck($this->getKeyName());

        if ($forceDelete) {
            $this->closure->whereIn($this->closure->getDescendantColumn(), $ids)->delete();
        }

        $this->whereIn($this->getKeyName(), $ids)->$action();
    }

    /**
     * Create a new Eloquent Collection instance.
     *
     * @param array $models
     *
     * @return Collection
     */
    public function newCollection(array $models = []): Collection
    {
        return new Collection($models);
    }

    /**
     * Executes queries within a transaction.
     *
     * @param callable $callable
     *
     * @return mixed
     * @throws Throwable
     */
    private function transactional(callable $callable): mixed
    {
        return $this->getConnection()->transaction($callable);
    }

    /**
     * @param Builder $query
     *
     * @return Builder
     */
    public function scopePublished(Builder $query): Builder
    {
        return $query->where('published', '1');
    }

    /**
     * @param Builder $query
     *
     * @return Builder
     */
    public function scopeUnpublished(Builder $query): Builder
    {
        return $query->where('published', '0');
    }

    /**
     * @param Builder $query
     *
     * @return Builder
     */
    public function scopeActive(Builder $query): Builder
    {
        return $query->where('published', '1')->where('deleted', '0');
    }

    /**
     * @param Builder $query
     *
     * @return Builder
     */
    public function scopeWithoutProtected(Builder $query): Builder
    {
        $role = (int) ($_SESSION['mgrRole'] ?? 0);

        if ($role === 1) {
            return $query;
        }

        $query->leftJoin('document_groups', 'document_groups.document', '=', 'site_content.id');
        $query->where(function ($query) {
            $docgrp = evo()->getUserDocGroups();
            if (evo()->isFrontend()) {
                $query->where('site_content.privateweb', 0);
            } else {
                $query->orWhere('site_content.privatemgr', 0);
            }
            if ($docgrp) {
                $query->orWhereIn('document_groups.document_group', $docgrp);
            }
        });

        return $query;
    }

    /**
     * @param Builder $query
     * @param array $tvList
     * @param string $sep
     * @param bool $tree
     *
     * @return Builder
     */
    public function scopeWithTVs(Builder $query, array $tvList = [], string $sep = ':', bool $tree = false): Builder
    {
        $main_table = 'site_content';
        if ($tree) {
            $main_table = 't2';
        }
        if (!empty($tvList)) {
            $query->addSelect($main_table . '.*');
            $tvList = array_unique($tvList);
            $tvListWithDefaults = [];
            foreach ($tvList as $v) {
                $tmp = explode($sep, $v, 2);
                $tvListWithDefaults[$tmp[0]] = !empty($tmp[1]) ? trim($tmp[1]) : '';
            }
            $tvs = SiteTmplvar::whereIn('name', array_keys($tvListWithDefaults))->get()->pluck('id', 'name')->toArray();
            foreach ($tvs as $tvname => $tvid) {
                $query = $query->leftJoin(
                    'site_tmplvar_contentvalues as tv_' . $tvname,
                    function ($join) use ($main_table, $tvid, $tvname) {
                        $join->on($main_table . '.id', '=', 'tv_' . $tvname . '.contentid')->where(
                            'tv_' . $tvname . '.tmplvarid',
                            '=',
                            $tvid
                        );
                    }
                );
                $query = $query->addSelect('tv_' . $tvname . '.value as ' . $tvname);
                $query = $query->groupBy('tv_' . $tvname . '.value');
                if (!empty($tvListWithDefaults[$tvname]) && $tvListWithDefaults[$tvname] == 'd') {
                    $query = $query->leftJoin('site_tmplvars as tvd_' . $tvname, function ($join) use ($tvid, $tvname) {
                        $join->where('tvd_' . $tvname . '.id', '=', $tvid);
                    });
                }
            }
            $query->groupBy($main_table . '.id');
        }

        return $query;
    }

    /**
     * @param Builder $query
     * @param string $filters
     * @param string $outerSep
     * @param string $innerSep
     *
     * @return Builder
     */
    public function scopeTvFilter(
        Builder $query,
        string $filters = '',
        string $outerSep = ';',
        string $innerSep = ':'): Builder
    {
        $prefix = DB::getTablePrefix();
        $filters = explode($outerSep, trim($filters));
        foreach ($filters as $filter) {
            if (empty($filter)) {
                break;
            }

            $parts = explode($innerSep, $filter, 5);
            $type = $parts[0];
            $tvname = $parts[1];
            $op = $parts[2];
            $value = $parts[3] ?? '';
            $cast = !empty($parts[4]) ? $parts[4] : '';
            $field = 'tv_' . $tvname . '.value';
            if ($type == 'tvd') {
                $field = DB::Raw(
                    "IFNULL(`" . $prefix . "tv_" . $tvname . "`.`value`, `" . $prefix . "tvd_" . $tvname .
                    "`.`default_text`)"
                );
            }
            switch (true) {
                case ($op == 'in'):
                    $query = $query->whereIn($field, explode(',', $value));
                    break;
                case ($op == 'not_in'):
                    $query = $query->whereNotIn($field, explode(',', $value));
                    break;
                case ($op == 'like'):
                    $query = $query->where($field, $op, '%' . $value . '%');
                    break;
                case ($op == 'like-r'):
                    $query = $query->where($field, 'like', $value . '%');
                    break;
                case ($op == 'like-l'):
                    $query = $query->where($field, 'like', '%' . $value);
                    break;
                case ($op == 'isnull'):
                case ($op == 'null'):
                    $query = $query->whereNull($field);
                    break;
                case ($op == 'isnotnull'):
                case ($op == '!null'):
                    $query = $query->whereNotNull($field);
                    break;
                case ($cast == 'UNSIGNED'):
                case ($cast == 'SIGNED'):
                case (str_contains($cast, 'DECIMAL')):
                    if ($type == 'tvd') {
                        $query = $query->whereRaw(
                            "CAST(IFNULL(`" . $prefix . "tv_" . $tvname . "`.`value`, `" . $prefix . "tvd_" . $tvname .
                            "`.`default_text`) AS " . $cast . " ) " . $op . " " . $value
                        );
                    } else {
                        $query = $query->whereRaw(
                            "CAST(`" . $prefix . 'tv_' . $tvname . "`.`value` AS " . $cast . " ) " . $op . " " . $value
                        );
                    }
                    break;
                default:
                    $query = $query->where($field, $op, $value);
                    break;
            }
        }

        return $query;
    }

    /**
     * @param Builder $query
     * @param string $orderBy
     * @param string $sep
     *
     * @return Builder
     */
    public function scopeTvOrderBy(Builder $query, string $orderBy = '', string $sep = ':'): Builder
    {
        $prefix = DB::getTablePrefix();
        $orderBy = explode(',', trim($orderBy));
        foreach ($orderBy as $parts) {
            if (empty(trim($parts))) {
                return $query;
            }

            $part = array_map('trim', explode(' ', trim($parts), 3));
            $tvname = $part[0];
            $sortDir = !empty($part[1]) ? $part[1] : 'desc';
            $cast = !empty($part[2]) ? $part[2] : '';
            $withDefaults = false;
            if (str_contains($tvname, $sep)) {
                [$tvname, $withDefaults] = explode($sep, $tvname, 2);
                $withDefaults = !empty($withDefaults) && $withDefaults == 'd';
            }
            $field = 'tv_' . $tvname . ".value";
            if ($withDefaults === true) {
                $field = DB::Raw(
                    "IFNULL(`" . $prefix . "tv_" . $tvname . "`.`value`, `" . $prefix . "tvd_" . $tvname .
                    "`.`default_text`)"
                );
            }
            switch (true) {
                case ($cast == 'UNSIGNED'):
                case ($cast == 'SIGNED'):
                case (str_contains($cast, 'DECIMAL')):
                    if ($withDefaults === false) {
                        $query = $query->orderByRaw(
                            "CAST(`" . $prefix . 'tv_' . $tvname . "`.`value` AS " . $cast . ") " . $sortDir
                        );
                    } else {
                        $query = $query->orderByRaw(
                            "CAST(IFNULL(`" . $prefix . "tv_" . $tvname . "`.`value`, `" . $prefix . "tvd_" . $tvname .
                            "`.`default_text`) AS " . $cast . ") " . $sortDir
                        );
                    }
                    break;
                default:
                    $query = $query->orderBy($field, $sortDir);
                    break;
            }
        }

        return $query;
    }

    /**
     * @param Builder $query
     * @param int $depth
     *
     * @return Builder
     */
    public function scopeGetRootTree(Builder $query, int $depth = 0): Builder
    {
        return $query->select('t2.*')
            ->leftJoin('site_content_closure', function ($join) use ($depth) {
                $join->on('site_content.id', '=', 'site_content_closure.ancestor');
                $join->on('site_content_closure.depth', '<', DB::raw($depth));
            })
            ->join('site_content as t2', 't2.id', '=', 'site_content_closure.descendant')
            ->where('site_content.parent', 0);
    }

    /**
     * @param $docs
     * @param array $tvList
     *
     * @return array
     */
    public static function getTvList($docs, array $tvList = []): array
    {
        $docsTV = [];
        if (empty($docs)) {
            return [];
        } else {
            if (empty($tvList)) {
                return [];
            } else {
                $ids = $docs->pluck('id')->toArray();
                $tvs = SiteTmplvar::whereIn('name', $tvList)->get();
                $tvNames = $tvs->pluck('default_text', 'name')->toArray();
                $tvIds = $tvs->pluck('name', 'id')->toArray();
                $tvValues =
                    SiteTmplvarContentvalue::whereIn('contentid', $ids)->whereIn('tmplvarid', array_keys($tvIds))->get()
                        ->toArray();
                foreach ($tvValues as $tv) {
                    if (empty($tv['value']) && !empty($tvNames[$tvIds[$tv['tmplvarid']]])) {
                        $tv['value'] = $tvNames[$tvIds[$tv['tmplvarid']]];
                    }
                    unset($tv['id']);
                    $docsTV[$tv['contentid']][$tv['tmplvarid']] = $tv;
                }
                foreach ($ids as $docid) {
                    foreach ($tvIds as $tvid => $tvname) {
                        if (empty($docsTV[$docid][$tvid])) {
                            $docsTV[$docid][$tvid] =
                                ['tmplvarid' => $tvid, 'contentid' => $docid, 'value' => $tvNames[$tvIds[$tvid]]];
                        }
                    }
                }
            }
        }
        if (!empty($docsTV)) {
            $tmp = [];
            foreach ($docsTV as $docid => $tvs) {
                foreach ($tvs as $tvid => $tv) {
                    $tmp[$docid][$tvIds[$tvid]] = $tv['value'];
                }
            }
            $docsTV = $tmp;
        }

        return $docsTV;
    }

    /**
     * @param $docs
     * @param array $tvList
     *
     * @return array
     */
    public static function tvList($docs, array $tvList = []): array
    {
        if (empty($docs)) {
            return [];
        } else {
            $docsTV = static::getTvList($docs, $tvList);
            $docs = $docs->toArray();
            $tmp = $docs;
            foreach ($docs as $key => $doc) {
                $tmp[$key]['tvs'] = !empty($docsTV[$doc['id']]) ? $docsTV[$doc['id']] : [];
            }
            $docs = $tmp;
            unset($tmp);

            return $docs;
        }
    }

    /**
     * @param Builder $query
     * @param string $sortDir
     *
     * @return Builder
     */
    public function scopeOrderByDate(Builder $query, string $sortDir = 'desc'): Builder
    {
        return $query->orderByRaw('IF(pub_date!=0,pub_date,createdon) ' . $sortDir);
    }

    /**
     * @param Builder $query
     * @param $tagsData
     * @param string $sep
     * @param string $tagSeparator
     *
     * @return Builder
     */
    public function scopeTagsData(Builder $query, $tagsData, string $sep = ':', string $tagSeparator = ','): Builder
    {
        $tmp = explode($sep, $tagsData, 2);
        if (is_numeric($tmp[0])) {
            $tv_id = $tmp[0];
            $tags = explode($tagSeparator, $tmp[1]);
            $query->select('site_content.*');
            $query->whereIn('tags.name', $tags)->where('site_content_tags.tv_id', $tv_id);
            $query->rightJoin('site_content_tags', 'site_content_tags.doc_id', '=', 'site_content.id');
            $query->rightJoin('tags', 'tags.id', '=', 'site_content_tags.tag_id');
        }

        return $query;
    }
}
