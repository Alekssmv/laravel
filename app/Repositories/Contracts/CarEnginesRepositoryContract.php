<?php

namespace App\Repositories\Contracts;

use Illuminate\Support\Collection;

interface CarEnginesRepositoryContract
{
    public function get(?int $count = null): Collection;


}
