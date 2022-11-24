<?php

namespace App\Http\Controllers\seller;

use App\Http\Controllers\Controller;
use App\Http\Requests\seller\SellerSettingRequest;
use App\Models\Food;
use App\Models\Restaurant;
use App\Models\RestaurantCategory;
use App\Models\RestaurantWorkingTime;
use Illuminate\Support\Facades\Storage;

class SellerSettingController extends Controller
{
    public function index()
    {
        $restaurant = Restaurant::where('owner_id', auth()->user()->id)->first();
        $workingTime = RestaurantWorkingTime::where('restaurant_id', $restaurant->id)->first();

        return view('seller.setting.index',[
            'restaurant' => $restaurant,
            'workingTime' => $workingTime
        ]);
    }

    public function edit($id)
    {
        $restaurant = Restaurant::where('owner_id', auth()->user()->id)->first();
        $categories = RestaurantCategory::all();
        $workingTime = RestaurantWorkingTime::where('restaurant_id', $restaurant->id)->first();

        return view('seller.setting.edit',[
            'restaurant' => $restaurant,
            'categories' => $categories,
            'workingTime' => $workingTime
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
                'restaurantPicture' => $image_path,
                'shippingCost' => $request->input('shippingCost'),
                'status' => $request->input('status'),
                'categories' => $categories,
        ]);

        $workingTime = RestaurantWorkingTime::find($id)
        ->update([
            'saturdayStart' => $request->input('saturdayStart'),
            'saturdayEnd' => $request->input('saturdayEnd'),

            'sundayStart' => $request->input('sundayStart'),
            'sundayEnd' => $request->input('sundayEnd'),

            'mondayStart' => $request->input('mondayStart'),
            'mondayEnd' => $request->input('mondayEnd'),
            
            'tuesdayStart' => $request->input('tuesdayStart'),
            'tuesdayEnd' => $request->input('tuesdayEnd'),

            'wednesdayStart' => $request->input('wednesdayStart'),
            'wednesdayEnd' => $request->input('wednesdayEnd'),

            'thursdayStart' => $request->input('thursdayStart'),
            'thursdayEnd' => $request->input('thursdayEnd'),

            'fridayStart' => $request->input('fridayStart'),
            'fridayEnd' => $request->input('fridayEnd'),
        ]);

        return redirect('seller/setting');
    }
}
