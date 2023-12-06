<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Image;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Article>
 */
class ArticleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $faker = $this->faker;

        return [
            'slug' => $faker->unique()->slug(),
            'title' => $faker->text($faker->numberBetween(5, 100)),
            'description' => $faker->text(255),
            'body' => $faker->text(1000),
            'published_at' => $faker->dateTimeThisMonth(),

            'image_id' => Image::factory(),
        ];
    }
}
