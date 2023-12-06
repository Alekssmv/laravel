<?php

namespace Database\Factories;

use Storage;
use App\Models\Image;
use Illuminate\Database\Eloquent\Factories\Factory;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\image>
 */
class ImageFactory extends Factory
{

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        
        $path = Storage::disk(Image::STORAGE_DISK)
            ->putFile(Image::PATH_PREFIX, $this->faker->image(category: 'car'));

        return [
            'path' => $path,

        ];
    }
}
