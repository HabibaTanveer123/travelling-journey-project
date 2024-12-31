<?php

use App\Http\Controllers\PackageApiController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\Api\AuthController;

// Login route
Route::post('/login', [AuthController::class, 'login']);

// Protected routes
Route::middleware('auth:api')->group(function () {
    // Other protected routes can go here
    Route::get('/profile', function (Request $request) {
        return response()->json([
            'user' => $request->user(),
        ]);
    });

    // Logout route (revoke the access token)
    Route::post('/logout', [AuthController::class, 'logout']);
    
    // Protected package routes
    Route::apiResource('packages', PackageApiController::class);
});
