<?php

use App\Http\Controllers\MovieController;
use App\Http\Controllers\DirectorController;
use App\Http\Controllers\ActorController;
use App\Http\Controllers\Userscontroller;

// auth login (ha a Userscontroller.login-t használod)
Route::post('/users/login', [Userscontroller::class, 'login']);

// listázás és részletek nyilvánosak
Route::get('/movies', [MovieController::class, 'index'])->name('movies.index');
Route::get('/movies/{id}', [MovieController::class, 'show'])->name('movies.show');

// szerkesztés, létrehozás, törlés auth-hoz kötve
Route::middleware('auth')->group(function () {
    Route::get('/movies/create', [MovieController::class, 'create'])->name('movies.create');
    Route::post('/movies', [MovieController::class, 'store'])->name('movies.store');
    Route::get('/movies/{id}/edit', [MovieController::class, 'edit'])->name('movies.edit');
    Route::put('/movies/{id}', [MovieController::class, 'update'])->name('movies.update');
    Route::delete('/movies/{id}', [MovieController::class, 'destroy'])->name('movies.destroy');

    // directors
    Route::resource('directors', DirectorController::class)->except(['show'])->middleware('auth');
    // actors
    Route::resource('actors', ActorController::class)->except(['show'])->middleware('auth');
});
