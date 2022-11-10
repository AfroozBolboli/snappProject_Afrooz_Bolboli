<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model
{
    use HasFactory;

    protected $table = 'restaurants';

    protected $fillable = 
    ['name', 'address', 'phone',
     'accountNumber', 'restaurantPicture',
     'shippingCost', 'status', 'categories',
    'owner_id', 'longitude', 'latitude',
    'workingDay' , 'openingTime', 'closingTime'];

     public function food()
     {
        return $this->hasMany(Food::class);
     }

     public function user()
     {
         return $this->belongsTo(User::class);
     }

}
