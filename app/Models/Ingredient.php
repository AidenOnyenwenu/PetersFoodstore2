<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Ingredient extends Model
{
    protected $fillable = [
        'sandwich_id',
        'name',
        'quantity',
    ];

    /**
     * The sandwich that this ingredient belongs to.
     */
    public function sandwich(): BelongsTo
    {
        return $this->belongsTo(Sandwich::class);
    }
}
