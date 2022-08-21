<?php

namespace Modules\GroupManagement\Classes;

class GMDivisionClasses
{
  private int $id;
  private string $name;
  private bool $is_enable;
  private ?int $parent_id = null;
  private GMDivisionClasses $gmDivision;
  private $gmDivisions = [];

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
  public function setGmDivision(GMDivisionClasses $gmDivision)
  {
    $this->gmDivision = $gmDivision;

    return $this;
  }

  /**
   * Get the value of gmDivisions
   */
  public function getGmDivisions()
  {
    return $this->gmDivisions;
  }

  /**
   * Set the value of gmDivisions
   *
   * @return  self
   */
  public function setGmDivisions($gmDivisions)
  {
    $this->gmDivisions = $gmDivisions;

    return $this;
  }

  public function putGmDivisions(GMDivisionClasses $gmDivision)
  {
    array_push($this->gmDivisions, $gmDivision);
    return $this;
  }


  /**
   * Get the value of parent_id
   */
  public function getParent_id()
  {
    return $this->parent_id;
  }

  /**
   * Set the value of parent_id
   *
   * @return  self
   */
  public function setParent_id($parent_id = null)
  {
    $this->parent_id = $parent_id;

    return $this;
  }
}
