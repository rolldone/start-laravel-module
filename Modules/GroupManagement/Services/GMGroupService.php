<?php

namespace Modules\GroupManagement\Services;

use Error;
use Exception;
use Modules\GroupManagement\Classes\GMGroupClasses;
use Modules\GroupManagement\Entities\GMGroup;

class GMGroupService
{
  public function addGroup(GMGroupClasses $gMGroup)
  {
    try {
      $gmPositionModel = new GMGroup();
      $gmPositionModel->name = $gMGroup->getName();
      $gmPositionModel->is_enable = $gMGroup->getIs_enable();
      $gmPositionModel->save();

      return $gmPositionModel;
    } catch (Exception $ex) {
      throw $ex;
    }
  }

  public function updateGroup(GMGroupClasses $gMGroup)
  {
    try {
      $gmPositionModel = GMGroup::find($gMGroup->getId());
      if ($gmPositionModel == null) {
        throw new Error("Division model not found :(");
      }
      $gmPositionModel->name = $gMGroup->getName() ?? $gmPositionModel->name;
      $gmPositionModel->is_enable = $gMGroup->getIs_enable() ?? $gmPositionModel->is_enable;
      $gmPositionModel->save();

      return $gmPositionModel;
    } catch (Exception $ex) {
      throw $ex;
    }
  }

  public function deleteGroup(GMGroupClasses $gMGroup)
  {
    $gMGroupModel = GMGroup::find($gMGroup->getId());
    if ($gMGroupModel == null) {
      throw new Error("Division model not found :(");
    }
    $gMGroupModel = $gMGroupModel->delete();

    return $gMGroupModel;
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
    return $gMGroupModel;
  }

  public function getGroups($props)
  {
    $gMDivisionModel = GMGroup::take(100)->skip(0)->get();
    return $gMDivisionModel;
  }
}
