<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Vol extends Model
{
    use HasFactory;
protected $fillable = [
    'numero_vol',
    'ville_depart',
    'ville_arrivee',
    'date_depart',
    'date_arrivee',
    'nombre_place',
    'prix',
    'type_vol',
    'statut'
    
];


   public function reservations(): HasMany
    {
        return $this->hasMany(Reservation::class);
    } 
    public function classeVols(): HasMany
    {
        return $this->hasMany(ClasseVol::class);
    }
}
