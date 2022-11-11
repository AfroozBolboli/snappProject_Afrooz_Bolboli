<?php

namespace App\Http\Controllers\customer;

use App\Http\Controllers\Controller;
use App\Http\Resources\RestaurantResource;
use App\Http\Resources\ShowFoodResource;
use App\Models\Food;
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
        return RestaurantResource::collection(Restaurant::find($id)->get());
    }

    public function foods($id)
    {
        $foods = Food::where('restaurant_id', $id)->get();
        return ShowFoodResource::collection($foods);
    }

}
