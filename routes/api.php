<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\TargetController;
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
use App\Http\Controllers\UserController;
Route::post('/login', [LoginController::class, 'login']);
Route::get('/targets', [TargetController::class, 'index'])->middleware('auth');
Route::post('/test', [UserController::class, 'test']);
Route::get('/test', [UserController::class, 'test']);

Route::middleware('auth:api')->get('/user', function (Request $request) {

    return $request->user();
});
