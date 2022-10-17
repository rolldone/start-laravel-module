<?php

namespace Modules\PortalGroup\Helpers;

use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;
use Modules\Auth\Entities\User;
use Modules\PortalGroup\Classes\PGGroupClasses;
use Modules\PortalGroup\Classes\PGPortalSelectedClasses;
use Modules\PortalGroup\Entities\PGPortalSelected;
use Modules\PortalGroup\Entities\PGUserPositionGroupBasicSearch;
use Modules\PortalGroup\Services\PGPortalService;
use Modules\PortalGroup\Services\PGUserGroupPositionService;

class PGGroupHelper
{
  /**
   * getCurrentPortal
   *
   * @param  User $from_user
   * @return PGPortalSelectedClasses
   */
  public static function getCurrentPortal(User $from_user = null): PGPortalSelectedClasses
  {
    try {
      $user = Auth::user();
      if ($user == null) {
        $user = $from_user;
      }
      $group = Cache::get("company", null);
      if ($group == null) {
        $pgPortalService = new PGPortalService();
        $resData = $pgPortalService->getCurrentPortalByUserId($user->id);
        Cache::add("company", $resData);
      }
      return Cache::get("company", null);
    } catch (Exception $ex) {
      Log::debug($ex);
      Cache::set("company", null);
    }
  }

  /**
   * getGurrentGroup
   *
   * @param  User $from_user
   * @return PGGroupClasses
   */
  public static function getCurrentGroup(User $from_user = null)
  {
    try {
      $group = null;
      $gmPortalSelected = self::getCurrentPortal($from_user);
      if ($gmPortalSelected == null) {
        $pgUPGService = new PGUserGroupPositionService();
        $group = PGGroupClasses::set($pgUPGService->getUPG_ByUserId_Active($from_user->id)->getGroup());
      } else {
        $group = PGGroupClasses::set($gmPortalSelected->getPortal_group()->getGroup());
      }
      return $group;
    } catch (Exception $ex) {
      Log::debug($ex);
      Cache::set("company", null);
    }
  }
}
