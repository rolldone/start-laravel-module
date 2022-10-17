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

// Route::middleware('auth:api')->get('/dashboard', function (Request $request) {
//     return $request->user();
// });


Route::prefix("/dashboard")->middleware(["auth_api_module:backend"])->group(function () {
  // New Prefix
  Route::prefix("/employee")->middleware([])->group(function () {
    Route::get("/employees/with-group-and-free", 'DEmployeeController@getEmployeesByFree_AndCurrentGroup')->name("api.dashboard.employee.employees.with_group_and_free");
    // New Prefix
    Route::prefix("/upg")->middleware([])->group(function () {
      Route::get("/group/current/{employee_id}/employee/view", 'DUserPositionGroupController@getUPG_ByCurrentGroup_EmployeeId')->name("api.dashboard.employee.upg.upg_group_employee");
      Route::get("/upg-s/group/current", 'DUserPositionGroupController@getsUPGS_ByCurrentGroup')->name("api.dashboard.employee.upg.upg_s_current_group");
      Route::get("/{id}/view", 'DUserPositionGroupController@getUGPById')->name("api.dashboard.employee.upg.upg");
      Route::post("/current/group/add","DUserPositionGroupController@addOrUpdateByCurrentGroupUPG")->name("api.dashboard.employee.upg.add");
    });
  });
});
