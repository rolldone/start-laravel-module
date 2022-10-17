<?php

namespace Modules\PortalGroup\Services;

use Exception;
use Modules\PortalGroup\Classes\PGPortalGroupClasses;
use Modules\PortalGroup\Entities\PGPortalGroup;

class PGPortalGroupService
{
  public function getsByPortalId(int $portal_id)
  {
    try {
    } catch (Exception $ex) {
      throw $ex;
    }
  }

  public function getById(int $id)
  {
    try {
    } catch (Exception $ex) {
      throw $ex;
    }
  }

  public function add($props, PGPortalGroup $exist = null)
  {
    try {
      $gmPortalGroup = $exist ?? new PGPortalGroup();
      $gmPortalGroup->pg_portal_id = $props["pg_portal_id"];
      $gmPortalGroup->gm_group_id = $props["gm_group_id"];
      $gmPortalGroup->save();
      return PGPortalGroupClasses::set($gmPortalGroup);
    } catch (Exception $ex) {
      throw $ex;
    }
  }

  public function update($props, PGPortalGroup $exist = null)
  {
    try {
      $gmPortalGroup = PGPortalGroup::where("pg_portal_id", "=", $props["pg_portal_id"])->where("gm_group_id", '=', $props["gm_group_id"])->first();
      if ($gmPortalGroup == null) {
        return $this->add($props);
      }
      return $this->add($props, $gmPortalGroup);
    } catch (Exception $ex) {
      throw $ex;
    }
  }

  public function deleteWithoutNewGroupIds(int $portalID, array $groupIds)
  {
    try {
      return PGPortalGroup::where("pg_portal_id", "=", $portalID)->whereNotIn("gm_group_id", $groupIds)->delete();
    } catch (Exception $ex) {
      throw $ex;
    }
  }
}
