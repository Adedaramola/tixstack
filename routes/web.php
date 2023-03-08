<?php

declare(strict_types=1);

use Illuminate\Support\Facades\Route;

Route::get('/', fn () => view('index'));

require __DIR__.'/auth.php';

Route::prefix('/app')->group(function (): void {
    require __DIR__.'/dashboard.php';
});
