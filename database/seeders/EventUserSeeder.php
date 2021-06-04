<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Event;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EventUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $event_ids = Event::pluck('id');
        $user_ids  = User::pluck('id');

        $event_users = $user_ids->crossJoin($event_ids)->shuffle()->take(50);




        foreach ($event_users as $event_user) {
            $data = [
                'event_id' => $event_user[0],
                'user_id' => $event_user[1],
            ];

            DB::table('event_user')->insertOrIgnore($data);
        }
    }
}
