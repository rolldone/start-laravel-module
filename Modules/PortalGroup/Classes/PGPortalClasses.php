<?php

namespace Modules\PortalGroup\Classes;

use DateTime;
use Modules\Auth\Classes\BaseClasses;

class PGPortalClasses extends BaseClasses
{
  private ?int $id;
  private ?string $name;
  private ?string $description;
  private ?bool $is_enable;
  private ?array $data;
  private ?DateTime $created_at = null;
  private ?DateTime $updated_at = null;

  private $portals_groups = null;

  public function jsonSerialize(): mixed
  {
    return [
      "id" => $this->id,
      "name" => $this->name,
      "description" => $this->description,
      "is_enable" => $this->is_enable,
      "created_at" => $this->created_at,
      "updated_at" => $this->updated_at,
      "portals_groups" => $this->portals_groups,
      "data" => $this->data
    ];
  }

  public static function set($props)
  {
    if ($props == null) return null;
    $self = new PGPortalClasses();
    $self->setId($props->id);
    $self->setName($props->name);
    $self->setIs_enable($props->is_enable);
    $self->setDescription($props->description);
    $self->setData($props->data);
    $self->setCreated_at(new DateTime($props->created_at));
    $self->setUpdated_at(new DateTime($props->updated_at));
    if (isset($props->portals_groups) == true) {
      $self->setPortals_groups($props->portals_groups);
    }
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
  public function setPortals_groups($portals_groups = [])
  {
    $this->portals_groups = $portals_groups;

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
   * Get the value of data
   */
  public function getData()
  {
    return $this->data;
  }

  /**
   * Set the value of data
   *
   * @return  self
   */
  public function setData($data)
  {
    $this->data = $data;

    return $this;
  }
}
