<?php

use App\Http\Controllers\API\V1\AuthController;
use App\Http\Controllers\API\V1\MenuController;
use App\Http\Controllers\API\V1\RoleController;
use App\Http\Controllers\API\V1\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('v1')->group(function () {
    Route::group(['prefix' => 'auth'], function () {
        Route::post('login', [AuthController::class, 'login']);
        Route::post('logout', [AuthController::class, 'logout']);
        Route::post('refresh', [AuthController::class, 'refresh']);
        Route::post('me', [AuthController::class, 'me']);
    });

    Route::prefix('master')->group(function () {
        Route::apiResource('user', UserController::class);
    });
    
    Route::prefix('settings')->group(function () {
        Route::prefix('menu')->group(function () {
            Route::get('/', [MenuController::class, 'index']);
        });

        Route::apiResource('role', RoleController::class);
    });
});