<?php

namespace App\View\Components\Panels;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use App\Models\Category;
use App\Repositories\Contracts\CategoriesRepositoryContract;
use Route;

class CategoryMenu extends Component
{
    private readonly CategoriesRepositoryContract $categoriesRepository;
    /**
     * Create a new component instance.
     */
    private ?Category $currentCategory;

    public function __construct(
        CategoriesRepositoryContract $categoriesRepositoryContract,
    ) {
        $this->categoriesRepository = $categoriesRepositoryContract;
        $this->currentCategory = Route::current()->category?->load('ancestors');
    }


    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        $categories = $this->categoriesRepository->getRootCategories()->sortBy('sort');

        foreach ($categories as $category) {
            $category->children = $category->children->sortBy('sort');
        }

        $categories = $categories->toTree();

        return view('components.panels.header.category-menu', compact('categories'));
    }

    public function selectedCategory(?Category $category = null): bool
    {
        if (!Route::is('catalog')) {
            return false;
        }
        if ($category == null || $this->currentCategory == null) {
            return $this->currentCategory == $category;
        }

        return $this->currentCategory->id === $category->id || $this->currentCategory->ancestors()->where('id', $category->id)->exists();


    }
}
