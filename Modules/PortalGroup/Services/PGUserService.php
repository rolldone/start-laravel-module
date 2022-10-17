<?php

namespace Modules\PortalGroup\Services;

use Exception;
use Modules\PortalGroup\Classes\PGUserClasses;
use Modules\PortalGroup\Entities\PGUserAdminBasicSearch;
use Modules\UserAdmin\Services\UserAdminService;

class PGUserService extends UserAdminService
{

  /**
   * getUsers
   *
   * @param  int   $portal_id
   * @param  mixed $props
   * @return array<PGUserClasses>
   */
  public function getUsersWithoutPortalId(int $portal_id, $props)
  {
    try {
      $userAdmin = new PGUserAdminBasicSearch();
      $userAdmin = $userAdmin->search($props["search"]);
      $userAdmin = $userAdmin->where("pg_portal_id", "!=", $portal_id);
      $userAdmin = $userAdmin->orWhereNull("pg_portal_id");
      $userAdmin = $userAdmin->skip($props["take"] * $props["skip"])->take($props["take"]);
      $userAdmin = $userAdmin->get();
      return PGUserClasses::sets($userAdmin);
    } catch (Exception $ex) {
      throw $ex;
    }
  }

  /**
   * getUsersByPortalId
   *
   * @param  int $portal_id
   * @param  mixed $props
   * @return array<PGUserClasses>
   */
  public function getUsersByPortalId(int $portal_id, $props)
  {
    try {
      $userAdmin = new PGUserAdminBasicSearch();
      $userAdmin = $userAdmin->search($props["search"]);
      $userAdmin = $userAdmin->where("pg_portal_id", "=", $portal_id);
      $userAdmin = $userAdmin->whereNotNull("pg_portal_id");
      $userAdmin = $userAdmin->skip($props["take"] * $props["skip"])->take($props["take"]);
      $userAdmin = $userAdmin->get();
      return PGUserClasses::sets($userAdmin);
    } catch (Exception $ex) {
      throw $ex;
    }
  }

  /**
   * registerUser
   *
   * @param  int $user_id
   * @param  int $pg_portal_id
   * @return PGUserClasses
   */
  public function joinPortal(int $user_id, int $pg_portal_id)
  {
    try {
      $user = PGUserAdminBasicSearch::where("id", "=", $user_id)->where("pg_portal_id", "=", $pg_portal_id)->first();
      if ($user != null) {
        // It mean delete it
        $user->pg_portal_id = null;
        $user->save();
        return PGUserClasses::set($user);
      }
      $user = PGUserAdminBasicSearch::find($user_id);
      $old_portal_id = $user->pg_portal_id;
      $user->pg_portal_id = $pg_portal_id;
      $user->save();
      $pgUserClasses = PGUserClasses::set($user);
      $pgUserClasses->setPg_portal_id_old($old_portal_id);
      return $pgUserClasses;
    } catch (Exception $ex) {
      throw $ex;
    }
  }
}
