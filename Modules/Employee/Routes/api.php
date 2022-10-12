<?php

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

Route::prefix("/employee")->middleware(["auth_api_module:backend"])->group(function () {
    Route::post("/add", 'EmployeeController@store')->name("api.employee.add");
    Route::post("/update", 'EmployeeController@update')->name("api.employee.update");
    Route::post("/delete", 'EmployeeController@destroy')->name("api.employee.delete");
    Route::get("/{id}/view", 'EmployeeController@show')->name("api.employee.employee");
    Route::get("/", 'EmployeeController@index')->name("api.employee.employees");
});
