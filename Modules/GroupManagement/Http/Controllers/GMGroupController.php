<?php

namespace Modules\GroupManagement\Http\Controllers;

use Exception;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Modules\Auth\Http\Controllers\BaseController;
use Modules\GroupManagement\Services\GMGroupService;

class GMGroupController extends BaseController
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
            $gmGroupService = new GMGroupService();
            $resData = $gmGroupService->getGroups($props);
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
            $gmGroupService = new GMGroupService();
            $resData = $gmGroupService->addGroup($props);
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
            $gmGroupService = new GMGroupService();
            $resData = $gmGroupService->getGroupById((int) $id);
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

    public function getEmployees(Request $req, $id)
    {
        try {
            $gmGroupService = new GMGroupService();
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
            $gmGroupService = new GMGroupService();
            $resData = $gmGroupService->updateGroup($props);
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
     * @param Request $request
     * @return Renderable
     */
    public function destroy(Request $req)
    {
        try {
            $gmGroupService = new GMGroupService();
            $resData = $gmGroupService->deleteGroupById($req->input("id", null));
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

    public function selectCompany(Request $req)
    {
        try {
            $props = $req->post();
            $gmGroupService = new GMGroupService();
            $resData = $gmGroupService->getGroupById($props["id"]);
            Cache::add("company", $resData);
            $resData = [
                'status' => 'success',
                'status_code' => 200,
                'return' => Cache::get("company", null)
            ];
            return response()->json($resData, $resData['status_code']);
        } catch (Exception $ex) {
            return $this->returnSimpleException($ex);
        }
    }

    public function getCurrentCompany(Request $req)
    {
        try {
            $resData = [
                'status' => 'success',
                'status_code' => 200,
                'return' => Cache::get("company", null)
            ];
            return response()->json($resData, $resData['status_code']);
        } catch (Exception $ex) {
            return $this->returnSimpleException($ex);
        }
    }
}
