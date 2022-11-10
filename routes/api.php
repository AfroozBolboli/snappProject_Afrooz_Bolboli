<?php

use App\Http\Controllers\customer\CustomerAddressController;
use App\Models\UserAddress;
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

//Protected routes
Route::group(['middleware' => ['auth:sanctum']], function(){
    Route::get('/userAddress' , [CustomerAddressController::class, 'index']);
    Route::post('/userAddress' , [CustomerAddressController::class, 'store']);
    Route::patch('/userAddress/{id}' , [CustomerAddressController::class, 'update']);
    Route::delete('/userAddress/{id}' , [CustomerAddressController::class, 'destroy']); 
});
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
