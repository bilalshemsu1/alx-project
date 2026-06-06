<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', function () {
    return view('login');
});

Route::get('/dashboard', function () {
    return view('user.dashboard');
});

Route::get('/medications', function () {
    return view('user.medications');
});

Route::get('/meal-plan', function () {
    return view('user.meal-plan');
});

Route::get('/activities', function () {
    return view('user.activities');
});

Route::get('/appointments', function () {
    return view('user.appointments');
});

Route::get('/personalization', function () {
    return view('user.personalization');
});

Route::get('/doctor/dashboard', function () {
    return view('doctor.dashboard');
});

Route::get('/doctor/patients', function () {
    return view('doctor.patients');
});

Route::get('/doctor/notifications', function () {
    return view('doctor.notifications');
});

Route::get('/doctor/profile', function () {
    return view('doctor.profile');
});

Route::get('/doctor/patients/{id}', function ($id) {
    return view('doctor.patient-show');
});

Route::get('/admin/dashboard', function () {
    return view('admin.dashboard');
});