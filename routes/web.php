<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EtudiantController;

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

Route::get('/etudiants',                [EtudiantController::class, 'index'])->name('etudiants.index');
Route::get('etudiants/{etudiant}',      [EtudiantController::class, 'show'])->name('etudiants.show');
Route::get('etudiant-create',           [EtudiantController::class, 'create'])->name('etudiants.create');
Route::post('etudiant-create',          [EtudiantController::class, 'store']); 
Route::get('etudiant-edit/{etudiant}',  [EtudiantController::class, 'edit'])->name('etudiants.edit');
Route::put('etudiant-edit/{etudiant}',  [EtudiantController::class, 'update']);
Route::delete('etudiants/{etudiant}',    [EtudiantController::class, 'destroy']);
