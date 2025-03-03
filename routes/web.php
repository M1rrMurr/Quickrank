<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\CoachController;
use App\Http\Controllers\CoachingSessionController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\GameController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SessionApplyController;
use Illuminate\Support\Facades\Route;
use Monolog\Handler\RotatingFileHandler;

Route::get('/', [GameController::class, 'index'])->name('Home');

Route::get('/coaches', [CoachController::class, 'index']);
Route::get('/coaches/{coach}', [CoachController::class, 'show']);

Route::get('/register', [RegisterController::class, 'create'])->middleware(['guest']);

Route::post('/register', [RegisterController::class, 'store']);

Route::delete('/logout', [LoginController::class, 'destroy']);

Route::get('/login', [LoginController::class, 'create'])->middleware(['guest'])->name('login');
Route::post('/login', [LoginController::class, 'store']);

Route::get('/profile', [ProfileController::class, 'show'])->middleware(['auth']);
Route::get('/profile/edit', [ProfileController::class, 'edit'])->middleware(['auth']);
Route::patch('/profile/update', [ProfileController::class, 'update'])->middleware(['auth']);

Route::get('/games/{name}', [GameController::class, 'show']);

Route::get('/messages/inbox', [MessageController::class, 'indexInbox'])->middleware('auth');
Route::get('/messages/sent', [MessageController::class, 'indexSent'])->middleware('auth');

Route::get('/messages/create', [MessageController::class, 'create'])->middleware('auth');
Route::post('/messages/store', [MessageController::class, 'store'])->middleware('auth');

Route::get('/message/{message}', [MessageController::class, 'show'])->middleware('auth');

Route::get('/sessions', [CoachingSessionController::class, 'index']);

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth', 'can:isCoach']);
Route::patch('/dashboard/accept-session-apply', [DashboardController::class, 'updateSessionApply'])->middleware('auth');
Route::patch('/dashboard/close-session', [DashboardController::class, 'closeCoachingSession'])->middleware('auth');
Route::delete('/dashboard/destroy-session', [DashboardController::class, 'destroySession'])->middleware('auth');

Route::post('/sessions/apply', [SessionApplyController::class, 'store'])->middleware('auth');
