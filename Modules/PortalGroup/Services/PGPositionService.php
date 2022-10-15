<?php

namespace Modules\PortalGroup\Services;

use Error;
use Exception;
use Illuminate\Support\Facades\Log;
use Modules\GroupManagement\Entities\GMPositionBasicSearch;
use Modules\GroupManagement\Services\GMPositionService;
use Modules\PortalGroup\Classes\PGPositionClasses;
use Modules\PortalGroup\Classes\PGUserClasses;

class PGPositionService extends GMPositionService
{
  /**
   * getPositionsByPortalId
   *
   * @param  int $portal_id
   * @param  mixed $props
   * @return Array<PGPositionClasses>
   */
  public function getPositionsByPortalId(int $portal_id, $props)
  {
    try {
      $pgPositionModel = new GMPositionBasicSearch();
      $pgPositionModel = $pgPositionModel->where("pg_portal_id", "=", $portal_id);
      $pgPositionModel = $pgPositionModel->whereNotNull("pg_portal_id");
      $pgPositionModel = $pgPositionModel->search($props["search"]);
      $pgPositionModel = $pgPositionModel->take($props["take"])->skip($props["take"] * $props["skip"]);
      $pgPositionModel = $pgPositionModel->get();
      return PGPositionClasses::sets($pgPositionModel);
    } catch (Exception $ex) {
      throw $ex;
    }
  }

  public function getPositionWithoutPortalId(int $portal_id, $props)
  {
    try {
      $pgPositionModel = new GMPositionBasicSearch();
      $pgPositionModel = $pgPositionModel->where("pg_portal_id", "!=", $portal_id);
      $pgPositionModel = $pgPositionModel->orWhereNull("pg_portal_id");
      $pgPositionModel = $pgPositionModel->search($props["search"]);
      $pgPositionModel = $pgPositionModel->take($props["take"])->skip($props["take"] * $props["skip"]);
      $pgPositionModel = $pgPositionModel->get();
      return PGPositionClasses::sets($pgPositionModel);
    } catch (Exception $ex) {
      throw $ex;
    }
  }

  public function joinPortal(int $position_id, int $pg_portal_id)
  {
    try {
      
      $userModel = GMPositionBasicSearch::where("id", '=', $position_id)->where("pg_portal_id", "=", $pg_portal_id)->first();
      if ($userModel != null) {
        $userModel->pg_portal_id = null;
        $userModel->save();
        return PGUserClasses::set($userModel);
      }
      $userModel = GMPositionBasicSearch::find($position_id);
      $userModel->pg_portal_id = $pg_portal_id;
      $userModel->save();
      return PGUserClasses::set($userModel);
    } catch (Exception $ex) {
      throw $ex;
    }
  }
}
