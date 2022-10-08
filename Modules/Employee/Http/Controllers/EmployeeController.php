<?php

namespace Modules\Employee\Http\Controllers;

use Exception;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Modules\Auth\Http\Controllers\BaseController;
use Modules\Employee\Services\EmployeeService;

class EmployeeController extends BaseController
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
            $employeeService = new EmployeeService();
            $resData = $employeeService->getEmployees($props);
            $resData = [
                'status' => 'success',
                'status_code' => 200,
                'return' => $resData
            ];
            return response()->json($resData);
        } catch (Exception $ex) {
            return $this->returnSimpleException($ex);
        }
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create(Request $req)
    {
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
            $employeeService = new EmployeeService();
            $resData = $employeeService->addEmployee($props);
            $resData = [
                'status' => 'success',
                'status_code' => 200,
                'return' => $resData
            ];
            return response()->json($resData);
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
            $employeeService = new EmployeeService();
            $resData = $employeeService->getEmployeeById($id);
            $resData = [
                'status' => 'success',
                'status_code' => 200,
                'return' => $resData
            ];
            return response()->json($resData);
        } catch (Exception $ex) {
            return $this->returnSimpleException($ex);
        }
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('employee::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $req
     * @return Renderable
     */
    public function update(Request $req)
    {
        try {
            $props = $req->post();
            $employeeService = new EmployeeService();
            $resData = $employeeService->updateEmployee($props);
            $resData = [
                'status' => 'success',
                'status_code' => 200,
                'return' => $resData
            ];
            return response()->json($resData);
        } catch (Exception $ex) {
            return $this->returnSimpleException($ex);
        }
    }

    /**
     * Remove the specified resource from storage.
     * @param Request $req
     * @return Renderable
     */
    public function destroy(Request $req)
    {
        try {
            $props = $req->post();
            $props["ids"] = json_decode($req->input("ids", '[]'));
            $employeeService = new EmployeeService();
            $resData = $employeeService->deleteEmployees($props["ids"]);
            return response()->json([
                'status' => "success",
                'status_code' => 200,
                'return' => $resData
            ]);
        } catch (Exception $ex) {
            return $this->returnSimpleException($ex);
        }
    }
}
