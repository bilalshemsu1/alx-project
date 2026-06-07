<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\User\DashboardController;
use App\Http\Controllers\User\NotificationController;
use Illuminate\Support\Facades\Route;


// Public routes
Route::get('/', fn() => view('welcome'));
Route::get('/login', fn() => view('login'));
Route::post('/login', [AuthController::class, 'login'])->name('login.post');

// Patient routes
Route::middleware(['auth.redirect', 'role:patient'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/medications', fn() => view('user.medications'));
    Route::get('/meal-plan', fn() => view('user.meal-plan'));
    Route::get('/activities', fn() => view('user.activities'));
    Route::get('/appointments', fn() => view('user.appointments'));
    Route::get('/personalization', fn() => view('user.personalization'));
});

// Doctor routes
Route::middleware(['auth.redirect', 'role:doctor'])->prefix('doctor')->group(function () {
    Route::get('/dashboard', fn() => view('doctor.dashboard'));
    Route::get('/patients', fn() => view('doctor.patients'));
    Route::get('/patients/{id}', fn($id) => view('doctor.patient-show'));
    Route::get('/notifications', fn() => view('doctor.notifications'));
    Route::get('/profile', fn() => view('doctor.profile'));
});

// Notification API (used by layouts/user.blade.php)
Route::middleware(['auth.redirect', 'role:patient'])->prefix('api/patient')->group(function () {
    Route::get('/notifications', [NotificationController::class, 'index']);
    Route::post('/notifications/mark-read', [NotificationController::class, 'markAllRead']);
});


// Admin routes
Route::middleware(['auth.redirect', 'role:admin'])->prefix('admin')->group(function () {
    Route::get('/dashboard', fn() => view('admin.dashboard'));
});
