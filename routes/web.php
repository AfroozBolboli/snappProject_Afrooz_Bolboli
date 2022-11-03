<?php

use App\Http\Controllers\admin\AdminBannerController;
use App\Http\Controllers\admin\AdminFoodController;
use App\Http\Controllers\admin\AdminRestaurantController;
use App\Http\Controllers\admin\RestaurantCategoryController;
use App\Http\Controllers\adminOnly;
use App\Http\Controllers\customerOnly;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    $role = auth()->user()->role;

    if($role == 1)
        return view('admin.dashboard');
    elseif($role == 2)
        return view('seller.dashboard');
    elseif($role == 3)
        return view('customer.dashboard');
    
})->middleware(['auth', 'verified'])->name('dashboard');

Route::group(['middleware' => 'auth'], function(){
    Route::group([
        'prefix' => 'admin',
        'middleware' => 'isAdmin',
        'as' => 'admin.' //just for route names in navigation as admin.task.index
    ], function(){
        Route::resource('/restaurantCategory', RestaurantCategoryController::class);
        Route::resource('/foodCategory', AdminFoodController::class);
        Route::resource('/banner', AdminBannerController::class);
    });

    Route::group([
        'prefix' => 'seller',
        'middleware' => 'isSeller',
        'as' => 'seller.'
    ], function(){
        // Route::get('/dashboard', [SellerController::class, 'index']);
        //Route::get('/', somecontroller)->name('tasks.index)
    });

    Route::group([
        'prefix' => 'customer',
        'middleware' => 'isCustomer',
        'as' => 'customer.'
    ], function(){
        Route::get('customerEx', [customerOnly::class, 'index']);
    });
});

require __DIR__.'/auth.php';
