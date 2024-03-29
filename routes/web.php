<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\RolesController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WebcategoriaController;
use App\Http\Controllers\WebitemController;

Route::get('/',[DashboardController::class, 'index'] )->name('Welcome');
Route::get('/elite', [DashboardController::class, 'elite'])->name('elite');
Route::get('/pre_u', [DashboardController::class, 'pre_u'])->name('pre_u');
Route::get('/pre_e', [DashboardController::class, 'pre_e'])->name('pre_e');
// Route::get('/servicios', [ServiciosController::class, 'index'])->name('servicios');
Route::get('/regalos', [DashboardController::class, 'regalos'])->name('regalos');
Route::get('/eventos', [DashboardController::class, 'eventos'])->name('eventos');
Route::get('/galeria', [DashboardController::class, 'galeria'])->name('galeria');

Route::middleware(['auth:sanctum',config('jetstream.auth_session'),'verified',])->group(function () {
    Route::get('/dashboard',[DashboardController::class, 'dashboard'] )->name('dashboard');
    Route::resource('users', UserController::class);
    // Route::get('/graphic', [UserController::class, 'EmployeeByDepartament'])->name('graphic');
    Route::resource('roles' , RolesController::class);
    Route::resource('webcategorias', WebcategoriaController::class);
    Route::resource('webitems', WebitemController::class);
});
