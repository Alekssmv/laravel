<?php

namespace App\Http\Controllers\Admin;

use App\Contracts\Services\CarsServiceContract;
use App\Http\Controllers\Controller;
use App\Http\Requests\CarRequest;
use App\Models\Car;
use App\Repositories\Contracts\CarBodiesRepositoryContract;
use App\Repositories\Contracts\CarClassesRepositoryContract;
use App\Repositories\Contracts\CarEnginesRepositoryContract;
use App\Repositories\Contracts\CarsRepositoryContract;
use App\Repositories\Contracts\ImagesRepositoryContract;


class CarsController extends Controller
{
    public function __construct(
        private readonly CarsRepositoryContract $carsRepository,
        private readonly CarClassesRepositoryContract $carClassesRepository,
        private readonly CarBodiesRepositoryContract $carBodiesRepository,
        private readonly CarEnginesRepositoryContract $carEnginesRepository,
        private readonly ImagesRepositoryContract $imagesRepository,
        private readonly CarsServiceContract $carsService

    ) {
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $this->authorize('viewAny', Car::class);

        $cars = $this->carsService->paginateAll();

        return view('pages.admin.cars.cars', ['cars' => $cars]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->authorize('create', Car::class);

        $car = new Car();

        $test = $this->imagesRepository->getImage();

        $carClasses = $this->carClassesRepository->get();
        $carBodies = $this->carBodiesRepository->get();
        $carEngines = $this->carEnginesRepository->get();

        return view('pages.admin.cars.create', compact('car', 'carClasses', 'carBodies', 'carEngines'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CarRequest $request)
    {
        $this->authorize('create', Car::class);

        $this->carsService->create(request()->only(['name', 'body_text', 'price', 'old_price', 'salon', 'kpp', 'year', 'color', 'is_new', 'engine_id', 'class_id', 'body_id', 'image_id']),
        request()->file('image'));

        return redirect()
            ->route('admin.cars')
            ->with('success', 'Новый автомобиль успешно добавлен!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Car $car)
    {
        $this->authorize('update', $car);

        $carClasses = $this->carClassesRepository->get();
        $carBodies = $this->carBodiesRepository->get();
        $carEngines = $this->carEnginesRepository->get();

        return view('pages.admin.cars.edit', compact('car', 'carClasses', 'carBodies', 'carEngines'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CarRequest $request, Car $car)
    {
        $this->authorize('update', $car);

        $this->carsService->update($request->only(['name', 'body_text', 'price', 'old_price', 'salon', 'kpp', 'year', 'color', 'is_new', 'engine_id', 'class_id', 'body_id', 'image_id']), $request->file('image'), $car);

        return redirect()
            ->route('admin.cars')
            ->with('success', 'Автомобиль успешно обновлен!');
    }

    public function delete(Car $car)
    {
        $this->authorize('delete', $car);

        $car = $this->carsService->getById($car->id, ['image', 'engine', 'class', 'body']);

        return view('pages.admin.cars.delete', compact('car'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Car $car)
    {
        $this->authorize('delete', $car);

        $this->carsService->delete($car->id);
        return redirect()
            ->route('admin.cars')
            ->with('success', 'Автомобиль успешно удален!');
    }
}
