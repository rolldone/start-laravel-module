<?php

namespace Modules\PortalGroup\Classes;

use DateTime;
use Modules\Auth\Classes\BaseClasses;

class PGPortalSelectedClasses extends BaseClasses
{
  protected ?int $id = null;
  protected ?int $user_id = null;
  protected ?int $pg_portal_id  = null;
  protected ?int $pg_portal_group_id   = null;
  protected $user = null;
  protected $portal = null;
  protected ?PGPortalGroupClasses $portal_group = null;
  protected ?array $data = null;
  protected ?DateTime $created_at = null;
  protected ?DateTime $updated_at = null;

  public function jsonSerialize(): mixed
  {
    return [
      "id" => $this->id,
      "user_id" => $this->user_id,
      "pg_portal_id" => $this->pg_portal_id,
      "pg_portal_group_id" => $this->pg_portal_group_id,
      "portal" => $this->portal,
      "user" => $this->user,
      "portal_group" => $this->portal_group,
      "data" => $this->data,
      "created_at" => $this->created_at,
      "updated_at" => $this->updated_at,
    ];
  }

  public static function set($props)
  {
    if ($props == null) return null;
    $self = new PGPortalSelectedClasses();
    $self->setId($props->id);
    $self->setUser_id($props->user_id);
    $self->setPg_portal_id($props->pg_portal_id);
    $self->setPortal($props->portal);
    $self->setPortal_group(PGPortalGroupClasses::set($props->portal_group));
    $self->setPg_portal_group_id($props->pg_portal_group_id);
    $self->setUser($props->user);
    $self->setData($props->data);
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
   * Get the value of user_id
   */
  public function getUser_id()
  {
    return $this->user_id;
  }

  /**
   * Set the value of user_id
   *
   * @return  self
   */
  public function setUser_id($user_id)
  {
    $this->user_id = $user_id;

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

  /**
   * Get the value of user
   */
  public function getUser()
  {
    return $this->user;
  }

  /**
   * Set the value of user
   *
   * @return  self
   */
  public function setUser($user)
  {
    $this->user = $user;

    return $this;
  }

  /**
   * Get the value of portal_group
   */
  public function getPortal_group()
  {
    return $this->portal_group;
  }

  /**
   * Set the value of portal_group
   *
   * @return  self
   */
  public function setPortal_group($portal_group)
  {
    $this->portal_group = $portal_group;

    return $this;
  }

  /**
   * Get the value of pg_portal_group_id
   */
  public function getPg_portal_group_id()
  {
    return $this->pg_portal_group_id;
  }

  /**
   * Set the value of pg_portal_group_id
   *
   * @return  self
   */
  public function setPg_portal_group_id($pg_portal_group_id)
  {
    $this->pg_portal_group_id = $pg_portal_group_id;

    return $this;
  }

  /**
   * Get the value of pg_portal_id
   */
  public function getPg_portal_id()
  {
    return $this->pg_portal_id;
  }

  /**
   * Set the value of pg_portal_id
   *
   * @return  self
   */
  public function setPg_portal_id($pg_portal_id)
  {
    $this->pg_portal_id = $pg_portal_id;

    return $this;
  }
}
