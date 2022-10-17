<?php

namespace Modules\Employee\Http\Controllers;

use Exception;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Modules\Auth\Http\Controllers\BaseController;
use Modules\Employee\Services\EmployeeService;
use Modules\Employee\Services\UserPositionGroupService;
use Modules\GroupManagement\Helpers\GMGroupHelper;

class UserPositionGroupController extends BaseController
{
  public function addUPG(Request $req)
  {
  }

  public function addOrUpdateByGroupUPG(Request $req)
  {
    try {
      $props = $req->post();
      $userUPGService = new UserPositionGroupService();
      $resData = $userUPGService->addOrUpdateByGroupUPG($props);
      $resData = [
        'status' => "success",
        'status_code' => 200,
        'return' => $resData
      ];
      return response()->json($resData, $resData["status_code"]);
    } catch (Exception $ex) {
      return $this->returnSimpleException($ex);
    }
  }

  public function updateUPG(Request $req)
  {
  }

  public function deleteUPG(Request $req)
  {
  }

  public function getByUPGS(Request $req)
  {
    try {
      $props = $this->getBaseQueryRequest($req, []);
      $userUPGService = new UserPositionGroupService();
      $resData = $userUPGService->getsUPGS($props);
      $resData = [
        'status' => "success",
        'status_code' => 200,
        'return' => $resData
      ];
      return response()->json($resData, $resData["status_code"]);
    } catch (Exception $ex) {
      return $this->returnSimpleException($ex);
    }
  }

  public function getsUPGS_ByGroup(Request $req, int $group_id)
  {
    try {
      $props = $this->getBaseQueryRequest($req, []);
      $userUPGService = new UserPositionGroupService();
      $resData = $userUPGService->getsUPGS_ByGroupId($group_id, $props);
      $resData = [
        'status' => "success",
        'status_code' => 200,
        'return' => $resData
      ];
      return response()->json($resData, $resData["status_code"]);
    } catch (Exception $ex) {
      return $this->returnSimpleException($ex);
    }
  }

  public function getUGPById(Request $req, int $id)
  {
    try {
      $userUPGService = new UserPositionGroupService();
      $resData = $userUPGService->getUGPById($id);
      $resData = [
        'status' => "success",
        'status_code' => 200,
        'return' => $resData
      ];
      return response()->json($resData, $resData["status_code"]);
    } catch (Exception $ex) {
      return $this->returnSimpleException($ex);
    }
  }

  public function getUPG_ByGroup_EmployeeId(Request $req, int $group_id, int $employee_id)
  {
    try {
      $userUPGService = new UserPositionGroupService();
      $resData = $userUPGService->getUPG_ByGroupId_EmployeeId($group_id, $employee_id);
      $resData = [
        'status' => "success",
        'status_code' => 200,
        'return' => $resData
      ];
      return response()->json($resData, $resData["status_code"]);
    } catch (Exception $ex) {
      return $this->returnSimpleException($ex);
    }
  }
}
