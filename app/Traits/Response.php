<?php

namespace App\Traits;

use Illuminate\Http\JsonResponse;

trait Response
{
    public function success(mixed $data, int $httpCode = 200) : JsonResponse
    {
        return response()->json(['data' => $data], $httpCode);
    }

    public function error(string $message, int $httpCode = 500, string $trace = null) : JsonResponse
    {
        $error = ['errors' => $message];

        if (config('app.debug')) {
            $error = array_merge($error, ['trace' => $trace]);
        }

        return response()->json($error, $httpCode);
    }
}