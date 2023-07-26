<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\V1\User\StoreRequest;
use App\Http\Requests\API\V1\User\UpdateRequest;
use App\Repositories\API\V1\UserRepository;
use Illuminate\Http\Request;

class UserController extends Controller
{
    protected UserRepository $user;

    public function __construct()
    {
        $this->user = new UserRepository();
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $data = $this->user->get($request->except('token_decode'));

        return $this->success($data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)
    {;
        $data = $this->user->store($request->validated());

        return $this->success($data, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(int $id)
    {
        $data = $this->user->find($id);

        return $this->success($data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, int $id)
    {
        $data = $this->user->update($request->validated(), $id);

        return $this->success($data);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        $this->user->delete($id);

        return $this->success(null, 204);
    }
}
