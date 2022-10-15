<?php

namespace Modules\Privilege\Services;

use Error;
use Exception;
use Modules\GroupManagement\Classes\GMPositionClasses;
use Modules\GroupManagement\Entities\GMPosition;
use Modules\GroupManagement\Entities\GMPositionBasicSearch;
use Modules\GroupManagement\Services\GMPositionService;

class PVPositionService extends GMPositionService
{
  public function getPositionsByPrivilegeId(int $pv_privilege_id, $props)
  {
    try {
      $pvPosition = GMPosition::take($props["take"])->skip($props["take"] * $props["skip"]);
      $pvPosition->where("pv_privilege_id", "=", $pv_privilege_id);
      $pvPosition->whereNotNull("pv_privilege_id");
      $pvPosition = $pvPosition->get();
      return GMPositionClasses::sets($pvPosition);
    } catch (Exception $ex) {
      throw $ex;
    }
  }

  public function getPositionWithoutPrivilegeId(int $privilege_id, $props)
  {
    $pvPosition = GMPositionBasicSearch::take($props["take"])->skip($props["take"] * $props["skip"]);
    $pvPosition->where("pv_privilege_id", "!=", $privilege_id);
    $pvPosition->orWhereNull('pv_privilege_id');
    $pvPosition->search($props["search"]);
    $pvPosition = $pvPosition->get();
    return GMPositionClasses::sets($pvPosition);
  }

  public function joinPrivilege(int $privilege_id, int $position_id)
  {
    $resData = GMPositionBasicSearch::where("id", '=', $position_id)->where("pv_privilege_id", '=', $privilege_id)->first();
    if ($resData != null) {
      $resData->pv_privilege_id = null;
      $resData->save();
      return GMPositionClasses::set($resData);
    }
    $resData = GMPositionBasicSearch::find($position_id);
    $resData->pv_privilege_id = $privilege_id;
    $resData->save();
    return GMPositionClasses::set($resData);
  }
}
