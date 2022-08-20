<?php

namespace Modules\Auth\Services;

use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Modules\Auth\Classes\UserClasses;
use Modules\Auth\Entities\User;

class AuthService
{

  /**
   * @return mixed 
   */
  public function register(UserClasses $user)
  {
    try {
      $user = User::create([
        'name' => $user->getName(),
        'email' => $user->getEmail(),
        'password' => Hash::make($user->getPassword())
      ]);
      return $user;
    } catch (Exception $ex) {
      throw $ex;
    }
  }

  /**
   * @return UserClasses
   */
  public function login(UserClasses $user)
  {
    try {
      if (!Auth::attempt([
        "email" => $user->getEmail(),
        "password" => $user->getPassword()
      ])) {
        return response()->json([
          'status' => false,
          'message' => 'Email & Password does not match with our record.',
        ], 401);
      }
      $user = User::where('email', $user->getEmail())->first();
      return $user->createToken("API TOKEN")->plainTextToken;
    } catch (Exception $ex) {
      throw $ex;
    }
  }

  /**
   * @return UserClasses
   */
  public function getAuth(int $id)
  {
    try {
    } catch (Exception $ex) {
      throw $ex;
    }
  }

  /**
   * @return Boolean
   */
  public function forgotPassword(string $email)
  {
    try {
    } catch (Exception $ex) {
      throw $ex;
    }
  }
}
