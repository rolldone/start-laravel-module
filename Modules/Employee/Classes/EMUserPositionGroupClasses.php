<?php

namespace Modules\Employee\Classes;

use DateTime;
use Modules\Auth\Classes\BaseClasses;

class EMUserPositionGroupClasses extends BaseClasses
{
  protected ?int $id;
  protected ?int $position_id;
  protected ?int $division_id;
  protected ?int $group_id;
  protected ?int $employee_id;
  protected $position = null;
  protected $division = null;
  protected $group = null;
  protected $employee = null;
  protected ?DateTime $created_at = null;
  protected ?DateTime $updated_at = null;
  protected ?bool $is_enabled;

  public function jsonSerialize()
  {
    return [
      "id" => $this->id,
      "position_id" => $this->position_id,
      "division_id" => $this->division_id,
      "group_id" => $this->group_id,
      "employee_id" => $this->employee_id,
      "created_at" => $this->created_at,
      "updated_at" => $this->updated_at,
      "position" => $this->position,
      "division" => $this->division,
      "group" => $this->group,
      "employee" => $this->employee,
      "is_enabled" => $this->is_enabled
    ];
  }

  public static function set($props)
  {
    if ($props == null) return;
    $self = new EMUserPositionGroupClasses();
    $self->setId($props->id);
    $self->setPosition_id($props->position_id);
    $self->setDivision_id($props->division_id);
    $self->setGroup_id($props->group_id);
    $self->setEmployee_id($props->employee_id);
    $self->setPosition($props->position);
    $self->setDivision($props->division);
    $self->setGroup($props->group);
    $self->setEmployee($props->employee);
    $self->setIs_enabled($props->is_enabled);

    return $self;
  }

  /**
   * Get the value of id
   */
  public function getId()
  {
    return $this->id;
  }

  /**
   * Set the value of id
   *
   * @return  self
   */
  public function setId($id)
  {
    $this->id = $id;

    return $this;
  }

  /**
   * Get the value of position_id
   */
  public function getPosition_id()
  {
    return $this->position_id;
  }

  /**
   * Set the value of position_id
   *
   * @return  self
   */
  public function setPosition_id($position_id)
  {
    $this->position_id = $position_id;

    return $this;
  }

  /**
   * Get the value of division_id
   */
  public function getDivision_id()
  {
    return $this->division_id;
  }

  /**
   * Set the value of division_id
   *
   * @return  self
   */
  public function setDivision_id($division_id)
  {
    $this->division_id = $division_id;

    return $this;
  }

  /**
   * Get the value of group_id
   */
  public function getGroup_id()
  {
    return $this->group_id;
  }

  /**
   * Set the value of group_id
   *
   * @return  self
   */
  public function setGroup_id($group_id)
  {
    $this->group_id = $group_id;

    return $this;
  }

  /**
   * Get the value of employee_id
   */
  public function getEmployee_id()
  {
    return $this->employee_id;
  }

  /**
   * Set the value of employee_id
   *
   * @return  self
   */
  public function setEmployee_id($employee_id)
  {
    $this->employee_id = $employee_id;

    return $this;
  }

  /**
   * Get the value of position
   */
  public function getPosition()
  {
    return $this->position;
  }

  /**
   * Set the value of position
   *
   * @return  self
   */
  public function setPosition($position)
  {
    $this->position = $position;

    return $this;
  }

  /**
   * Get the value of division
   */
  public function getDivision()
  {
    return $this->division;
  }

  /**
   * Set the value of division
   *
   * @return  self
   */
  public function setDivision($division)
  {
    $this->division = $division;

    return $this;
  }

  /**
   * Get the value of group
   */
  public function getGroup()
  {
    return $this->group;
  }

  /**
   * Set the value of group
   *
   * @return  self
   */
  public function setGroup($group)
  {
    $this->group = $group;

    return $this;
  }

  /**
   * Get the value of employee
   */
  public function getEmployee()
  {
    return $this->employee;
  }

  /**
   * Set the value of employee
   *
   * @return  self
   */
  public function setEmployee($employee)
  {
    $this->employee = $employee;

    return $this;
  }

  /**
   * Get the value of is_enabled
   */
  public function getIs_enabled()
  {
    return $this->is_enabled;
  }

  /**
   * Set the value of is_enabled
   *
   * @return  self
   */
  public function setIs_enabled($is_enabled)
  {
    $this->is_enabled = $is_enabled;

    return $this;
  }
}
