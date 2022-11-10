<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Discount;
use App\Models\Restaurant;
use Illuminate\Http\Request;

class AdminDiscountController extends Controller
{
        /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $discounts = Discount::all();
        return view('admin.discount.index')->with('discounts', $discounts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin/discount/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validated();

        $validRestaurant = Restaurant::where('name', $request->restaurant_name)->first();
        if(empty($validRestaurant))
        {
            $error = 'رستورانی با این اسم یافت نشد';
            return view('admin/discount/create')->with('error', $error);
        }

        //checking if ending date is after starting date
        if($request->input('startingDate') > $request->input('endingDate'))
        {
            $error = 'تاریخ انقضا از تاریخ شروع عقب تر است';
            return view('admin/discount/create')->with('error', $error);       
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

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $discount = Discount::find($id);
        return view('admin/discount/show')->with('discount', $discount);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $discount = Discount::find($id);
        $discount->delete();
        return redirect('admin/discount');
    }
}
