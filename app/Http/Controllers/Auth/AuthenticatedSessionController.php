<?php

declare(strict_types=1);

namespace App\Http\Controllers\Auth;

use App\Actions\Auth\AttemptToAuthenticate;
use App\Actions\Auth\EnsureLoginIsNotThrottled;
use App\Actions\Auth\PrepareAuthenticatedSession;
use App\Http\Controllers\Controller;
use App\Http\Requests\LoginUserRequest;
use Illuminate\Contracts\Auth\StatefulGuard;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Pipeline\Pipeline;
use Illuminate\Routing\Pipeline as RoutingPipeline;

final class AuthenticatedSessionController extends Controller
{
    public function __construct(
        private readonly StatefulGuard $authenticator
    ) {
    }

    public function store(LoginUserRequest $request): Response
    {
        return $this->loginPipeline($request)->then(
            fn ($request) => response()->noContent()
        );
    }

    private function loginPipeline(LoginUserRequest $request): Pipeline
    {
        return (new RoutingPipeline(app()))->send($request)->through(
            pipes: array_filter([
                EnsureLoginIsNotThrottled::class,
                AttemptToAuthenticate::class,
                PrepareAuthenticatedSession::class,
            ]),
        );
    }

    public function destroy(Request $request): Response
    {
        $this->authenticator->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return response()->noContent();
    }
}
