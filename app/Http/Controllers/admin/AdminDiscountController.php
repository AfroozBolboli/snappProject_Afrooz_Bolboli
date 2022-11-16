<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\admin\AdminDiscountRequest;
use App\Models\Discount;
use App\Models\Restaurant;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Http\Request;

class AdminDiscountController extends Controller
{
    use SoftDeletes;

    public function index()
    {
        $discounts = Discount::all();
        return view('admin.discount.index')->with('discounts', $discounts);
    }

    public function create()
    {
        return view('admin.discount.create');
    }

    public function store(AdminDiscountRequest $request)
    {
        $request->validated();

        $validRestaurant = Restaurant::where('name', $request->restaurant_name)->first();
        if(empty($validRestaurant))
        {
            $error = 'رستورانی با این اسم یافت نشد';
            return view('admin.discount.create')->with('error', $error);
        }

        //checking if ending date is after starting date
        if($request->input('startingDate') > $request->input('endingDate'))
        {
            $error = 'تاریخ انقضا از تاریخ شروع عقب تر است';
            return view('admin.discount.create')->with('error', $error);       
        }
        
        $discount = Discount::create([
            'title' => $request->input('title'),
            'restaurant_name' => $request->input('restaurant_name'),
            'price' => $request->input('price'),
            'startingDate' => $request->input('startingDate'),
            'endingDate' => $request->input('endingDate'),
        ]);

        return redirect('admin/discount');
    }

    public function destroy($id)
    {
        $discount = Discount::find($id);
        $discount->delete();
        return redirect('admin/discount');
    }
}
