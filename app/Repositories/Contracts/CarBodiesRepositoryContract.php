<?php

namespace App\Repositories\Contracts;

use Illuminate\Support\Collection;

interface CarBodiesRepositoryContract
{
    public function get(?int $count = null): Collection;


}
