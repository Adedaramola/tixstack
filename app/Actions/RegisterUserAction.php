<?php

declare(strict_types=1);

namespace App\Actions;

use App\Contracts\RegisterUserContract;
use App\Data\RegisteredUser;
use App\Models\User;
use Illuminate\Support\Facades\DB;

final class RegisterUserAction implements RegisterUserContract
{
    public function handle(RegisteredUser $payload): User
    {
        return DB::transaction(
            callback: fn (): User => User::query()->create(
                attributes: [
                    ...$payload->toArray()
                ]
            )
        );
    }
}
