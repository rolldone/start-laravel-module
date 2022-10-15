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

// Route::middleware('auth:api')->get('/privilege', function (Request $request) {
//     return $request->user();
// });



Route::prefix("/privilege/item")->middleware(["auth_api_module:backend"])->group(function () {
    Route::post("/add", "PVPrivilegeController@addPrivilege")->name("api.privilege.item.add");
    Route::post("/update", "PVPrivilegeController@addPrivilege")->name("api.privilege.item.update");
    Route::get("/privileges", "PVPrivilegeController@getPrivilges")->name("api.privilege.item.privileges");
    Route::get("/{id}/view", "PVPrivilegeController@getPrivilege")->name("api.privilege.item.privilege");
});



Route::prefix("/privilege/m")->middleware(["auth_api_module:backend"])->group(function () {
    // Main
    Route::post("/add", "PVPrivilegeController@addPrivilege")->name("api.privilege.add");
    Route::post("/update", "PVPrivilegeController@updatePrivilege")->name("api.privilege.update");
    Route::get("/privileges", "PVPrivilegeController@getPrivilges")->name("api.privilege.privileges");
    Route::get("/{id}/view", "PVPrivilegeController@getPrivilege")->name("api.privilege.privilege");

    // Position Include
    Route::prefix("/position")->middleware([])->group(function () {
        Route::post("/join", "PVPositionController@joinPrivilege")->name("api.privilege.position.join_privilege");
        Route::post("/add", 'PVPositionController@store')->name("api.privilege.position.add");
        Route::post("/update", 'PVPositionController@update')->name("api.privilege.position.update");
        Route::post("/delete", 'PVPositionController@destroy')->name("api.privilege.position.delete");
        Route::get("/positions/without-privilege/{pv_privilege_id}/privilege-id", 'PVPositionController@getsWithoutPrivilegeId')->name("api.privilege.position.positions.without_privilege_id");
        Route::get("/positions/privilege/{pv_privilege_id}/privilege-id", 'PVPositionController@getPositionsByPrivilegeId')->name("api.privilege.position.positions");
        Route::get("/{id}/view", 'PVPositionController@show')->name("api.privilege.position.position");
    });

    // User Include
    Route::prefix("/user")->middleware([])->group(function () {
        Route::post("/join", "PVUserController@joinPrivilege")->name("api.privilege.user.join_privilege");
        Route::post("/add", 'PVUserController@store')->name("api.privilege.user.add");
        Route::post("/update", 'PVUserController@update')->name("api.privilege.user.update");
        Route::post("/delete", 'PVUserController@destroy')->name("api.privilege.user.delete");
        Route::get("/users/without-privilege/{pv_privilege_id}/privilege-id", 'PVUserController@getUsersWithoutPrivilegeId')->name("api.privilege.user.users.without_privilege_id");
        Route::get("/users/privilege/{pv_privilege_id}/privilege-id", 'PVUserController@getUsersByPrivilegeId')->name("api.privilege.user.users");
        Route::get("/{id}/view", 'PVUserController@show')->name("api.privilege.user.user");
    });
});
