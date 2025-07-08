<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthSignInController;
use App\Http\Controllers\AuthSignUpController;
use App\Http\Controllers\AuthSignOutController;

Route::post('signin', AuthSignInController::class);
Route::post('signup', AuthSignUpController::class);
Route::post('signout', AuthSignOutController::class)->middleware('auth:sanctum');