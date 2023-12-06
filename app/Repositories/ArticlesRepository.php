<?php

namespace App\Repositories;

use App\Repositories\Contracts\ArticlesRepositoryContract;
use App\Models\Article;
use App\Services\TagsSynchronizer;
use Illuminate\Support\Collection;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Cache;
use App\Repositories\Traits\FlushesCache;

class ArticlesRepository implements ArticlesRepositoryContract
{

    use FlushesCache;
    private readonly Article $article;
    private readonly TagsSynchronizer $tagsSynchronizer;

    public function __construct(Article $article)
    {
        $this->article = $article;
    }

    protected function getCacheTags(): array
    {
        return ['articles'];
    }

    public function flushCache(): void
    {
        Cache::tags($this->getCacheTags())->flush();
    }

    private function getArticle(): Article
    {
        return $this->article;
    }
    public function get(?int $count = null): Collection
    {
        $query = $this->getArticle()->newQuery()->when($count !== null, fn($query) => $query->take($count));

        return $query->get();
    }

    public function getLatestPublished(?int $count = null, array $relations): Collection
    {
        return Cache::tags(['articles', 'tags', 'images'])->remember(
            sprintf('getLatestPublished|%s|%s', $count, implode('|', $relations)),
            3600,
            fn() => $this->getArticle()
                ->when($relations, fn($query) => $query->with($relations))
                ->whereNotNull('published_at')->latest('published_at')->take($count)->get()
        );
    }

    public function create(array $data): Article
    {
        $this->flushCache();

        return $this->getArticle()->create($data);

    }

    public function paginatePublished(int $perPage = 5, array $relations, int $currentPage): LengthAwarePaginator
    {
        return Cache::tags(['articles', 'tags', 'images'])->remember(
            sprintf('paginatePublished|%s|%s', $currentPage, implode('|', $relations)),
            3600,
            fn() => $this->getArticle()
                ->when($relations, fn($query) => $query->with($relations))
                ->whereNotNull('published_at')->latest('published_at')->paginate($perPage)
        );
    }

    public function paginateAll(int $perPage = 5): LengthAwarePaginator
    {
        return $this->getArticle()->newQuery()->latest('published_at')->paginate($perPage);
    }

    public function countSlug(string $slug): int
    {
        return $this->getArticle()->newQuery()->where('slug', 'LIKE', "{$slug}%")->count();
    }

    public function update(Article $article, array $data): void
    {
        $this->flushCache();

        $article->update($data);
    }
    
    public function getById(int $id, array $relations): Article
    {
        return Cache::tags(['articles', 'tags', 'images'])->remember(
            sprintf('articleById|%s|%s', $id, implode('|', $relations)),
            3600,
            fn() => $this->getArticle()
                ->when($relations, fn($query) => $query->with($relations))
                ->findOrFail($id)
        );
    }

    public function delete(Article $article): void
    {
        $this->flushCache();

        $article->delete();
    }

    public function count(): int
    {
        return $this->getArticle()->newQuery()->count();
    }

    public function articleWithLongestTitle(): Article
    {
        return $this->getArticle()->newQuery()->orderByRaw('CHAR_LENGTH(title) DESC')->first();
    }

    public function articleWithShortestTitle(): Article
    {
        return $this->getArticle()->newQuery()->orderByRaw('CHAR_LENGTH(title) ASC')->first();
    }

    public function articleWithMostTags(): Article
    {
        return $this->getArticle()->withCount('tags')->orderBy('tags_count', 'desc')->first();
    }

    public function avgTagsCountPerArticle(): float
    {
        return $this->getArticle()->newQuery()->withCount('tags')->get()->avg('tags_count');
    }
}
