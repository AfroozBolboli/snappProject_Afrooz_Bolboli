<?php

namespace App\Exports;

use App\Models\Order;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
class OrdersExport implements FromCollection, WithHeadings
{
    private $orders;
    public function __construct($restaurant_id)
    {
        $this->orders = Order::where('restaurant_id', $restaurant_id )->where('status', 4)->get();
    }

    public function headings(): array
    {
        return ["شماره ی سفارش", "آیدی کاربر", "آیدی رستوران",
        "ارسال شده", "کدپیگری", "زمان ساختن",
        "زمان تغییر"
    ];
    }

    public function collection()
    {
        return $this->orders;
    }
}
