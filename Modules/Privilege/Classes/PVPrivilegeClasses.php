<?php

namespace Modules\Privilege\Classes;

use DateTime;
use Modules\Auth\Classes\BaseClasses;

class PVPrivilegeClasses extends BaseClasses
{
  private ?int $id;
  private ?string $name;
  private ?string $description;
  private ?bool $is_enabled;
  private ?string $type;
  private ?DateTime $created_at = null;
  private ?DateTime $updated_at = null;

  public function jsonSerialize()
  {
    return [
      "id" => $this->id,
      "name" => $this->name,
      "description" => $this->description,
      "is_enabled" => $this->is_enabled,
      "type" => $this->type,
      "created_at" => $this->created_at,
      "updated_at" => $this->updated_at,
    ];
  }

  public static function set($props)
  {
    if ($props == null) return;
    $self = new PVPrivilegeClasses();
    $self->setId($props->id);
    $self->setName($props->name);
    $self->setDescription($props->description);
    $self->setIs_enabled($props->is_enabled);
    $self->setType($props->type);
    $self->setCreated_at(new DateTime($props->created_at));
    $self->setUpdated_at(new DateTime($props->updated_at));
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
   * Get the value of description
   */
  public function getDescription()
  {
    return $this->description;
  }

  /**
   * Set the value of description
   *
   * @return  self
   */
  public function setDescription($description)
  {
    $this->description = $description;

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

  /**
   * Get the value of type
   */
  public function getType()
  {
    return $this->type;
  }

  /**
   * Set the value of type
   *
   * @return  self
   */
  public function setType($type)
  {
    $this->type = $type;

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
}
