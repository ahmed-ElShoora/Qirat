<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\IntroController;
use App\Http\Controllers\Api\HelpController;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\GoogleSignController;
use App\Http\Controllers\Api\KycController;
use App\Http\Controllers\Api\SettingController;

Route::middleware(['api.password','change.lang','throttle:60,1'])->prefix('v1')->group(function () {
    // Intro
    Route::get('/intro', IntroController::class);
    // Help
    Route::get('/help', HelpController::class);
    //Setting Route
    Route::get('/setting', SettingController::class);
    // Auth
    Route::post('/register', [AuthController::class, 'register']);
    Route::post('/verify', [AuthController::class, 'verify']);
    Route::post('/login', [AuthController::class, 'login']);
    Route::post('/forget', [AuthController::class, 'forget']);
    Route::post('/reset', [AuthController::class, 'reset']);
    Route::post('/google', GoogleSignController::class);
    //must be authenticated
    Route::middleware('auth:sanctum')->group(function () {
        // Authenticated routes for user profile, devices, logout
        Route::get('/me', [AuthController::class, 'me']);
        Route::get('/devices', [AuthController::class, 'devices']);
        Route::get('/logout', [AuthController::class, 'logout']);
        Route::get('/logout-all', [AuthController::class, 'logoutAll']);
        // KYC
        Route::post('/kyc', [KycController::class, 'submit']);
        //must be kyc approved for shares
        Route::middleware(['kyc:shares'])->group(function () {
            
        });
        //must be kyc approved for broker
        Route::middleware(['kyc:broker'])->group(function () {  

        });

    });

});