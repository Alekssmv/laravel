<?php

namespace App\Repositories\Contracts;

use App\Models\Image;

interface ImagesRepositoryContract
{

    public function find(string $path): ?Image;

    public function getImage(): Image;

    public function findOrCreate(string $path): Image;

}
