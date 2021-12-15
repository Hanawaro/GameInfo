<?php

use App\Http\Controllers\CreateController;
use App\Http\Controllers\ArticlesController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\UserController;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Support\Facades\Auth;
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

Auth::routes();

Route::get('/user/{name}', [UserController::class, 'index'])->name('user.get');
Route::post('/article/delete/{id}', [UserController::class, 'delete'])->middleware('auth')->name('article.delete');
Route::post('/article/role/editor/{id}', [UserController::class, 'roleEditor'])->middleware('auth')->name('role.editor');
Route::post('/article/role/user/{id}', [UserController::class, 'roleUser'])->middleware('auth')->name('role.user');

Route::get('/settings', [SettingsController::class, 'index'])->middleware('auth')->name('user.settings');
Route::post('/settings/photo', [SettingsController::class, 'changePhoto'])->middleware('auth')->name('user.change_photo');
Route::post('/settings/email', [SettingsController::class, 'changeEmail'])->middleware('auth')->name('user.change_email');
Route::post('/settings/password', [SettingsController::class, 'changePassword'])->middleware('auth')->name('user.change_password');

Route::get('/', [ArticlesController::class, 'indexAll'])->name('article.all');
Route::get('/article/{id}', [ArticlesController::class, 'indexOne'])->name('article.get');
Route::post('/article/rate/{id}', [ArticlesController::class, 'rate'])->name('article.rate');
Route::get('/article/{global}/{local}', [ArticlesController::class, 'sortBy'])->name('article.sort');
Route::post('/article/redirect', [ArticlesController::class, 'sortByRedirect'])->name('article.redirect');

Route::get('/search', [SearchController::class, 'index'])->name('search');
Route::post('/search/redirect', [SearchController::class, 'searchRedirect'])->name('search.redirect');

Route::get('/editor', [CreateController::class, 'index'])->middleware('auth')->name('editor.create');
Route::post('/editor', [CreateController::class, 'send'])->middleware('auth')->name('editor.send');


