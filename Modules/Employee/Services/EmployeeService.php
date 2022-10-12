<?php

namespace Modules\Employee\Services;

use Error;
use Exception;
use Modules\Employee\Entities\dto\EmployeeDto;
use Modules\Employee\Entities\EMEmployee;

class EmployeeService
{
  /**
   * addEmployee
   *
   * @param  mixed $props
   * @param  EMEmployee $exist
   * @return EmployeeDto
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
      // $employeeModel->user_id = $props["user_id"];
      $employeeModel->status = $props["status"];
      $employeeModel->save();
      return EmployeeDto::set($employeeModel);
    } catch (Exception $ex) {
      throw $ex;
    }
  }

  /**
   * updateEmployee
   *
   * @param  EmployeeDto $props
   * @return EMEmployee
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
      return EmployeeDto::set($employeeModel);
    } catch (Exception $ex) {
      throw $ex;
    }
  }

  public function getEmployeeByUserId(int $user_id)
  {
    try {
      $employeeModel = EMEmployee::where("user_id", "=", $user_id)->first();
      return EmployeeDto::set($employeeModel);
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
      $employeeModel = new EMEmployee();
      $employeeModel = $employeeModel->take($props["take"])->skip($props["take"] * $props["skip"]);
      $employeeModel = $employeeModel->get();
      return EmployeeDto::sets($employeeModel);
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
