<?php

namespace Modules\GroupManagement\Http\Controllers;

use Exception;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Modules\Auth\Http\Controllers\BaseController;
use Modules\GroupManagement\Classes\GMDivisionClasses;
use Modules\GroupManagement\Services\GMDivisionService;

class GMDivisionController extends BaseController
{
	/**
	 * Display a listing of the resource.
	 * @return Renderable
	 */
	public function index()
	{
		try {
			$gmDivisionService = new GMDivisionService();
			$resData = $gmDivisionService->getDivisions([]);
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
	 * Store a newly created resource in storage.
	 * @param Request $request
	 * @return Renderable
	 */
	public function store(Request $req)
	{
		try {
			$gmDivision = new GMDivisionClasses();
			$gmDivision->setName($req->input("name", null));
			$gmDivision->setIs_enable($req->input("is_enable", "true"));
			$gmDivision->setParent_id($req->input("parent_id", null));
			$gmDivisionService = new GMDivisionService();
			$resData = $gmDivisionService->addDivision($gmDivision);
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
	 * Show the specified resource.
	 * @param int $id
	 * @return Renderable
	 */
	public function show(Request $req, $id)
	{
		try {
			$gmDivisionService = new GMDivisionService();
			$resData = $gmDivisionService->getDivisionById((int) $id);
			$resData = [
				'status' => 'success',
				'status_code' => 200,
				'return' => $resData,
				'id' => (int) $id
			];
			return response()->json($resData, $resData['status_code']);
		} catch (Exception $ex) {
			return $this->returnSimpleException($ex);
		}
	}

	/**
	 * Update the specified resource in storage.
	 * @param Request $request
	 * @param int $id
	 * @return Renderable
	 */
	public function update(Request $req)
	{
		try {
			$gmDivision = new GMDivisionClasses();
			$gmDivision->setId($req->input("id", null));
			$gmDivision->setName($req->input("name", null));
			$gmDivision->setIs_enable($req->input("is_enable", "true"));
			$gmDivision->setParent_id($req->input("parent_id", null));
			$gmDivisionService = new GMDivisionService();
			$resData = $gmDivisionService->updateDivision($gmDivision);
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
	 * Remove the specified resource from storage.
	 * @param int $id
	 * @return Renderable
	 */
	public function destroy(Request $req)
	{
		try {
			$gmDivisionService = new GMDivisionService();
			$resData = $gmDivisionService->deleteDivisionById($req->input("id", null));
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
}
