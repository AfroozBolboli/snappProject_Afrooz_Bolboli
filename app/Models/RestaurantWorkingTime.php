<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RestaurantWorkingTime extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'mondayStart', 'mondayEnd',
        'tuesdayStart', 'tuesdayEnd',
        'wednesdayStart', 'wednesdayEnd',
        'thursdayStart', 'thursdayEnd',
        'fridayStart', 'fridayEnd',
        'saturdayStart', 'saturdayEnd',
        'sundayStart', 'sundayEnd',
        'restaurant_id'
    ];

    public function restaurants()
    {
        return $this->belongsTo(Restaurant::class);
    }
}
