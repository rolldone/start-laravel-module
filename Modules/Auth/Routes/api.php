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

Route::group([
    'prefix' => 'auth',
    'middleware' => ["guest:web"] // ['auth:sanctum']
], function () {
    // return $request->user();
    Route::post("/login", 'AuthController@loginApi')->name("api.auth.login");
    Route::post("/register", 'AuthController@register')->name("api.auth.register");
});

Route::prefix("auth")->middleware(["auth_api_module:backend"])->group(function () {
    Route::get("/logout", 'AuthController@logout')->name("api.auth.logout");
    Route::get("/get", 'AuthController@getAuth')->name("api.auth.get_auth");
});
