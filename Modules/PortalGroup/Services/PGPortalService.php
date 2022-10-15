<?php

namespace Modules\PortalGroup\Services;

use Error;
use Exception;
use Illuminate\Support\Facades\Log;
use Modules\PortalGroup\Classes\PGPortalClasses;
use Modules\PortalGroup\Classes\PGPortalGroupClasses;
use Modules\PortalGroup\Classes\PGPortalSelectedClasses;
use Modules\PortalGroup\Entities\PGPortal;
use Modules\PortalGroup\Entities\PGPortalGroup;
use Modules\PortalGroup\Entities\PGPortalSelected;
use Modules\UserAdmin\Entities\UserAdmin;

class PGPortalService
{
  public function addPortal($props, ?PGPortal $exist = null)
  {
    try {
      $gmPortal = $exist ?? new PGPortal();
      $gmPortal->name = $props["name"];
      $gmPortal->is_enable = $props["is_enable"] == "true" ? true : false;
      $gmPortal->save();
      return PGPortalClasses::set($gmPortal);
    } catch (Exception $ex) {
      throw $ex;
    }
  }

  public function updatePortal($props)
  {
    try {
      $gmPortal = PGPortal::find($props["id"]);
      if ($gmPortal == null) {
        throw new Error("The data not found :(");
      }
      return $this->addPortal($props, $gmPortal);
    } catch (Exception $ex) {
      throw $ex;
    }
  }

  public function getById(int $id)
  {
    try {
      Log::debug("getById", [$id]);
      $gmPortal = PGPortal::with(["portals_groups.group", "portals_groups.portal"])->find($id);
      if ($gmPortal == null) {
        throw new Error("The data not found :(");
      }
      Log::debug("mlai lagi");
      return PGPortalClasses::set($gmPortal);
    } catch (Exception $ex) {
      throw $ex;
    }
  }

  public function getPortals($props)
  {
    try {
      $gmPortal = PGPortal::take($props["take"])->skip($props["take"] * $props["skip"])->get();
      return PGPortalClasses::sets($gmPortal);
    } catch (Exception $ex) {
      throw $ex;
    }
  }

  public function getOwnPortals(int $pg_portal_id, int $user_id)
  {
    try {
      $pgPortalGroup = PGPortalGroup::with(["selected" => function ($q) use ($user_id) {
        return $q->where("user_id", "=", $user_id);
      }])->where("pg_portal_id", "=", $pg_portal_id)->get();
      return PGPortalGroupClasses::sets($pgPortalGroup);
    } catch (Exception $ex) {
      throw $ex;
    }
  }

  public function addPortalSelected($props, ?PGPortalSelected $exist = null)
  {
    try {
      $user = PGPortalSelected::where("user_id", "=", $props["user_id"]);
      if ($user != null) {
        PGPortalSelected::where("user_id", "=", $props["user_id"])->delete();
      }
      $gmPortalSelected = $exist ?? new PGPortalSelected();
      $gmPortalSelected->user_id = $props["user_id"];
      $gmPortalSelected->pg_portal_id = $props["pg_portal_id"];
      $gmPortalSelected->pg_portal_group_id = $props["pg_portal_group_id"];
      // $gmPortalSelected->data = $props["data"];
      $gmPortalSelected->save();
      return PGPortalSelectedClasses::set($gmPortalSelected);
    } catch (Exception $ex) {
      throw $ex;
    }
  }

  public function updatePortalSelected($props)
  {
    try {
      $gmPortalSelected = PGPortalSelected::find($props["id"]);
      if ($gmPortalSelected == null) {
        throw new Error("The data not found :(");
      }
      return $this->addPortalSelected($props, $gmPortalSelected);
    } catch (Exception $ex) {
      throw $ex;
    }
  }

  public function getCurrentPortalByUserId(int $user_id)
  {
    try {
      $gmPortalSelected = PGPortalSelected::with(["user", "portal"])->where("user_id", "=", $user_id)->first();
      return PGPortalSelectedClasses::set($gmPortalSelected);
    } catch (Exception $ex) {
      throw $ex;
    }
  }

  public function deletePortalSelectedByUserId(int $user_id)
  {
    try {
      $gmPortalSelected = PGPortalSelected::where("user_id", '=', $user_id)->delete();
      return $gmPortalSelected;
    } catch (Exception $ex) {
      throw $ex;
    }
  }

  public function deletePortalSelectedByPositionId(int $position_id)
  {
    try {
      $gmPortalSelected = PGPortalSelected::whereHas("user", function ($q) use ($position_id) {
        return $q->whereHas("employee", function ($q2) use ($position_id) {
          return $q2->whereHas("user_position_group", function ($q3) use ($position_id) {
            return $q3->where("position_id", "=", $position_id);
          });
        });
      });
      return $gmPortalSelected->delete();
    } catch (Exception $ex) {
      throw $ex;
    }
  }
}
