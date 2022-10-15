<?php

namespace Modules\Privilege\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Modules\Auth\Http\Controllers\BaseController;
use Modules\Privilege\Services\PVPrivilegeService;
use Modules\Privilege\Services\PVUserAdminService;
use Modules\UserAdmin\Http\Controllers\UserAdminController;

class PVUserController extends UserAdminController
{
  protected function returnUserAdminService()
  {
    return new PVUserAdminService();
  }
  
  public function getUsersByPrivilegeId(Request $req, int $pv_privilege_id)
  {
    try {
      $props = $this->getBaseQueryRequest($req, []);
      $props["take"] = $req->query("take", 100);
      $props["skip"] = $req->query("skip", 0);
      $userService = $this->returnUserAdminService();
      $resData = $userService->getUsersByPrivilegeId($pv_privilege_id, $props);
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

  public function getUsersWithoutPrivilegeId(Request $req, int $privilege_id)
  {
    try {
      $props = $this->getBaseQueryRequest($req, []);
      $props["take"] = $req->query("take", 100);
      $props["skip"] = $req->query("skip", 0);
      $props["pv_privilege_id"] = $req->query("pv_privilege_id", null);
      $userService = $this->returnUserAdminService();
      $resData = $userService->getUsersWithoutPrivilegeId($privilege_id, $props);
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

  public function joinPrivilege(Request $req)
  {
    try {
      $props = $req->post();
      $userService = $this->returnUserAdminService();
      $resData = $userService->joinPrivilege($props["pv_privilege_id"], $props["user_id"]);
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
