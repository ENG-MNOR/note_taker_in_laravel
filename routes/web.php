<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\noteController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web r  outes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', [welcomeController::class, 'welcome'])->name('welcome');
// Route::get('/test', [welcomeController::class, 'login'])->name('tijabo');
// Route::get('/note', [noteController::class, 'index'])->name('note');
// Route::get('/note/create', [noteController::class, 'create'])->name('note.create');
// Route::post('/note', [noteController::class, 'store'])->name('note.store');
// Route::get('/note/{id}', [noteController::class, 'show'])->name('note.show');
// Route::get('/note/{id}/edit', [noteController::class, 'edit'])->name('edit.update');
// Route::put('/note/{id}', [noteController::class, 'update'])->name('note.update');
// Route::delete('/note/{id', [noteController::class, 'destroy'])->name('note.destroy');
Route::middleware(['auth', 'verified'])->group(function () {
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

    // Route::get('/', [welcomeController::class, 'welcome'])->name('welcome');
    // Route::get('/test', [welcomeController::class, 'login'])->name('tijabo');
    // Route::get('/note', [noteController::class, 'index'])->name('note');
    // Route::get('/note/create', [noteController::class, 'create'])->name('note.create');
    // Route::post('/note', [noteController::class, 'store'])->name('note.store');
    // Route::get('/note/{id}', [noteController::class, 'show'])->name('note.show');
    // Route::get('/note/{id}/edit', [noteController::class, 'edit'])->name('edit.update');
    // Route::put('/note/{id}', [noteController::class, 'update'])->name('note.update');
    // Route::delete('/note/{id', [noteController::class, 'destroy'])->name('note.destroy');

    Route::resource('/note', noteController::class);
});
Route::redirect('/', '/note')->name('dashboard');
// Route::get('/', function () {
//     return view('note');
// });

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
