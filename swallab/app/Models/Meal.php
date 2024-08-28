<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Meal extends Model
{
    use HasFactory;

    protected $fillable = ['r_id', 'class', 'meals_name', 'price', 'photo'];

    public function restaurant()
    {
        return $this->belongsTo(Restaurant::class);
    }
}
