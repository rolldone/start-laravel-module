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

Route::prefix("/groupmanagement/division")->middleware(["auth_api_module:backend"])->group(function () {
    Route::post("/add", 'GMDivisionController@store')->name("api.group_management.division.add");
    Route::post("/update", 'GMDivisionController@update')->name("api.group_management.division.update");
    Route::post("/delete", 'GMDivisionController@destroy')->name("api.group_management.division.delete");
    Route::get("/", 'GMDivisionController@index')->name("api.group_management.division.divisions");
    Route::get("/{id}/view", 'GMDivisionController@show')->name("api.group_management.division.division");
});

Route::prefix("/groupmanagement/position")->middleware(["auth_api_module:backend"])->group(function () {
    Route::post("/add", 'GMPositionController@store')->name("api.group_management.position.add");
    Route::post("/update", 'GMPositionController@update')->name("api.group_management.position.update");
    Route::post("/delete", 'GMPositionController@destroy')->name("api.group_management.position.delete");
    Route::get("/positions", 'GMPositionController@index')->name("api.group_management.position.positions");
    Route::get("/{id}/view", 'GMPositionController@show')->name("api.group_management.position.position");
});

Route::prefix("/groupmanagement/group")->middleware(["auth_api_module:backend"])->group(function () {
    Route::post("/add", 'GMGroupController@store')->name("api.group_management.group.add");
    Route::post("/update", 'GMGroupController@update')->name("api.group_management.group.update");
    Route::post("/delete", 'GMGroupController@destroy')->name("api.group_management.group.delete");
    Route::get("/groups", 'GMGroupController@index')->name("api.group_management.group.groups");
    Route::get("/{id}/view", 'GMGroupController@show')->name("api.group_management.group.group");
});
