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

// Route::middleware('auth:api')->get('/portalgroup', function (Request $request) {
//     return $request->user();
// });

Route::prefix("/portalgroup/portal")->middleware(["auth_api_module:backend"])->group(function () {

    // Portal itself
    Route::post("/add", "PGPortalController@addPortal")->name("api.portal_group.portal.add");
    Route::post("/update", "PGPortalController@updatePortal")->name("api.portal_group.portal.update");
    Route::get("/portals", "PGPortalController@getPortals")->name("api.portal_group.portal.portals");
    Route::get("/own-portals", "PGPortalController@getOwnPortals")->name("api.portal_group.portal.own_portals");
    Route::get("/{id}/view", "PGPortalController@getPortalById")->name("api.portal_group.portal.portal");
    // Route::get("/{pg_table_name}", "PGPortalController@getPortalBy_TableName")->name("api.group_management.portal.portal_by_id_and_table");

    // User
    Route::get("/user/users/portal/{portal_id}/portal-id", "PGUserController@getUsersByPortalId")->name("api.portal_group.portal.user.users.with_portal_id");
    Route::get("/user/users/without-portal/{portal_id}/portal-id", "PGUserController@getUsersWithoutPortalId")->name("api.portal_group.portal.user.users.without_portal_id");
    Route::post("/user/portal/join", "PGUserController@joinPortal")->name("api.portal_group.portal.user.join");

    // Position
    Route::get("/position/positions/portal/{portal_id}/portal-id", "PGPositionController@getPositionsByPortalId")->name("api.portal_group.position.positions.with_portal_id");
    Route::get("/position/positions/without-portal/{portal_id}/portal-id", "PGPositionController@getPositionWithoutPortalId")->name("api.portal_group.position.positions.without_portal_id");
    Route::post("/position/portal/join", "PGPositionController@joinPortal")->name("api.portal_group.portal.position.join");
});

Route::prefix("/portalgroup/portal-selected")->middleware(["auth_api_module:backend"])->group(function () {
    Route::post("/add", "PGPortalController@addPortalSelected")->name("api.portal_group.portal_selected.add");
    Route::post("/update", "PGPortalController@updatePortalSelected")->name("api.portal_group.portal_selected.update");
    Route::get("/current", "PGPortalController@getCurrentPortalSelected")->name("api.portal_group.portal_selected.current");
    Route::get("/current/delete", "PGPortalController@deletePortalSelected")->name("api.portal_group.portal_selected.delete_current");
});
