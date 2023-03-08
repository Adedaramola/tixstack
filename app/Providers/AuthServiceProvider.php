<?php

declare(strict_types=1);

namespace App\Providers;

use App\Models\Event;
use App\Policies\EventPolicy;
use Illuminate\Auth\Notifications\ResetPassword;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Validation\Rules\Password;

final class AuthServiceProvider extends ServiceProvider
{
    protected $policies = [
        Event::class => EventPolicy::class,
    ];

    public function boot(): void
    {
        $this->registerPolicies();

        ResetPassword::createUrlUsing(
            fn (object $notifiable, string $token) => config('app.frontend_url')."/password-reset/{$token}?email={$notifiable->getEmailForPasswordReset()}"
        );

        Password::defaults(function (): Password {
            $rule = Password::min(8);

            return $this->app->environment('production')
                ? $rule->mixedCase()->numbers()->uncompromised()
                : $rule;
        });
    }
}
