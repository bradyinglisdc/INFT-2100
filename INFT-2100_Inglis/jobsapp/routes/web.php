<?php

use App\Http\Controllers\JobListingController;
use App\Http\Controllers\RegisteredUserController;
use App\Http\Controllers\SessionController;
use Illuminate\Support\Facades\Route;

// Static Routes
Route::View('/', 'home');
Route::View('/contact', 'contact');

// Job CRUD
Route::get('/jobs', [JobListingController::class, 'index']);
Route::get('/jobs/create', [JobListingController::class, 'create']);

Route::post('/jobs', [JobListingController::class, 'store'])
    ->middleware('auth');

Route::get('/jobs/{job}', [JobListingController::class, 'show']);

Route::get('/jobs/{job}/edit', [JobListingController::class, 'edit'])
    ->middleware('auth')
    ->can('edit', 'job');

Route::patch('/jobs/{job}', [JobListingController::class, 'update'])
    ->middleware('auth')
    ->can('edit', 'job');

Route::delete('/jobs/{job}', [JobListingController::class, 'destroy'])
    ->middleware('auth')
    ->can('edit', 'job');

// Registration
Route::get('/register', [RegisteredUserController::class, 'create']);
Route::post('/register', [RegisteredUserController::class, 'store']);

// Auth Routes
Route::get('/login', [SessionController::class, 'create']);
Route::post('/login', [SessionController::class, 'store']);
Route::post('/logout', [SessionController::class, 'destroy']);

