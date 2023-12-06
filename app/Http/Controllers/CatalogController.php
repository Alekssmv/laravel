<?php

namespace App\Http\Controllers;

use App\Contracts\Services\CarsServiceContract;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use App\Repositories\Contracts\CarsRepositoryContract;
use App\Models\Car;
use Illuminate\Http\Request;
use App\Repositories\Contracts\CategoriesRepositoryContract;

use App\Models\Category;

class CatalogController extends Controller
{


    public function __construct(
        private readonly CarsRepositoryContract $carsRepository,
        private readonly CategoriesRepositoryContract $categoriesRepository,
        private readonly CarsServiceContract $carsService
    ) {
    }
    public function catalog(Request $request, ?Category $category): Factory|View|Application
    {
        $page = $request->get('page', 1);
        $data = $request->only(['model', 'min_price', 'max_price', 'order_price', 'order_model']);
        $data = array_merge($data, ['category' => $category], ['page' => $page]);

        $cars = $this->carsService->paginateCatalogCars(
            $data,
            16,
            ['image'],
        );

        $categories = $this->categoriesRepository->getRootCategories();

        return view('pages.catalog', compact('cars'));
    }
    public function show(Car $car): Factory|View|Application
    {
        $car = $this->carsRepository->getById($car->id, ['images', 'image', 'engine', 'body', 'class']);

        return view('pages.product', compact('car'));
    }
}
