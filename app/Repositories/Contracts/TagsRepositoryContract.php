<?php

namespace App\Repositories\Contracts;

use App\Contracts\HasTagsContract;

use App\Models\Tag;

interface TagsRepositoryContract extends FlushCacheRepositoryContract
{
    public function firstOrCreateByName(string $name): Tag;

    public function syncTags(HasTagsContract $model, array $tags): void;

    public function tagWithMostArticles(): Tag;
}

