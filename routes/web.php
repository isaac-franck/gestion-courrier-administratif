<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('home');


Route::get('/login', function () {
    return view('auth.login');
})->name('login');

Route::post('/login', function () {
    // Nous ajouterons ici la vraie authentification
})->name('login.store');

// Inscription
Route::get('/register', function () {
    return view('auth.register');
})->name('register');
