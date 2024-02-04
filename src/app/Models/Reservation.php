<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{

    protected $fillable = [
        'user_id',
        'shop_id',
        'shop_name',
        'reservation_time',
        'reservation_date',
        'reservation_number',
    ];

    public function shop()
    {
        return $this->belongsTo(Shop::class, 'shop_id', 'id');
    }
}
