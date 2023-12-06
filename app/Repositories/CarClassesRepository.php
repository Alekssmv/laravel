<?php

namespace App\Repositories;

use App\Models\CarClass;
use App\Repositories\Contracts\CarClassesRepositoryContract;
use Illuminate\Support\Collection;

class CarClassesRepository implements CarClassesRepositoryContract
{
    private readonly CarClass $carClass;

    public function __construct(CarClass $carClass)
    {
        $this->carClass = $carClass;
    }

    private function getCarClass(): CarClass
    {
        return $this->carClass;
    }

    public function get(?int $count = null): Collection
    {
        $query = $this->getCarClass()->query()->when($count !== null, fn ($query) => $query->take($count));

        return $query->get();
    }

}
