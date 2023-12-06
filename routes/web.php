<?php

require __DIR__.'/auth.php';

use App\Http\Controllers\Admin;

use App\Http\Controllers\CatalogController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\Articles;
use Illuminate\Routing\Router;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [PagesController::class, 'home'])->name('home');
Route::get('/about', [PagesController::class, 'about'])->name('about');
Route::get('/contact', [PagesController::class, 'contact'])->name('contact');
Route::get('/client', [PagesController::class, 'clients'])->name('clients');
Route::get('/finance', [PagesController::class, 'finance'])->name('finance');
Route::get('/sale', [PagesController::class, 'sale'])->name('sale');
Route::get('/salons', [PagesController::class, 'salons'])->name('salons');

Route::prefix('admin')->name('admin.')->middleware(['admin'])->group(function (Router $router) {
        $router->get('/', [Admin\PagesController::class, 'admin'])->name('admin');
        $router->resource('articles', Admin\ArticlesController::class)->except(['show']);
        $router->resource('cars', Admin\CarsController::class)->except(['show']);

    $router->get('cars', [Admin\CarsController::class, 'index'])->name('cars');
    $router->get('{car:id}/delete-car', [Admin\CarsController::class, 'delete'])->name('cars.delete-car');
    $router->get('articles', [Admin\ArticlesController::class, 'index'])->name('articles');
    $router->get('{article:id}/delete-article', [Admin\ArticlesController::class, 'delete'])->name('articles.delete-article');

});

Route::resource('articles', Articles\ArticlesController::class)->only(['index', 'show']);

Route::get('/catalog/{category?}', [CatalogController::class, 'catalog'])->name('catalog');
Route::get('/products/{car:id}', [CatalogController::class, 'show'])->name('product.show');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
