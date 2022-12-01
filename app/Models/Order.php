<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'customer_id', 'restaurant_id',
        'status', 'trackingCode',
    ];

    public function scopeFilter($query, $request, $Oldorders)
    {
        if(request('reportFilter') == 'month')
        {
            $currentMonth = date('m');
            foreach($Oldorders as $order)
            {
                $date = strtotime($order->created_at);
                if(date('m',$date) == $currentMonth)
                {
                    $orders[]= $order;
                }
            }
        } 
        elseif(request('reportFilter') == 'week')
        {
            $currentWeek = date('W');
            foreach($Oldorders as $order)
            {
                $date = strtotime($order->created_at);
                if(date('W',$date) == $currentWeek)
                {
                    $orders[]= $order;
                }
            }
        }
        else
            $orders[] = $Oldorders;

    }
}
