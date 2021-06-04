<?php

namespace Database\Seeders;

use App\Models\Level;
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
            Level::firstOrCreate([
                "name" => $key,
                "color" => $value,
                "description" => $key . " is...",
            ]);
        }
    }

    private function levels(): array
    {
        return [
            'beginner' => 'green',
            'intermediate' => 'yellow',
            'advanced' => 'red',
        ];
    }
}
