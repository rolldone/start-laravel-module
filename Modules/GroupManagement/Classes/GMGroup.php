<?php

namespace Modules\GroupManagement\Classes;

class GMGroup
{
  private int $id;
  private string $name;
  private bool $is_active;

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
}
