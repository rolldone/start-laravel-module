<?php

namespace Modules\GroupManagement\Classes;

use DateTime;
use Modules\Auth\Classes\BaseClasses;

class GMPortalGroupClasses extends BaseClasses
{
  private ?int $id;
  private ?int $group_id;
  private ?int $portal_id;
  private ?GMPortalClasses $portal = null;
  private ?GMGroupClasses $group = null;
  private ?DateTime $created_at = null;
  private ?DateTime $updated_at = null;

  public function jsonSerialize(): mixed
  {
    return [
      "id" => $this->id,
      "portal_id" => $this->portal_id,
      "portal" => $this->portal,
      "group_id" => $this->group_id,
      "group" => $this->group,
      "created_at" => $this->created_at,
      "updated_at" => $this->updated_at,
    ];
  }

  public static function set($props)
  {
    if ($props == null) return null;
    $self = new GMPortalGroupClasses();
    $self->setId($props->id);
    $self->setPortal_id($props->portal_id);
    $self->setPortal(GMPortalClasses::set($props->portal));
    $self->setGroup_id($props->group_id);
    $self->setGroup(GMGroupClasses::set($props->group));
    $self->setCreated_at(new DateTime($props->created_at));
    $self->setUpdated_at(new DateTime($props->updated_at));
    return $self;
  }


  /**
   * Get the value of portal
   */
  public function getPortal()
  {
    return $this->portal;
  }

  /**
   * Set the value of portal
   *
   * @return  self
   */
  public function setPortal($portal)
  {
    $this->portal = $portal;

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
   * Get the value of portal_id
   */
  public function getPortal_id()
  {
    return $this->portal_id;
  }

  /**
   * Set the value of portal_id
   *
   * @return  self
   */
  public function setPortal_id($portal_id)
  {
    $this->portal_id = $portal_id;

    return $this;
  }
}
