<?php

namespace App\Http\Controllers\seller;

use App\Http\Controllers\Controller;
use App\Http\Requests\seller\SellerAddFoodRequest;
use App\Models\Discount;
use App\Models\Food;
use App\Models\FoodCategory;
use App\Models\Restaurant;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Throwable;

class SellerAddFoodController extends Controller
{
    use SoftDeletes;
    public function index()
    {
        $restaurant_id = Restaurant::where('owner_id', auth()->user()->id)->first();
        if(!empty($restaurant_id))
            $restaurant_id = $restaurant_id->id;
        $foods = Food::where('restaurant_id', $restaurant_id)->paginate(2);
        return view('seller.food.index')->with('foods', $foods);
    }

    public function create()
    {
        $restaurant_name = Restaurant::where('owner_id', auth()->user()->id)->first()->name;
        $categories = FoodCategory::all();
        $discounts = Discount::where('restaurant_name', $restaurant_name)->get();
        return view('seller.food.create',[
            'categories' => $categories,
            'discounts' => $discounts
        ]);
    }

    public function store(SellerAddFoodRequest $request)
    {
        $request->validated();

        if(!empty($request->image))
        {       
            $image_path = time().$request->file('image')->getClientOriginalName();
            $uploadImage = Storage::disk('public')->putFileAs('sellerAddFood/',$request->file('image'), $image_path);
        }

            $restaurant_id = Restaurant::where('owner_id', auth()->user()->id)->first();
            $restaurant_id = $restaurant_id->id;
            
            (!empty($request->input('ingredient'))) ? ($ingredient = $request->input('ingredient')) : ($ingredient = '');

            $food = Food::create([
                'name' => $request->input('name'),
                'ingredient' => $ingredient,
                'discountPrice' => $request->input('discount'),
                'foodParty' => $request->input('foodparty'),
                'price' => $request->input('price'),
                'category' => $request->input('category'),
                'image_path' => $image_path,
                'restaurant_id' => $restaurant_id
            ]);

        return redirect('seller/food');
    }

    public function edit($id)
    {
        $restaurant_name = Restaurant::where('owner_id', auth()->user()->id)->first()->name;
        $discounts = Discount::where('restaurant_name', $restaurant_name)->get();
        $food = Food::find($id);        
        $categories = FoodCategory::all();
        return view('seller/food/edit',[
            'food' => $food,
            'categories' => $categories,
            'discounts' => $discounts
        ]);
    }

    public function update(SellerAddFoodRequest $request, $id)
    {
        $request->validated();

        if(!empty($request->image))
        {       
            $image_path = time().$request->file('image')->getClientOriginalName();
            $uploadImage = Storage::disk('public')->putFileAs('sellerAddFood/',$request->file('image'), $image_path);
            Storage::disk('public')->delete('sellerAddFood/'.FoodCategory::find($id)->image_path);
        }
        else
            $image_path = '';

        $foodCategory = FoodCategory::where('title',$request->category)->first()->id;

        (!empty($request->input('ingredient'))) ? ($ingredient = $request->input('ingredient')) : ($ingredient = '');
        

        $food = Food::find($id)
            ->update([
                'name' => $request->input('name'),
                'ingredient' => $ingredient,
                'discountPrice' => $request->input('discount'),
                'foodParty' => $request->input('foodparty'),
                'price' => $request->input('price'),
                'category' => $foodCategory,
                'image_path' => $image_path,
        ]);

        return redirect('seller/food');
    }

    public function destroy($id)
    {
        $food = Food::find($id);
        Storage::disk('public')->delete('sellerAddFood/'.$food->image_path);   
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
