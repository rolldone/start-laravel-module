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
	public function index(Request $req)
	{
		try {
			$props = $req->all();
			$props["take"] = $req->query("take", 100);
			$props["skip"] = $req->query("skip", 0);
			$gmDivisionService = new GMDivisionService();
			$resData = $gmDivisionService->getDivisions($props);
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
			$props = $req->post();
			$props["parent_id"] = $req->input("parent_id", null);
			$gmDivisionService = new GMDivisionService();
			$resData = $gmDivisionService->addDivision($props);
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
			$props = $req->post();
			$props["parent_id"] = $req->input("parent_id", null);
			$gmDivisionService = new GMDivisionService();
			$resData = $gmDivisionService->updateDivision($props);
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
