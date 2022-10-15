<?php

namespace Modules\PortalGroup\Classes;

use DateTime;
use Modules\GroupManagement\Classes\GMDivisionClasses;
use Modules\GroupManagement\Classes\GMPositionClasses;
use Modules\UserAdmin\Classes\UserAdminClasses;

class PGPositionClasses extends GMPositionClasses
{

  protected ?int $pg_portal_id = null;

  public static function set($props)
  {
    $resClass = new PGPositionClasses();
    $resClass->setId($props->id);
    $resClass->setName($props->name);
    $resClass->setIs_enable($props->is_enable);
    $resClass->setDivision(GMDivisionClasses::set($props->division));
    $resClass->setDivision_id($props->division_id);
    $resClass->setCreated_at(new DateTime($props->created_at));
    $resClass->setUpdated_at(new DateTime($props->updated_at));
    $resClass->setDeleted_at($props->deleted_at == null ? null : new DateTime($props->deleted_at));
    $resClass->setPg_portal_id($props->pg_portal_id);
    return $resClass;
  }

  public function jsonSerialize()
  {
    return [
      "id" => $this->id,
      "name" => $this->name,
      "is_enable" => $this->is_enable,
      "division" => $this->division,
      "division_id" => $this->division_id,
      "created_at" => $this->created_at,
      "updated_at" => $this->updated_at,
      "deleted_at" => $this->deleted_at,
      "pg_portal_id" => $this->pg_portal_id
    ];
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
