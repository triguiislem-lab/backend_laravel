<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ClasseVol extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_classe',
        'Nom_classe' ,
        'description_classe',
    ];
    public function vol()
    {
        return $this->belongsTo(Vol::class);
    }
    public function service()
    {
        return $this->hasMany(Service::class,'classe_vols_id');
    }
}
