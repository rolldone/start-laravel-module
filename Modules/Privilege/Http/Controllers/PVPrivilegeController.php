<?php

namespace Modules\Privilege\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Modules\Auth\Http\Controllers\BaseController;
use Modules\Privilege\Services\PVPrivilegeService;

class PVPrivilegeController extends BaseController
{
  public function getPrivilges(Request $req)
  {
    try {
      $props = $req->all();
      $props["take"] = $req->input("take", 100);
      $props["skip"] = $req->input("skip", 0);
      $pvPrivilegeService = new PVPrivilegeService();
      $resData = $pvPrivilegeService->getPrivileges($props);
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

  public function getPrivilege(Request $req, $id)
  {
    try {
      $pvPrivilegeService = new PVPrivilegeService();
      $resData = $pvPrivilegeService->getById($id);
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

  public function addPrivilege(Request $req)
  {
    try {
      $props = $req->post();
      $pvPrivilegeService = new PVPrivilegeService();
      $resData = $pvPrivilegeService->addPrivilege($props);
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

  public function updatePrivilege(Request $req)
  {
    try {
      $props = $req->post();
      $pvPrivilegeService = new PVPrivilegeService();
      $resData = $pvPrivilegeService->updatePrivilege($props);
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
