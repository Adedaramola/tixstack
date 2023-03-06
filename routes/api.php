<?php

declare(strict_types=1);

use App\Http\Controllers\EventsController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth:sanctum'])->group(function (): void {
    Route::controller(EventsController::class)->group(function (): void {
        Route::post('/events', 'store');
        Route::get('/events/{event}', 'index');
    });
});
