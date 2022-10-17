<?php

namespace Modules\Auth\Services;

use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Modules\Auth\Classes\UserClasses;
use Modules\Auth\Emails\AccountCreatedWithPassword;
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

  public function registerWithoutPassword($props)
  {
    try {
      $user = User::where("email","=",$props["email"])->first();
      if($user != null){
        $user->password = Hash::make($props["password"]);
        $user->save();
        return $user;
      }
      $user = User::create([
        'name' => $props["name"],
        'email' => $props["email"],
        'password' => Hash::make($props["password"])
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
      $token = $user->createToken("API TOKEN");
      Log::debug("token :: ", [$token]);
      return  $token->plainTextToken;
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
      $props =  null;
    } catch (Exception $ex) {
      throw $ex;
    }
  }

  public function mailAccountCreatedWithPassword($props)
  {
    try {
      Mail::to($props["to"])->send(new AccountCreatedWithPassword($props));
      return true;
    } catch (Exception $ex) {
      throw $ex;
    }
  }
}
