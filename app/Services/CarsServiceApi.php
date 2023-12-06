<?php

namespace App\Services;

use App\Repositories\Contracts\CarsRepositoryContract;
use Illuminate\Support\Collection;

use App\Contracts\Services\CarsServiceContract;
use App\Contracts\Services\CarsServiceApiContract;


use App\Models\Car;

class CarsServiceApi implements CarsServiceApiContract
{
    public function __construct(
        private readonly CarsRepositoryContract $carsRepository,
        private readonly CarsServiceContract $carsService,
    ) {
    }
    public function get(): Collection
    {
        return $this->carsRepository->get();
    }

    public function create(array $data): Car
    {
        return $this->carsRepository->create($data);
    }

    public function update(array $data, Car $car): void
    {
        $this->carsRepository->update($data, $car);
    }

    public function delete(Car $car): void
    {
        $this->carsRepository->delete($car->id);
    }

    public function getById(int $id): Car
    {
        return $this->carsRepository->getById($id);
    }
}
