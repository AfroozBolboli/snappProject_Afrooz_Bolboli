<?php

namespace App\Http\Controllers\seller;

use App\Http\Controllers\Controller;
use App\Models\Restaurant;
use App\Models\RestaurantCategory;
use Illuminate\Http\Request;

class CompleteInfoController extends Controller
{
    public function index()
    {

        return view('seller/CompleteInfo/create');
    }

    public function create()
    {
        $auth = Restaurant::where('owner_id', auth()->user()->id)->first();
        if(!empty($auth))
        {
            return view('seller/dashboard');
        }
        $categories = RestaurantCategory::all();
        return view('seller/CompleteInfo/create')->with('categories', $categories);
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'accountNumber' => 'required',
        ]); 

        $categories = implode("-", $request->categories[]);
        $owner_id = auth()->user()->id;
        $info = Restaurant::create([
            'name' => $request->input('name'),
            'phone' => $request->input('phone'),
            'address' => $request->input('address'),
            'accountNumber' => $request->input('accountNumber'),
            'categories' => $categories,
            'owner_id' => $owner_id,
        ]);

        return redirect('seller/dashboard');
    }
}
