<?php

namespace App\Services;

use App\Repositories\Contracts\CarsRepositoryContract;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Cache;
use Arr;
use App\Models\Car;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use App\Models\Image;
use App\Repositories\Contracts\ImagesRepositoryContract;
use App\Contracts\Services\CarsServiceContract;

class CarsService implements CarsServiceContract
{

    public function __construct(
        private readonly CarsRepositoryContract $carsRepository,
        private readonly ImagesRepositoryContract $imagesRepository
    ) {
    }
    public function paginateCatalogCars(
        array $data,
        ?int $count = 16,
        array $relations,
    ): LengthAwarePaginator { {

            $allCategories = collect();

            if (isset($data['category'])) {
                $allCategories = $data['category']->descendants->pluck('id')->push($data['category']->id)->all();
            }

            $query = $this->carsRepository->getCar()->newQuery();
            $query
                ->when(isset($data['model']), fn($query) => $query->where('name', 'like', '%' . $data['model'] . '%'))
                ->when(isset($data['min_price']), fn($query) => $query->where('price', '>=', $data['min_price']))
                ->when(isset($data['max_price']), fn($query) => $query->where('price', '<=', $data['max_price']))
                ->when(isset($data['order_price']), fn($query) => $query->orderBy('price', $data['order_price'] === 'asc' ? 'asc' : 'desc'))
                ->when(isset($data['order_model']), fn($query) => $query->orderBy('name', $data['order_model'] === 'asc' ? 'asc' : 'desc'))
                ->when(isset($data['category']->id), fn($query) => $query->whereHas('categories', fn($query) => $query->whereIn('id', $allCategories)));

            $data['category_id'] = $data['category'] ? $data['category']->id : null;
            Arr::pull($data, 'category');

            return Cache::tags(['cars', 'images', 'car_engines', 'car_bodies', 'car_classes'])->
                remember(
                    sprintf('cars|%s|%s', implode('|', $data), implode('|', $relations)),
                    3600,
                    fn() => $query
                        ->when($relations, fn($query) => $query->with($relations))
                        ->paginate($count)
                );
        }
    }
    public function create(array $data, UploadedFile|array|null $file): void
    {

        if (!Storage::disk(Image::STORAGE_DISK)->exists($file->hashName())) {
            $file->store(Image::PATH_PREFIX);
        }
        $imageId = $this->imagesRepository->findOrCreate(Image::PATH_PREFIX . '/' . $file->hashName())->id;
        $data['image_id'] = $imageId;
        $this->carsRepository->create($data);

    }

    public function update(array $data, UploadedFile|array|null $file, Car $car): void
    {
        if (!Storage::disk(Image::STORAGE_DISK)->exists($file->hashName())) {
            $file->store(Image::PATH_PREFIX);
        }
        $imageId = $this->imagesRepository->findOrCreate(Image::PATH_PREFIX . '/' . $file->hashName())->id;
        $data['image_id'] = $imageId;

        $this->carsRepository->update($data, $car);
    }

    public function paginateAll(int $perPage = 5): LengthAwarePaginator
    {
        return $this->carsRepository->paginateAll($perPage);
    }

    public function getById(int $id, array $relations): Car
    {
        return $this->carsRepository->getById($id, $relations);
    }

    public function delete(Car $car): void
    {
        $this->carsRepository->delete($car->id);
    }
}
