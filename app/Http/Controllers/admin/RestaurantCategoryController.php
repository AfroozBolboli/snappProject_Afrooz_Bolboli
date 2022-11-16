<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\admin\AdminRestaurantCategoryRequest;
use App\Models\RestaurantCategory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class RestaurantCategoryController extends Controller
{
    use SoftDeletes;

    public function index()
    {
        $categories = RestaurantCategory::all();
        return view('admin.restaurantCategory.index')->with('categories', $categories);
    }

    public function create()
    {
        return view('admin.restaurantCategory.create');
    }

    public function store(AdminRestaurantCategoryRequest $request)
    {
        $request->validated();

        $image_path = time().$request->file('image')->getClientOriginalName();
        $uploadImage = Storage::disk('public')->putFileAs('adminRestaurantCategory/',$request->file('image'), $image_path);

        $category = RestaurantCategory::create([
            'title' => $request->input('title'),
            'image_path' => $image_path
        ]);

        return redirect('admin/restaurantCategory');
    }

    public function edit($id)
    {
        $category = RestaurantCategory::find($id);
        return view('admin.restaurantCategory.edit')->with('category', $category);
    }

    public function update(AdminRestaurantCategoryRequest $request, $id)
    {
        $request->validated();

        $image_path = time().$request->file('image')->getClientOriginalName();
        $uploadImage = Storage::disk('public')->putFileAs('adminRestaurantCategory/',$request->file('image'), $image_path);
        Storage::disk('public')->delete('adminRestaurantCategory/'.RestaurantCategory::find($id)->image_path);


        $category = RestaurantCategory::find($id)
            ->update([
                'title' => $request->input('title'),
                'image_path' => $image_path,
        ]);

        return redirect('admin/restaurantCategory');
    }


    public function destroy($id)
    {
        $category = RestaurantCategory::find($id);
        Storage::disk('public')->delete('adminRestaurantCategory/'.$category->image_path);   
        $category->delete();
        return redirect('admin/restaurantCategory');
    }
}
