<?php

namespace Modules\GroupManagement\Classes;

use DateTime;
use Modules\Auth\Classes\BaseClasses;
use Modules\Employee\Entities\dto\EmployeeDto;
use Modules\GroupManagement\Entities\GMDivision;
use Modules\GroupManagement\Entities\GMPosition;

class GMPortalSelectedClasses extends BaseClasses
{
  private ?int $id = null;
  private ?int $user_id = null;
  private ?int $portal_id = null;
  private ?GMPortalClasses $portal = null;
  private ?array $data = null;
  private ?DateTime $created_at = null;
  private ?DateTime $updated_at = null;

  public function jsonSerialize(): mixed
  {
    return [
      "id" => $this->id,
      "user_id" => $this->user_id,
      "portal_id" => $this->portal_id,
      "portal" => $this->portal,
      "data" => $this->data,
      "created_at" => $this->created_at,
      "updated_at" => $this->updated_at,
    ];
  }

  public static function set($props)
  {
    if ($props == null) return null;
    $self = new GMPortalSelectedClasses();
    $self->setId($props->id);
    $self->setUser_id($props->user_id);
    $self->setPortal_id($props->portal_id);
    $self->setPortal(GMPortalClasses::set($props->portal));
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
}
