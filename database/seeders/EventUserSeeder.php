<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Event;
use Illuminate\Database\Seeder;

class EventUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $event_id = collect(range(1, 50));
        $user_id = collect(range(1, 11));

        $event_user = $user_id->crossJoin($event_id);

        foreach ($event_user as $combo) {
            $add = rand(0, 1);
            if ($add) {
                $user = User::find($combo[0]);
                $event = Event::find($combo[1]);

                $event->respondees()->attach($user, ['attended' => rand(0, 1)]);
            }
        }
    }
}
