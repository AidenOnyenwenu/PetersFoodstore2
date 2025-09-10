<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medewerker extends Model
{
    use HasFactory;

    protected $fillable = [
        'naam',
        'email',
        'telefoonnummer',
        'functie',
    ];
}
