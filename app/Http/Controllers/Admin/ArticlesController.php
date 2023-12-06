<?php

namespace App\Http\Controllers\Admin;

use App\Contracts\Services\ArticlesServiceContract;
use App\Http\Controllers\Controller;
use App\Http\Requests\ArticleRequest;
use App\Http\Requests\TagsRequest;
use App\Models\Article;

use App\Repositories\Contracts\ImagesRepositoryContract;

use App\Services\TagsSynchronizer;
use Illuminate\Http\Request;
use App\Repositories\Contracts\ArticlesRepositoryContract;


class ArticlesController extends Controller
{

    public function __construct(
        private readonly ArticlesRepositoryContract $articlesRepositoryContract,
        private readonly TagsSynchronizer $tagsSynchronizer,
        private readonly ImagesRepositoryContract $imagesRepositoryContract,
        private readonly ArticlesServiceContract $articlesService,
    ) {
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $this->authorize('viewAny', Article::class);

        $articles = $this->articlesService->paginateAll();

        return view('pages.admin.articles.articles', compact('articles'));
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->authorize('create', Article::class);

        return view('pages.admin.articles.create', ['article' => new Article()]);
    }

    /**
     * Store a newly created resource in storage.
     */

    //ArticleRequest $request
    public function store(
        ArticleRequest $request,
        TagsRequest $tagsRequest
    ) {
        $this->authorize('create', Article::class);

        $article = $this->articlesService->create($request->only(['title', 'description', 'body', 'published_at', 'slug', 'image_id']), $request->file('image'));
        $this->tagsSynchronizer->sync(collect($tagsRequest['tags']), $article);

        return redirect()
            ->route('admin.articles')
            ->with('success', 'Новая статья успешно добавлена!');
    }

    /*
     * Display the specified resource.
     */
    /*
    public function show(Article $article)
    {
        return view('pages.articles.detail', $article);
    }
    */

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Article $article)
    {
        $this->authorize('update', $article);

        return view('pages.admin.articles.edit', compact('article'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(
        Request $request,
        TagsRequest $tagsRequest,
        Article $article
    ) {
        $this->authorize('update', $article);

        $this->articlesService->update($request->only(['title', 'description', 'body', 'published_at', 'slug', 'image_id']),$request->file('image'), $article);
        $this->tagsSynchronizer->sync(collect($tagsRequest['tags']), $article);


        return redirect()
            ->route('admin.articles')
            ->with('success', 'Статья успешно обновлена!');
    }

    public function delete(Article $article)
    {
        $this->authorize('delete', $article);

        $article = $this->articlesService->getById($article->id, ['image', 'tags']);

        return view('pages.admin.articles.delete', compact('article'));
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Article $article)
    {
        $this->authorize('delete', $article);

        $this->articlesService->delete($article);
        return redirect()
            ->route('admin.articles')
            ->with('success', 'Статья успешно удалена!');
    }
}
