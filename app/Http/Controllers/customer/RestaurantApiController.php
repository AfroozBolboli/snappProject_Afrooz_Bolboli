<?php

namespace App\Http\Controllers\customer;

use App\Http\Controllers\Controller;
use App\Http\Resources\FoodCategoryResource;
use App\Http\Resources\RestaurantResource;
use App\Http\Resources\ShowFoodResource;
use App\Models\Food;
use App\Models\FoodCategory;
use App\Models\Restaurant;
use Illuminate\Http\Request;

class RestaurantApiController extends Controller
{

    public function index()
    {
        return RestaurantResource::collection(Restaurant::all());
    }

    public function show($id)
    {
        return RestaurantResource::collection(Restaurant::where('id', $id)->get());
    }

    public function foods($id)
    {
        $categories = Food::select('category')->distinct()->where('restaurant_id', $id)->get();
        $categoriesArray = [];
        for($i=0 ; $i < count($categories); $i++)
        {
            $categoriesArray[] = FoodCategory::where('title', $categories[$i]->category)->get();
            $categoriesArray[$i] = $categoriesArray[$i][0];
        }

        return ['categories' => FoodCategoryResource::collection($categoriesArray)];

    }

    public function isOpen()
    {
        return ['Restaurants' => RestaurantResource::collection(Restaurant::where('status', 1)->get())];
    }

    public function type($value)
    {
        return ['Restaurants' => RestaurantResource::collection(Restaurant::where('categories', $value)->get())];
    }

    public function score($value)
    {
        return ['Restaurants' => RestaurantResource::collection(Restaurant::where('score', $value)->get())];
    }

}
