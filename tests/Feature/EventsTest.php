<?php

declare(strict_types=1);

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

final class EventsTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;

    public function test_user_can_create_new_event(): void
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->post('/events', [
            'slug' => 'test-event',
            'name' => $this->faker->sentence(),
            'description' => $this->faker->text(),
            'location' => $this->faker->streetAddress(),
            'start_date' => $this->faker->date(),
            'end_date' => $this->faker->date(),
            'start_time' => $this->faker->time('H:i'),
            'end_time' => $this->faker->time('H:i'),
        ]);

        $response->assertStatus(201);
    }
}
