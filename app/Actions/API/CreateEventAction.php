<?php

declare(strict_types=1);

namespace App\Actions\API;

use App\Contracts\CreateEventContract;
use App\Data\CreatedEvent;
use App\Models\Event;
use Illuminate\Support\Facades\DB;

final class CreateEventAction implements CreateEventContract
{
    public function handle(CreatedEvent $payload, string $user): Event
    {
        return DB::transaction(
            fn (): Event => Event::query()->create(
                attributes: [
                    ...$payload->toArray(),
                    $user
                ]
            )
        );
    }
}
