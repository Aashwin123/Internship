<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\TaskController;

Route::post('/login', function (Request $request) {
    $credentials = $request->only('email', 'password');

    if (!auth()->attempt($credentials)) {
        return response()->json([
            'success' => false,
            'status' => 401,
            'message' => 'Invalid credentials'
        ], 401);
    }

    $token = $request->user()->createToken('api-token')->plainTextToken;
    return response()->json([
        'success' => true,
        'status' => 200,
        'message' => 'Login successful',
        'data' => ['token' => $token]
    ]);
});

//  Route::apiResource('tasks', TaskController::class);


Route::middleware('auth:sanctum')->group(function () {
    Route::apiResource('tasks', TaskController::class);
});
