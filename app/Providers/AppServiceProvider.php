<?php

namespace App\Providers;

use App\Services\RolesService;
use App\Services\CarsService;
use App\Services\TagsSynchronizer;
use App\Services\ApiService;
use App\Services\ArticlesService;
use App\Contracts\Services\ApiServiceContract;
use App\Contracts\Services\ArticlesServiceContract;
use App\Contracts\Services\CarsServiceContract;
use App\Contracts\Services\CarsServiceApiContract;
use App\Contracts\RolesServiceContract;
use App\Repositories\Contracts\RolesRepositoryContract;
use Illuminate\Support\Facades\Config;
use Faker\Factory;
use Faker\Generator;
use QSchool\FakerImageProvider\FakerImageProvider;
use App\Services\CarsServiceApi;
use Illuminate\Support\ServiceProvider;
use App\Repositories\RolesRepository;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Gate;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->singleton(TagsSynchronizer::class, TagsSynchronizer::class);
        $this->app->singleton(RolesRepositoryContract::class, RolesRepository::class);
        $this->app->singleton(RolesServiceContract::class, RolesService::class);
        $this->app->singleton(ArticlesServiceContract::class, ArticlesService::class);
        $this->app->singleton(CarsServiceContract::class, CarsService::class);
        $this->app->singleton(CarsServiceApiContract::class, CarsServiceApi::class);

        $this->app->singleton(ApiServiceContract::class, ApiService::class);

        $this->app->singleton(Generator::class, function () {
            $faker = Factory::create(Config::get('app.faker_locale', 'en_US'));
            $faker->addProvider(new FakerImageProvider($faker));
            return $faker;
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Blade::if('admin', function () {
            return Gate::allows('admin');
        });

    }

    //

}
