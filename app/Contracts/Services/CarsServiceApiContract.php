<?php

namespace App\Contracts\Services;

use App\Models\Car;
use Illuminate\Support\Collection;

interface CarsServiceApiContract
{
    public function get(): Collection;

    public function create(array $data): Car;

    public function update(array $data, Car $car): void;

    public function delete(Car $car): void;

    public function getById(int $id): Car;
}
