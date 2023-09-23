<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

// login
Route::middleware('guest')->group(function () {
    Route::get('/login', [LoginController::class, 'showLogin'])->name('show_login');
    Route::post('/login', [LoginController::class, 'login'])->name('login');
});


// => Protected Routes

Route::middleware(['auth'])->group(function () {

    Route::as('dashboard.')->group(function () {

        Route::middleware(['role:super_admin|merchant'])->group(function () {
            Route::get('/', [DashboardController::class, 'index'])->name('home');
        });
        Route::get('merchant/{id}', [DashboardController::class, 'ShowMerchant'])
            ->name('showMerchant')->middleware('role:super_admin');

        Route::middleware(['role:customer'])->group(function () {
            Route::get('welcome', [DashboardController::class, 'welcome'])->name('welcome');
        });
    });

    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
});


Route::fallback(function () {
    return view('errors.404');
});
