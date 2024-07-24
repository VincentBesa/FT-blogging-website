<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use Illuminate\Support\Facades\Route;

// Home and Dashboard routes
Route::get('/', [PostController::class, 'index'])->name('home');
Route::get('/dashboard', [PostController::class, 'index'])->name('dashboard');

// Authentication Routes
Route::get('/register', [RegisteredUserController::class, 'create'])->name('register');
Route::post('/register', [RegisteredUserController::class, 'store']);
Route::get('/login', [AuthenticatedSessionController::class, 'create'])->name('login');
Route::post('/login', [AuthenticatedSessionController::class, 'store']);
Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');

// Resource routes for posts
Route::resource('posts', PostController::class);
Route::get('posts/create', [PostController::class, 'create'])->name('posts.create');
Route::resource('posts', PostController::class);

