<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\BmiController;


Route::middleware('guest')->group(function () {
    // Home
    Route::get('/', function () {
        return view('index');
    })->name('index');

    // Login
    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [LoginController::class, 'login'])->name('login.attempt');

    // Register
    Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
    Route::post('/register', [RegisterController::class, 'store'])->name('register.store');
});

Route::get('/tnc', function () {
    return view('tnc');
})->name('tnc');

Route::get('/bmi', function () {
    $user = Auth::user();
    return view('bmi', compact('user'));
})->name('bmi');

// About Us
    Route::get('/about-us', function () {
        return view('about-us');
    })->name('about-us');

Route::post('/bmi/save', [BmiController::class, 'save'])->name('bmi.save')->middleware('auth');

Route::middleware('auth')->group(function () {
    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Exercise
    Route::get('/exercise', function () {
        $user = Auth::user();
        return view('exercise', compact('user'));
    })->name('exercise');

    // Nearby
    Route::get('/nearby', function () {
        $user = Auth::user();
        return view('nearby', compact('user'));
    })->name('nearby');

    // Nutrition
    Route::get('/nutrition', function () {
        $user = Auth::user();
        return view('nutrition', compact('user'));
    })->name('nutrition');

    // Logout
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
});
