<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Food extends Model
{
    use HasFactory;

    protected $table = 'foods';

    protected $fillable = 
    ['name', 'ingredient', 'price',
     'image_path', 'category',
     'restaurant_id', 'discountPrice',
    'foodParty'];

    public function restraunt()
    {
        return $this->belongsTo(Restaurant::class);
    }

    public function foodparty()
    {
       return $this->hasMany(Foodparty::class);
    }
}
