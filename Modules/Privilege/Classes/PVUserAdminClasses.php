<?php

namespace Modules\Privilege\Classes;

use Modules\UserAdmin\Classes\UserAdminClasses;

class PVUserAdminClasses extends UserAdminClasses
{
  protected ?int $pv_privilege_id;

  public function jsonSerialize()
  {
    return [
      "id" => $this->id,
      "name" => $this->name,
      "email" => $this->email,
      "is_root" => $this->is_root,
      "created_at" => $this->created_at,
      "updated_at" => $this->updated_at,
      "pv_privilege_id" => $this->pv_privilege_id
    ];
  }

  public static function set($props)
  {
    if ($props == null) return null;
    $self = new PVUserAdminClasses();
    $self->setId($props->id);
    $self->setName($props->name);
    $self->setEmail($props->email);
    $self->setIs_root($props->is_root);
    $self->setCreated_at($props->created_at);
    $self->setUpdated_at($props->updated_at);
    $self->setPv_privilege_id($props->pv_privilege_id);
    return $self;
  }

  /**
   * Get the value of pv_privilege_id
   */
  public function getPv_privilege_id()
  {
    return $this->pv_privilege_id;
  }

  /**
   * Set the value of pv_privilege_id
   *
   * @return  self
   */
  public function setPv_privilege_id($pv_privilege_id)
  {
    $this->pv_privilege_id = $pv_privilege_id;

    return $this;
  }
}
