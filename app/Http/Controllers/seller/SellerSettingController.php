<?php

namespace App\Http\Controllers\seller;

use App\Http\Controllers\Controller;
use App\Http\Requests\seller\SellerSettingRequest;
use App\Models\FoodCategory;
use App\Models\Restaurant;
use App\Models\RestaurantCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SellerSettingController extends Controller
{
    public function index()
    {
        $restaurant = Restaurant::where('owner_id', auth()->user()->id)->first();
        return view('seller.setting.index')-> with('restaurant', $restaurant);
    }

    public function edit($id)
    {
        $restaurant = Restaurant::where('owner_id', auth()->user()->id)->first();
        $categories = RestaurantCategory::all();
        return view('seller.setting.edit',[
            'restaurant' => $restaurant,
            'categories' => $categories
        ]);
    }

    public function update(SellerSettingRequest $request, $id)
    {
        $request->validated();

        if(!empty($request->image))
        {       
            $image_path = time().$request->file('image')->getClientOriginalName();
            $uploadImage = Storage::disk('public')->putFileAs('restaurantPicture/',$request->file('image'), $image_path);
            Storage::disk('public')->delete('restaurantPicture/'.Restaurant::find($id)->image_path);
        }
        else
            $image_path = '';

        $categories = implode("-", $request->categories);
        
        $restaurant = Restaurant::find($id)
            ->update([
                'name' => $request->input('name'),
                'phone' => $request->input('phone'),
                'address' => $request->input('address'),
                'accountNumber' => $request->input('accountNumber'),
                'workingDay' => $request->input('workingDay'),
                'restaurantPicture' => $image_path,
                'shippingCost' => $request->input('shippingCost'),
                'status' => $request->input('status'),
                'categories' => $categories,
        ]);



        return redirect('seller/setting');
    }
}
