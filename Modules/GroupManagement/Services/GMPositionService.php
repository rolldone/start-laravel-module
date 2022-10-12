<?php

namespace Modules\GroupManagement\Services;

use Error;
use Exception;
use Modules\GroupManagement\Classes\GMPositionClasses;
use Modules\GroupManagement\Entities\GMPosition;

class GMPositionService
{
  /**
   * addPosition
   *
   * @param  mixed $props
   * @return void
   */
  public function addPosition($props, ?GMPosition $exist = null)
  {
    try {
      $gmPositionModel = $exist ?? new GMPosition();
      $gmPositionModel->name = $props["name"];
      $gmPositionModel->is_enable = $props["is_enable"] == "true" ? true : false;
      $gmPositionModel->division_id = $props["division_id"];
      $gmPositionModel->save();
      return GMPositionClasses::set($gmPositionModel);
    } catch (Exception $ex) {
      throw $ex;
    }
  }

  /**
   * updatePosition
   *
   * @param  mixed $props
   * @return void
   */
  public function updatePosition($props)
  {
    try {
      $gmPositionModel = GMPosition::find($props["id"]);
      if ($gmPositionModel == null) {
        throw new Error("Division model not found :(");
      }
      return $this->addPosition($props, $gmPositionModel);
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
    return GMPositionClasses::set($gMPositionModel);
  }

  public function getPositions($props)
  {
    $gMDivisionModel = GMPosition::take($props["take"])->skip($props["take"] * $props["skip"])->get();
    return GMPositionClasses::sets($gMDivisionModel);
  }
}
