<?php

use Illuminate\Support\Facades\Route;

Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('/about-us', function () {
    return view('about-us');
})->name('about-us');

Route::get('/bmi', function () {
    return view('bmi');
})->name('bmi');

Route::get('/exercise', function () {
    return view('exercise');
})->name('exercise');

Route::get('/index', function () {
    return view('index');
})->name('index');

Route::get('/login', function () {
    return view('login');
})->name('login');

Route::get('/nearby', function () {
    return view('nearby');
})->name('nearby');

Route::get('/nutrition', function () {
    return view('nutrition');
})->name('nutrition');

Route::get('/register', function () {
    return view('register');
})->name('register');

Route::get('/tnc', function () {
    return view('tnc');
})->name('tnc');

Route::get('/', function () {
    return view('index');
})->name('index');
