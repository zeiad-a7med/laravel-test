<?php

use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


ROute::group(['prefix' => LaravelLocalization::setLocale(),'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]],function(){
    Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    Route::get('/categories', [App\Http\Controllers\CategoryController::class, 'index'])->name('categories');
    Route::post('/category-create', [App\Http\Controllers\CategoryController::class, 'create'])->name('category.create');
    Route::get('/category/{id?}', [App\Http\Controllers\CategoryController::class, 'read'])->name('category.read');
    Route::post('/category-update', [App\Http\Controllers\CategoryController::class, 'update'])->name('category.update');
    Route::post('/category-delete', [App\Http\Controllers\CategoryController::class, 'delete'])->name('category.delete');

    Route::get('/category/products/{id?}', [App\Http\Controllers\ProductController::class, 'index'])->name('category.products');
    Route::post('/product-create', [App\Http\Controllers\ProductController::class, 'create'])->name('product.create');
    Route::get('/product/{id?}', [App\Http\Controllers\ProductController::class, 'read'])->name('product.read');
    Route::post('/product-update', [App\Http\Controllers\ProductController::class, 'update'])->name('product.update');
    Route::post('/product-delete', [App\Http\Controllers\ProductController::class, 'delete'])->name('product.delete');
    Route::post('/product-filter', [App\Http\Controllers\ProductController::class, 'filter'])->name('product.filter');

    Auth::routes();
});
