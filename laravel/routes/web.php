<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\BmiController;


// Home
Route::get('/', function () {
    return view('index');
})->name('index');

// Dashboard (protected)
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard')->middleware('auth');

// BMI Page (protected)
Route::get('/bmi', function () {
    $user = Auth::user(); // Ambil user yg lagi login
    return view('bmi', compact('user'));
})->name('bmi')->middleware('auth');

// Save BMI (POST, protected)
Route::post('/bmi/save', [BmiController::class, 'save'])->name('bmi.save')->middleware('auth');

// About Us (public)
Route::get('/about-us', function () {
    return view('about-us');
})->name('about-us');

// Exercise Page (protected)
Route::get('/exercise', function () {
    return view('exercise');
})->name('exercise')->middleware('auth');

// Nearby Page (protected)
Route::get('/nearby', function () {
    return view('nearby');
})->name('nearby')->middleware('auth');

// Nutrition Page (protected)
Route::get('/nutrition', function () {
    return view('nutrition');
})->name('nutrition')->middleware('auth');

// Terms & Conditions (public)
Route::get('/tnc', function () {
    return view('tnc');
})->name('tnc');

// Register
Route::get('/register', function () {
    return view('register');
})->name('register');

Route::post('/register', [RegisterController::class, 'store'])->name('register.store');

// Login
Route::get('/login', function () {
    return view('login');
})->name('login');

Route::post('/login', [LoginController::class, 'login'])->name('login.attempt');

// Logout
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
