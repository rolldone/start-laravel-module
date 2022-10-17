<?php

namespace Modules\Auth\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Modules\Auth\Classes\UserClasses;
use Modules\Auth\Services\AuthService;
use Modules\Auth\Transformers\AuthResource;
use Illuminate\Support\Str;

class AuthController extends BaseController
{
	/**
	 * Login Method
	 * @param Request $request
	 * @return mixed
	 */
	public function loginApi(Request $req)
	{
		try {
			$validateUser = Validator::make(
				$req->all(),
				[
					'email' => 'required|email',
					'password' => 'required'
				]
			);

			if ($validateUser->fails()) {
				return response()->json([
					'status' => false,
					'message' => 'validation error',
					'errors' => $validateUser->errors()
				], 401);
			}

			$userClases = new UserClasses();
			$authService = new AuthService();
			$userClases->setEmail($req->input("email", null));
			$userClases->setPassword($req->input("password", null));
			$resData = $authService->login($userClases);
			$resData = [
				'status' => 'success',
				'status_code' => 200,
				'return' => $resData
			];
			return response()->json($resData, $resData['status_code']);
		} catch (Exception $ex) {
			return $this->returnSimpleException($ex);
		}
	}

	/**
	 * Register Method
	 * @param Request $request
	 * @return mixed
	 */
	public function register(Request $request)
	{
		try {
			$validateUser = Validator::make(
				$request->all(),
				[
					'name' => 'required',
					'email' => 'required|email|unique:users,email',
					'password' => 'required',
					'password_confirm' => 'same:password'
				]
			);

			if ($validateUser->fails()) {
				return response()->json([
					'status' => false,
					'message' => 'validation error',
					'errors' => $validateUser->errors()
				], 401);
			}

			$props = $request->post();
			$authService = new AuthService();
			$userClases = new UserClasses();
			$userClases->setEmail($request->input("email", null));
			$userClases->setName($request->input("name", null));
			$userClases->setPassword($request->input("password", null));
			$userClases->setPassword_confirm($request->input("password_confirm"));
			$resData = $authService->register($userClases);
			$resData = [
				'status' => 'success',
				'status_code' => 200,
				'return' => new AuthResource($resData)
			];
			return response()->json($resData, $resData["status_code"]);
		} catch (Exception $ex) {
			return $this->returnSimpleException($ex);
		}
	}

	/**
	 * registerWithoutPassword
	 *
	 * @param  Request $req
	 * @return void
	 */
	public function registerWithoutPassword(Request $req)
	{
		try {
			$props = $req->post();
			$authService = new AuthService();
			$props["password"] = Str::random(10);
			$resData = $authService->registerWithoutPassword($props);
			$props["to"] = $props["email"];
			$mailSend = $authService->mailAccountCreatedWithPassword($props);
			$resData = [
				'status' => 'success',
				'status_code' => 200,
				'return' => $resData
			];
			return response()->json($resData, $resData["status_code"]);
		} catch (Exception $ex) {
			return $this->returnSimpleException($ex);
		}
	}

	public function logout(Request $req)
	{
		try {
		} catch (Exception $ex) {
			return $this->returnSimpleException($ex);
		}
	}

	public function forgotPassword(Request $req)
	{
	}

	public function getAuth(Request $request)
	{
		try {
			$resData = [
				'status' => 'success',
				'status_code' => 200,
				'return' => Auth::user()
			];
			return response()->json($resData, $resData["status_code"]);
		} catch (Exception $ex) {
			return $this->returnSimpleException($ex);
		}
	}

	public function mailAccountCreated(Request $req)
	{
		try {
			$props = $req->post();
			$authService = new AuthService();
			$resData = $authService->mailAccountCreatedWithPassword($props);
			return $resData;
		} catch (Exception $ex) {
			return $this->returnSimpleException($ex);
		}
	}
}
