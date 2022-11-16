<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class FoodCategory extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = ['title', 'image_path', 'restaurantCategory_id'];

    public function restraunt()
    {
        return $this->belongsTo(RestaurantCategory::class);
    }
}
