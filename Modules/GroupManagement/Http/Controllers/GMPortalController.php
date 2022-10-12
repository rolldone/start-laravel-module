<?php

namespace Modules\GroupManagement\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Modules\Auth\Http\Controllers\BaseController;
use Modules\GroupManagement\Entities\GMPortalSelected;
use Modules\GroupManagement\Services\GMPortalService;
use PDO;

class GMPortalController extends BaseController
{
  public function addPortal(Request $req)
  {
    try {
      $props = $req->post();
      $gmPortal = new GMPortalService();
      $resData = $gmPortal->addPortal($props);
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

  public function updatePortal(Request $req)
  {
    try {
      $props = $req->post();
      $gmPortal = new GMPortalService();
      $resData = $gmPortal->updatePortal($props);
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

  public function getPortalById(Request $req, $portal_id)
  {
    try{
      $gmPortal = new GMPortalService();
      $resData = $gmPortal->getById($portal_id);
      $resData = [
        'status' => 'success',
        'status_code' => 200,
        'return' => $resData
      ];
      return response()->json($resData, $resData["status_code"]);
    }catch(Exception $ex){
      return $this->returnSimpleException($ex);
    }
  }

  public function getPortalBy_TableName(Request $req, $gm_table_name)
  {
    try {
      $gmPortal = new GMPortalService();
      $resData = $gmPortal->getPortalsByRelTableName($gm_table_name);
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

  public function getPortalByRelId_ByTableName(Request $req, $gm_rel_id, $gm_table_name)
  {
    try {
      $gmPortal = new GMPortalService();
      $resData = $gmPortal->getPortalsByRelId_ByRelTableName($gm_rel_id, $gm_table_name);
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

  public function addPortalSelected(Request $req)
  {
    try {
      $props = $req->post();
      $gmPortal = new GMPortalService();
      $resData = $gmPortal->addPortalSelected($props);
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

  public function updatePortalSelected(Request $req)
  {
    try {
      $props = $req->post();
      $gmPortal = new GMPortalService();
      $resData = $gmPortal->updatePortalSelected($props);
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

  public function getCurrentPortalSelected(Request $req)
  {
    try {
      $user = Auth::user();
      $gmPostalSelected = new GMPortalService();
      $resData = $gmPostalSelected->getCurrentPortalByUserId($user->id);
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

  public function deletePortalSelected(Request $req)
  {
    try {
      $user = Auth::user();
      $gmPortalSelected = new GMPortalSelected();
      $resData = $gmPortalSelected->deletePortalSelectedByUserId($user->id);
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
