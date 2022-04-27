<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductDetailController;
use App\Http\Controllers\UserController;

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


Route::middleware('auth:sanctum')->group(function() {
    Route::get('/', function () {
        return 'Home';
    });
    Route::resource('users', UserController::class);
    Route::resource('categories', CategoryController::class);
    Route::resource('product-details', ProductDetailController::class);
    Route::resource('products', ProductController::class);
});

Route::prefix('/public')->group(function() {    
    Route::get('categories', [CategoryController::class, 'publicList']);
    Route::get('product-details', [ProductDetailController::class, 'publicProductDetail']);
    Route::get('products', [ProductController::class, 'publicProduct']);
});

Route::controller(AuthController::class)
    ->prefix('auth')
    ->group(function() {
        
        Route::middleware('auth:sanctum')->group(function() {
            
            Route::get('/', function() {
                return auth()->user();
            });
            Route::post('logout', 'logout');
        
        });

        Route::post('validate', 'login');

});