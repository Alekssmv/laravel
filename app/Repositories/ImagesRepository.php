<?php

namespace App\Repositories;

use App\Repositories\Contracts\ImagesRepositoryContract;

use App\Models\Image;
use Illuminate\Support\Facades\Cache;

class ImagesRepository implements ImagesRepositoryContract
{
    private readonly Image $image;

    public function __construct(Image $image)
    {
        $this->image = $image;
    }

    public function find(string $path): ?Image
    {
        return Image::where('path', $path)->first();
    }

    public function getImage(): Image
    {
        return $this->image;
    }

    public function findOrCreate(string $path): Image
    {
        $image = $this->find($path);

        if (!$image) {
            $image = $this->image->create(['path' => $path]);
        }

        return Cache::remember("image|$path", 60 * 60, fn() => $image);
    }

}
