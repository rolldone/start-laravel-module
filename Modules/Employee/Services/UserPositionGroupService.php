<?php

namespace Modules\Employee\Services;

use Error;
use Exception;
use Modules\Employee\Classes\EMUserPositionGroupClasses;
use Modules\Employee\Entities\EMUserPositionGroup;
use Modules\Employee\Entities\EMUserPositionGroupBasicSearch;

class UserPositionGroupService
{
  /**
   * addUPG
   *
   * @param  mixed $props
   * @param  EMUserPositionGroup $exist
   * @return EMUserPositionGroupClasses
   */
  public function addUPG($props, EMUserPositionGroup $exist = null)
  {
    try {
      $emUPGModel = $exist ?? new EMUserPositionGroup();
      $emUPGModel->position_id = $props["position_id"];
      $emUPGModel->division_id = $props["division_id"];
      $emUPGModel->group_id = $props["group_id"];
      $emUPGModel->employee_id = $props["employee_id"];
      $emUPGModel->is_enabled = true;
      $emUPGModel->save();
      return EMUserPositionGroupClasses::set($emUPGModel);
    } catch (Exception $ex) {
      throw $ex;
    }
  }

  public function addOrUpdateByGroupUPG($props)
  {
    try {
      EMUserPositionGroup::where("employee_id", "=", $props["employee_id"])->update([
        'is_enabled' => false,
      ]);
      $emUPGModel = EMUserPositionGroup::where("group_id", '=', $props["group_id"])
        ->where("employee_id", "=", $props["employee_id"])->first();
      if ($emUPGModel != null) {
        return $this->addUPG($props, $emUPGModel);
      }
      return $this->addUPG($props);
    } catch (Exception $ex) {
      throw $ex;
    }
  }

  /**
   * updateUPG
   *
   * @param  mixed $props
   * @return EMUserPositionGroupClasses
   */
  public function updateUPG($props)
  {
    try {
      $emUPGModel = EMUserPositionGroup::find($props["id"]);
      if ($emUPGModel == null) {
        throw new Error("Data not found");
      }
      return $this->addUPG($props, $emUPGModel);
    } catch (Exception $ex) {
      throw $ex;
    }
  }

  /**
   * deletesUPG
   *
   * @param  array $ids
   * @return void
   */
  public function deletesUPG(array $ids)
  {
    try {
    } catch (Exception $ex) {
      throw $ex;
    }
  }

  /**
   * getByUPGS
   *
   * @param  mixed $props
   * @return array<EMUserPositionGroupClasses>
   */
  public function getsUPGS($props)
  {
    try {
      $emUPGModel = new EMUserPositionGroupBasicSearch();
      $emUPGModel = $emUPGModel->take($props["take"])->skip($props["skip"] * $props["take"]);
      $emUPGModel = $emUPGModel->with(["position", "group", "division", "employee"]);
      $emUPGModel = $emUPGModel->get();
      return EMUserPositionGroupClasses::sets($emUPGModel);
    } catch (Exception $ex) {
      throw $ex;
    }
  }

  /**
   * getsUPGS_ByGroupId
   *
   * @param  int $group_id
   * @param  mixed $props
   * @return array<EMUserPositionGroupClasses>
   */
  public function getsUPGS_ByGroupId(int $group_id, $props)
  {
    try {
      $emUPGModel = new EMUserPositionGroupBasicSearch();
      $emUPGModel = $emUPGModel->take($props["take"])->skip($props["skip"] * $props["take"]);
      $emUPGModel = $emUPGModel->where("group_id", "=", $group_id);
      $emUPGModel = $emUPGModel->with(["position", "group", "division", "employee"]);
      $emUPGModel = $emUPGModel->get();
      return EMUserPositionGroupClasses::sets($emUPGModel);
    } catch (Exception $ex) {
      throw $ex;
    }
  }

  /**
   * getUGPById
   *
   * @param  int $id
   * @return EMUserPositionGroupClasses
   */
  public function getUGPById(int $id)
  {
    try {
      $emUPGModel = new EMUserPositionGroupBasicSearch();
      $emUPGModel = $emUPGModel->where("id", "=", $id);
      $emUPGModel = $emUPGModel->with(["position", "group", "division", "employee"]);
      $emUPGModel = $emUPGModel->first();
      return EMUserPositionGroupClasses::set($emUPGModel);
    } catch (Exception $ex) {
      throw $ex;
    }
  }

  /**
   * getUPG_ByGroupId_EmployeeId
   *
   * @param  int $group_id
   * @param  int $employee_id
   * @return EMUserPositionGroupClasses
   */
  public function getUPG_ByGroupId_EmployeeId(int $group_id, int $employee_id)
  {
    try {
      $emUPGModel = new EMUserPositionGroupBasicSearch();
      $emUPGModel = $emUPGModel->where("group_id", "=", $group_id);
      $emUPGModel = $emUPGModel->where("employee_id", "=", $employee_id);
      $emUPGModel = $emUPGModel->with(["position", "group", "division", "employee"]);
      $emUPGModel = $emUPGModel->first();
      return EMUserPositionGroupClasses::set($emUPGModel);
    } catch (Exception $ex) {
      throw $ex;
    }
  }

  /**
   * getUPG_ByUserId_Active
   *
   * @param  int $user_id
   * @return EMUserPositionGroupClasses
   */
  public function getUPG_ByUserId_Active(int $user_id)
  {
    try {
      $emUPGModel = new EMUserPositionGroupBasicSearch();
      $emUPGModel = $emUPGModel->whereHas("employee", function ($q) use ($user_id) {
        return $q->where("user_id", $user_id);
      });
      $emUPGModel = $emUPGModel->where("is_enabled", true);
      $emUPGModel = $emUPGModel->with(["position", "group", "division", "employee"]);
      $emUPGModel = $emUPGModel->first();
      return EMUserPositionGroupClasses::set($emUPGModel);
    } catch (Exception $ex) {
      throw $ex;
    }
  }
}
