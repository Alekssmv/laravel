<?php

namespace Database\Seeders;

use App\Models\CarEngine;
use Illuminate\Database\Seeder;

class CarEngineSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $engines = ['Бензиновый', 'Дизельный', 'Газовый', 'Электрический'];

        foreach ($engines as $engine) {
            CarEngine::create(['name' => $engine . ' ' . mt_rand(3, 6)]);
        }
    }
}
