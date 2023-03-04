<?php

declare(strict_types=1);

namespace App\Contracts;

use App\Data\CreatedEvent;
use App\Models\Event;

interface CreateEventContract
{
    public function handle(CreatedEvent $payload, string $user): Event;
}
