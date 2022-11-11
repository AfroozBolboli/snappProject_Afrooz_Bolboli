<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\admin\AdminFoodStoreRequest;
use App\Http\Requests\admin\AdminFoodUpdateRequest;
use App\Models\FoodCategory;
use App\Models\RestaurantCategory;
use Illuminate\Http\Request;
use Throwable;

class AdminFoodController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $foods = FoodCategory::all();
        return view('admin/foodCategory/index')->with('foods', $foods);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin/foodCategory/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AdminFoodStoreRequest $request)
    {
        $request->validated();

        $newImageName = time().'-'.$request->title.'.'.$request->image->extension();
        
        $request->image->move(public_path('images'), $newImageName);
        try
        {
            $restaurantCategory = RestaurantCategory::where('title',$request->restaurantCategory)->first()->id;

            $food = FoodCategory::create([
                'title' => $request->input('title'),
                'restaurantCategory_id' => $restaurantCategory,
                'image_path' => $newImageName
            ]);
        }catch (Throwable $e) {
            report($e);
            $error = 'این دسته بندی رستوران موجود نمی باشد';
            return view('admin/foodCategory/create')->with('error', $error);
        }

        return redirect('admin/foodCategory');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $food = FoodCategory::find($id);
        return view('admin/foodCategory/show')->with('food', $food);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $food = FoodCategory::find($id);
        return view('admin.foodCategory.edit')->with('food', $food);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AdminFoodUpdateRequest $request, $id)
    {
        $request->validated();

        $newImageName = time().'-'.$request->title.'.'.$request->image->extension();
        $request->image->move(public_path('images'), $newImageName);

        $food = FoodCategory::find($id)
            ->update([
                'title' => $request->input('title'),
                'image_path' => $newImageName,
        ]);

        return redirect('admin/foodCategory');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $food = FoodCategory::find($id);
        $food->delete();
        return redirect('admin/foodCategory');
    }
}
