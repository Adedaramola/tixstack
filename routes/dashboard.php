<?php

declare(strict_types=1);

use App\Http\Controllers\Events\EventsController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth'])->group(function (): void {
    Route::get('/events', [EventsController::class, 'index'])->name('home');
});
