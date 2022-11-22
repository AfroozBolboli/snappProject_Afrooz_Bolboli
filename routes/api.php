<?php

use App\Http\Controllers\customer\CustomerAddressController;
use App\Http\Controllers\customer\RestaurantApiController;
use App\Http\Controllers\customer\UserAuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//public routes 
Route::post('/register' , [UserAuthController::class, 'register']);
Route::post('/login' , [UserAuthController::class, 'login']);


//Protected routes
Route::group(['middleware' => ['auth:sanctum']], function(){
    Route::post('/logout' , [UserAuthController::class, 'logout']);
    
    Route::resource('/userAddress', CustomerAddressController::class);
    Route::post('/userAddress/currentAddress/{id}' , [CustomerAddressController::class, 'currentAddress']);
    Route::patch('/userAddress/{id}', [CustomerAddressController::class, 'update']);

    Route::resource('/restaurants', RestaurantApiController::class);
    Route::get('/restaurants/{restaurant_id}/foods', [RestaurantApiController::class, 'foods']);
});
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
