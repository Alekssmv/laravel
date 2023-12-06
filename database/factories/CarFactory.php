<?php

namespace Database\Factories;
use App\Models\CarClass;
use App\Models\CarBody;
use App\Models\CarEngine;
use App\Models\Image;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Car>
 */
class CarFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {


        return [
            'name' => $this->faker->word() . ' - ' . $this->faker->numberBetween(1,6),
            'body_text' => $this->faker->text(),
            'price' => $price = rand(50000, 100000),

            'old_price' => $this->faker->optional()->numberBetween((int) ($price * 1.3), (int) ($price * 1.5)),
            'salon' => $this->faker->optional()->text(10),
            'kpp' => $this->faker->optional()->randomElement(['Ручная' . ' ' . mt_rand(1,6), 'Механика' . ' ' . mt_rand(1,6)]),
            'year' => $this->faker->optional()->year(),
            'color' => $this->faker->optional()->colorName(),
            'is_new' => $this->faker->boolean(70),

            'class_id' => CarClass::factory(),
            'body_id' => CarBody::factory(),
            'engine_id' => CarEngine::factory(),

            'image_id' => Image::factory(),

        ];
    }
}
