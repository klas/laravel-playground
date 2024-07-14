<?php

namespace Database\Factories;

use App\Models\DistanceUnit;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<DistanceUnit>
 */
class DistanceUnitFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->sentence(3),
        ];
    }
}
