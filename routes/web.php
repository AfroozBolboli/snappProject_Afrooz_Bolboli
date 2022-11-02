<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\adminOnly;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\customerOnly;
use App\Http\Controllers\SellerController;
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
        Route::get('/adminEx', [adminOnly::class, 'index']);
        //Route::get('/', somecontroller)->name('tasks.index)
    });

    Route::group([
        'prefix' => 'seller',
        'middleware' => 'isSeller',
        'as' => 'seller.'
    ], function(){
        Route::get('/dashboard', [SellerController::class, 'index']);
        //Route::get('/', somecontroller)->name('tasks.index)
    });

    Route::group([
        'prefix' => 'customer',
        'middleware' => 'isCustomer',
        'as' => 'customer.'
    ], function(){
        Route::get('customerEx', [customerOnly::class, 'index']);
        //Route::get('/', somecontroller)->name('tasks.index)
    });
});

require __DIR__.'/auth.php';
