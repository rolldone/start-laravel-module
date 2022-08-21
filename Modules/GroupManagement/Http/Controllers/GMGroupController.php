<?php

namespace Modules\GroupManagement\Http\Controllers;

use Exception;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Modules\Auth\Http\Controllers\BaseController;
use Modules\GroupManagement\Classes\GMGroupClasses;
use Modules\GroupManagement\Services\GMGroupService;

class GMGroupController extends BaseController
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        try {
            $gmGroupService = new GMGroupService();
            $resData = $gmGroupService->getGroups([]);
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
            $gmGroup = new GMGroupClasses();
            // $gmGroup->setName($req->input("name", null));
            // $gmGroup->setIs_enable($req->input("is_enable", "true"));
            // $gmGroupService = new GMGroupService();
            // $resData = $gmGroupService->addGroup($gmGroup);
            $resData = [
                'status' => 'success',
                'status_code' => 200,
                'return' => $req->all()
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


    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function update(Request $req)
    {
        try {
            $gmGroup = new GMGroupClasses();
            $gmGroup->setId($req->input("id", null));
            $gmGroup->setName($req->input("name", null));
            $gmGroup->setIs_enable($req->input("is_enable", "true"));
            $gmGroupService = new GMGroupService();
            $resData = $gmGroupService->updateGroup($gmGroup);
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
}
