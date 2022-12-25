<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ClassController;
use App\Http\Controllers\ClassStudentController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::controller(AuthController::class)->prefix('v1')->middleware('throttle:100:60')->group(function () {
    Route::post('/auth/login', 'login');
    Route::post('/auth/logout', 'logout')->middleware('auth:sanctum');
    Route::get('/profile', 'profile')->middleware('auth:sanctum');
});

Route::controller(UserController::class)->prefix('v1')->middleware('throttle:100:60')->group(function () {
    Route::post('/users', 'store');
    Route::get('/users/{id}', 'index')->middleware('auth:sanctum');
    Route::patch('/users/{id}',  'update')->middleware('auth:sanctum');
    Route::delete('/users/{id}', 'destroy')->middleware('auth:sanctum');
});

Route::controller(ClassStudentController::class)->prefix('v1')->middleware(['auth:sanctum'])->group(function () {
    Route::get('/classes-students', 'index');
});

Route::controller(ClassController::class)->prefix('v1')->middleware(['auth:sanctum'])->group(function () {
    Route::post('/classes', 'store');
});


Route::controller(StudentController::class)->prefix('v1')->middleware(['auth:sanctum', 'throttle:100:60'])->group(function () {
    Route::post('/students', 'store');
});
