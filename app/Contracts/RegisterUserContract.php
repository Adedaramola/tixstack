<?php

declare(strict_types=1);

namespace App\Contracts;

use App\Data\RegisteredUser;
use App\Models\User;

interface RegisterUserContract
{
    public function handle(RegisteredUser $payload): User;
}
