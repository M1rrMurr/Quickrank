<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\CoachController;
use App\Http\Controllers\GameController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', [GameController::class, 'index'])->name('Home');

Route::get('/coaches', [CoachController::class, 'index']);

Route::get('/register', [RegisterController::class, 'create']);

Route::post('/register', [RegisterController::class, 'store']);

Route::delete('/logout', [LoginController::class, 'destroy']);

Route::get('/login', [LoginController::class, 'create'])->name('login');
Route::post('/login', [LoginController::class, 'store']);

Route::get('/profile', [ProfileController::class, 'show'])->middleware(['auth']);
Route::get('/profile/edit', [ProfileController::class, 'edit'])->middleware(['auth']);
Route::patch('/profile/update', [ProfileController::class, 'update'])->middleware(['auth']);

Route::get('/games/{name}', [GameController::class, 'show']);
