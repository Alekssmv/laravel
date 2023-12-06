<?php

namespace App\Repositories\Contracts;

use Illuminate\Support\Collection;

interface CarClassesRepositoryContract
{
    public function get(?int $count = null): Collection;


}
