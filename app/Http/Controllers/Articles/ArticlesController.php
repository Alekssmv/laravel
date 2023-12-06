<?php

namespace App\Http\Controllers\Articles;

use App\Contracts\Services\ArticlesServiceContract;
use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Repositories\Contracts\ArticlesRepositoryContract;
use App\Services\Articles;
use Gate;
use Illuminate\Http\Request;

class ArticlesController extends Controller
{



    public function __construct(
        private readonly ArticlesServiceContract $articlesService,
    ) {

    }
    public function index(Request $request)
    {
        $page = $request->get('page', 1);
        $articles = $this->articlesService->paginatePublished(5, ['image', 'tags'], $page);


        return view('pages.articles.articles', compact('articles'));
    }

    public function show(Article $article)
    {
        $user = auth()->user();

        $article = $this->articlesService->getById($article->id, ['image', 'tags']);
        return view('pages.articles.detail', compact('article', 'user'));
    }

}
