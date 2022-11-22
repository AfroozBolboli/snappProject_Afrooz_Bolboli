<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Food extends Model
{
    use HasFactory, SoftDeletes;

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

    public function scopeFilter($query, $request, $restaurant_id)
    {
        if($request->get('foodFilter'))
        {
            $query
                ->where('restaurant_id', $restaurant_id)
                ->where('name', 'like', '%'.request('foodFilter').'%');
        }
        if($request->get('categoryFilter'))
        {
            $query
                ->where('restaurant_id', $restaurant_id)
                ->where('category', request('categoryFilter'));
        }
        else{
            $query->where('restaurant_id', $restaurant_id);
        }
    }
}
