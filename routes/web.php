<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RekrutmenController;
use App\Http\Controllers\PersonalController;
use App\Http\Controllers\PendidikanController;


Route::get('/', function () {
    return view('home');
});
Route::get('/rekrutmen', [RekrutmenController::class, 'create'])->name('rekrutmen.create');
Route::post('/rekrutmen', [RekrutmenController::class, 'store'])->name('rekrutmen.store');

// Rute untuk menyimpan data personal
Route::post('/personal/store', [PersonalController::class, 'store'])->name('personal.store');

// Rute untuk menyimpan data pendidikan dan pengalaman
Route::post('/pendidikan/store', [PendidikanController::class, 'store'])->name('pendidikan.store');
