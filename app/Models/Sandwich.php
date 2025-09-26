<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Sandwich extends Model
{
    protected $fillable = [
        'name',
        'description',
    ];

    /**
     * Get the ingredients for the sandwich.
     */
    public function ingredients(): HasMany
    {
        return $this->hasMany(Ingredient::class);
    }
}
