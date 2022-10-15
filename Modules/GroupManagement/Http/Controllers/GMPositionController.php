<?php

namespace Modules\GroupManagement\Http\Controllers;

use Exception;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Modules\Auth\Http\Controllers\BaseController;
use Modules\GroupManagement\Services\GMPositionService;

class GMPositionController extends BaseController
{
	public function returnPositionService()
	{
		return new GMPositionService();
	}
	
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
			$gmPositionService = $this->returnPositionService();
			$resData = $gmPositionService->getPositions($props);
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
			$props = $req->post();
			$gmPositionService = $this->returnPositionService();
			$resData = $gmPositionService->addPosition($props);
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
			$gmDivisionService = $this->returnPositionService();
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
			$props = $req->post();
			$gmPositionService = $this->returnPositionService();
			$resData = $gmPositionService->updatePosition($props);
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
			$gmDivisionService = $this->returnPositionService();
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
