<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RekrutmenController;

Route::get('/', function () {
    return view('home');
});
Route::get('/rekrutmen', [RekrutmenController::class, 'showForm'])->name('rekrutmen');
Route::post('/rekrutmen', [RekrutmenController::class, 'Store'])->name('Store');


