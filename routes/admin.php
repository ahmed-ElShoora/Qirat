<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\IntroController;
use App\Http\Controllers\Admin\HelpController;
use App\Http\Controllers\Admin\KycController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\DeveloperController;
use App\Http\Controllers\Admin\TypeController;
use App\Http\Controllers\Admin\SignatureController;
use App\Http\Controllers\Admin\UnitController;
use App\Http\Controllers\Admin\PhasesController;
use App\Http\Controllers\Admin\SellController;

//admin login routes
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'authenticate'])->name('admin.authenticate');

//must be authenticated as admin to access these routes
Route::middleware('auth:admin')->name('admin.')->group(function () {
    //admin dashboard route
    Route::get('/dashboard', DashboardController::class)->name('dashboard');
    //admin logout route
    Route::get('/logout', [AuthController::class, 'logout']);
    //admin crud routes
    Route::get('/admins',[AdminController::class,'index'])->name('admins');
    Route::get('/admin-delete-{id}',[AdminController::class,'delete'])->name('admin.delete');
    Route::get('/admin-create',[AdminController::class,'create'])->name('create.admin');
    Route::post('/admin-create',[AdminController::class,'store'])->name('create.admin.store');
    //intro crud routes
    Route::resource('/intros',IntroController::class)->except(['show']);
    //help crud routes
    Route::resource('/helps',HelpController::class)->except(['show']);
    //developer crud
    Route::resource('/developers',DeveloperController::class)->except(['show', 'destroy']);
    //unit crud
    Route::resource('/units',UnitController::class)->except(['show', 'destroy']);
    Route::get('/units/{id}/promotion', [UnitController::class, 'promotion'])->name('units.promotion');
    Route::get('/units/{id}/hide', [UnitController::class, 'hide'])->name('units.hide');
    //unit phases crud
    Route::resource('/units/{unit_id}/phases', PhasesController::class)->except(['show']);
    //types crud
    Route::resource('/types',TypeController::class)->except(['show', 'destroy']);
    //sell crud
    Route::get('/sells', [SellController::class, 'sells'])->name('sells');
    Route::get('/sells/{id}/hide', [SellController::class, 'hideSell'])->name('sells.hide');
    //Signature crud
    Route::resource('/signatures',SignatureController::class)->except(['show', 'destroy']);
    //Edit Setting
    Route::get('/setting',[SettingController::class,'index'])->name('setting');
    Route::post('/setting',[SettingController::class,'store'])->name('setting.store');
    //kyc verification
    Route::get('/kycs', [KycController::class, 'index'])->name('kyc');
    Route::get('/display-kyc/{id}', [KycController::class, 'show'])->name('kyc.show');
    Route::post('/update-status-kyc', [KycController::class, 'updateStatus'])->name('kyc.status');
});