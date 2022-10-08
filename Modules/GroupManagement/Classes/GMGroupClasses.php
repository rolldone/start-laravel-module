<?php

namespace Modules\GroupManagement\Classes;

use Modules\Auth\Classes\BaseClasses;

class GMGroupClasses extends BaseClasses
{
  private int $id;
  private string $name;
  private bool $is_enable;

  public function jsonSerialize()
  {
    return [
      "id" => $this->id,
      "name" => $this->name,
      "is_enable" => $this->is_enable
    ];
  }

  public static function set($props)
  {
    if ($props == null) return null;
    $resClass = new GMGroupClasses();
    $resClass->setId($props["id"]);
    $resClass->setName($props["name"]);
    $resClass->setIs_enable($props["is_enable"]);
    return $resClass;
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
}
