<?php

namespace Modules\PortalGroup\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Modules\Auth\Http\Controllers\BaseController;
use Modules\PortalGroup\Services\PGPortalService;
use Modules\PortalGroup\Services\PGPositionService;
use PDO;

class PGPositionController extends BaseController
{
  public function getPositionsByPortalId(Request $req, int $portal_id)
  {
    try {
      $props = $this->getBaseQueryRequest($req, []);
      $positionService = new PGPositionService();
      $resData = $positionService->getPositionsByPortalId($portal_id, $props);
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

  public function getPositionWithoutPortalId(Request $req, int $portal_id)
  {
    try {
      $props = $this->getBaseQueryRequest($req, []);
      $positionService = new PGPositionService();
      $resData = $positionService->getPositionWithoutPortalId($portal_id, $props);
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

  public function joinPortal(Request $req)
  {
    try {
      $props = $req->post();
      $positionService = new PGPositionService();
      $resData = $positionService->joinPortal($props["position_id"], $props["pg_portal_id"]);
      if ($resData->getPg_portal_id() == null) {
        $pgPortalService = new PGPortalService();
        $pgPortalService->deletePortalSelectedByPositionId($props["position_id"]);
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
