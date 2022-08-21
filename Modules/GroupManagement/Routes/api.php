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

Route::prefix("groupmanagement/division")->middleware(["auth_api_module:backend"])->group(function () {
    Route::post("/add", 'AuthController@logout')->name("api.auth.logout");
    Route::post("/update", 'AuthController@getAuth')->name("api.auth.get_auth");
    Route::post("/delete", 'AuthController@getAuth')->name("api.auth.get_auth");
    Route::get("/divisions", 'AuthController@getAuth')->name("api.auth.get_auth");
    Route::get("/{id}/view", 'AuthController@getAuth')->name("api.auth.get_auth");
});

Route::prefix("groupmanagement/position")->middleware(["auth_api_module:backend"])->group(function () {
    Route::post("/add", 'AuthController@logout')->name("api.auth.logout");
    Route::post("/update", 'AuthController@getAuth')->name("api.auth.get_auth");
    Route::post("/delete", 'AuthController@getAuth')->name("api.auth.get_auth");
    Route::get("/positions", 'AuthController@getAuth')->name("api.auth.get_auth");
    Route::get("/{id}/view", 'AuthController@getAuth')->name("api.auth.get_auth");
});

Route::prefix("groupmanagement/group")->middleware(["auth_api_module:backend"])->group(function () {
    Route::post("/add", 'AuthController@logout')->name("api.auth.logout");
    Route::post("/update", 'AuthController@getAuth')->name("api.auth.get_auth");
    Route::post("/delete", 'AuthController@getAuth')->name("api.auth.get_auth");
    Route::get("/groups", 'AuthController@getAuth')->name("api.auth.get_auth");
    Route::get("/{id}/view", 'AuthController@getAuth')->name("api.auth.get_auth");
});
