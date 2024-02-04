<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
    use HasFactory;

    protected $fillable = [
        'shop_name',
        'area',
        'genre',
        'image_url',
        'description',
    ];

    public function reservations()
    {
        return $this->hasMany(Reservation::class, 'shop_id', 'id');
    }
}
