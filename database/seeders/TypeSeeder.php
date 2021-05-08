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
            DB::table('types')->insert([
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
            'swim'
        ];
    }
}
