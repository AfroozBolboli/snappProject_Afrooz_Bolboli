<?php

namespace App\Http\Controllers\seller;

use App\Http\Controllers\Controller;
use App\Http\Requests\seller\SellerSettingRequest;
use App\Models\FoodCategory;
use App\Models\Restaurant;
use App\Models\RestaurantCategory;
use Illuminate\Http\Request;

class SellerSettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $restaurant = Restaurant::where('owner_id', auth()->user()->id)->first();
        return view('seller.setting.index')-> with('restaurant', $restaurant);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $restaurant = Restaurant::where('owner_id', auth()->user()->id)->first();
        $categories = RestaurantCategory::all();
        return view('seller.setting.edit',[
            'restaurant' => $restaurant,
            'categories' => $categories
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SellerSettingRequest $request, $id)
    {
        $request->validated();

        if(!empty($request->image))
        {       
            $newImageName = time().'-'.$request->title.'.'.$request->image->extension();
            $request->image->move(public_path('images'), $newImageName);
        }
        else
            $newImageName = '';

        $categories = implode("-", $request->categories);
        
        $restaurant = Restaurant::find($id)
            ->update([
                'name' => $request->input('name'),
                'phone' => $request->input('phone'),
                'address' => $request->input('address'),
                'accountNumber' => $request->input('accountNumber'),
                'workingDay' => $request->input('workingDay'),
                'restaurantPicture' => $newImageName,
                'shippingCost' => $request->input('shippingCost'),
                'status' => $request->input('status'),
                'categories' => $categories,
        ]);



        return redirect('seller/setting');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
