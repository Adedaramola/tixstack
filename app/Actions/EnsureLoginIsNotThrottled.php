<?php

declare(strict_types=1);

namespace App\Actions;

use App\RateLimiters\LoginRateLimiter;
use Illuminate\Auth\Events\Lockout;
use Illuminate\Http\Response;
use Illuminate\Validation\ValidationException;

final class EnsureLoginIsNotThrottled
{
    public function __construct(
        private readonly LoginRateLimiter $limiter
    ) {
    }

    public function handle($request, $next)
    {
        if ( ! $this->limiter->tooManyAttempts($request)) {
            return $next($request);
        }

        event(new Lockout($request));

        return with($this->limiter->availableIn($request), function ($seconds): void {
            throw ValidationException::withMessages([
                'email' => [
                    trans('auth.throttle', [
                        'seconds' => $seconds,
                        'minutes' => ceil($seconds / 60),
                    ]),
                ],
            ])->status(Response::HTTP_TOO_MANY_REQUESTS);
        });
    }
}
