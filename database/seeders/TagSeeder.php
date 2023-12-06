<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Tag;
use App\Models\Article;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tags = Tag::factory()->count(10)->create();

        $articles = Article::get();

        foreach ($articles as $article) {
            $article->tags()->saveMany($tags->random(rand(1, 3)));
        }
    }
}
