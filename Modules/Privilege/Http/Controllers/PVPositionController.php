<?php

namespace Modules\Privilege\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Modules\Auth\Http\Controllers\BaseController;
use Modules\GroupManagement\Http\Controllers\GMPositionController;
use Modules\Privilege\Services\PVPositionService;

class PVPositionController extends GMPositionController
{
  public function returnPositionService()
  {
    return new PVPositionService();
  }

  public function getPositionsByPrivilegeId(Request $req, int $pv_privilege_id)
  {
    try {
      $props = $req->all();
      $props["take"] = $req->query("take", 100);
      $props["skip"] = $req->query("skip", 0);
      $gmPositionService = $this->returnPositionService();
      $resData = $gmPositionService->getPositionsByPrivilegeId($pv_privilege_id, $props);
      $resData = [
        'status' => 'success',
        'status_code' => 200,
        'return' => $resData
      ];
      return response()->json($resData, $resData['status_code']);
    } catch (Exception $ex) {
      return $this->returnSimpleException($ex);
    }
  }

  public function getsWithoutPrivilegeId(Request $req, int $privilege_id)
  {
    try {
      $props = $req->all();
      $props["take"] = $req->input("take", 100);
      $props["skip"] = $req->input("skip", 0);
      $pvPositionService = $this->returnPositionService();
      $resData = $pvPositionService->getPositionWithoutPrivilegeId($privilege_id, $props);
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
      $props = $req->all();
      $pvPositionService = $this->returnPositionService();
      $resData = $pvPositionService->joinPrivilege($props["pv_privilege_id"], $props["position_id"]);
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
