<?php

namespace Database\Seeders;

use App\Models\CarBody;
use App\Models\CarClass;
use App\Models\CarEngine;
use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Database\Seeder;
use App\Models\Car;
use App\Models\Image;


class CarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $carClasses = CarClass::get();
        $carBodies = CarBody::get();
        $carEngines = CarEngine::get();

        Car::factory()
            ->count(20)
            ->state(
                new Sequence(
                    fn($sequence) => [
                        'class_id' => $carClasses->random(),
                        'body_id' => $carBodies->random(),
                        'engine_id' => $carEngines->random(),
                    ]
                )
            )->create();

        $categories = Category::get();
        $cars = Car::get();

        foreach ($cars as $car) {
            $car->categories()->attach($categories->random(1, 3));
            $car->images()->attach(Image::factory()->count(rand(0, 3))->create());
        }


        /*
        for ($i = 0; $i < $count; $i++) {
            Car::factory()->create([
                'class_id' => $carClasses->random(),
                'body_id' => $carBodies->random(),
                'engine_id' => $carEngines->random(),
            ]);
        }
        */

    }
}
