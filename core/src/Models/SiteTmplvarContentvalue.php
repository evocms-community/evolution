<?php

namespace EvolutionCMS\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @property int $id
 * @property int $tmplvarid
 * @property int $contentid
 * @property string $value
 */
class SiteTmplvarContentvalue extends Model
{
    public $timestamps = false;

    protected $casts = [
        'tmplvarid' => 'int',
        'contentid' => 'int',
    ];

    protected $fillable = [
        'tmplvarid',
        'contentid',
        'value',
    ];

    public function resource(): BelongsTo
    {
        return $this->belongsTo(SiteContent::class, 'contentid', 'id');
    }

    public function tmplvar(): BelongsTo
    {
        return $this->belongsTo(SiteTmplvar::class, 'tmplvarid', 'id');
    }
}
