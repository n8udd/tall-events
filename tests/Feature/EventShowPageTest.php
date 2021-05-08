<?php

namespace Tests\Feature;


use App\Http\Livewire\EventShow;
use App\Models\Event;
use App\Models\Level;
use App\Models\Type;
use App\Models\User;
use Livewire\Livewire;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
// use PHPUnit\Framework\TestCase;

use Tests\TestCase;


class EventShowPageTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function guest_who_tries_to_respond_is_redirected_to_login_page()
    {
        $level = Level::factory()->create();
        $type = Type::factory()->create();
        $creator = User::factory()->create();

        $event = Event::factory()->create([
            "type_id" => $type->id,
            "level_id" => $level->id,
            "creator_id" => $creator->id,
            "title" => 'test title'
        ]);

        Livewire::test(EventShow::class, [
            'event' => $event,
            'respondeesCount' => 5
        ])
            ->call('vote')
            ->assertRedirect(route('login'));
    }
}
