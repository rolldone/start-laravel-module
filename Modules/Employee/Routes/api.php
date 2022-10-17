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
    Route::get("/employees/{group_id}/with-group-and-free", 'EmployeeController@getEmployeeByHasCurrentGroup_AndFree')->name("api.employee.employees.with_current_group_and_free");
    Route::get("/", 'EmployeeController@index')->name("api.employee.employees");


    Route::prefix("/upg")->middleware([])->group(function () {
        Route::post("/add", 'UserPositionGroupController@addUPG')->name("api.employee.upg.add");
        Route::post("/update", 'UserPositionGroupController@updateUPG')->name("api.employee.upg.update");
        Route::post("/delete", 'UserPositionGroupController@deleteUPG')->name("api.employee.upg.delete");
        Route::get("/{id}/view", 'UserPositionGroupController@getUGPById')->name("api.employee.upg.upg");
        Route::get("/{group_id}/group/{employee_id}/employee", 'UserPositionGroupController@getUPG_ByGroup_EmployeeId')->name("api.employee.upg.upg_group_employee");
        Route::get("/upg-s/{group_id}/group", 'UserPositionGroupController@getsUPGS_ByGroup')->name("api.employee.upg.upg_s_group");
        Route::get("/upg-s", 'UserPositionGroupController@getByUPGS')->name("api.employee.upg.upg_s");
    });
});
