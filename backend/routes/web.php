<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return response()->json([
        'status' => 200,
        'message' => 'Laravel Vue Pusher Chat App API server',
        'language' => 'PHP ' . phpversion(),
        'framework' => 'Laravel ' . app()->version()
    ]);
});
