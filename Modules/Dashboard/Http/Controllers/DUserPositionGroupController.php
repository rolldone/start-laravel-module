<?php

namespace Modules\Dashboard\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Modules\Employee\Http\Controllers\UserPositionGroupController;
use Modules\PortalGroup\Helpers\PGGroupHelper;

class DUserPositionGroupController extends UserPositionGroupController
{
  public function getsUPGS_ByCurrentGroup(Request $req)
  {
    $group = PGGroupHelper::getCurrentGroup(Auth::user());
    return parent::getsUPGS_ByGroup($req, $group->getId());
  }

  public function getUPG_ByCurrentGroup_EmployeeId(Request $req, int $employee_id)
  {
    $group = PGGroupHelper::getCurrentGroup(Auth::user());
    return parent::getUPG_ByGroup_EmployeeId($req, $group->getId(), $employee_id);
  }

  public function addOrUpdateByCurrentGroupUPG(Request $req)
  {
    $group = PGGroupHelper::getCurrentGroup(Auth::user());
    $req->request->add(['group_id' => $group->getId()]);
    return parent::addOrUpdateByGroupUPG($req);
  }
}
