<?php

namespace App\Repositories\API\V1;

use App\Models\Role;

class RoleRepository
{
    protected Role $role;

    public function __construct()
    {
        $this->role = new Role();
    }

    public function delete(int $id)
    {
        $role = $this->find($id);
        $role->deleted_by = request()->get('token_decode')['id'];
        $role->save();
        $role->delete();
    }

    public function find(int $id)
    {
        return $this->role->findOrFail($id);
    }

    public function get(array $request)
    {
        return $this->role
            ->when($request, function ($query) use ($request) {
                $query->where($request);
            })
            ->get();
    }

    public function store(array $request)
    {
        return $this->role->create($request);
    }

    public function update(array $request, int $id)
    {
        $this->role
            ->findOrFail($id)
            ->update($request);

        return $this->find($id);
    }
}