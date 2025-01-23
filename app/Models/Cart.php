<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Cart extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_cart',
        'reservation_id'
    ];
    public function reservation()
    {
        return $this->hasMany(reservation::class);
    }
}
