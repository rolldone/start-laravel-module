<?php

namespace Modules\GroupManagement\Services;

use Error;
use Exception;
use Modules\GroupManagement\Entities\GMPortalGroup;

class GMPortalGroupService
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

  public function add($props, GMPortalGroup $exist)
  {
    try {
      $gmPortalGroup = $exist ?? new GMPortalGroup();
      $gmPortalGroup->gm_portal_id = $props["gm_portal_id"];
      $gmPortalGroup->gm_group_id = $props["gm_group_id"];
      $gmPortalGroup->save();
    } catch (Exception $ex) {
      throw $ex;
    }
  }
}
