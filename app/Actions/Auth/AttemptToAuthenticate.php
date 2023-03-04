<?php

declare(strict_types=1);

namespace App\Actions\Auth;

use App\RateLimiters\LoginRateLimiter;
use Illuminate\Contracts\Auth\StatefulGuard;
use Illuminate\Validation\ValidationException;

final class AttemptToAuthenticate
{
    public function __construct(
        private readonly StatefulGuard $guard,
        private readonly LoginRateLimiter $limiter,
    ) {
    }

    public function handle($request, $next)
    {
        if ($this->guard->attempt(
            $request->only('email', 'password'),
            $request->boolean('remember')
        )) {
            return $next($request);
        }

        $this->limiter->increment($request);

        throw ValidationException::withMessages([
            'email' => [trans('auth.failed')],
        ]);
    }
}
