<?php

namespace App\Transformers;
use Illuminate\Support\Collection;

class TransformApiCars
{
    private array $fields = ['name', 'body_text', 'price', 'old_price', 'body_id'];
    public function transformCars(Collection $cars): Collection
    {

        $cars->transform(function ($car)  {
            $attributes = $car->getAttributes();
            return $this->filterAttributes($attributes);

        });
        return $cars;
    }

    public function filterAttributes(array $attributes): array
    {
        return array_filter($attributes, function ($key) {
            return in_array($key, $this->fields);
        }, ARRAY_FILTER_USE_KEY);
    }
}

