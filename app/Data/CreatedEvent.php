<?php

declare(strict_types=1);

namespace App\Data;

use App\Contracts\DataObjectContract;
use Illuminate\Http\Request;

final class CreatedEvent implements DataObjectContract
{
    public function __construct(
        public readonly ?string $slug,
        public readonly string $name,
        public readonly string $description,
        public readonly string $location,
        public readonly string $start_date,
        public readonly string $end_date,
        public readonly string $start_time,
        public readonly string $end_time,
    ) {
    }

    public static function from(Request $request): self
    {
        return new self(
            $request->slug,
            $request->name,
            $request->description,
            $request->location,
            $request->start_date,
            $request->end_date,
            $request->start_time,
            $request->end_time,
        );
    }

    public function toArray(): array
    {
        return [
            'slug' => $this->slug,
            'name' => $this->name,
            'description' => $this->description,
            'location' => $this->location,
            'start_date' => $this->start_date,
            'end_date' => $this->end_date,
            'start_time' => $this->start_time,
            'end_time' => $this->end_time,
        ];
    }
}
