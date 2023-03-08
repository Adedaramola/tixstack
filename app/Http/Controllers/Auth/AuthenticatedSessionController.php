<?php

declare(strict_types=1);

namespace App\Http\Controllers\Auth;

use App\Actions\AttemptToAuthenticate;
use App\Actions\EnsureLoginIsNotThrottled;
use App\Actions\PrepareAuthenticatedSession;
use App\Http\Controllers\Controller;
use App\Http\Requests\LoginUserRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Contracts\Auth\StatefulGuard;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Pipeline\Pipeline;
use Illuminate\Routing\Pipeline as RoutingPipeline;

final class AuthenticatedSessionController extends Controller
{
    public function __construct(
        private readonly StatefulGuard $authenticator
    ) {
    }

    public function index(Request $request): View
    {
        return view('auth.login');
    }

    public function store(LoginUserRequest $request): RedirectResponse
    {
        return $this->loginPipeline($request)->then(
            fn ($request) => redirect()->intended(RouteServiceProvider::HOME)
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

    public function destroy(Request $request): RedirectResponse
    {
        $this->authenticator->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
