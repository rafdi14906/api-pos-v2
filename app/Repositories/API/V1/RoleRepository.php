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

    public function get(array $request)
    {
        return $this->role
            ->when($request, function ($query) use ($request) {
                $query->where($request);
            })
            ->get();
    }
}