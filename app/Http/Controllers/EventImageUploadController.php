<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use Illuminate\Contracts\Auth\Access\Gate;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Http\Request;

final class EventImageUploadController extends Controller
{
    public function __construct(
        private readonly Gate $gate,
        private readonly Authenticatable $user
    ) {
    }

    public function __invoke(Request $request): void
    {
    }
}
