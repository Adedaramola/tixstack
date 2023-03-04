<?php

namespace App\Http\Controllers\API;

use App\Actions\API\CreateEventAction;
use App\Data\CreatedEvent;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreateEventRequest;
use Illuminate\Auth\Access\Gate;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Http\Response;

class EventsController extends Controller
{
    public function __construct(
        private readonly Gate $gate,
        private readonly Authenticatable $user

    ) {
    }

    public function store(
        CreateEventRequest $request,
        CreateEventAction $creator
    ): Response {
        $this->gate->authorize('store');

        $event = $creator->handle(
            payload: CreatedEvent::from($request),
            user: $this->user->getAuthIdentifier()
        );

        return response()->noContent();
    }
}
