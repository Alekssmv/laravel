<?php

namespace App\Services;

use App\Models\Article;
use App\Repositories\Contracts\CarsRepositoryContract;
use App\Repositories\Contracts\ArticlesRepositoryContract;
use App\Repositories\Contracts\TagsRepositoryContract;
use App\Services\StatisticsFormatData;
use App\Models\Tag;

class StatisticsService
{
    public function __construct(
        private readonly CarsRepositoryContract $carsRepository,
        private readonly ArticlesRepositoryContract $articlesRepository,
        private readonly TagsRepositoryContract $tagsRepository,
        private readonly StatisticsFormatData $statisticsFormatData,
    ) {

    }

    public function getStatistics(): array
    {
        return [
            'carsCnt' => $this->statisticsFormatData->format([
                'cnt' => $this->carsCount()
            ]),
            'articlesCnt' => $this->statisticsFormatData->format([
                'cnt' => $this->articlesCount()
            ]),
            'tagWithMostArticles' => $this->statisticsFormatData->format([
                'id' => $this->tagWithMostArticles()->id
            ]),
            'articleWithLongestTitle' => $this->statisticsFormatData->format([
                'id' => $this->articleWithLongestTitle()->id,
                'title' => $this->articleWithLongestTitle()->title,
                'len' => mb_strlen($this->articleWithLongestTitle()->titleLen)
            ]),
            'articleWithShortestTitle' => $this->statisticsFormatData->format([
                'id' => $this->articleWithShortestTitle()->id,
                'title' => $this->articleWithShortestTitle()->title,
                'len' => mb_strlen($this->articleWithShortestTitle()->titleLen)
            ]),
            'avgTagsCntPerArticle' => $this->statisticsFormatData->format([
                'cnt' => $this->avgTagsCountPerArticle()
            ]),
            'articleWithMostTags' => $this->statisticsFormatData->format([
                'id' => $this->articleWithMostTags()->id,
                'title' => $this->articleWithMostTags()->title,
                'cnt' => $this->articleWithMostTags()->tagsCnt
            ]),
        ];
    }

    public function carsCount(): int
    {
        return $this->carsRepository->count();
    }

    public function articlesCount(): int
    {
        return $this->articlesRepository->count();
    }

    public function tagWithMostArticles(): Tag
    {
        return $this->tagsRepository->tagWithMostArticles();
    }

    public function articleWithLongestTitle(): Article
    {
        return $this->articlesRepository->articleWithLongestTitle();
    }

    public function articleWithShortestTitle(): Article
    {
        return $this->articlesRepository->articleWithShortestTitle();
    }

    public function avgTagsCountPerArticle(): float
    {
        return $this->articlesRepository->avgTagsCountPerArticle();
    }

    public function articleWithMostTags(): Article
    {
        return $this->articlesRepository->articleWithMostTags();
    }
}
