<?php

use App\Http\Controllers\CourseController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\UserController;
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

Route::post('/register', [UserController::class, 'register']);
Route::post('/login', [UserController::class, 'login']);
Route::apiResource('courses', CourseController::class, ['only' => ['index', 'show']]);

Route::middleware('auth.local')->group(function () {
    Route::get('/logout', [UserController::class, 'logout']);
    Route::apiResource('favorite', UserController::class);
    Route::apiResource('courses/{course}/tasks', TaskController::class, ['only' => ['index', 'show']]);
    Route::post('/courses/{course}/tasks/{task}/complete', [TaskController::class, 'complete']);
});

Route::middleware('role:teacher')->group(function () {
    Route::apiResource('courses', CourseController::class, ['only' => ['store', 'update', 'destroy']]);
    Route::apiResource('courses/{course}/tasks', TaskController::class, ['only' => ['store', 'update', 'destroy']]);
});

//Route::fallback(function () {
//    return response()->json(["message" => "Not Found", "code" => 404], 404);
//});
