<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\AdminController;

//admin login routes
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'authenticate'])->name('admin.authenticate');

//must be authenticated as admin to access these routes
Route::middleware('auth:admin')->group(function () {
    //admin dashboard route
    Route::get('/dashboard', DashboardController::class)->name('admin.dashboard');
    //admin logout route
    Route::get('/logout', [AuthController::class, 'logout']);
    //admin crud routes
    Route::get('/admins',[AdminController::class,'index'])->name('admin.admins');
    Route::get('/admin-delete-{id}',[AdminController::class,'delete'])->name('admin.admin.delete');
    Route::get('/admin-create',[AdminController::class,'create'])->name('admin.create.admin');
    Route::post('/admin-create',[AdminController::class,'store'])->name('admin.create.admin.store');
});