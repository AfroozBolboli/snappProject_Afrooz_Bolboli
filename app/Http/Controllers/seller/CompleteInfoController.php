<?php

namespace App\Http\Controllers\seller;

use App\Http\Controllers\Controller;
use App\Http\Requests\seller\CompleteInfoRequest;
use App\Models\Restaurant;
use App\Models\RestaurantCategory;
use App\Models\RestaurantWorkingTime;

class CompleteInfoController extends Controller
{
    public function index()
    {

        return view('seller.CompleteInfo.create');
    }

    public function create()
    {
        $auth = Restaurant::where('owner_id', auth()->user()->id)->first();
        if(!empty($auth))
        {
            return view('seller.dashboard');
        }
        $categories = RestaurantCategory::all();
        return view('seller.CompleteInfo.create')->with('categories', $categories);
    }


    public function store(CompleteInfoRequest $request)
    {
        $request->validated();

        $categories = implode("-", $request->categories);
        $owner_id = auth()->user()->id;

        $Restaurant = Restaurant::create([
            'name' => $request->input('name'),
            'phone' => $request->input('phone'),
            'address' => $request->input('address'),
            'latitude' => $request->input('latitude'),
            'longitude' => $request->input('longitude'),
            'accountNumber' => $request->input('accountNumber'),
            'categories' => $categories,
            'owner_id' => $owner_id,
        ]);

        $workingTime = RestaurantWorkingTime::create([
            'restaurant_id' => $Restaurant->id
        ]);

        return redirect('seller/dashboard');
    }
}
