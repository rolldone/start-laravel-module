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

// Route::middleware('auth:api')->get('/useradmin', function (Request $request) {
//     return $request->user();
// });

Route::prefix("/user")->middleware(["auth_api_module:backend"])->group(function () {
    Route::post("/add", "UserAdminController@index")->name("api.user_admin.user.add");
    Route::post("/update", "UserAdminController@index")->name("api.user_admin.user.update");
    Route::get("/users", "UserAdminController@index")->name("api.user_admin.user.users");
    Route::get("/{id}/view", "UserAdminController@index")->name("api.user_admin.user.user");
});
