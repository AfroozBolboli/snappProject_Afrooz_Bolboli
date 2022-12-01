<?php

namespace App\Http\Controllers\customer;

use App\Http\Controllers\Controller;
use App\Http\Requests\customer\CartRequest;
use App\Http\Requests\customer\CartUpdateRequest;
use App\Http\Resources\CartResource;
use App\Models\Food;
use App\Models\Foodparty;
use App\Models\Order;
use App\Models\OrderFood;
use App\Notifications\CartPaid;
use Illuminate\Support\Facades\Gate;

class CartController extends Controller
{

    public function index()
    {
        $customer_id = auth()->user()->id;
        return ['carts' => CartResource::collection(Order::where('customer_id', $customer_id)->where('status', 0)->get())];
    }

    public function store(CartRequest $request)
    {
        $customer_id = auth()->user()->id;
        $food = Food::find($request->input('food_id'));
        $restaurant_id = $food->restaurant_id;
        $customerOrder = Order::where('restaurant_id', $restaurant_id)
            ->where('customer_id', $customer_id)
            ->where('status', 0)
            ->first();

        if ($customerOrder == null) {
            $order = Order::create([
                'customer_id' => $customer_id,
                'restaurant_id' => $restaurant_id,
                'status' => 0,
            ]);

            $order->trackingCode =  '#' . str_pad($customer_id . $restaurant_id. $order->id, 6, "0", STR_PAD_LEFT);
            $order->save();

            $order_id = $order->id;
        } else {
            $order_id = $customerOrder->id;
        }

        $RFood = OrderFood::where('food_id', $request->input('food_id'))->where('order_id', $order_id)->first();

        if ($RFood != null) {
            $RFood->update([
                'count' => $RFood->count + $request->input('count'),
                'price' => $RFood->price + ($food->price - $food->discount) * $request->input('count')
            ]);

            return response([
                'message' => 'غذا با موفقیت به سبد خرید اضافه شد',
                'cart_id' => $order_id
            ], 200);
        }

        $order_food = OrderFood::create([
            'order_id' => $order_id,
            'food_id' => $request->input('food_id'),
            'count' => $request->input('count'),
            'price' => ($food->price - $food->discount) * $request->input('count')
        ]);

        return response([
            'message' => 'غذا با موفقیت به سبد خرید اضافه شد',
            'cart_id' => $order_id
        ], 200);
    }

    public function show($id)
    {
        $customer_id = auth()->user()->id;
        $order = Order::find($id);

        if ($order == null || !Gate::allows('customercart', $order) || $order->status != 0) {
            return response([
                'message' => 'آیدی وارد شده آیدی سبد خرید  فعال شما نیست',
            ], 403);
        }
        
        return ['carts' => CartResource::make(Order::find($id)->where('status', 0)->first())];
    }

    public function update(CartRequest $request)
    {
        $customer_id = auth()->user()->id;
        $food = Food::find($request->input('food_id'));
        $restaurant_id = $food->restaurant_id;
        $customerOrder = Order::where('restaurant_id', $restaurant_id)
            ->where('customer_id', $customer_id)
            ->where('status', 0)
            ->first();

        if ($customerOrder == null) {
            return response([
                'message' => 'غذایی با این آیدی در سبد خرید های پرداخت نشده شما وجود ندارد'
            ], 200);
        }

        $order_food = OrderFood::where('order_id', $customerOrder->id)->first();
        $order_food->update([
            'count' => $request->input('count'),
            'price' => ($food->price - $food->discount) * $request->input('count')
        ]);

        return response([
            'message' => 'تعداد غذا با موفقیت تغییر کرد',
            'count' => $order_food->count,
        ], 200);
    }

    public function pay($id)
    {
        $order = Order::find($id);

        if ($order == null || !Gate::allows('customercart', $order) || $order->status != 0) {
            return response([
                'message' => 'آیدی وارد شده آیدی سبد خریدفعال شما نیست',
            ], 403);
        }

        $order->update([
            'status' => 1,
        ]);
        
        $amount = OrderFood::where('order_id', $order->id)->sum('price');
        auth()->user()->notify(new CartPaid($amount));

        return response([
            'message' => "سبد خرید $order->id با موفقیت پرداخت شد"
        ],200);
    }


}
