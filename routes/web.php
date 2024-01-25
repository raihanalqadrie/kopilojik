<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\BlogsController;
use App\Http\Controllers\CategorysController;
use App\Http\Controllers\CatalogsController;
use App\Http\Controllers\HomeController;

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

Route::get('/', [HomeController::class, 'index']);
Route::get('/content/{slug}', [HomeController::class, 'content']);
Route::get('/about', [HomeController::class, 'about']);
Route::get('/menu', [HomeController::class, 'menu']);
Route::get('/contact', [HomeController::class, 'contact']);

Route::get('/admin', [UsersController::class, 'login'])->middleware('guest')->name('login');
Route::post('/admin', [UsersController::class, 'authenticate']);
Route::post('/logout', [UsersController::class, 'logout']);

Route::get('/register', [UsersController::class, 'register'])->middleware('guest');
Route::post('/register', [UsersController::class, 'store']);

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [ProductsController::class, 'dashboard']);

    Route::post('/dashboard/categorys', [CategorysController::class, 'create'])->name('categorys.create');
    Route::get('/dashboard/categorys', [CategorysController::class, 'read']);
    Route::post('/dashboard/categorys/update', [CategorysController::class, 'update'])->name('categorys.update');
    Route::post('/dashboard/categorys/delete', [CategorysController::class, 'delete'])->name('categorys.delete');
    Route::get('/dashboard/categorys/{category}/products', [CategorysController::class, 'showProducts'])->name('dashboard.categorys.products');

    Route::post('/dashboard/catalogs', [CatalogsController::class, 'create'])->name('catalogs.create');
    Route::get('/dashboard/catalogs', [CatalogsController::class, 'read']);
    Route::post('/dashboard/catalogs/update', [CatalogsController::class, 'update'])->name('catalogs.update');
    Route::post('/dashboard/catalogs/delete', [CatalogsController::class, 'delete'])->name('catalogs.delete');
    Route::get('/dashboard/catalogs/{catalog}/products', [CatalogsController::class, 'showProducts'])->name('dashboard.catalogs.products');

    Route::post('/dashboard/products', [ProductsController::class, 'create'])->name('products.create');
    Route::get('/dashboard/products', [ProductsController::class, 'read']);
    Route::post('/dashboard/products/update', [ProductsController::class, 'update'])->name('products.update');
    Route::post('/dashboard/products/delete', [ProductsController::class, 'delete'])->name('products.delete');

    Route::get('/dashboard/blogs/create', [BlogsController::class, 'create_View']);
    Route::get('/dashboard/blogs', [BlogsController::class, 'read']);
    Route::get('/dashboard/blogs/update/{blogs:slug}', [BlogsController::class, 'update_View']);
    Route::post('/dashboard/blogs/update/{blogs:slug}', [BlogsController::class, 'update']);
    Route::post('/dashboard/blogs/create', [BlogsController::class, 'create'])->name('blogs.create');
    Route::post('/dashboard/blogs/delete', [BlogsController::class, 'delete'])->name('blogs.delete');
});

// 404 Route for Admin Dashboard
Route::prefix('dashboard')->group(function () {
    Route::fallback(function () {
        return view('pages/dashboard/404', [
            "title" => "404"
        ]);
    })->name('404-dashboard');
});

// 404 Route for Homepage
Route::fallback(function () {
    return view('404', [
        "title" => "404 - Kopilojik"
    ]);
})->name('404-homepage');
