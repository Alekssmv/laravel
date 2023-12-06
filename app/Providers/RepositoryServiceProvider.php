<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use App\Repositories\Contracts\TagsRepositoryContract;
use App\Repositories\TagsRepository;

use App\Repositories\Contracts\ArticlesRepositoryContract;
use App\Repositories\ArticlesRepository;

use App\Repositories\Contracts\CarsRepositoryContract;
use App\Repositories\CarsRepository;

use App\Repositories\Contracts\CarEnginesRepositoryContract;
use App\Repositories\CarEnginesRepository;

use App\Repositories\Contracts\CarBodiesRepositoryContract;
use App\Repositories\CarBodiesRepository;

use App\Repositories\Contracts\CarClassesRepositoryContract;
use App\Repositories\CarClassesRepository;

use App\Repositories\Contracts\CategoriesRepositoryContract;
use App\Repositories\CategoriesRepository;

use App\Repositories\Contracts\ImagesRepositoryContract;
use App\Repositories\ImagesRepository;

use App\Repositories\Contracts\BannersRepositoryContract;
use App\Repositories\BannersRepository;


class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->singleton(
            ArticlesRepositoryContract::class,
            ArticlesRepository::class
        );

        $this->app->singleton(
            CarsRepositoryContract::class,
            CarsRepository::class
        );

        $this->app->singleton(
            CarEnginesRepositoryContract::class,
            CarEnginesRepository::class
        );

        $this->app->singleton(
            CarBodiesRepositoryContract::class,
            CarBodiesRepository::class
        );

        $this->app->singleton(
            CarClassesRepositoryContract::class,
            CarClassesRepository::class
        );
        $this->app->singleton(
            TagsRepositoryContract::class,
            TagsRepository::class
        );
        $this->app->singleton(
            CategoriesRepositoryContract::class,
            CategoriesRepository::class
        );
        $this->app->singleton(
            ImagesRepositoryContract::class,
            ImagesRepository::class
        );
        $this->app->singleton(
            BannersRepositoryContract::class,
            BannersRepository::class
        );
        



    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
