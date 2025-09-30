<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tafel extends Model
{
    use HasFactory;

    // Mass assignment toestaan voor deze velden
    protected $fillable = [
        'soort',
        'aantal',
    ];
}
