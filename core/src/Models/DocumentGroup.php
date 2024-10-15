<?php

namespace EvolutionCMS\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $document_group
 * @property int $document
 */
class DocumentGroup extends Model
{
    public $timestamps = false;

    protected $casts = [
        'document_group' => 'int',
        'document' => 'int',
    ];

    protected $fillable = [
        'document_group',
        'document',
    ];
}
