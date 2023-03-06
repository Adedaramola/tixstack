<?php

declare(strict_types=1);

namespace App\Http\Controllers\Auth;

use App\Actions\RegisterUserAction;
use App\Data\RegisteredUser;
use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterUserRequest;
use Illuminate\Auth\Events\Registered;
use Illuminate\Contracts\Auth\StatefulGuard;
use Illuminate\Http\Response;

final class RegisteredUserController extends Controller
{
    public function __construct(
        private readonly StatefulGuard $authenticator,
        private readonly RegisterUserAction $registrar
    ) {
    }

    public function __invoke(RegisterUserRequest $request): Response
    {
        $user = $this->registrar->handle(
            payload: RegisteredUser::from($request)
        );

        event(new Registered($user));

        $this->authenticator->login($user);

        return response()->noContent();
    }
}
