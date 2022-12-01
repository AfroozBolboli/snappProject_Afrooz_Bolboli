<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'customer_id', 'restaurant_id',
        'status', 'trackingCode',
    ];

    public function orderFood()
    {
        return $this->hasMany(OrderFood::class);
    }

    public function comment()
    {
        return $this->hasOne(Comment::class);
    }
}
