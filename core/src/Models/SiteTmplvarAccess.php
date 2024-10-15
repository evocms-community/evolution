<?php

namespace EvolutionCMS\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @property int $id
 * @property int $tmplvarid
 * @property int $documentgroup
 */
class SiteTmplvarAccess extends Model
{
    protected $table = 'site_tmplvar_access';

    public $timestamps = false;

    protected $casts = [
        'tmplvarid' => 'int',
        'documentgroup' => 'int',
    ];

    protected $fillable = [
        'tmplvarid',
        'documentgroup',
    ];

    public function tmplvar(): BelongsTo
    {
        return $this->belongsTo(SiteTmplvar::class, 'tmplvarid', 'id');
    }
}
