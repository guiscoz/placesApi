<?php

use App\Http\Controllers\PlaceController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PlaceController::class, 'list'])->name('list');
Route::get('/show/{slug}', [PlaceController::class, 'show'])->name('show');
Route::post('/search', [PlaceController::class, 'search'])->name('search');
Route::post('/store', [PlaceController::class, 'store'])->name('store');
Route::put('/update/{slug}', [PlaceController::class, 'update'])->name('update');
