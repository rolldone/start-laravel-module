<?php

namespace Modules\Auth\Classes\Interfaces;

interface SetDataInterface{
  public static function set($props);
  public static function sets(array $array);
}