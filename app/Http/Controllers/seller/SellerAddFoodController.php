<?php

namespace App\Http\Controllers\seller;

use App\Http\Controllers\Controller;
use App\Models\Food;
use App\Models\FoodCategory;
use App\Models\Restaurant;
use App\Models\RestaurantCategory;
use Illuminate\Http\Request;
use Throwable;

class SellerAddFoodController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $restaurant_id = Restaurant::where('owner_id', auth()->user()->id)->first();
        if(!empty($restaurant_id))
            $restaurant_id = $restaurant_id->id;
        $foods = Food::where('restaurant_id', $restaurant_id)->paginate(2);
        return view('seller.food.index')->with('foods', $foods);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = FoodCategory::all();
        return view('seller.food.create')->with('categories',$categories);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'image' => 'mimes:jpg,png,jpeg|max:5048',
            'price' => 'required',
            'category' => 'required',
        ]); 

        if(!empty($request->image))
        {       
            $newImageName = time().'-'.$request->title.'.'.$request->image->extension();
            $request->image->move(public_path('images'), $newImageName);
        }

            $restaurant_id = Restaurant::where('owner_id', auth()->user()->id)->first();
            $restaurant_id = $restaurant_id->id;
            if($request->input('ingredient'))
                $ingredient = $request->input('ingredient');
            else
                $ingredient = '';
            $food = Food::create([
                'name' => $request->input('name'),
                'ingredient' => $ingredient,
                'price' => $request->input('price'),
                'category' => $request->input('category'),
                'image_path' => $newImageName,
                'restaurant_id' => $restaurant_id
            ]);

        return redirect('seller/food');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $food = Food::find($id);        
        $categories = FoodCategory::all();
        return view('seller/food/edit',[
            'food' => $food,
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
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'image' => 'mimes:jpg,png,jpeg|max:5048',
            'price' => 'required',
            'category' => 'required',
        ]); 

        if(!empty($request->image))
        {       
            $newImageName = time().'-'.$request->title.'.'.$request->image->extension();
            $request->image->move(public_path('images'), $newImageName);
        }
        else
            $newImageName = '';

        $foodCategory = FoodCategory::where('title',$request->category)->first()->id;
        if($request->input('ingredient'))
            $ingredient = $request->input('ingredient');
        else
            $ingredient = '';

        $food = Food::where('id', $id)
            ->update([
                'name' => $request->input('name'),
                'ingredient' => $ingredient,
                'price' => $request->input('price'),
                'category' => $foodCategory,
                'image_path' => $newImageName,
        ]);

        return redirect('seller/food');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $food = Food::find($id);
        $food->delete();
        return redirect('seller/food');
    }

    public function filter(Request $request){
        $restaurant_id = Restaurant::where('owner_id', auth()->user()->id)->first();
        if(!empty($restaurant_id))
            $restaurant_id = $restaurant_id->id;
            
        if(request('foodFilter'))
        {
            $foods = Food::where('restaurant_id', $restaurant_id)
                    ->where('name', 'like', '%'.request('foodFilter').'%')
                    ->get();
        }
        elseif(request('categoryFilter'))
        {
            $foods =  Food::where('restaurant_id', $restaurant_id)
                    ->where('category', request('categoryFilter'))
                    ->get();
        }
        else
        {
            $foods =  Food::where('restaurant_id', $restaurant_id)
                      ->get();
        }

        return view('seller.food.index')->with('foods', $foods);
    }
}
