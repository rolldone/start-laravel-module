<?php

namespace Modules\UserAdmin\Services;

use Error;
use Exception;
use Modules\UserAdmin\Classes\UserAdminClasses;
use Modules\UserAdmin\Entities\UserAdmin;
use Modules\UserAdmin\Entities\UserAdminBasicSearch;

class UserAdminService
{
  /**
   * addUser
   *
   * @param  mixed $props
   * @return UserAdminClasses
   */
  public function addUser($props, UserAdmin $exist)
  {
    try {
      $user = $exist ?? new UserAdmin();
      $user->email = $props["email"];
      $user->save();
      return UserAdminClasses::set($user);
    } catch (Exception $ex) {
      throw $ex;
    }
  }

  /**
   * updateUser
   *
   * @param  mixed $props
   * @return UserAdminClasses
   */
  public function updateUser($props)
  {
    try {
      $user = UserAdmin::find($props["id"]);
      if ($user == null) {
        throw new Error("Data is not found");
      }
      return $this->addUser($props, $user);
    } catch (Exception $ex) {
      throw $ex;
    }
  }

  /**
   * getUserById
   *
   * @param  int $id
   * @return UserAdmin
   */
  public function getUserById(int $id)
  {
    try {
      $userAdmin = UserAdmin::find($id);
      return UserAdminClasses::set($userAdmin);
    } catch (Exception $ex) {
      throw $ex;
    }
  }

  /**
   * getUserByEmail
   *
   * @param  string $email
   * @return UserAdmin
   */
  public function getUserByEmail(string $email)
  {
    try {
      $userAdmin = UserAdmin::where("email", "=", $email)->first();
      return UserAdminClasses::set($userAdmin);
    } catch (Exception $ex) {
      throw $ex;
    }
  }

  /**
   * getUsers
   *
   * @param  mixed $props
   * @return array<UserAdmin>
   */
  public function getUsers($props)
  {
    try {
      $userAdmin = new UserAdminBasicSearch();
      if ($props["search"] != null) {
        $userAdmin = $userAdmin->search($props["search"]);
      }
      $userAdmin = $userAdmin->take($props["take"])->skip($props["skip"] * $props["take"]);
      $userAdmin = $userAdmin->get();
      return UserAdminClasses::sets($userAdmin);
    } catch (Exception $ex) {
      throw $ex;
    }
  }


  /**
   * deleteUserById
   *
   * @param  array $ids
   * @return boolean
   */
  public function deleteUserByIds(array $ids)
  {
  }
}
