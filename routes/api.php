<?php

use App\Http\Controllers\Api\Guest\GuestController;
use Illuminate\Support\Facades\Route;

Route::prefix('guests', ['as' => 'guests'])->group(function () {
    Route::get('/', [GuestController::class, 'index']);
    Route::get('/{guest}', [GuestController::class, 'show']);
    Route::post('/', [GuestController::class, 'store']);
    Route::delete('/{guest}', [GuestController::class, 'destroy']);
    Route::put('/{guest}', [GuestController::class, 'update']);
}
);
