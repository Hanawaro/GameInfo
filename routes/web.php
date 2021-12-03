<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/search', function () {
    return view('search');
})->name('search');

Route::get('/create', function () {
    return view('create');
})->name('create');

Route::get('/login', function () {
    return view('login');
})->name('login');

Route::get('/register', function () {
    return view('register');
})->name('register');

Route::get('/login/remember', function () {
    return view('remember');
})->name('remember');

Route::get('/user', function () {
    return view('user');
})->name('user');
