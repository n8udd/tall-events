<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LevelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $levels = $this->levels();

        foreach ($levels as $key => $value) {
            DB::table('levels')->insert([
                "name" => $key,
                "color" => $value,
                "description" => $key . " is...",
            ]);
        }
    }

    private function levels(): array
    {
        return [
            'easy' => 'green',
            'intermediate' => 'yellow',
            'hard' => 'red',
            'social' => 'blue',
        ];
    }
}
