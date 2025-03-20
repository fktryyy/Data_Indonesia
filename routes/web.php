<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RekrutmenController;
use App\Http\Controllers\HomeController;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/rekrutmen', [RekrutmenController::class, 'showForm'])->name('rekrutmen');
Route::post('/rekrutmen/store', [RekrutmenController::class, 'store'])->name('store');
