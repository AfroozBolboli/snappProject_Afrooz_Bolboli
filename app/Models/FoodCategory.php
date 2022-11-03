<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FoodCategory extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'image_path', 'restaurantCategory_id'];

    public function restraunt()
    {
        return $this->belongsTo(RestaurantCategory::class);
    }
}
