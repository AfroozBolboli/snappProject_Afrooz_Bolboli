<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class OrderFood extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_id', 'food_id',
        'count', 'price',
    ];
}
