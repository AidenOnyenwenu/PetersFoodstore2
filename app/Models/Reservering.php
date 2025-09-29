<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reservering extends Model
{
    protected $fillable = [
        'klant_naam',
        'email',
        'telefoonnummer',
        'datum',
        'tijd',
        'aantal_personen',
        'opmerkingen'
    ];
} 
