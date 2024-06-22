<?php

use App\Http\Controllers\welcomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\noteController;

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

Route::get('/', [welcomeController::class, 'welcome'])->name('welcome');
Route::get('/test', [welcomeController::class, 'login'])->name('tijabo');
// Route::get('/note', [noteController::class, 'index'])->name('note');
// Route::get('/note/create', [noteController::class, 'create'])->name('note.create');
// Route::post('/note', [noteController::class, 'store'])->name('note.store');
// Route::get('/note/{id}', [noteController::class, 'show'])->name('note.show');
// Route::get('/note/{id}/edit', [noteController::class, 'edit'])->name('edit.update');
// Route::put('/note/{id}', [noteController::class, 'update'])->name('note.update');
// Route::delete('/note/{id', [noteController::class, 'destroy'])->name('note.destroy');

Route::resource('/note', noteController::class);