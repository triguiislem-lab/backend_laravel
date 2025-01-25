<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Location extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_location',
        'Nom_location',
        'description_location',
        'image_location',
    ];
    public function vol()
    {
        return $this->hasMany(Vol::class);
    }
}
