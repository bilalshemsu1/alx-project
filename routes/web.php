<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\User\ActivitiesController;
use App\Http\Controllers\User\DashboardController;
use App\Http\Controllers\User\MealPlanController;
use App\Http\Controllers\User\MedicinesController;
use App\Http\Controllers\User\NotificationController;
use App\Http\Controllers\User\PersonalizationController;
use Illuminate\Support\Facades\Route;


// Public routes
Route::get('/', fn() => view('welcome'));
Route::get('/login', fn() => view('login'));
Route::post('/login', [AuthController::class, 'login'])->name('login.post');

// Patient routes
Route::middleware(['auth.redirect', 'role:patient'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/medications', [MedicinesController::class, 'index'])->name('medications.index');
    Route::post('/medications/doses/{dose}/take', [MedicinesController::class, 'takeDose'])
        ->name('medications.doses.take');
    Route::get('/meal-plan', [MealPlanController::class, 'index'])->name('meal-plan.index');
    Route::post('/meal-plan/{mealPlan}/take', [MealPlanController::class, 'takeMeal'])->name('meal-plan.take');
    Route::get('/activities', [ActivitiesController::class, 'index'])->name('activities.index');
    Route::post('/activities/{activity}/complete', [ActivitiesController::class, 'complete'])->name('activities.complete');
    Route::get('/appointments', fn() => view('user.appointments'));
    Route::get('/personalization', [PersonalizationController::class, 'index'])->name('personalization.index');
    Route::post('/personalization/save', [PersonalizationController::class, 'save'])->name('personalization.save');
    Route::delete('/personalization/delete/{key}', [PersonalizationController::class, 'delete'])->name('personalization.delete');
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
