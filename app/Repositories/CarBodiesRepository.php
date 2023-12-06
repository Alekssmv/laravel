<?php

namespace App\Repositories;

use App\Models\CarBody;
use App\Repositories\Contracts\CarBodiesRepositoryContract;
use Illuminate\Support\Collection;

class CarBodiesRepository implements CarBodiesRepositoryContract
{
    private readonly CarBody $carBody;

    public function __construct(CarBody $carBody)
    {
        $this->carBody = $carBody;
    }

    private function getCarBody(): CarBody
    {
        return $this->carBody;
    }
    public function get(?int $count = null): Collection
    {
        $query = $this->getCarBody()->newQuery()->when($count !== null, fn($query) => $query->take($count));

        return $query->get();
    }

}
