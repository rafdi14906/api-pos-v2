<?php

namespace App\Repositories;

class Repository
{
    public function attachCreatedAndUpdated(array $request)
    {
        return array_merge($request, [ 
            'created_by' => request()->get('token_decode')['id'],
            'created_at' => now(),
            'updated_by' => request()->get('token_decode')['id'],
            'updated_at' => now(),
        ]);
    }
}