<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Auth\AuthPageController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EmployeeController;
use Illuminate\Support\Facades\Route;

Route::redirect('/', '/admin/dashboard');

Route::middleware('guest')->group(function () {
   Route::get('login', AuthPageController::class)
       ->name('auth.login');

   Route::post('login', AuthController::class)
       ->middleware('throttle:auth')
       ->name('auth.handle');
});

Route::middleware('auth')->group(function () {
    Route::get('dashboard', DashboardController::class)->name('dashboard');
    Route::resources([
        'companies' => CompanyController::class,
        'employees' => EmployeeController::class,
    ]);
});
