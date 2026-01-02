<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GJEventController;
use App\Http\Controllers\RegistrantController;
use App\Http\Controllers\SubmissionController;

Route::view('/', 'welcome');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

Route::resource('gj_event', App\Http\Controllers\GJEventController::class)
    ->middleware(['auth']);

Route::resource('registrant', App\Http\Controllers\RegistrantController::class)
    ->middleware(['auth']);

Route::resource('submission', App\Http\Controllers\SubmissionController::class)
    ->middleware(['auth']);

require __DIR__.'/auth.php';
