<?php

namespace Modules\PortalGroup\Classes;

use DateTime;
use Illuminate\Support\Facades\Log;
use Modules\Auth\Classes\BaseClasses;

class PGPortalGroupClasses  extends BaseClasses
{
  private ?int $id;
  private ?int $pg_portal_id;
  private ?int $gm_group_id;
  private ?array $data;
  private $portal = null;
  private $selected = null;
  private $group = null;
  private ?DateTime $created_at = null;
  private ?DateTime $updated_at = null;

  public function jsonSerialize(): mixed
  {
    return [
      "id" => $this->id,
      "pg_portal_id" => $this->pg_portal_id,
      "portal" => $this->portal,
      "gm_group_id" => $this->gm_group_id,
      "selected" => $this->selected,
      "group" => $this->group,
      "data" => $this->data,
      "created_at" => $this->created_at,
      "updated_at" => $this->updated_at,
    ];
  }

  public static function set($props)
  {
    if ($props == null) return null;
    $self = new PGPortalGroupClasses();
    $self->setId($props->id);
    $self->setPg_portal_id($props->pg_portal_id);
    $self->setPortal($props->portal);
    $self->setGm_group_id($props->gm_group_id);
    $self->setData($props->data);
    $self->setGroup($props->group);
    $self->setSelected($props->selected);
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

  /**
   * Get the value of gm_group_id
   */
  public function getGm_group_id()
  {
    return $this->gm_group_id;
  }

  /**
   * Set the value of gm_group_id
   *
   * @return  self
   */
  public function setGm_group_id($gm_group_id)
  {
    $this->gm_group_id = $gm_group_id;

    return $this;
  }

  /**
   * Get the value of selected
   */
  public function getSelected()
  {
    return $this->selected;
  }

  /**
   * Set the value of selected
   *
   * @return  self
   */
  public function setSelected($selected)
  {
    $this->selected = $selected;

    return $this;
  }
}
