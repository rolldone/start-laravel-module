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
use PDO;

class PGPortalController extends BaseController
{
  public function addPortal(Request $req)
  {
    try {
      $props = $req->post();
      $gmPortal = new PGPortalService();
      $resData = $gmPortal->addPortal($props);
      $gmPortalGroup = new PGPortalGroupService();
      for ($a = 0; $a < count($props['portals_groups_ids']); $a++) {
        $resDataPortalGroups = $gmPortalGroup->add([
          'pg_portal_id' => $resData->getId(),
          'gm_group_id' => $props["portals_groups_ids"][$a]
        ]);
      }
      $resData = $gmPortal->getById($resData->getId());
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
      $gmPortal = new PGPortalService();
      $resData = $gmPortal->updatePortal($props);
      $gmPortalGroup = new PGPortalGroupService();
      for ($a = 0; $a < count($props['portals_groups_ids']); $a++) {
        $resDataPortalGroups = $gmPortalGroup->update([
          'pg_portal_id' => $resData->getId(),
          'gm_group_id' => $props["portals_groups_ids"][$a]
        ]);
      }
      // Delete unused
      $gmPortalGroup->deleteWithoutNewGroupIds($resData->getId(), $props["portals_groups_ids"]);
      $resData = $gmPortal->getById($resData->getId());
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
    try {
      $gmPortal = new PGPortalService();
      $resData = $gmPortal->getById($portal_id);
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

  public function getPortals(Request $req)
  {
    try {
      $props = $req->query();
      $props["take"] = $req->query("take", 100);
      $props["skip"] = $req->query("skip", 0);
      $gmPortal = new PGPortalService();
      $resData = $gmPortal->getPortals($props);
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

  public function getOwnPortals(Request $req)
  {
    try {
      $user = Auth::user();
      $gmPortal = new PGPortalService();
      $resData = $gmPortal->getOwnPortals($user->pg_portal_id, $user->id);
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
      $user = Auth::user();
      $props = $req->post();
      $props["user_id"] = $user->id;
      $gmPortal = new PGPortalService();
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
      $gmPortal = new PGPortalService();
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
      $gmPostalSelected = new PGPortalService();
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
      $gmPortalSelected = new PGPortalSelected();
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
