<?php

namespace Modules\UserAdmin\Http\Controllers;

use Exception;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Auth\Http\Controllers\BaseController;
use Modules\UserAdmin\Services\UserAdminService;

class UserAdminController extends BaseController
{
    protected function returnUserAdminService()
    {
        return new UserAdminService();
    }

    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index(Request $req)
    {
        try {
            $props = $this->getBaseQueryRequest($req, []);
            $props["take"] = $req->query("take", 100);
            $props["skip"] = $req->query("skip", 0);
            $userService = $this->returnUserAdminService();
            $resData = $userService->getUsers($props);
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

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('useradmin::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('useradmin::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('useradmin::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        //
    }
}
