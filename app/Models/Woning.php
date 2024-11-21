<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Woning extends Model
{
    protected $fillable = [
        'Titel',
        'Omschrijving',
        'Oppervlakte',
        'PrijsPerWeek',
        'image'     
    ];
    protected $table = 'woning';
    use HasFactory;
}