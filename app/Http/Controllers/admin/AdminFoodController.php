<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\admin\AdminFoodStoreRequest;
use App\Http\Requests\admin\AdminFoodUpdateRequest;
use App\Models\FoodCategory;
use App\Models\RestaurantCategory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Throwable;

class AdminFoodController extends Controller
{
    use SoftDeletes;

    public function index()
    {
        $foods = FoodCategory::all();
        return view('admin/foodCategory/index')->with('foods', $foods);
    }

    public function create()
    {
        return view('admin/foodCategory/create');
    }

    public function store(AdminFoodStoreRequest $request)
    {
        $request->validated();

        $image_path = time().$request->file('image')->getClientOriginalName();
        $uploadImage = Storage::disk('public')->putFileAs('adminFood/',$request->file('image'), $image_path);

        try
        {
            $restaurantCategory = RestaurantCategory::where('title',$request->restaurantCategory)->first()->id;

            $food = FoodCategory::create([
                'title' => $request->input('title'),
                'restaurantCategory_id' => $restaurantCategory,
                'image_path' => $image_path
            ]);
        }catch (Throwable $e) {
            report($e);
            $error = 'این دسته بندی رستوران موجود نمی باشد';
            return view('admin/foodCategory/create')->with('error', $error);
        }

        return redirect('admin/foodCategory');
    }


    public function edit($id)
    {
        $food = FoodCategory::find($id);
        return view('admin.foodCategory.edit')->with('food', $food);
    }

    public function update(AdminFoodUpdateRequest $request, $id)
    {
        $request->validated();

        $image_path = time().$request->file('image')->getClientOriginalName();
        $uploadImage = Storage::disk('public')->putFileAs('adminFood/',$request->file('image'), $image_path);
        Storage::disk('public')->delete('adminFood/'.FoodCategory::find($id)->image_path);

        $food = FoodCategory::find($id)
            ->update([
                'title' => $request->input('title'),
                'image_path' => $image_path,
        ]);

        return redirect('admin/foodCategory');
    }

    public function destroy($id)
    {
        $food = FoodCategory::find($id);
        Storage::disk('public')->delete('adminFood/'.$food->image_path);  
        $food->delete();
        return redirect('admin/foodCategory');
    }
}
