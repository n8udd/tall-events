<?php

namespace Database\Factories;

use Carbon\Carbon;
use App\Models\Event;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class EventFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Event::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            "uuid" => (string) Str::uuid(),
            "title" => $title = $this->faker->sentence(3),
            "description" => $title = $this->faker->sentence,
            "type_id" => rand(1, 4),
            "level_id" => rand(1, 4),
            "intro" => $this->faker->sentence(),
            "start_dt" => $date = Carbon::now()->addDays(rand(1, 14))->addHours(rand(1, 6))->addMinutes(rand(1, 59)),
            "end_dt" => NULL,
            "creator_id" => 1,
            "location" => $this->faker->streetName() . ", Exmouth",
            "slug" => Str::of($title)->slug('-'),
        ];
    }
}
