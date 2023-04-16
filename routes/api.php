<?php

use App\Http\Controllers\ApiProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiPhotoController;
use App\Http\Controllers\ApiTagController;
use App\Http\Controllers\ApiTeamController;

Route::middleware('auth:sanctum')->group(function () {
    Route::post('photo/{photo}/favorite', [ApiPhotoController::class, 'favorite'])->name('api.favorite');
    Route::post('photo/{photo}/unfavorite', [ApiPhotoController::class, 'unfavorite'])->name('api.unfavorite');
    Route::get('photo/memory', [ApiPhotoController::class, 'memoryindex'])->name('api.memory');
    Route::apiResource('photo', ApiPhotoController::class);

    Route::apiResource('tag', ApiTagController::class);
    Route::get('tag/{tag}', [ApiTagController::class, 'memoedit'])->name('api.memoedit');
    Route::put('tag/{tag}/edit', [ApiTagController::class, 'update'])->name('api.tag.update');
});

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/profile', [ApiProfileController::class, 'edit'])->name('api.profile.edit');
    Route::patch('/profile', [ApiProfileController::class, 'update'])->name('api.profile.update');
    Route::delete('/profile', [ApiProfileController::class, 'destroy'])->name('api.profile.destroy');
});

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/team/create', [ApiTeamController::class, 'create'])->name('api.team.create');
    Route::post('/tag/firstcreate', [ApiTeamController::class, 'register'])->name('api.team.firstcreate');

    Route::get('/team/option', [ApiTeamController::class, 'option'])->name('api.team.option');

    Route::get('/team/join', [ApiTeamController::class, 'join'])->name('api.team.join');
    Route::post('/team/join', [ApiTeamController::class, 'store'])->name('api.team.store');
});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
