<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\FolderController;
use App\Http\Controllers\Api\NoteController;

Route::name('api.')->group(function () {
    Route::apiResource('folders', FolderController::class);
    Route::apiResource('notes', NoteController::class);
});

Route::get('/user', function (Request $request) {
    return $request->user();
});//->middleware('auth:sanctum');
