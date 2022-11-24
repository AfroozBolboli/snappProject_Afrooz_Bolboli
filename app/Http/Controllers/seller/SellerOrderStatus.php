<?php

namespace App\Http\Controllers\seller;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderStatus;
use App\Models\Restaurant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class SellerOrderStatus extends Controller
{

    public function index()
    {
        $restaurant_id = Restaurant::where('owner_id', auth()->user()->id)->first()->id;
        $orders = Order::where('restaurant_id', $restaurant_id )->where('status', '!=', 4)->get();

        $orderStatus = OrderStatus::all();
        return view('seller.orderStatus.index',[
            'orders' => $orders,
            'orderStatus' => $orderStatus
        ]);
    }

    public function edit($id)
    {

        $orderStatus = OrderStatus::where('status', '!=' , 0)->get();
        $order = Order::find($id);
        $restaurant_id = Restaurant::where('owner_id', auth()->user()->id)->first()->id;

        if ($order == null || $restaurant_id != $order->id) {
            abort(403);
        }

        return view('seller.orderStatus.edit',[ 
            'order' => $order,
            'orderStatus' => $orderStatus
        ]);
    }

    public function update(Request $request, $id)
    {
        $order = Order::find($id);
        $order->update([
            'status' =>  $request->input('status'),
        ]);

        return redirect('seller/orderStatus');
        
    }

    public function archive()
    {
        $restaurant_id = Restaurant::where('owner_id', auth()->user()->id)->first()->id;
        $orders = Order::where('restaurant_id', $restaurant_id )->where('status', 4)->get();

        $orderStatus = OrderStatus::all();

        return view('seller.orderStatus.archive',[
            'orders' => $orders,
            'orderStatus' => $orderStatus
        ]);
    }
}
