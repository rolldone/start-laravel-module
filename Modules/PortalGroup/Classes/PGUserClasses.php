<?php

namespace Modules\PortalGroup\Classes;

use DateTime;
use Illuminate\Support\Facades\Log;
use Modules\Auth\Classes\BaseClasses;
use Modules\UserAdmin\Classes\UserAdminClasses;

class PGUserClasses extends UserAdminClasses
{

  protected ?int $pg_portal_id = null;
  protected ?int $pg_portal_id_old = null;

  public function jsonSerialize()
  {
    return [
      "id" => $this->id,
      "name" => $this->name,
      "email" => $this->email,
      "is_root" => $this->is_root,
      "pg_portal_id" => $this->pg_portal_id,
      "created_at" => $this->created_at,
      "updated_at" => $this->updated_at
    ];
  }

  public static function set($props)
  {
    if ($props == null) return null;
    $self = new PGUserClasses();
    $self->setId($props->id);
    $self->setName($props->name);
    $self->setEmail($props->email);
    $self->setIs_root($props->is_root);
    $self->setCreated_at($props->created_at);
    $self->setUpdated_at($props->updated_at);
    $self->setPg_portal_id($props->pg_portal_id);
    return $self;
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
   * Get the value of pg_portal_id_old
   */ 
  public function getPg_portal_id_old()
  {
    return $this->pg_portal_id_old;
  }

  /**
   * Set the value of pg_portal_id_old
   *
   * @return  self
   */ 
  public function setPg_portal_id_old($pg_portal_id_old)
  {
    $this->pg_portal_id_old = $pg_portal_id_old;

    return $this;
  }
}
