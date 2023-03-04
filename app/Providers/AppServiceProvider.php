<?php

declare(strict_types=1);

namespace App\Providers;

use App\Actions\RegisterUserAction;
use App\Contracts\RegisterUserContract;
use Illuminate\Contracts\Auth\StatefulGuard;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\ServiceProvider;

final class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(StatefulGuard::class, fn () => Auth::guard('web'));

        $this->app->bind(
            abstract: RegisterUserContract::class,
            concrete: RegisterUserAction::class
        );
    }

    public function boot(): void
    {
    }
}
