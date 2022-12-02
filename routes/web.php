<?php

use App\Http\Controllers\admin\AdminBannerController;
use App\Http\Controllers\admin\AdminCommentController;
use App\Http\Controllers\admin\AdminDiscountController;
use App\Http\Controllers\admin\AdminFoodController;
use App\Http\Controllers\admin\AdminFoodpartyController;
use App\Http\Controllers\admin\RestaurantCategoryController;
use App\Http\Controllers\seller\CommentController;
use App\Http\Controllers\seller\CompleteInfoController;
use App\Http\Controllers\seller\SellerAddFoodController;
use App\Http\Controllers\seller\SellerOrderStatus;
use App\Http\Controllers\seller\SellerReportsController;
use App\Http\Controllers\seller\SellerSettingController;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Gate;

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
    if (Gate::allows('isAdmin', auth()->user())) 
        return view('admin.dashboard');
    else
        return view('seller.infoPage');

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
        Route::resource('/discount', AdminDiscountController::class);
        Route::get('/foodparty/foodlist/all', [AdminFoodpartyController::class, 'foodlist']);
        Route::resource('/foodparty', AdminFoodpartyController::class);
        Route::resource('/comments', AdminCommentController::class);
    });

    Route::group([
        'prefix' => 'seller',
        'middleware' => 'isSeller',
        'as' => 'seller.'
    ], function(){
        Route::get('dashboard', function(){
            return view('seller.dashboard');
        });
        Route::resource('/completeInfo', CompleteInfoController::class);
        Route::resource('/food', SellerAddFoodController::class);
        Route::post('/food/filter', [SellerAddFoodController::class, 'filter']);
        Route::resource('/setting', SellerSettingController::class);

        Route::resource('/orderStatus', SellerOrderStatus::class);
        Route::get('/orderStatus/archive/all', [SellerOrderStatus::class, 'archive']);

        // Route::resource('/reports', SellerReportsController::class);
        Route::get('/reports', [SellerReportsController::class, 'index'])->name('reports.index');
        Route::post('/reports/filter', [SellerReportsController::class, 'filter']);

        Route::resource('/comments', CommentController::class);
        Route::post('/comments/filter', [CommentController::class, 'filter']);

    });

});

require __DIR__.'/auth.php';
