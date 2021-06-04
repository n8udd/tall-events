<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::firstOrCreate([
            'name' => 'Nathan Budd',
            'email' => 'buddn07@gmail.com',
        ], [
            'password' => Hash::make('password'),
        ]);

        User::firstOrCreate([
            'name' => 'Test User',
            'email' => 'test@test.com',
        ], [
            'password' => Hash::make('password'),
        ]);

        User::factory()->count(User::SEED_COUNT - 2)->create();
    }
}
