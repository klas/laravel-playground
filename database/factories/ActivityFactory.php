<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Activity>
 */
class ActivityFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $start = $this->faker->dateTimeThisMonth();

        return [
            'name' => $this->faker->sentence(3),
            'description' => $this->faker->sentence(6),
            'activity_type_id' => $this->faker->numberBetween(1, 4),
            'distance' =>  (float)$this->faker->numberBetween(1, 77),
            'distance_unit_id' => $this->faker->numberBetween(1, 2),
            'start' => $start,
            'finish' => $this->faker->dateTimeInInterval($start, '+5 hours'),
            'status' => $this->faker->numberBetween(1, 3),
            'user_id' => 1
        ];
    }
}
