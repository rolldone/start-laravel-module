<?php

namespace Modules\Privilege\Services;

use Error;
use Exception;
use Modules\Privilege\Classes\PVPrivilegeClasses;
use Modules\Privilege\Entities\PVPrivilege;

class PVPrivilegeService
{
  public function addPrivilege($props, PVPrivilege $exist = null)
  {
    try {
      $privilege = $exist ?? new PVPrivilege();
      $privilege->name = $props["name"];
      $privilege->description = $props["description"];
      $privilege->is_enabled = $props["is_enabled"] == "true" ? true : false;
      $privilege->type = $props["type"];
      $privilege->save();
      return PVPrivilegeClasses::set($privilege);
    } catch (Exception $ex) {
      throw $ex;
    }
  }

  public function updatePrivilege($props)
  {
    try {
      $privilege = PVPrivilege::find($props["id"]);
      if ($privilege == null) {
        throw new Error("Data is not found!");
      }
      return $this->addPrivilege($props, $privilege);
    } catch (Exception $ex) {
      throw $ex;
    }
  }

  public function getPrivileges($props)
  {
    try {
      $privilege = PVPrivilege::take($props["take"])->skip($props["take"] * $props["skip"])->get();
      return PVPrivilegeClasses::sets($privilege);
    } catch (Exception $ex) {
      throw $ex;
    }
  }

  public function getById($id)
  {
    try {
      $privilege = PVPrivilege::find($id);
      return PVPrivilegeClasses::set($privilege);
    } catch (Exception $ex) {
      throw $ex;
    }
  }
}
