<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NoteController;

// Halaman Utama (Index)
Route::get('/', [NoteController::class, 'index'])->name('home');

// Folder Routes
Route::post('/folders', [NoteController::class, 'storeFolder'])->name('folders.store');
Route::get('/folders/{folder}', [NoteController::class, 'show'])->name('folders.show');
Route::put('/folders/{folder}', [NoteController::class, 'updateFolder'])->name('folders.update');
Route::delete('/folders/{folder}', [NoteController::class, 'destroyFolder'])->name('folders.destroy');

// Note Routes
Route::post('/notes', [NoteController::class, 'storeNote'])->name('notes.store');
Route::put('/notes/{note}', [NoteController::class, 'update'])->name('notes.update');
Route::delete('/notes/{note}', [NoteController::class, 'destroy'])->name('notes.destroy');