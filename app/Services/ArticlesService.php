<?php

namespace App\Services;

use App\Repositories\Contracts\ArticlesRepositoryContract;
use App\Repositories\Contracts\ImagesRepositoryContract;
use App\Contracts\Services\ArticlesServiceContract;
use Exception;
use App\Models\Image;
use App\Models\Article;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Collection;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\DB;
use App\Events\ArticleCreatedEvent;
use App\Events\ArticleDeletedEvent;
use App\Events\ArticleUpdatedEvent;



class ArticlesService implements ArticlesServiceContract
{

    public function __construct(
        private readonly ArticlesRepositoryContract $articlesRepository,
        private readonly ImagesRepositoryContract $imagesRepository
    ) {
    }
    public function create(array $data, UploadedFile|array|null $file): Article|string
    {
        try {
            $article = DB::transaction(function () use ($data, $file) {

                $slug = Str::slug($data['title']);
                $slugCount = $this->articlesRepository->countSlug($slug);
                if ($slugCount > 0) {
                    $slug = "{$slug}-" . ++$slugCount;
                }
                $data['slug'] = $slug;

                $imageId = $this->imagesRepository->findOrCreate(Image::PATH_PREFIX . '/' . $file->hashName())->id;
                $data['image_id'] = $imageId;

                return $this->articlesRepository->create($data);
            });
        } catch (Exception $e) {
            Storage::disk(Image::STORAGE_DISK)->delete($file->hashName());
            throw $e;
        }
        Event::dispatch(new ArticleCreatedEvent($article));
        return $article;
    }

    public function update($data, UploadedFile|array|null $file, Article $article): void
    {

        DB::transaction(function () use ($data, $file, $article) {

            $imageId = $this->imagesRepository->findOrCreate(Image::PATH_PREFIX . '/' . $file->hashName())->id;
            $data['image_id'] = $imageId;
            $this->articlesRepository->update($article, $data);
        });
        Event::dispatch(new ArticleUpdatedEvent($article));
    }

    public function get(int $count = null): Collection
    {
        return $this->articlesRepository->get($count);
    }

    public function getLatestPublished(int $count = null, array $relations = []): Collection
    {
        return $this->articlesRepository->getLatestPublished($count, $relations);
    }

    public function paginatePublished(int $perPage, array $relations, int $currentPage): LengthAwarePaginator
    {
        return $this->articlesRepository->paginatePublished($perPage, $relations, $currentPage);
    }

    public function paginateAll(?int $perPage = 10, array $relations = []): LengthAwarePaginator
    {
        return $this->articlesRepository->paginateAll($perPage);
    }

    public function getById(int $id, array $relations): Article
    {
        return $this->articlesRepository->getById($id, $relations);
    }

    public function delete(Article $article): bool|string
    {
        try {
            DB::transaction(function () use ($article) {
                if (Storage::disk(Image::STORAGE_DISK)->exists($article->image->path)) {
                    Storage::disk(Image::STORAGE_DISK)->delete($article->image->path);
                }
                $article->image()->delete();
                $article->tags()->detach();
                $article->delete();

            });
        } catch (Exception $e) {
            throw $e;
        }
        Event::dispatch(new ArticleDeletedEvent($article));
        return true;
    }
}

