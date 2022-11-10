<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\admin\AdminRestaurantCategoryRequest;
use App\Models\RestaurantCategory;
use Illuminate\Http\Request;

class RestaurantCategoryController extends Controller
{
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = RestaurantCategory::all();
        return view('admin/restaurantCategory/index')->with('categories', $categories);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin/restaurantCategory/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AdminRestaurantCategoryRequest $request)
    {
        $request->validated();

        $newImageName = time().'-'.$request->title.'.'.$request->image->extension();
        $request->image->move(public_path('images'), $newImageName);

        $category = RestaurantCategory::create([
            'title' => $request->input('title'),
            'image_path' => $newImageName
        ]);

        return redirect('admin/restaurantCategory');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $category = RestaurantCategory::find($id);
        return view('admin/restaurantCategory/show')->with('category', $category);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = RestaurantCategory::find($id);
        return view('admin/restaurantCategory/edit')->with('category', $category);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AdminRestaurantCategoryRequest $request, $id)
    {
        $request->validated();

        $newImageName = time().'-'.$request->title.'.'.$request->image->extension();
        $request->image->move(public_path('images'), $newImageName);

        $category = RestaurantCategory::find($id)
            ->update([
                'title' => $request->input('title'),
                'image_path' => $newImageName,
        ]);

        return redirect('admin/restaurantCategory');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = RestaurantCategory::find($id);
        $category->delete();
        return redirect('admin/restaurantCategory');
    }
}
