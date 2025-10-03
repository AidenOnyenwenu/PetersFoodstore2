<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Drank extends Model
{
    use HasFactory;

    protected $table = 'dranken';

    protected $fillable = [
        'naam',
        'prijs',
        'omschrijving',
        'afbeelding',
    ];
}
