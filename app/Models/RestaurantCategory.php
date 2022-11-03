<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RestaurantCategory extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'image_path'];

    public function foodCategorys()
    {
        return $this->hasMany(FoodCategory::class);
    }


}
