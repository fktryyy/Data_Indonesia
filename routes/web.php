<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RekrutmenController;

Route::get('/', function () {
    return view('home');
});
Route::get('/rekrutmen', [RekrutmenController::class, 'create'])->name('rekrutmen.create');
Route::post('/rekrutmen', [RekrutmenController::class, 'store'])->name('rekrutmen.store');
