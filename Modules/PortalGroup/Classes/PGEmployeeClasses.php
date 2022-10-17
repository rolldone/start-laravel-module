<?php

namespace Modules\PortalGroup\Classes;

use DateTime;
use Exception;
use Modules\Employee\Classes\EMEmployeeClasses;

class PGEmployeeClasses extends EMEmployeeClasses
{

  protected ?int $pg_portal_id = null;

  public function jsonSerialize()
  {
    return [
      "id" => $this->id,
      "first_name" => $this->first_name,
      "last_name" => $this->last_name,
      "address" => $this->address,
      "phone_number" => $this->phone_number,
      "email" => $this->email,
      "status" => $this->status,
      "user_id" => $this->user_id,
      "created_at" => $this->created_at,
      "updated_at" => $this->updated_at,
      "deleted_at" => $this->deleted_at,
      "pg_portal_id" => $this->pg_portal_id
    ];
  }

  /**
   * add
   *
   * @param  EMEmployee $props
   * @return self
   */
  public static function set($props)
  {
    try {
      if ($props == null) {
        return null;
      }
      $self = new PGEmployeeClasses();
      $self->setFirst_name($props->first_name);
      $self->setLast_name($props->last_name);
      $self->setId($props->id);
      $self->setAddress($props->address);
      $self->setPhone_number($props->phone_number);
      $self->setEmail($props->email);
      $self->setUser_id($props->user_id);
      $self->setStatus($props->status);
      $self->setCreated_at(new DateTime($props->created_at));
      $self->setUpdated_at(new DateTime($props->updated_at));
      $self->setDeleted_at($props->deleted_at == null ? null : new DateTime($props->deleted_at));
      $self->setPg_portal_id($props->pg_portal_id);
      return $self;
    } catch (Exception $ex) {
      throw $ex;
    }
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
