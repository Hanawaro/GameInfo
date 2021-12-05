<?php

use App\Http\Controllers\CreateController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SearchController;
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

Route::get('/', [HomeController::class, 'show'])->name('home');
Route::get('/{global}/{local}', [HomeController::class, 'sortBy'])->name('sortBy');
Route::post('/sortByRedirect', [HomeController::class, 'sortByRedirect'])->name('sortByRedirect');

Route::get('/search', [SearchController::class, 'show'])->name('search');

Route::get('/create', [CreateController::class, 'show'])->name('create');
Route::post('/create', [CreateController::class, 'send'])->name('send');

Route::get('/settings', function () {
    return view('settings');
})->name('settings');

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
