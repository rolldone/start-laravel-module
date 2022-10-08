<?php

namespace Modules\GroupManagement\Classes;

use DateTime;
use Exception;
use Modules\Auth\Classes\BaseClasses;

class GMDivisionClasses extends BaseClasses
{
  private ?int $id = null;
  private ?string $name = null;
  private ?bool $is_enable = null;
  private ?int $parent_id = null;
  private ?GMDivisionClasses $gmDivision = null;
  private ?array $gmDivisions = [];
  private ?DateTime $created_at = null;
  private ?DateTime $updated_at = null;
  private ?DateTime $deleted_at = null;

  public static function set($props)
  {
    try {
      if ($props == null) {
        return null;
      }
      $self = new GMDivisionClasses();
      $self->setId($props->id);
      $self->setName($props->name);
      $self->setIs_enable($props->is_enable);
      $self->setGmDivision(self::set($props->parent_division));
      $self->setParent_id($props->parent_id);
      $self->setCreated_at(new DateTime($props->created_at));
      $self->setUpdated_at(new DateTime($props->updated_at));
      $self->setDeleted_at($props->deleted_at == null ? null : new DateTime($props->deleted_at));
      return $self;
    } catch (Exception $ex) {
      throw $ex;
    }
  }

  public function jsonSerialize()
  {
    return [
      "id" => $this->id,
      "name" => $this->name,
      "is_enable" => $this->is_enable,
      "parent_id" => $this->parent_id,
      "parent_division" => $this->gmDivision,
      "divisions" => $this->gmDivisions,
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
  public function setGmDivision(?GMDivisionClasses $gmDivision)
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
}
