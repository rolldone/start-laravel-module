<?php

namespace Modules\GroupManagement\Services;

use Error;
use Exception;
use Modules\GroupManagement\Classes\GMPositionClasses;
use Modules\GroupManagement\Entities\GMPosition;

class GMPositionService
{
  public function addPosition(GMPositionClasses $gMPosition)
  {
    try {
      $gmPositionModel = new GMPosition();
      $gmPositionModel->name = $gMPosition->getName();
      $gmPositionModel->is_enable = $gMPosition->getIs_enable();
      $gmPositionModel->division_id = $gMPosition->getDivision_id();
      $gmPositionModel->save();

      return $gmPositionModel;
    } catch (Exception $ex) {
      throw $ex;
    }
  }

  public function updatePosition(GMPositionClasses $gMPosition)
  {
    try {
      $gmPositionModel = GMPosition::find($gMPosition->getId());
      if ($gmPositionModel == null) {
        throw new Error("Division model not found :(");
      }
      $gmPositionModel->name = $gMPosition->getName() ?? $gmPositionModel->name;
      $gmPositionModel->is_enable = $gMPosition->getIs_enable() ?? $gmPositionModel->is_enable;
      $gmPositionModel->division_id = $gMPosition->getDivision_id() ?? $gmPositionModel->division_id;
      $gmPositionModel->save();

      return $gmPositionModel;
    } catch (Exception $ex) {
      throw $ex;
    }
  }

  public function deletePosition(GMPositionClasses $gMPosition)
  {
    $gMPositionModel = GMPosition::find($gMPosition->getId());
    if ($gMPositionModel == null) {
      throw new Error("Division model not found :(");
    }
    $gMPositionModel = $gMPositionModel->delete();

    return $gMPositionModel;
  }

  public function deletePositionById(int $id)
  {
    $gMPositionModel = GMPosition::find($id);
    if ($gMPositionModel == null) {
      throw new Error("Division model not found :(");
    }
    $gMPositionModel = $gMPositionModel->delete();

    return $gMPositionModel;
  }

  public function getPositionById_IdUser(int $id, int $user_id)
  {
    
  }

  public function getPositionById(int $id)
  {
    $gMPositionModel = GMPosition::find($id);
    return $gMPositionModel;
  }

  public function getPositions($props)
  {
    $gMDivisionModel = GMPosition::take(100)->skip(0)->get();
    return $gMDivisionModel;
  }
}
