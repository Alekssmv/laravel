<?php

namespace App\Repositories\Contracts;

use App\Models\Car;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

interface CarsRepositoryContract extends FlushCacheRepositoryContract
{
    public function get(?int $count = null): Collection;

    public function paginateAll(int $count = 5): LengthAwarePaginator;

    public function getById(int $id = null, array $relations = []): Car;

    public function getNew(?int $count = null, array $relations): Collection;

    public function create(array $data): Car;

    public function update(array $data, Car $car): Car;

    public function delete(int $id): void;

    public function getCar(): Car;

    public function count(): int;

}
