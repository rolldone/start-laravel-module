<?php


namespace Modules\Auth\Classes;

use Exception;
use Illuminate\Support\Facades\Log;
use JsonSerializable;
use Modules\Auth\Classes\Interfaces\SetDataInterface;

abstract class BaseClasses implements JsonSerializable, SetDataInterface
{
  public static int $timesCall = 0;
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
