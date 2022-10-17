<?php

namespace Modules\Employee\Services;

use Error;
use Exception;
use Modules\Employee\Classes\EMEmployeeClasses;
use Modules\Employee\Entities\EMEmployee;
use Modules\Employee\Entities\EMEmployeeBasicSearch;

class EmployeeService
{
  /**
   * addEmployee
   *
   * @param  mixed $props
   * @param  EMEmployee $exist
   * @return EMEmployeeClasses
   */
  public function addEmployee($props, $exist = null)
  {
    try {
      $employeeModel = $exist ?? new EMEmployee();
      $employeeModel->first_name = $props["first_name"];
      $employeeModel->last_name = $props["last_name"];
      $employeeModel->address = $props["address"];
      $employeeModel->phone_number = $props["phone_number"];
      $employeeModel->email = $props["email"];
      $employeeModel->user_id = isset($props["user_id"]) == true ? $props["user_id"] : null;
      $employeeModel->status = $props["status"];
      $employeeModel->save();
      return EMEmployeeClasses::set($employeeModel);
    } catch (Exception $ex) {
      throw $ex;
    }
  }

  /**
   * updateEmployee
   *
   * @param  EMEmployeeClasses $props
   * @return EMEmployeeClasses
   */
  public function updateEmployee($props)
  {
    try {
      $employeeModel = EMEmployee::find($props['id']);
      if ($employeeModel == null) {
        throw new Error("The data is not found!");
      }
      return $this->addEmployee($props, $employeeModel);
    } catch (Exception $ex) {
      throw $ex;
    }
  }

  /**
   * getEmployeeById
   *
   * @param  int $id
   * @return EMEmployee
   */
  public function getEmployeeById(int $id)
  {
    try {
      $employeeModel = EMEmployee::find($id);
      return EMEmployeeClasses::set($employeeModel);
    } catch (Exception $ex) {
      throw $ex;
    }
  }

  public function getEmployeeByUserId(int $user_id)
  {
    try {
      $employeeModel = EMEmployee::where("user_id", "=", $user_id)->first();
      return EMEmployeeClasses::set($employeeModel);
    } catch (Exception $ex) {
      throw $ex;
    }
  }

  /**
   * getEmployees
   *
   * @param  array $props
   * @return array
   */
  public function getEmployees($props)
  {
    try {
      $employeeModel = new EMEmployeeBasicSearch();
      $employeeModel = $employeeModel->take($props["take"])->skip($props["take"] * $props["skip"]);
      $employeeModel = $employeeModel->search($props["search"]);
      $employeeModel = $employeeModel->get();
      return EMEmployeeClasses::sets($employeeModel);
    } catch (Exception $ex) {
      throw $ex;
    }
  }

  /**
   * getEmployeeByHasCurrentGroup_AndFree
   * Get Employee by own group and non job
   * @param  int $group_id
   * @param  array $props
   * @return array<EMEmployeeClasses>
   */
  public function getEmployeeByHasCurrentGroup_AndFree(int $group_id, $props)
  {
    try {
      $employeeModel = new EMEmployeeBasicSearch();
      $employeeModel = $employeeModel->take($props["take"])->skip($props["take"] * $props["skip"]);
      $employeeModel = $employeeModel->search($props["search"]);
      $employeeModel = $employeeModel->whereHas("user_position_group", function ($q) use ($group_id) {
        return $q->where("group_id", '=', $group_id);
      });
      $employeeModel = $employeeModel->orDoesntHave("user_position_group");
      $employeeModel = $employeeModel->get();
      return EMEmployeeClasses::sets($employeeModel);
    } catch (Exception $ex) {
      throw $ex;
    }
  }

  /**
   * deleteEmployees
   *
   * @param  array $ids
   * @return boolean
   */
  public function deleteEmployees(array $ids)
  {
  }
}
