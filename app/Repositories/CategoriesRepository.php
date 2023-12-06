<?php

namespace App\Repositories;

use App\Models\Category;
use App\Repositories\Contracts\CategoriesRepositoryContract;

class CategoriesRepository implements CategoriesRepositoryContract
{
    private readonly Category $category;

    public function __construct(Category $category)
    {
        $this->category = $category;
    }
    public function getRootCategories(): \Illuminate\Support\Collection
    {
        return Category::whereNull('parent_id')->get();
    }

    public function get(): \Illuminate\Support\Collection
    {
        return Category::get();
    }
    public function getCategory(): Category
    {
        return $this->category;
    }
}
