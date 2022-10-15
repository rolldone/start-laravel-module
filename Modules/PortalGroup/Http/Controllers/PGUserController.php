<?php

namespace Modules\PortalGroup\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Modules\Auth\Http\Controllers\BaseController;
use Modules\PortalGroup\Entities\PGPortalSelected;
use Modules\PortalGroup\Services\PGPortalGroupService;
use Modules\PortalGroup\Services\PGPortalService;
use Modules\PortalGroup\Services\PGUserService;
use PDO;

class PGUserController extends BaseController
{

  public function getUsersByPortalId(Request $req, $portal_id)
  {
    try {
      $props = $this->getBaseQueryRequest($req, []);
      $userService = new PGUserService();
      $resData = $userService->getUsersByPortalId($portal_id, $props);
      $resData = [
        'status' => 'success',
        'status_code' => 200,
        'return' => $resData,
        "portal_id" => $portal_id
      ];
      return response()->json($resData, $resData["status_code"]);
    } catch (Exception $ex) {
      return $this->returnSimpleException($ex);
    }
  }

  public function getUsersWithoutPortalId(Request $req, $portal_id)
  {
    try {
      $props = $this->getBaseQueryRequest($req, []);
      $userService = new PGUserService();
      $resData = $userService->getUsersWithoutPortalId($portal_id, $props);
      $resData = [
        'status' => 'success',
        'status_code' => 200,
        'return' => $resData,
        "portal_id" => $portal_id
      ];
      return response()->json($resData, $resData["status_code"]);
    } catch (Exception $ex) {
      return $this->returnSimpleException($ex);
    }
  }


  public function joinPortal(Request $req)
  {
    try {
      $props = $req->post();
      $gmPortalGroup = new PGUserService();
      $old_portal_id = $props["pg_portal_id"];
      $resData = $gmPortalGroup->joinPortal($props["user_id"], $props["pg_portal_id"]);
      $portalService = new PGPortalService();
      if ($resData->getPg_portal_id() == null) {
        $portalService->deletePortalSelectedByUserId($props["user_id"]);
      }
      Log::debug("old :: ", [$old_portal_id, " :: ", $resData->getPg_portal_id_old()]);
      if ($resData->getPg_portal_id_old() != $old_portal_id) {
        $portalService->deletePortalSelectedByUserId($props["user_id"]);
      }
      $resData = [
        'status' => 'success',
        'status_code' => 200,
        'return' => $resData
      ];
      return response()->json($resData, $resData["status_code"]);
    } catch (Exception $ex) {
      return $this->returnSimpleException($ex);
    }
  }
}
