<?php

namespace EvolutionCMS\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @property int $tmplvarid
 * @property int $templateid
 * @property int $rank
 */
class SiteTmplvarTemplate extends Model
{
    public $incrementing = false;

    public $timestamps = false;

    protected $casts = [
        'tmplvarid' => 'int',
        'templateid' => 'int',
        'rank' => 'int',
    ];

    protected $fillable = [
        'tmplvarid',
        'templateid',
        'rank',
    ];

    public function tmplvar(): BelongsTo
    {
        return $this->belongsTo(SiteTmplvar::class, 'tmplvarid', 'id');
    }
}
