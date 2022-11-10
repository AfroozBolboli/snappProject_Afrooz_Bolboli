<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerAddress extends Model
{
    use HasFactory;

    protected $table = 'customer_addresses';

    protected $fillable = [
        'title', 'address',
        'latitude', 'longitude',
        'user_id'
    ];

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
}
