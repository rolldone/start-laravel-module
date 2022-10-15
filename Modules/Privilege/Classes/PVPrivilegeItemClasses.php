<?php

namespace Modules\Privilege\Classes;

use Modules\Auth\Classes\BaseClasses;

class PVPrivilegeItemClasses extends BaseClasses
{
  public function jsonSerialize()
  {
    return [];
  }

  public static function set($props)
  {
    if ($props == null) return;
    $self = new PVPrivilegeItemClasses();
    return $self;
  }
}
