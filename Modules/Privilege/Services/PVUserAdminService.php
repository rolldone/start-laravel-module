<?php

namespace Modules\Privilege\Services;

use Error;
use Exception;
use Modules\Privilege\Classes\PVUserAdminClasses;
use Modules\UserAdmin\Entities\UserAdminBasicSearch;
use Modules\UserAdmin\Services\UserAdminService;

class PVUserAdminService extends UserAdminService
{
  public function getUsersByPrivilegeId(int $pv_privilege_id, $props)
  {
    try {
      $pvUserAdminModel = UserAdminBasicSearch::take($props["take"])->skip($props["take"] * $props["skip"]);
      $pvUserAdminModel->where("pv_privilege_id", "=", $pv_privilege_id);
      $pvUserAdminModel->whereNotNull("pv_privilege_id");
      $pvUserAdminModel = $pvUserAdminModel->get();
      return PVUserAdminClasses::sets($pvUserAdminModel);
    } catch (Exception $ex) {
      throw $ex;
    }
  }

  public function getUsersWithoutPrivilegeId(int $pv_privilege_id, $props)
  {
    try {
      $pvUserAdminModel = UserAdminBasicSearch::take($props["take"])->skip($props["take"] * $props["skip"]);
      $pvUserAdminModel->where("pv_privilege_id", "!=", $pv_privilege_id);
      $pvUserAdminModel->orWhereNull('pv_privilege_id');
      $pvUserAdminModel->search($props["search"]);
      $pvUserAdminModel = $pvUserAdminModel->get();
      return PVUserAdminClasses::sets($pvUserAdminModel);
    } catch (Exception $ex) {
      throw $ex;
    }
  }

  public function joinPrivilege(int $pv_privilege_id, int $user_id)
  {
    try {
      $resData = UserAdminBasicSearch::where("id", '=', $user_id)->where("pv_privilege_id", '=', $pv_privilege_id)->first();
      if ($resData != null) {
        $resData->pv_privilege_id = null;
        $resData->save();
        return PVUserAdminClasses::set($resData);
      }
      $resData = UserAdminBasicSearch::find($user_id);
      $resData->pv_privilege_id = $pv_privilege_id;
      $resData->save();
      return PVUserAdminClasses::set($resData);
    } catch (Exception $ex) {
      throw $ex;
    }
  }
}
