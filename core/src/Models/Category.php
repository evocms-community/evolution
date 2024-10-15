<?php

namespace EvolutionCMS\Models;

use EvolutionCMS\Traits;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @property int $id
 * @property string $category
 * @property int $rank
 *
 * HasMany
 * @property Collection $templates
 * @property Collection $chunks
 * @property Collection $snippets
 * @property Collection $plugins
 * @property Collection $modules
 * @property Collection $tvs
 *
 * Virtual
 * @property string $name Alias for templatename
 */
class Category extends Model
{
    use Traits\Models\ManagerActions;

    public $timestamps = false;

    protected $casts = [
        'rank' => 'int',
        'category' => 'string',
    ];

    protected $fillable = [
        'category',
        'rank',
    ];

    public function templates(): HasMany
    {
        return $this->hasMany(SiteTemplate::class, 'category', 'id')->orderBy('templatename', 'ASC');
    }

    public function chunks(): HasMany
    {
        return $this->hasMany(SiteHtmlsnippet::class, 'category', 'id')->orderBy('name', 'ASC');
    }

    public function snippets(): HasMany
    {
        return $this->hasMany(SiteSnippet::class, 'category', 'id')->orderBy('name', 'ASC');
    }

    public function plugins(): HasMany
    {
        return $this->hasMany(SitePlugin::class, 'category', 'id')->orderBy('name', 'ASC');
    }

    public function modules(): HasMany
    {
        return $this->hasMany(SiteModule::class, 'category', 'id')->orderBy('name', 'ASC');
    }

    public function tvs(): HasMany
    {
        return $this->hasMany(SiteTmplvar::class, 'category', 'id')->orderBy('name', 'ASC');
    }

    public function getNameAttribute(): string
    {
        return $this->category;
    }

    public function setNameAttribute($val): static
    {
        $this->category = $val;

        return $this;
    }
}
