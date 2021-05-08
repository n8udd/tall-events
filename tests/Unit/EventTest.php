<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Type;
use App\Models\User;
use App\Models\Event;
use App\Models\Level;
use Illuminate\Foundation\Testing\RefreshDatabase;

class EventTest extends TestCase
{
    use RefreshDatabase;


    public function test_to_check_if_a_user_is_attending_an_event()
    {
        $user1 = User::factory()->create();
        $user2 = User::factory()->create();
        $creator = User::factory()->create();

        $level = Level::factory()->create();
        $type = Type::factory()->create();

        $event = Event::factory()->create([
            "type_id" => $type->id,
            "level_id" => $level->id,
            "creator_id" => $creator->id,
        ]);

        $event->attendees()->save($user1);

        $this->assertTrue($event->isBeingAttended($user1));
        $this->assertFalse($event->isBeingAttended($user2));
        $this->assertFalse($event->isBeingAttended(NULL));
    }
}
