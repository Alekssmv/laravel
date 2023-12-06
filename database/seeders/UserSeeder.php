<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $users = User::factory()->count(10)->create();
        $roles = Role::where('name', '!=', 'admin')->get();

        foreach ($users as $user) {
            $user->roles()->attach($roles->random(mt_rand(1, 2)));
        }

    }
}
