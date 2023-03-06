<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Actions\CreateEventAction;
use App\Data\CreatedEvent;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreateEventRequest;
use App\Http\Resources\EventResource;
use App\Models\Event;
use Illuminate\Contracts\Auth\Access\Gate;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

final class EventsController extends Controller
{
    public function __construct(
        private readonly Gate $gate,
        private readonly Authenticatable $user
    ) {
    }

    public function store(
        CreateEventRequest $request,
        CreateEventAction $creator
    ): JsonResponse {
        // $this->gate->authorize('store');

        $event = $creator->handle(
            payload: CreatedEvent::from($request),
            user: $this->user->getAuthIdentifier()
        );

        return new JsonResponse(
            data: [
                'status' => true,
                'message' => 'Event created',
                'data' => [
                    'event' => EventResource::make($event)
                ]
            ],
            status: Response::HTTP_CREATED
        );
    }

    public function index(Event $event)
    {
    }
}
