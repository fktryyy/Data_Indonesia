<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RekrutmenController;
use App\Http\Controllers\HomeController;

Route::get('/', [HomeController::class, 'index']);

Route::get('/rekrutmen', [RekrutmenController::class, 'showForm'])->name('rekrutmen');
Route::post('/rekrutmen', [RekrutmenController::class, 'store'])->name('store');
// Route::get('/rekrutmen/{job_id}', [RekrutmenController::class, 'show'])->name('rekrutmen.show');
// Route::post('/rekrutmen/{job_id}', [RekrutmenController::class, 'store'])->name('rekrutmen.store');

