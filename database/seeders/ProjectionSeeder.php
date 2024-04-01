<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProjectionSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = \Faker\Factory::create();
        DB::table('projections')->insert(
            [
                'projection_time' =>  $faker->dateTimeBetween('now', '+20 years'),
                'capacity' => $faker->numberBetween(1, 50),
                'film_id' => 1,
            ],
            [
                'projection_time' =>  $faker->dateTimeBetween('now', '+20 years'),
                'capacity' => $faker->numberBetween(1, 50),
                'film_id' => 2,
            ],
            [
                'projection_time' =>  $faker->dateTimeBetween('now', '+20 years'),
                'capacity' => $faker->numberBetween(1, 50),
                'film_id' => 3,
            ],
        );
    }
}
