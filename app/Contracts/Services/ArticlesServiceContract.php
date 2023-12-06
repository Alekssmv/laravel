<?php

namespace App\Contracts\Services;
use Illuminate\Http\UploadedFile;
use App\Models\Article;
use Illuminate\Support\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

interface ArticlesServiceContract
{
    public function create(array $data, UploadedFile|array|null $file): Article|string;

    public function update($data, UploadedFile|array|null $file, Article $article): void;

    public function paginateAll(?int $count = 10, array $relations = []): LengthAwarePaginator;

    public function getById(int $id, array $relations): Article;

    public function delete(Article $article): bool|string;

    public function get(int $count = null): Collection;

    public function getLatestPublished(int $count = null, array $relations = []): Collection;

    public function paginatePublished(int $perPage, array $relations, int $currentPage): LengthAwarePaginator;

}
