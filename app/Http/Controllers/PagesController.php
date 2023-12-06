<?php

namespace App\Http\Controllers;

use App\Repositories\Contracts\BannersRepositoryContract;
use App\Repositories\Contracts\CategoriesRepositoryContract;
use App\Contracts\Services\ApiServiceContract;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use App\Repositories\Contracts\CarsRepositoryContract;
use App\Contracts\Services\ArticlesServiceContract;
use Illuminate\Support\Str;
use App\Models\Article;
use Illuminate\Support\Facades\App;


class PagesController extends Controller
{

    private readonly ApiServiceContract $apiService;
    public function __construct(
        private readonly ArticlesServiceContract $articlesService,
        private readonly CarsRepositoryContract $carsRepository,
        private readonly BannersRepositoryContract $bannersRepository,
        private readonly CategoriesRepositoryContract $categoriesRepository,
    ) {

    }


    public function home(): Factory|View|Application
    {
        $cars = $this->carsRepository->getNew(4, ['images', 'image', 'engine', 'body', 'class']);
        $articles = $this->articlesService->getLatestPublished(3, ['image','tags']);
        $banners = $this->bannersRepository->getRandom(3, ['image']);
        $categories = $this->categoriesRepository->getRootCategories();

        return view('pages.homepage', compact('articles', 'cars', 'banners'));
    }

    public function about(): Factory|View|Application
    {
        return view('pages.about');
    }

    public function contact(): Factory|View|Application
    {
        return view('pages.contact');
    }

    public function clients(): Factory|View|Application
    {
        $cars = $this->carsRepository->get();

        //Средняя цена автомобилей
        $avgPrice = $cars->avg('price');

        //Посчитайте среднюю цену моделей, только тех, на которые действует скидка.
        $avgPrice2 = $cars->whereNotNull('old_price')->avg('price');

        //Найдите самую дорогую модель.
        $maxPrice = $cars->max('price');

        //Сформируйте коллекцию содержащую все виды салонов моделей.
        $SalonCollection = collect($cars->pluck('salon'))->reject(function ($salon) {
            return $salon === null;
        })->unique();

        //Сформируйте коллекцию состоящую из названий двигателей, отсортированных по алфавиту.
        $EngineCollection = collect($cars->pluck('engine'))->reject(function ($engine) {
            return $engine === null;
        })->unique()->sortBy('name');

        //Сформируйте коллекцию состоящую из названий классов моделей, отсортированных по алфавиту.
        //Ключом сделайте символьный код, сформированный из названия класса.
        $ClassCollection = collect($cars->pluck('class'))->reject(function ($class) {
            return $class === null;
        })->unique()->sortBy('name')->mapWithKeys(function ($class, string $key) {
            return [Str::slug($class->name) => $class];
        });

        //Сформируйте коллекцию моделей. В ней должны быть только модели со скидкой,
        //а также в названии этих моделей, или в названии их двигателей, или КПП, должна содержаться цифра 5 или 6.
        $Models = $cars->whereNotNull('old_price')->where(function ($car) {
            if (Str::contains($car->name, ['5', '6'])) {
                return $car;
            } elseif (Str::contains($car->engine->name, ['5', '6'])) {
                return $car;
            } elseif (Str::contains($car->kpp, ['5', '6'])) {
                return $car;
            }
        });

        //Сформируйте коллекцию всех видов кузовов отсортированных по возрастанию средней цены (для моделей, без учета скидок), где ключом является название вида кузова, а значением средняя цена на модели
        //с этим видом кузова. При этом не должны учитываться модели, у которых тип кузова не указан.
        $BodyCollection = collect($cars->pluck('body'))->reject(function ($body) {
            return $body === null;
        })->unique()->mapWithKeys(function ($body, string $key) use ($cars) {
            return [$body->name => $cars->where('body_id', $body->id)->avg('price')];
        })->sort();

        return view('pages.clients', compact('avgPrice', 'avgPrice2', 'maxPrice', 'SalonCollection', 'EngineCollection', 'ClassCollection', 'Models', 'BodyCollection'));
    }

    public function finance(): Factory|View|Application
    {
        return view('pages.finance');
    }

    public function sale(): Factory|View|Application
    {
        return view('pages.sale');
    }

    public function salons(): Factory|View|Application
    {
        $salonsService = App::makeWith(ApiServiceContract::class, [
            'login' => config('apisalons.salons.login'),
            'password' => config('apisalons.salons.password'),
            'url' => config('apisalons.salons.url')
        ]);

        $salons = $salonsService->get('salons', [], 60 * 60);

        return view('pages.salons', compact('salons'));
    }

    public function articles(): Factory|View|Application
    {
        $articles = Article::latest('published_at')->whereNotNull('published_at')->get();

        return view('pages.articles', compact('articles'));
    }

    public function admin(): Factory|View|Application
    {
        return view('pages.admin');
    }
}
