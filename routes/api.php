<?php

use App\Http\Controllers\ActorController;
use App\Http\Controllers\Userscontroller;
use Illuminate\Support\Facades\Route;


Route::get('/actors', [ActorController:::class, 'index']);




Route::post('/users/login' , [Userscontroller::class, 'login']);


Route::get('/users', [Userscontroller::class, 'index'])->middleware('auth:sanctum');
