<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
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

Route::middleware('auth:sanctum')
    ->get('/', function () {
    return 'Home';
});

Route::middleware('auth:sanctum')
    ->resource('users', UserController::class);

Route::controller(AuthController::class)
    ->prefix('auth')
    ->group(function() {
        Route::post('validate', 'login');
        
        Route::middleware('auth:sanctum')
        ->post('logout', 'logout');
});