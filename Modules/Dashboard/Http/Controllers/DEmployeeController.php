<?php

namespace Modules\Dashboard\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Modules\Employee\Http\Controllers\EmployeeController;
use Modules\Employee\Services\EmployeeService;
use Modules\PortalGroup\Helpers\PGGroupHelper;

class DEmployeeController extends EmployeeController
{

  public function getEmployeesByFree_AndCurrentGroup(Request $req)
  {
    try {
      $props = $this->getBaseQueryRequest($req, []);
      $props["take"] = $req->query("take", 100);
      $props["skip"] = $req->query("skip", 0);
      $group = PGGroupHelper::getCurrentPortal(Auth::user());
      $employeeService = new EmployeeService();
      $resData = $employeeService->getEmployeeByHasCurrentGroup_AndFree($group->getPortal_group()->getGm_group_id(), $props);
      $resData = [
        'status' => 'success',
        'status_code' => 200,
        'return' => $resData
      ];
      return response()->json($resData);
    } catch (Exception $ex) {
      return $this->returnSimpleException($ex);
    }
  }
}
