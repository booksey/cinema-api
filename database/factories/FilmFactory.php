<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Film>
 */
class FilmFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $ratings = [null, 6, 12, 16, 18];
        $languages = ['hungarian', 'english'];
        return [
            'title' =>  $this->faker->words(5, true),
            'description' => $this->faker->sentence(10, true),
            'rating' => $ratings[array_rand($ratings)],
            'language' => $languages[array_rand($languages)],
            'cover_url' => $this->faker->url(),
            'created_at' => $this->faker->dateTimeBetween('-30 years', 'now'),
            'updated_at' => $this->faker->dateTime('now'),
        ];
    }
}
