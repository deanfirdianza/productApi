<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
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

Route::middleware('auth:sanctum')->get('/', function () {
    return 'test';
});

Route::middleware('auth:sanctum')->resource('users', UserController::class);

Route::controller(AuthController::class)->group(function() {
    Route::post('auth/validate', 'login');
    Route::post('auth/logout', 'logout');
});