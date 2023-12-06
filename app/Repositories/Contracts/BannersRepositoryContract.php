<?php

namespace App\Repositories\Contracts;

use App\Models\Banner;
use Illuminate\Database\Eloquent\Collection;

interface BannersRepositoryContract
{

    public function getBanner(): Banner;
    public function get(int $count = 3): Collection;

    public function getRandom(int $count = 3, array $relations): Collection;
}
