<?php

namespace App\Contracts\Services;

use Illuminate\Http\UploadedFile;
use App\Models\Car;
use Illuminate\Pagination\LengthAwarePaginator;
interface CarsServiceContract
{
    public function paginateCatalogCars(
        array $data,
        ?int $count = 16,
        array $relations,
    ): LengthAwarePaginator;

    public function create(array $data, UploadedFile|array|null $file): void;

    public function update(array $data, UploadedFile|array|null $file, Car $car): void;

    public function getById(int $id, array $relations): Car;

    public function delete(Car $car): void;

    public function paginateAll(int $perPage = 5): LengthAwarePaginator;
}
