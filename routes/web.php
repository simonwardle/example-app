<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JobController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\RegisterUserController;

Route::view('/', 'home');
Route::view('/contact', 'contact');

// Job
Route::get('/jobs', [JobController::class, 'index']);

Route::get('/jobs/create', [JobController::class, 'create'])
    ->middleware('auth');

Route::post('/jobs', [JobController::class, 'store'])
    ->middleware('auth');

Route::get('/jobs/{job}', [JobController::class, 'show']);

Route::get('/jobs/{job}/edit', [JobController::class, 'edit'])
    ->middleware('auth')
    ->can('edit', 'job');

Route::patch('/jobs/{job}', [JobController::class, 'update']);
    //->middleware('auth')
   // ->can('edit-job', 'job');

Route::delete('/jobs/{job}', [JobController::class, 'destroy']);
    //->middleware('auth')
   // ->can('edit-job', 'job');

// Auth
Route::get('/register', [RegisterUserController::class, 'create']);
Route::post('/register', [RegisterUserController::class, 'store']);

Route::get('/login', [SessionController::class, 'create'])->name('login');
Route::post('/login', [SessionController::class, 'store']);
Route::post('/logout', [SessionController::class, 'destroy']);