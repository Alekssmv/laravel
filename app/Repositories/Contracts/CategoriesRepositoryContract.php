<?php

namespace App\Repositories\Contracts;

use App\Models\Category;
use Illuminate\Support\Collection;

interface CategoriesRepositoryContract
{
    public function getRootCategories(): Collection;

    public function get(): Collection;

    public function getCategory(): Category;
}
