<?php

namespace Modules\GroupManagement\Services;

use Error;
use Exception;
use Modules\GroupManagement\Classes\GMPortalClasses;
use Modules\GroupManagement\Classes\GMPortalSelectedClasses;
use Modules\GroupManagement\Entities\GMPortal;
use Modules\GroupManagement\Entities\GMPortalSelected;

class GMPortalService
{
  public function addPortal($props, ?GMPortal $exist = null)
  {
    try {
      $gmPortal = $exist ?? new GMPortal();
      $gmPortal->gm_rel_id = $props["gm_rel_id"];
      $gmPortal->gm_table_name = $props["gm_table_name"];
      $gmPortal->group_id = $props["group_id"];
      // $gmPortal->user_id = $props["user_id"];
      // $gmPortal->position_id = $props["position_id"];
      // $gmPortal->division_id = $props["division_id"];
      $gmPortal->save();
      return GMPortalClasses::set($gmPortal);
    } catch (Exception $ex) {
      throw $ex;
    }
  }

  public function updatePortal($props)
  {
    try {
      $gmPortal = GMPortal::find($props["id"]);
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
      $gmPortal = GMPortal::with(["employee", "position", "division", "group"])->find($id);
      if ($gmPortal == null) {
        throw new Error("The data not found :(");
      }
      return GMPortalClasses::set($gmPortal);
    } catch (Exception $ex) {
      throw $ex;
    }
  }

  public function getPortalsByRelTableName($gm_table_name)
  {
    try {
      $gmPortal = GMPortal::where("gm_table_name", "=", $gm_table_name)
        ->with(["division", "position", "employee", "group"])->get();
      return GMPortalClasses::sets($gmPortal);
    } catch (Exception $ex) {
      throw $ex;
    }
  }

  public function getPortalsByRelId_ByRelTableName(int $rel_id, string $rel_table_name)
  {
    try {
      $gmPortal = GMPortal::where("gm_rel_id", "=", $rel_id)->where("gm_table_name", "=", $rel_table_name)
        ->with(["division", "position", "employee", "group"])->first();
      return GMPortalClasses::set($gmPortal);
    } catch (Exception $ex) {
      throw $ex;
    }
  }

  public function addPortalSelected($props, ?GMPortalSelected $exist = null)
  {
    try {
      $gmPortalSelected = $exist ?? new GMPortalSelected();
      $gmPortalSelected->user_id = $props["user_id"];
      $gmPortalSelected->portal_id = $props["portal_id"];
      $gmPortalSelected->data = $props["data"];
      $gmPortalSelected->save();
      return GMPortalSelectedClasses::set($gmPortalSelected);
    } catch (Exception $ex) {
      throw $ex;
    }
  }

  public function updatePortalSelected($props)
  {
    try {
      $gmPortalSelected = GMPortalSelected::find($props["id"]);
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
      $gmPortalSelected = GMPortalSelected::where("user_id", "=", $user_id)->first();
      return GMPortalSelectedClasses::set($gmPortalSelected);
    } catch (Exception $ex) {
      throw $ex;
    }
  }

  public function deletePortalSelectedByUserId(int $user_id)
  {
    try {
      $gmPortalSelected = GMPortalSelected::where("user_id", '=', $user_id)->delete();
      return $gmPortalSelected;
    } catch (Exception $ex) {
      throw $ex;
    }
  }
}
