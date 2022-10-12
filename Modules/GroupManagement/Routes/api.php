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
    Route::get("/{id}/view", 'GMPositionController@show')->name("api.group_management.position.position");
    Route::get("/", 'GMPositionController@index')->name("api.group_management.position.positions");
});

Route::prefix("/groupmanagement/group")->middleware(["auth_api_module:backend"])->group(function () {
    Route::post("/add", 'GMGroupController@store')->name("api.group_management.group.add");
    Route::post("/update", 'GMGroupController@update')->name("api.group_management.group.update");
    Route::post("/delete", 'GMGroupController@destroy')->name("api.group_management.group.delete");
    Route::post("/select-company", "GMGroupController@selectCompany")->name("api.group_management.group.select_company");
    Route::get("/current-company", "GMGroupController@getCurrentCompany")->name("api.group_management.group.current_company");
    Route::get("/{id}/view", 'GMGroupController@show')->name("api.group_management.group.group");
    Route::get("/", 'GMGroupController@index')->name("api.group_management.group.groups");
});

Route::prefix("/groupmanagement/portal")->middleware(["auth_api_module:backend"])->group(function () {
    Route::post("/add", "GMPortalController@addPortal")->name("api.group_management.portal.add");
    Route::post("/update", "GMPortalController@updatePortal")->name("api.group_management.portal.update");
    Route::get("/portals/{table_name}", "GMPortalController@getPortalBy_TableName")->name("api.group_management.portal.portals");
    Route::get("/{id}/view", "GMPortalController@getPortalById")->name("api.group_management.portal.portal");
    // Route::get("/{gm_table_name}", "GMPortalController@getPortalBy_TableName")->name("api.group_management.portal.portal_by_id_and_table");
});

Route::prefix("/groupmanagement/portal-selected")->middleware(["auth_api_module:backend"])->group(function () {
    Route::post("/add", "GMPortalController@addPortalSelected")->name("api.group_management.portal_selected.add");
    Route::post("/update", "GMPortalController@updatePortalSelected")->name("api.group_management.portal_selected.update");
    Route::get("/current", "GMPortalController@getCurrentPortalSelected")->name("api.group_management.portal_selected.current");
    Route::get("/current/delete", "GMPortalController@deletePortalSelected")->name("api.group_management.portal_selected.delete_current");
});
