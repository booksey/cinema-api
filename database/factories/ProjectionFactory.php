<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Projection>
 */
class ProjectionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'projection_time' =>  $this->faker->dateTimeBetween('now', '+20 years'),
            'capacity' => rand(1, 50),
            'film_id' => rand(1, 10),
            'created_at' => $this->faker->dateTimeBetween('-50 years', 'now'),
            'updated_at' => $this->faker->dateTime('now'),
        ];
    }
}
