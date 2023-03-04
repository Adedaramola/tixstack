<?php

declare(strict_types=1);

namespace App\Actions\Auth;

use App\RateLimiters\LoginRateLimiter;

final class PrepareAuthenticatedSession
{
    public function __construct(
        private readonly LoginRateLimiter $limiter
    ) {
    }

    public function handle($request, $next)
    {
        if ($request->hasSession()) {
            $request->session()->regenerateToken();
        }

        $this->limiter->clear($request);

        return $next($request);
    }
}
