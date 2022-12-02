<?php

namespace App\Http\Controllers\customer;

use App\Http\Controllers\Controller;
use App\Http\Resources\FoodCategoryResource;
use App\Http\Resources\RestaurantResource;
use App\Http\Resources\ShowFoodResource;
use App\Models\Customer;
use App\Models\CustomerAddress;
use App\Models\Food;
use App\Models\FoodCategory;
use App\Models\Restaurant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RestaurantApiController extends Controller
{

    public function index()
    {
        $userCurrentAddress = json_decode(Customer::find(auth()->user()->id)->currentAddress);

        $restaurants = self::findNearestRestaurants($userCurrentAddress->latitude, $userCurrentAddress->longitude, 1000);

        return RestaurantResource::collection($restaurants);
    }

    public function show($id)
    {
        return RestaurantResource::collection(Restaurant::where('id', $id)->get());
    }

    public function foods($id)
    {
        $categories = Food::select('category')->distinct()->where('restaurant_id', $id)->get();
        $categoriesArray = [];
        for ($i = 0; $i < count($categories); $i++) {
            $categoriesArray[] = FoodCategory::where('title', $categories[$i]->category)->get();
            $categoriesArray[$i] = $categoriesArray[$i][0];
        }

        return ['categories' => FoodCategoryResource::collection($categoriesArray)];
    }

    private function findNearestRestaurants($latitude, $longitude, $radius = 400)
    {
        $restaurants = Restaurant::selectRaw("id, name, address, categories, status, restaurantPicture, latitude, longitude,
                         ( 6371 * acos( cos( radians(?) ) *
                           cos( radians( latitude ) )
                           * cos( radians( longitude ) - radians(?)
                           ) + sin( radians(?) ) *
                           sin( radians( latitude ) ) )
                         ) AS distance", [$latitude, $longitude, $latitude])
            ->where('status', '=', 1)
            ->having("distance", "<", $radius)
            ->orderBy("distance", 'asc')
            ->offset(0)
            ->limit(20)
            ->get();

        return $restaurants;
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
