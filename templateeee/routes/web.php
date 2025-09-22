<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\EventController; // <-- Import controller event

// Ganti rute '/' bawaan dengan rute ke EventController
Route::get('/', [EventController::class, 'index'])->name('home');
// Tambahkan rute baru untuk detail event
Route::get('/events/{event}', [EventController::class, 'show'])->name('events.show');


// Rute-rute di bawah ini adalah bawaan dari Laravel Breeze, biarkan saja
Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';