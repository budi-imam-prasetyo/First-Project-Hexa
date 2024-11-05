<?php

use App\Http\Controllers\Api\MembersController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/register', App\Http\Controllers\Api\RegisterController::class)->name('register');

Route::post('/login', App\Http\Controllers\Api\LoginController::class)->name('login');


Route::middleware('auth:api')->group(function () {
    Route::post('/logout', App\Http\Controllers\Api\LogoutController::class)->name('logout');
    Route::apiResource('members', MembersController::class);


    Route::get('/user', function (Request $request) {
        return $request->user();
    });
});
