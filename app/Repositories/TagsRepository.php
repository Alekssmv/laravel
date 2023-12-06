<?php

namespace App\Repositories;

use App\Contracts\HasTagsContract;
use App\Repositories\Contracts\TagsRepositoryContract;
use App\Models\Tag;
use App\Repositories\Traits\FlushesCache;
use Illuminate\Support\Facades\Cache;

class TagsRepository implements TagsRepositoryContract
{
    use FlushesCache;

    public function __construct(private readonly Tag $model)
    {
    }
    
    protected function getCacheTags(): array
    {
        return ['tags'];
    }

    public function flushCache(): void
    {
        Cache::tags($this->getCacheTags())->flush();
    }

    public function firstOrCreateByName(string $name): Tag
    {
        $this->flushCache();

        return $this->getModel()->firstOrCreate(['name' => $name]);
    }

    public function syncTags(HasTagsContract $model, array $tags): void
    {
        $this->flushCache();

        $model->tags()->sync($tags);
    }

    private function getModel(): Tag
    {
        return $this->model;
    }

    public function tagWithMostArticles(): Tag
    {
        return $this->getModel()->withCount('articles')->orderBy('articles_count', 'desc')->first();
    }
}
