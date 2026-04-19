<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\IntroController;
use App\Http\Controllers\Api\HelpController;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\GoogleSignController;
use App\Http\Controllers\Api\KycController;
use App\Http\Controllers\Api\SettingController;
use App\Http\Controllers\Api\AffliateController;
use App\Http\Controllers\Api\DeveloperController;
use App\Http\Controllers\Api\TypeController;
use App\Http\Controllers\Api\ExclusiveUnitController;
use App\Http\Controllers\Api\UnitController;
use App\Http\Controllers\Api\LoveController;

Route::middleware(['change.lang','throttle:60,1'])->prefix('v1')->group(function () {
    // Intro
    Route::get('/intro', IntroController::class);
    // Get all Developer
    Route::get('/developers', DeveloperController::class);
    // units
    Route::get('/exclusive-unit', ExclusiveUnitController::class);
    Route::get('/units', [UnitController::class, 'index']);
    Route::get('/unit/{id}', [UnitController::class, 'show']);
    //love unit
    Route::get('/love', [LoveController::class, 'loves']);
    Route::post('/love', [LoveController::class, 'addlove']);
    // Help
    Route::get('/help', HelpController::class);
    // Types
    Route::get('/types', TypeController::class);
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
        // Get User use Affliate
        Route::get('/affliate', AffliateController::class);
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