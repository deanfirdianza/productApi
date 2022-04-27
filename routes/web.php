<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
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
Route::resource('users', UserController::class)->middleware('api_auth')->except([
    'update', 'destroy'
]);

Route::controller(AuthController::class)->group(function() {
    Route::post('users', 'register')->middleware('api_auth');
    Route::post('users/login', 'login');
});