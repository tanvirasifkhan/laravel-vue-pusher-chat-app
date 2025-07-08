<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReadChatMessageController;
use App\Http\Controllers\StoreChatMessageController;
use App\Http\Controllers\ReadAllUserController;

Route::get('users', ReadAllUserController::class)
    ->middleware('auth:sanctum');
Route::get('messages/{receiver_id}', ReadChatMessageController::class)
    ->middleware('auth:sanctum');
Route::post('messages', StoreChatMessageController::class)
    ->middleware('auth:sanctum');