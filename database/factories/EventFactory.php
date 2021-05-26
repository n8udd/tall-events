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
        $dt = Carbon::now();
        $key = array_rand($gender = ["gents", "ladies", "mixed"]);
        return [
            "uuid" => (string) Str::uuid(),
            "title" => $title = $this->faker->sentence(3),
            "description" => $title = $this->faker->sentence,
            "type_id" => rand(1, 6),
            "level_id" => rand(1, 3),
            "intro" => $this->faker->sentence(),
            "start_date" => $dt->addDays(rand(1, 28))->format('Y-m-d'),
            "start_time" => $dt->format('H:i'),
            "end_date" => NULL,
            "end_time" => NULL,
            "creator_id" => rand(1, 10),
            "leader_led" => rand(0, 1),
            "gender" => $gender[$key],
            "location" => $this->faker->streetName() . ", Exmouth",
            "slug" => Str::of($title)->slug('-'),
        ];
    }
}
