<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    // 指定这个模型对应的表名（如果表名不是 orders）
    protected $table = 'orders';

    // 允许批量赋值的字段
    protected $fillable = [
        'user_id',
        'utensils',
        'credit_card',
        'pickup_date',
        'pickup_time',
        'total',
    ];

    // 定义与 OrderItem 的关系
    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }

    // 定义与 User 的关系
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
