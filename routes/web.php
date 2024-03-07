<?php

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
    return view('home');
})->middleware('auth');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('/users', UserController::class)->middleware('auth');
Route::get('/get-user-info/{user}', [App\Http\Controllers\UserController::class, 'get_user_info']);
//Route::post('/validate_user_form', [App\Http\Controllers\UserController::class, 'validateForm']);
Route::post('/validate_user_form', [UserController::class, 'validateForm'])->middleware('web');
Route::put('/validate_user_form', [UserController::class, 'validateForm'])->middleware('web');
