<?php

namespace Modules\GroupManagement\Classes;

use DateTime;
use Modules\Auth\Classes\BaseClasses;
use Modules\GroupManagement\Entities\GMDivision;

class GMPositionClasses extends BaseClasses
{
  private int $id;
  private string $name;
  private bool $is_enable;
  private ?GMDivisionClasses $division = null;
  private ?int $division_id = null;
  private ?DateTime $created_at = null;
  private ?DateTime $updated_at = null;
  private ?DateTime $deleted_at = null;

  public static function set($props)
  {
    $resClass = new GMPositionClasses();
    $resClass->setId($props->id);
    $resClass->setName($props->name);
    $resClass->setIs_enable($props->is_enable);
    $resClass->setDivision(GMDivisionClasses::set($props->division));
    $resClass->setDivision_id($props->division_id);
    $resClass->setCreated_at(new DateTime($props->created_at));
    $resClass->setUpdated_at(new DateTime($props->updated_at));
    $resClass->setDeleted_at($props->deleted_at == null ? null : new DateTime($props->deleted_at));
    return $resClass;
  }

  public function jsonSerialize()
  {
    return [
      "id" => $this->id,
      "name" => $this->name,
      "is_enable" => $this->is_enable,
      "division" => $this->division,
      "division_id" => $this->division_id,
      "created_at" => $this->created_at,
      "updated_at" => $this->updated_at,
      "deleted_at" => $this->deleted_at
    ];
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
   * Get the value of name
   */
  public function getName()
  {
    return $this->name;
  }

  /**
   * Set the value of name
   *
   * @return  self
   */
  public function setName($name)
  {
    $this->name = $name;

    return $this;
  }

  /**
   * Get the value of is_enable
   */
  public function getIs_enable()
  {
    return $this->is_enable;
  }

  /**
   * Set the value of is_enable
   *
   * @return  self
   */
  public function setIs_enable($is_enable)
  {
    $this->is_enable = $is_enable;

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
  public function setCreated_at(?DateTime $created_at)
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
  public function setUpdated_at(?DateTime $updated_at)
  {
    $this->updated_at = $updated_at;

    return $this;
  }

  /**
   * Get the value of deleted_at
   */
  public function getDeleted_at()
  {
    return $this->deleted_at;
  }

  /**
   * Set the value of deleted_at
   *
   * @return  self
   */
  public function setDeleted_at(?DateTime $deleted_at)
  {
    $this->deleted_at = $deleted_at;

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
}
