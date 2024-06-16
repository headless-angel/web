<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FileUploadController;
use App\Http\Controllers\Auth\ProfileController;
use App\Http\Controllers\Auth\PasswordResetController;

$seasonStarted = true;

Route::get('/', function () use ($seasonStarted) {
    return auth()->check() && $seasonStarted ? redirect()->route('dashboard') : redirect()->route('login');
});

Route::get('register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('register', [AuthController::class, 'register']);
Route::get('login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('login', [AuthController::class, 'login']);

Route::middleware('auth')->group(function () {
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::post('logout', [AuthController::class, 'logout'])->name('logout');
    
    Route::get('upload', [FileUploadController::class, 'showUploadForm'])->name('upload');
    Route::post('upload', [FileUploadController::class, 'upload']);
    Route::post('upload/finalize', [FileUploadController::class, 'finalizeUpload'])->name('finalizeUpload');

    Route::get('profile', [ProfileController::class, 'show'])->name('profile.show');
    Route::post('profile/update', [ProfileController::class, 'update'])->name('profile.update');

    Route::get('password/reset', [PasswordResetController::class, 'showResetForm'])->name('password.reset.form');
    Route::post('password/reset', [PasswordResetController::class, 'resetPassword'])->name('password.reset');
});
