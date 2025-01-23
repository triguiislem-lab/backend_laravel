<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Service extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_service',
        'Nom_service',
        'description_service',
        'classe_vols_id', 
    ];
    public function classeVol()
    {
        return $this->belongsTo(ClasseVol::class, 'classe_vols_id');
    }
}
