<?php

namespace Database\Seeders;

use App\Models\CarClass;
use Illuminate\Database\Seeder;

class CarClassSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $classes = ['Бизнес', 'Премиум', 'Компакт', 'Спорт'];

        foreach ($classes as $class) {
            CarClass::create(['name' => $class]);
        }
    }
}
