<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    protected $table = 'orders_items';

    protected $fillable = [
        'order_id',
        'restaurants_id',
        'quantity',
        'price',
    ];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    public function restaurant()
    {
        return $this->belongsTo(Restaurant::class, 'restaurants_id');
    }
}

