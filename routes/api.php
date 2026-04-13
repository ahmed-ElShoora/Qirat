<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\IntroController;
use App\Http\Controllers\Api\HelpController;

Route::middleware(['api.password','change.lang','throttle:60,1'])->prefix('v1')->group(function () {
    // Intro
    Route::get('intro', IntroController::class);
    // Help
    Route::get('help', HelpController::class);

});