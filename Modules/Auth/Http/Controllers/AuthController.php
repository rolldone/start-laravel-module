<?php

namespace Modules\Auth\Http\Controllers;

use Exception;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Modules\Auth\Classes\UserClasses;
use Modules\Auth\Services\AuthService;
use Modules\Auth\Transformers\AuthResource;

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
			Log::debug("aaaaaaaaaaaaaaaaaaaaaaa");
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
		try{
			$resData = [
				'status' => 'success',
				'status_code' => 200,
				'return' => "mvakdfmvkdfvm"
			];
			return response()->json($resData, $resData["status_code"]);
		}catch(Exception $ex){
			return $this->returnSimpleException($ex);
		}
	}
}
