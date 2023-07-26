<?php

namespace App\Repositories\API\V1;

use App\Models\User;
use App\Repositories\Repository;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;

class UserRepository extends Repository
{
    protected User $user;

    public function __construct()
    {
        $this->user = new User();
    }

    public function delete(int $id)
    {
        $user = $this->find($id);
        $user->deleted_by = request()->get('token_decode')['id'];
        $user->save();
        $user->delete();
    }

    public function find(int $id)
    {
        return $this->user->with('roles')->findOrFail($id);
    }

    public function get(array $request)
    {
        return $this->user
            ->with('roles')
            ->when($request, function ($query) use ($request) {
                $query->where($request);
            })
            ->get();
    }

    public function store(array $request)
    {
        $userRequest = Arr::except($request, 'roles');
        $roles = Arr::only($request, 'roles');
        $roles = Arr::flatten($roles);

        $user = DB::transaction(function () use ($userRequest, $roles) {
            $user = $this->user->create($userRequest);
    
            foreach ($roles as $role_id) {
                $roleUser = [
                    'user_id' => $user->id,
                    'role_id' => $role_id,
                ];

                $roleUser = $this->attachCreatedAndUpdated($roleUser);

                $roleUsers[] = $roleUser;
            }

            $user->roles()->attach($roleUsers);

            return $user;
        }, 3);

        return $user;
    }

    public function update(array $request, int $id)
    {
        $userRequest = Arr::except($request, 'roles');
        $roles = Arr::only($request, 'roles');
        $roles = Arr::flatten($roles);

        $user = DB::transaction(function () use ($userRequest, $roles, $id) {
            $user = $this->find($id);
            $user->update($userRequest);
    
            foreach ($roles as $role_id) {
                $roleUser = [
                    'user_id' => $user->id,
                    'role_id' => $role_id,
                ];

                $roleUser = $this->attachCreatedAndUpdated($roleUser);

                $roleUser[] = $roleUser;
            }
            $user->roles()->sync($roleUser);

            return $user;
        }, 3);

        return $user;
    }
}