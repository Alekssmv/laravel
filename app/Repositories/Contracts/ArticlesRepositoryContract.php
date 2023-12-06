<?php

namespace App\Repositories\Contracts;

use App\Models\Article;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

interface ArticlesRepositoryContract extends FlushCacheRepositoryContract
{
    public function get(?int $count = null): Collection;

    public function getById(int $id, array $relations): Article;

    public function getLatestPublished(?int $perPage = null, array $relations): Collection;

    public function create(array $data): Article;

    public function paginatePublished(int $perPage = 5, array $relations, int $currentPage): LengthAwarePaginator;

    public function paginateAll(int $perPage = 5): LengthAwarePaginator;

    public function countSlug(string $slug): int;

    public function update(Article $article, array $data): void;

    public function delete(Article $article): void;

    public function count(): int;

    public function articleWithLongestTitle(): Article;

    public function articleWithShortestTitle(): Article;

    public function articleWithMostTags(): Article;

    public function avgTagsCountPerArticle(): float;
}
