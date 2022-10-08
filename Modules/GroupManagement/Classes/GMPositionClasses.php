<?php

namespace Modules\GroupManagement\Classes;

use Modules\Auth\Classes\BaseClasses;
use Modules\GroupManagement\Entities\GMDivision;

class GMPositionClasses extends BaseClasses
{
  private int $id;
  private string $name;
  private bool $is_enable;
  private GMDivision $gmDivision;
  private int $division_id;

  public static function set($props)
  {
    $resClass = new GMPositionClasses();
    $resClass->setId($props["id"]);
    $resClass->setName($props["name"]);
    $resClass->setIs_enable($props["os_enable"]);
    $resClass->setGmDivision($props["gm_division"]);
    $resClass->setDivision_id($props["division_id"]);
    return $resClass;
  }

  public function jsonSerialize()
  {
    return [
      "id" => $this->id,
      "name" => $this->name,
      "is_enable" => $this->os_enable,
      "gm_division" => $this->gm_division,
      "division_id" => $this->division_id
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
   * Get the value of gmDivision
   */
  public function getGmDivision()
  {
    return $this->gmDivision;
  }

  /**
   * Set the value of gmDivision
   *
   * @return  self
   */
  public function setGmDivision(GMDivision $gmDivision)
  {
    $this->gmDivision = $gmDivision;

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
}
