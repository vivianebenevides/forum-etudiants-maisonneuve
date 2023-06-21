<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EtudiantController;
use App\Http\Controllers\CustomAuthController;
use App\Http\Controllers\LocalizationController;
use App\Http\Controllers\ForumPostController;

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
    return view('welcome');
});

Route::get('/etudiants',                [EtudiantController::class, 'index'])->name('etudiants.index')->middleware('auth');
Route::get('etudiants/{etudiant}',      [EtudiantController::class, 'show'])->name('etudiants.show')->middleware('auth');
Route::get('etudiant-create',           [EtudiantController::class, 'create'])->name('etudiants.create')->middleware('auth');
Route::post('etudiant-create',          [EtudiantController::class, 'store'])->middleware('auth');
Route::get('etudiant-edit/{etudiant}',  [EtudiantController::class, 'edit'])->name('etudiants.edit')->middleware('auth');
Route::put('etudiant-edit/{etudiant}',  [EtudiantController::class, 'update'])->middleware('auth');
Route::delete('etudiants/{etudiant}',   [EtudiantController::class, 'destroy'])->middleware('auth');

Route::get('/login',                    [CustomAuthController::class, 'index'])->name('login');
Route::post('/login',                   [CustomAuthController::class, 'authentication'])->name('login.authentication');
Route::get('/registration',             [CustomAuthController::class, 'create'])->name(
'user.registration');
Route::post('/registration-store',      [CustomAuthController::class, 'store'])->name(
'user.store');
Route::get('/logout',                   [CustomAuthController::class, 'logout'])->name('logout');

Route::get('/lang/{locale}',            [LocalizationController::class, 'index'])->name('lang');

Route::get('/forum',                    [ForumPostController::class, 'index'])->name('forum.index');
Route::get('forum/{forumPost}',         [ForumPostController::class, 'show'])->name('forum.show')->middleware('auth');
Route::get('forum-create',              [ForumPostController::class, 'create'])->name('forum.create')->middleware('auth');
Route::post('forum-create',             [ForumPostController::class, 'store'])->middleware('auth');
Route::get('forum-edit/{forumPost}',    [ForumPostController::class, 'edit'])->name('forum.edit')->middleware('auth');
Route::put('forum-edit/{forumPost}',    [ForumPostController::class, 'update'])->middleware('auth');
Route::delete('forum/{forumPost}',      [ForumPostController::class, 'destroy'])->middleware('auth');