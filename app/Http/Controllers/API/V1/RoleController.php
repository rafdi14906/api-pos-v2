<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\V1\Role\StoreRequest;
use App\Repositories\API\V1\RoleRepository;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    protected RoleRepository $role;

    public function __construct()
    {
        $this->role = new RoleRepository();
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $data = $this->role->get($request->except('token_decode'));

        return $this->success($data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)
    {;
        $data = $this->role->store($request->validated());

        return $this->success($data, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(int $id)
    {
        $data = $this->role->find($id);

        return $this->success($data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreRequest $request, int $id)
    {
        $data = $this->role->update($request->validated(), $id);

        return $this->success($data);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        $this->role->delete($id);

        return $this->success(null, 204);
    }
}
