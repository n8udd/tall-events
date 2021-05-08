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
        $event_id = collect(range(1, 25));
        $user_id = collect(range(1, 10));

        $event_user = $user_id->crossJoin($event_id);

        foreach ($event_user as $combo) {
            $add = rand(0, 1);
            if ($add) {
                $user = User::find($combo[0]);
                $event = Event::find($combo[1]);

                $event->respondees()->save($user, ['attended' => rand(0, 1)]);
            }
        }
    }
}
