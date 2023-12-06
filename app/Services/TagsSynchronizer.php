<?php

namespace App\Services;
use Illuminate\Support\Collection;
use App\Contracts\HasTagsContract;
use App\Repositories\Contracts\TagsRepositoryContract;
class TagsSynchronizer
{
    public function __construct(private readonly TagsRepositoryContract $tagsRepository)
    {
    }
    public function sync(Collection $tags, HasTagsContract $model)
    {
        $tagsToSync = collect();

        foreach ($tags as $tag) {
            $tagsToSync->push($this->tagsRepository->firstOrCreateByName($tag));
        }

        $this->tagsRepository->syncTags($model, $tagsToSync->pluck('id')->all());
    }
}
