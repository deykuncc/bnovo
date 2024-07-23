<?php

use Illuminate\Support\Facades\Route;

Route::get('/counter', [\App\Http\Controllers\CounterController::class, 'index']);
