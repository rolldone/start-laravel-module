<?php

namespace Modules\GroupManagement\Classes;

use Modules\GroupManagement\Entities\GMDivision;

class GMPosition
{
  private int $id;
  private string $name;
  private bool $is_active;
  private GMDivision $gmDivision;

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
   * Get the value of is_active
   */
  public function getIs_active()
  {
    return $this->is_active;
  }

  /**
   * Set the value of is_active
   *
   * @return  self
   */
  public function setIs_active($is_active)
  {
    $this->is_active = $is_active;

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
}
