<?php

namespace App\Http\Controllers\customer;

use App\Http\Controllers\Controller;
use App\Http\Resources\RestaurantResource;
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

}
