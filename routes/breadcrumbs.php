<?php

use Diglactic\Breadcrumbs\Breadcrumbs;
use App\Models\Article;

Breadcrumbs::for('home', function ($trail) {
    $trail->push('home', route('home'));
});

Breadcrumbs::for('about', function ($trail) {
    $trail->parent('home');
    $trail->push('about', route('about'));
});

Breadcrumbs::for('contact', function ($trail) {
    $trail->parent('home');
    $trail->push('contact', route('contact'));
});

Breadcrumbs::for('clients', function ($trail) {
    $trail->parent('home');
    $trail->push('clients', route('clients'));
});

Breadcrumbs::for('finance', function ($trail) {
    $trail->parent('home');
    $trail->push('finance', route('finance'));
});

Breadcrumbs::for('sale', function ($trail) {
    $trail->parent('home');
    $trail->push('sale', route('sale'));
});

Breadcrumbs::for('salons', function ($trail) {
    $trail->parent('home');
    $trail->push('salons', route('salons'));
});

Breadcrumbs::for('catalog', function ($trail, $category) {
    $trail->parent('home');
    $trail->push('catalog', route('catalog'));

    if (isset($category->parent)) {
        $trail->push($category->parent->name, route('catalog', $category->parent));
    }
    if (isset($category->name)) {
        $trail->push($category->name, route('catalog', $category));
    }
});

Breadcrumbs::for('articles.index', function ($trail) {
    $trail->parent('home');
    $trail->push('articles', route('articles.index'));
});

Breadcrumbs::for('articles.show', function ($trail, $article) {
    $trail->parent('articles.index');
    $trail->push($article->title, route('articles.show', $article));
});

Breadcrumbs::for('product.show', function ($trail, $car) {
    $trail->parent('catalog', $car->categories()->first());

    $trail->push($car->name, route('product.show', $car));
});
