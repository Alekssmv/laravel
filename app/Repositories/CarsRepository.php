<?php

namespace App\Repositories;

use App\Repositories\Contracts\CarsRepositoryContract;
use App\Models\Car;
use Illuminate\Support\Collection;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Cache;
use App\Repositories\Traits\FlushesCache;

class CarsRepository implements CarsRepositoryContract
{
    use FlushesCache;

    protected function getCacheTags(): array
    {
        return ['cars'];
    }

    public function flushCache(): void
    {
        Cache::tags($this->getCacheTags())->flush();
    }

    private readonly Car $car;
    public function __construct(Car $car)
    {
        $this->car = $car;
    }

    public function getCar(): Car
    {
        return $this->car;
    }

    public function get(?int $count = null): Collection
    {
        $query = $this->getCar()->newQuery()->when($count !== null, fn($query) => $query->take($count));

        return $query->get();
    }

    public function getById(int $id = null, array $relations = []): Car
    {
        return Cache::tags(['cars', 'images', 'car_engines', 'car_bodies', 'car_classes'])->
            remember(
                sprintf('carById|%s|%s', $id, implode('|', $relations)),
                3600,
                fn() => $this->getCar()
                    ->when($relations, fn($query) => $query->with($relations))
                    ->findOrFail($id)
            );
    }
    
    public function getNew(?int $count = null, array $relations): Collection
    {

        return Cache::tags(['cars', 'images', 'car_engines', 'car_bodies', 'car_classes'])->
            remember(
                sprintf('carNew|%s|%s', $count, implode('|', $relations)),
                3600,
                fn() => $this->getCar()
                    ->when($relations, fn($query) => $query->with($relations))
                    ->where('is_new', 1)->take($count)->get()
            );
    }

    public function create(array $data): Car
    {
        $this->flushCache();

        return $this->getCar()->create($data);
    }

    public function update(array $data, Car $car): Car
    {
        $this->flushCache();

        $this->getCar()->newQuery()->findOrFail($car->id)->update($data);

        return $car->refresh();

    }

    public function delete(int $id): void
    {
        $this->flushCache();

        $this->getCar()->newQuery()->findOrFail($id)->delete();
    }

    public function paginateAll(int $count = 5): LengthAwarePaginator
    {
        return $this->getCar()->newQuery()->paginate($count);
    }

    public function count(): int
    {
        return $this->getCar()->newQuery()->count();
    }
}
