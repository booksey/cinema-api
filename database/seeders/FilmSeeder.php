<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FilmSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = \Faker\Factory::create();
        DB::table('films')->insert(
            [
                'title' =>  $faker->words(3, true),
                'description' => $faker->sentence(10, true),
                'rating' => 'PG-18',
                'language' => 'hungarian',
                'cover_url' => $faker->url(),
            ],
            [
                'title' =>  $faker->words(1, true),
                'description' => $faker->sentence(10, true),
                'rating' => 'PEGI-12',
                'language' => 'english',
                'cover_url' => $faker->url(),
            ],
            [
                'title' =>  $faker->words(5, true),
                'description' => $faker->sentence(10, true),
                'rating' => '18',
                'language' => 'hungarian',
                'cover_url' => $faker->url(),
            ]
        );
    }
}
