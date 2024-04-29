<?php

use App\Http\Controllers\ChatroomController;
use Illuminate\Support\Facades\Route;

Route::controller(ChatroomController::class)->group(function () {
    Route::get('/chatrooms', 'index');
    Route::post('/chatrooms', 'store');
});
