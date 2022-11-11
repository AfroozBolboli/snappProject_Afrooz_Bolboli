<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Foodparty extends Model
{
    use HasFactory;
    protected $fillable = 
    ['food_id', 'discount',
     'time', 'date'];


     public function food()
     {
        return $this->belongsTo(Food::class);
     }
}
