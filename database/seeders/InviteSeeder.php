<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Event;
use App\Models\Invite;
use Illuminate\Database\Seeder;

class InviteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $event_id = Event::pluck('id');
        $user_id  = User::pluck('id');

        $event_users = $event_id->crossJoin($user_id)->shuffle()->take(50)->toArray();

        foreach ($event_users as $event_user) {

            $data = [
                'event_id' => $event_user[0],
                'to_user_id' => $event_user[1],
            ];

            switch (rand(1, 3)) {
                case 1:
                    $response = ['accepted_on' => now()];
                    break;
                case 2:
                    $response = ['declined_on' => now()];
                    break;
                default:
                    $response = [
                        'accepted_on' => null,
                        'declined_on' => null,
                    ];
            }

            Invite::create(array_merge($data, $response));
        }
    }
}
