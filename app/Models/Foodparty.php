<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Foodparty extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = 
    ['food_id', 'discount',
     'time', 'date'];


     public function food()
     {
        return $this->belongsTo(Food::class);
     }
}
