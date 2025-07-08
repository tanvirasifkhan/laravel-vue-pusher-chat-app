<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReadChatMessageController;
use App\Http\Controllers\StoreChatMessageController;


Route::get('messages/{sender_id}/{receiver_id}', ReadChatMessageController::class)
    ->middleware('auth:sanctum');
Route::post('messages', StoreChatMessageController::class)
    ->middleware('auth:sanctum');