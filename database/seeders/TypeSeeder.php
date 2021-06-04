<?php

namespace Database\Seeders;

use App\Models\Type;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $types = $this->types();

        foreach ($types as $name) {
            Type::firstOrCreate([
                "name" => $name,
            ]);
        }
    }

    private function types(): array
    {
        return [
            'run',
            'ride',
            'jeff',
            'walk',
            'swim',
            'social',
        ];
    }
}
