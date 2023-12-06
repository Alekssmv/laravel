<?php

namespace App\Repositories;

use Illuminate\Support\Collection;
use App\Repositories\Contracts\CarEnginesRepositoryContract;

use App\Models\CarEngine;

class CarEnginesRepository implements CarEnginesRepositoryContract
{

    private readonly CarEngine $carEngine;

    public function __construct(CarEngine $carEngine)
    {
        $this->carEngine = $carEngine;
    }


    private function getCarEngine(): CarEngine
    {
        return $this->carEngine;
    }
    public function get(?int $count = null): Collection
    {
        $query = $this->getCarEngine()->newQuery()->when($count !== null, fn($query) => $query->take($count));

        return $query->get();
    }

    
}
