<?php

namespace Modules\GroupManagement\Http\Controllers;

use Exception;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Modules\Auth\Http\Controllers\BaseController;
use Modules\GroupManagement\Classes\GMPositionClasses;
use Modules\GroupManagement\Services\GMPositionService;

class GMPositionController extends BaseController
{
	/**
	 * Display a listing of the resource.
	 * @return Renderable
	 */
	public function index()
	{
		try {
			$gmPositionService = new GMPositionService();
			$resData = $gmPositionService->getPositions([]);
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
	 * @param Request $req
	 * @return Renderable
	 */
	public function store(Request $req)
	{
		try {
			$gmPosition = new GMPositionClasses();
			$gmPosition->setName($req->input("name", null));
			$gmPosition->setIs_enable($req->input("is_enable", "true"));
			$gmPosition->setDivision_id((int) $req->input("division_id", null));
			$gmPositionService = new GMPositionService();
			$resData = $gmPositionService->addPosition($gmPosition);
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
	public function show($id)
	{
		try {
			$gmDivisionService = new GMPositionService();
			$resData = $gmDivisionService->getPositionById((int) $id);
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
	 * @return Renderable
	 */
	public function update(Request $req)
	{
		try {
			$gmDivision = new GMPositionClasses();
			$gmDivision->setId($req->input("id", null));
			$gmDivision->setName($req->input("name", null));
			$gmDivision->setIs_enable($req->input("is_enable", "true"));
			$gmDivision->setDivision_id((int) $req->input("division_id", null));
			$gmDivisionService = new GMPositionService();
			$resData = $gmDivisionService->updatePosition($gmDivision);
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
			$gmDivisionService = new GMPositionService();
			$resData = $gmDivisionService->deletePositionById($req->input("id", null));
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
