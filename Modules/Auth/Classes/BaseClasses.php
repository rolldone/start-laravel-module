<?php


namespace Modules\Auth\Classes;

use Exception;
use JsonSerializable;
use Modules\Auth\Classes\Interfaces\SetDataInterface;

abstract class BaseClasses implements JsonSerializable, SetDataInterface
{
  /**
   * sets
   *
   * @param  array $datas
   * @return array<self>
   */
  public static function sets($datas)
  {
    try {
      $entities = [];
      for ($a = 0; $a < count($datas); $a++) {
        $entities[] = static::set($datas[$a]);
      }
      return $entities;
    } catch (Exception $ex) {
      throw $ex;
    }
  }
}
