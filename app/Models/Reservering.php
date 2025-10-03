<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservering extends Model
{
    use HasFactory;

    protected $table = 'reserverings';

    protected $fillable = [
        'klant_naam',
        'email',
        'telefoonnummer',
        'datum',
        'tijd',
        'aantal_personen',
        'opmerkingen',
    ];
}
