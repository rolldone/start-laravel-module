<?php

namespace Modules\GroupManagement\Classes;

use DateTime;
use Modules\Auth\Classes\BaseClasses;
use Modules\Employee\Entities\dto\EmployeeDto;
use Modules\GroupManagement\Entities\GMDivision;
use Modules\GroupManagement\Entities\GMPortalGroup;
use Modules\GroupManagement\Entities\GMPosition;

class GMPortalClasses extends BaseClasses
{
  private ?int $id;
  private ?int $employee_id;
  private ?int $gm_rel_id;
  private ?string $gm_table_name;
  private ?int $group_id;
  // private ?int $position_id;
  // private ?int $division_id;
  // private ?bool $is_selected = false;
  private ?EmployeeDto $employee = null;
  private ?GMGroupClasses $group = null;
  private ?GMDivision $division = null;
  private ?GMPosition $position = null;
  private ?DateTime $created_at = null;
  private ?DateTime $updated_at = null;

  private ?GMPortalGroupClasses $portals_groups = null;

  public function jsonSerialize(): mixed
  {
    return [
      "id" => $this->id,
      "employee_id" => $this->employee_id,
      "gm_rel_id" => $this->gm_rel_id,
      "gm_table_name" => $this->gm_table_name,
      "group_id" => $this->group_id,
      // "position_id" => $this->position_id,
      // "division_id" => $this->division_id,
      // "is_selected" => $this->is_selected,
      "employee" => $this->employee,
      "group" => $this->group,
      "position" => $this->position,
      "division" => $this->division,
      "created_at" => $this->created_at,
      "updated_at" => $this->updated_at,
      "portals_groups" => $this->portals_groups
    ];
  }

  public static function set($props)
  {
    if ($props == null) return null;
    $self = new GMPortalClasses();
    $self->setId($props->id);
    $self->setEmployee_id($props->employee_id);
    $self->setGm_rel_id($props->gm_rel_id);
    $self->setGm_table_name($props->gm_table_name);
    $self->setGroup_id($props->group_id);
    // $self->setPosition_id($props->position_id);
    // $self->setDivision_id($props->division_id);
    // $self->setIs_selected($props->is_selected);
    $self->setEmployee(EmployeeDto::set($props->employee));
    $self->setGroup(GMGroupClasses::set($props->group));
    $self->setPosition(GMPositionClasses::set($props->position));
    $self->setDivision(GMDivisionClasses::set($props->division));
    $self->setCreated_at(new DateTime($props->created_at));
    $self->setUpdated_at(new DateTime($props->updated_at));

    $self->setPortals_groups(GMPortalGroupClasses::sets($props->portals_groups));
    return $self;
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
   * Get the value of is_selected
   */
  public function getIs_selected()
  {
    return $this->is_selected;
  }

  /**
   * Set the value of is_selected
   *
   * @return  self
   */
  public function setIs_selected($is_selected)
  {
    $this->is_selected = $is_selected;

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
   * Get the value of created_at
   */
  public function getCreated_at()
  {
    return $this->created_at;
  }

  /**
   * Set the value of created_at
   *
   * @return  self
   */
  public function setCreated_at($created_at)
  {
    $this->created_at = $created_at;

    return $this;
  }

  /**
   * Get the value of updated_at
   */
  public function getUpdated_at()
  {
    return $this->updated_at;
  }

  /**
   * Set the value of updated_at
   *
   * @return  self
   */
  public function setUpdated_at($updated_at)
  {
    $this->updated_at = $updated_at;

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
   * Get the value of gm_rel_id
   */
  public function getGm_rel_id()
  {
    return $this->gm_rel_id;
  }

  /**
   * Set the value of gm_rel_id
   *
   * @return  self
   */
  public function setGm_rel_id($gm_rel_id)
  {
    $this->gm_rel_id = $gm_rel_id;

    return $this;
  }

  /**
   * Get the value of gm_table_name
   */
  public function getGm_table_name()
  {
    return $this->gm_table_name;
  }

  /**
   * Set the value of gm_table_name
   *
   * @return  self
   */
  public function setGm_table_name($gm_table_name)
  {
    $this->gm_table_name = $gm_table_name;

    return $this;
  }


  /**
   * Get the value of portals_groups
   */
  public function getPortals_groups()
  {
    return $this->portals_groups ?? [];
  }

  /**
   * Set the value of portals_groups
   *
   * @return  self
   */
  public function setPortals_groups($portals_groups)
  {
    $this->portals_groups = $portals_groups;

    return $this;
  }
}
