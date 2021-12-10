<?php

use App\Http\Controllers\CreateController;
use App\Http\Controllers\ArticlesController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\UserController;
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
Route::post('/article/delete/{id}', [UserController::class, 'delete'])->name('article.delete');
Route::post('/article/role/editor/{id}', [UserController::class, 'roleEditor'])->name('role.editor');
Route::post('/article/role/user/{id}', [UserController::class, 'roleUser'])->name('role.user');

Route::get('/', [ArticlesController::class, 'indexAll'])->name('article.all');
Route::get('/article/{id}', [ArticlesController::class, 'indexOne'])->name('article.get');
Route::get('/{global}/{local}', [ArticlesController::class, 'sortBy'])->name('article.sort');
Route::post('/sortByRedirect', [ArticlesController::class, 'sortByRedirect'])->name('article.redirect');

Route::get('/search', [SearchController::class, 'index'])->name('search');
Route::post('/searchRedirect', [SearchController::class, 'searchRedirect'])->name('search.redirect');

Route::get('/editor', [CreateController::class, 'index'])->middleware('auth')->name('editor.create');
Route::post('/editor', [CreateController::class, 'send'])->middleware('auth')->name('editor.send');

Route::get('/settings', function () {
    return view('settings');
})->middleware('auth')->name('settings');
