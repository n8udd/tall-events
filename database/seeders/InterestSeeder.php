<?php

namespace Database\Seeders;

use App\Models\Type;
use App\Models\User;
use App\Models\Event;
use App\Models\Interest;
use Illuminate\Database\Seeder;
use Illuminate\Support\Arr;

class InterestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $type_ids = Type::pluck('id')->toArray();
        $user_ids = User::pluck('id')->toArray();

        for ($i = 0; $i < Interest::SEED_COUNT; $i++) {
            $data = [
                'type_id' => Arr::random($type_ids),
                'user_id' => Arr::random($user_ids),
            ];

            Interest::firstOrCreate($data);
        }
    }
}
