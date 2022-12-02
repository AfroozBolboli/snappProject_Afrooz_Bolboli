<?php

namespace App\Http\Controllers\seller;

use App\Exports\OrdersExport;
use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderFood;
use App\Models\OrderStatus;
use App\Models\Restaurant;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class SellerReportsController extends Controller
{
    public function index()
    {   
        $restaurant_id = Restaurant::where('owner_id', auth()->user()->id)->first()->id;
        $orders = Order::where('restaurant_id', $restaurant_id )->where('status', 4)->get();

        $orderStatus = OrderStatus::all();
        $totalOrders = $orders->count();
        $totalIncome = 0;

        foreach($orders as $order)
            $totalIncome += OrderFood::where('order_id', $order->id)->sum('price');

        return view('seller.reports.index',[
            'orders' => $orders,
            'orderStatus' => $orderStatus,
            'totalOrders' => $totalOrders,
            'totalIncome' => $totalIncome
        ]);
    }

    public function filter(Request $request)
    {
        $restaurant_id = Restaurant::where('owner_id', auth()->user()->id)->first()->id;
        $Oldorders = Order::where('restaurant_id', $restaurant_id )->where('status', 4)->get();

        if(request('reportFilter') == 'month')
        {
            $currentMonth = date('m');
            $orders = null;
            foreach($Oldorders as $order)
            {
                $date = strtotime($order->created_at);
                if(date('m',$date) == $currentMonth)
                    $orders[]= $order;
            }
            
        } 
        elseif(request('reportFilter') == 'week')
        {
            $orders = null;
            $currentWeek = date('W');
            foreach($Oldorders as $order)
            {
                $date = strtotime($order->created_at);
                if(date('W',$date) == $currentWeek)
                    $orders[]= $order;
            }
        }
        else
            $orders[] = $Oldorders;

        $orderStatus = OrderStatus::all();
        $totalIncome = 0;
        $totalOrders = 0;

        if($orders != null)
        {
            $totalOrders = count($orders);

            foreach($orders as $order)
            $totalIncome += OrderFood::where('order_id', $order->id)->sum('price');

        }

        return view('seller.reports.index',[
            'orders' => $orders,
            'orderStatus' => $orderStatus,
            'totalOrders' => $totalOrders,
            'totalIncome' => $totalIncome
        ]);
    }

    public function excel()
    {
        $restaurant_id = Restaurant::where('owner_id', auth()->user()->id)->first()->id;

        return Excel::download(new OrdersExport($restaurant_id), 'orders.xlsx');
    }
}
