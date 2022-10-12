<?php

namespace Modules\GroupManagement\Services;

use Error;
use Exception;
use Modules\Employee\Entities\EMEmployee;
use Modules\GroupManagement\Classes\GMGroupClasses;
use Modules\GroupManagement\Entities\GMGroup;

class GMGroupService
{
  public function addGroup($props, ?GMGroup $exist = null)
  {
    try {
      $gmGroupModel = $exist ?? new GMGroup();
      $gmGroupModel->name = $props["name"];
      $gmGroupModel->is_enable = $props["is_enable"] == "true" ? true : false;
      $gmGroupModel->save();

      return GMGroupClasses::set($gmGroupModel);
    } catch (Exception $ex) {
      throw $ex;
    }
  }

  public function updateGroup($props)
  {
    try {
      $gmGroupModel = GMGroup::find($props["id"]);
      if ($gmGroupModel == null) {
        throw new Error("Division model not found :(");
      }
      return $this->addGroup($props, $gmGroupModel);
    } catch (Exception $ex) {
      throw $ex;
    }
  }

  public function deleteGroup($ids = [])
  {
    // $gMGroupModel = GMGroup::find($gMGroup->getId());
    // if ($gMGroupModel == null) {
    //   throw new Error("Division model not found :(");
    // }
    // $gMGroupModel = $gMGroupModel->delete();

    // return $gMGroupModel;
  }

  public function deleteGroupById(int $id)
  {
    $gMGroupModel = GMGroup::find($id);
    if ($gMGroupModel == null) {
      throw new Error("Division model not found :(");
    }
    $gMGroupModel = $gMGroupModel->delete();

    return $gMGroupModel;
  }

  public function getGroupById_IdUser(int $id, int $user_id)
  {
  }

  public function getGroupById(int $id)
  {
    $gMGroupModel = GMGroup::find($id);
    return GMGroupClasses::set($gMGroupModel);
  }

  public function getGroups($props)
  {
    $gMGroupModel = GMGroup::take($props["take"])->skip($props["take"] * $props["skip"])->get();
    return GMGroupClasses::sets($gMGroupModel);
  }
}
