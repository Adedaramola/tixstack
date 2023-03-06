<?php

declare(strict_types=1);

namespace App\RateLimiters;

use App\Http\Requests\LoginUserRequest;
use Illuminate\Cache\RateLimiter;
use Illuminate\Support\Str;

final class LoginRateLimiter
{
    public function __construct(
        private readonly RateLimiter $limiter
    ) {
    }

    public function attempts(LoginUserRequest $request)
    {
        return $this->limiter->attempts($this->throttleKey($request));
    }

    public function tooManyAttempts(LoginUserRequest $request)
    {
        return $this->limiter->tooManyAttempts($this->throttleKey($request), 5);
    }

    public function increment(LoginUserRequest $request): void
    {
        $this->limiter->hit($this->throttleKey($request), 60);
    }

    public function availableIn(LoginUserRequest $request)
    {
        return $this->limiter->availableIn($this->throttleKey($request));
    }

    public function clear(LoginUserRequest $request): void
    {
        $this->limiter->clear($this->throttleKey($request));
    }

    private function throttleKey(LoginUserRequest $request)
    {
        return Str::transliterate(Str::lower($request->email).'|'.$request->ip());
    }
}
