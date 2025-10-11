<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ClassController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\SchoolController;
use App\Models\Department;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('/login', [AuthController::class, 'login']);
Route::post('/register', [AuthController::class, 'register']);

Route::middleware("auth:sanctum")->group(function() {
    Route::post('verifyToken', [AuthController::class, 'verifyToken']);
    Route::post('logout', [AuthController::class, 'logout']);
    Route::get('/user', function (Request $request) {
        return response()->json([
            'user' => $request->user(),
        ]); 
    });

    Route::get('/role', [AuthController::class, 'getUserRole']);

    Route::get('/schoolByPicEmail', [SchoolController::class, 'getSchoolByPicEmail']);
    Route::get('/departmentsBySchoolPic', [DepartmentController::class, 'getDepartmentsBySchoolPic']);
    Route::post('/departmentByPic', [DepartmentController::class, 'storeByPic']);
    Route::apiResource('department', DepartmentController::class);
    Route::apiResource('class', ClassController::class);
});