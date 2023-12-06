<?php

namespace App\Repositories;

use App\Models\Banner;
use App\Repositories\Contracts\BannersRepositoryContract;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Cache;
class BannersRepository implements BannersRepositoryContract
{
    private readonly Banner $banner;

    public function __construct(Banner $banner)
    {
        $this->banner = $banner;
    }

    public function getBanner(): Banner
    {
        return $this->banner;
    }
    public function get(int $count = 3): Collection
    {
        return Banner::get()->take($count);
    }

    public function getRandom(int $count = 3, array $relations): Collection
    {
        return Cache::remember(
            sprintf('banners|%s|%s', $count, implode('|', $relations)),
            3600,
            fn () => $this->getBanner()
            ->when($relations, fn ($query) => $query->with($relations))
            ->inRandomOrder()->take($count)->get()
            );

    }
}
