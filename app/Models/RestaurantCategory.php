<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RestaurantCategory extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['title', 'image_path'];

    public function foodCategorys()
    {
        return $this->hasMany(FoodCategory::class);
    }


}
