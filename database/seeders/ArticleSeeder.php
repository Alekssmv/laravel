<?php

namespace Database\Seeders;

use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Database\Seeder;
use App\Models\Article;
class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        Article::factory()
            ->count(10)
            ->state(new Sequence(
                [],
                ['published_at' => null],
            ))
            ->create();

    }
}
