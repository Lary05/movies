<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\DirectorController;
use App\Http\Controllers\ActorController;
use App\Http\Controllers\Userscontroller;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('welcome');
});

// Dashboard (auth + verified) - ha Breeze van
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Auth (login/logout) - a remote API-val működő loginhoz (AuthenticatedSessionController-t használd)
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthenticatedSessionController::class, 'create'])->name('login'); // ha kell login form
    Route::post('/login', [AuthenticatedSessionController::class, 'store']);
});
Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->middleware('auth')->name('logout');

// Ha a Userscontroller.login-t használod (API login közvetlen), tartsd meg vagy távolítsd el
Route::post('/users/login', [Userscontroller::class, 'login']);

// Nyilvános listázás / részletek
Route::get('/movies', [MovieController::class, 'index'])->name('movies.index');
Route::get('/movies/{id}', [MovieController::class, 'show'])->name('movies.show');

// Export route-ok (CSV / PDF)
Route::get('/movies/export/csv', [MovieController::class, 'exportCsv'])->name('movies.export.csv');
Route::get('/movies/export/pdf', [MovieController::class, 'exportPdf'])->name('movies.export.pdf');

// Szerkesztés / létrehozás / törlés → csak bejelentkezetteknek
Route::middleware('auth')->group(function () {
    Route::get('/movies/create', [MovieController::class, 'create'])->name('movies.create');
    Route::post('/movies', [MovieController::class, 'store'])->name('movies.store');
    Route::get('/movies/{id}/edit', [MovieController::class, 'edit'])->name('movies.edit');
    Route::put('/movies/{id}', [MovieController::class, 'update'])->name('movies.update');
    Route::delete('/movies/{id}', [MovieController::class, 'destroy'])->name('movies.destroy');

    // resource-ok directors és actors (kivéve show ha nem kell publikusan)
    Route::resource('directors', DirectorController::class)->except(['show']);
    Route::resource('actors', ActorController::class)->except(['show']);
});

// Profil kezelése (Breeze)
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
