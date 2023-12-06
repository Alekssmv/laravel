<?php

namespace Database\Seeders;

use App\Models\CarBody;
use Illuminate\Database\Seeder;

class CarBodySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $bodies = ['Седан', 'Хэтчбек', 'Универсал', 'Купе'];

        foreach ($bodies as $body) {
            CarBody::create(['name' => $body]);
        }


    }
}
