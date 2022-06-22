<?php

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
Route::post('login', '\Laravue3\Stateless\Controllers\LoginController@authenticate');

// Route::middleware(['stateless'])->get('profile', function (Request $request) {
//     return response($request->user());
// });

Route::middleware(['stateless'])->group(function($router) {
    Route::get('check-auth', '\Laravue3\Stateless\Controllers\LoginController@checkLogin');
    Route::get('profile', '\App\Users\UserController@profile');

    Route::apiResource('users', 'App\Users\UserController', ['only' => ['update']]);
});
