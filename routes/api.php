<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DonationController;
use App\Http\Controllers\DonorController;
use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;


Route::prefix("v1")->group(function () {
    Route::controller(AuthController::class)->group(function () {
        Route::post('/register', 'register');
        Route::post('/login', 'login');
        Route::post('/refresh-token', 'refreshToken');
        Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');
    });

    Route::middleware('auth:sanctum')->group(function () {
        Route::apiResource('donors', DonorController::class);
        Route::apiResource('donations', DonationController::class);
        Route::get('donors/{donor}/donations', [DonationController::class, 'donationsByDonor']);
    });
    Route::apiResource(name: 'students', controller: StudentController::class);

});