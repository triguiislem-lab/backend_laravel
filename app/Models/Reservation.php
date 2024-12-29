<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Reservation extends Model
{
    use HasFactory;
    protected $fillable = [
        'nombre_place_reservé',
        'user_id',
        'vol_id',
    ];
    
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * Relation avec le modèle Vol.
     */
    public function vol()
    {
        return $this->belongsTo(Vol::class , 'vol_id'); 
    }
}

