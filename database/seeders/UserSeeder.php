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
        User::factory([
            'name' => 'Nathan Budd',
            'email' => 'buddn07@gmail.com',
            'password' => Hash::make('password'),
        ])->create();

        User::factory()->count(9)->create();
    }
}
