<?php

use Illuminate\Support\Facades\Route;
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/detail/{slug}', [App\Http\Controllers\HomeController::class, 'detail'])->name('detail');
Route::post('/comment/store', [App\Http\Controllers\CommentController::class, 'store'])->name('comment.store');

Auth::routes();

Route::namespace('App\Http\Controllers\User')->middleware(['auth'])->group(function () {
    Route::get('/category', [App\Http\Controllers\CategoryController::class, 'index'])->name('category');
    Route::get('/category/create', [App\Http\Controllers\CategoryController::class, 'create'])->name('category.create');
    Route::post('/category/store', [App\Http\Controllers\CategoryController::class, 'store'])->name('category.store');
    Route::get('/category/edit/{slug}', [App\Http\Controllers\CategoryController::class, 'edit'])->name('category.edit');
    Route::post('/category/update/{slug}', [App\Http\Controllers\CategoryController::class, 'update'])->name('category.update');
    Route::get('/category/delete/{slug}', [App\Http\Controllers\CategoryController::class, 'destroy'])->name('category.delete');

    Route::get('/subcategory', [App\Http\Controllers\SubcategoryController::class, 'index'])->name('subcategory');
    Route::get('/subcategory/create', [App\Http\Controllers\SubcategoryController::class, 'create'])->name('subcategory.create');
    Route::post('/subcategory/store', [App\Http\Controllers\SubcategoryController::class, 'store'])->name('subcategory.store');
    Route::get('/subcategory/edit/{slug}', [App\Http\Controllers\SubcategoryController::class, 'edit'])->name('subcategory.edit');
    Route::post('/subcategory/update/{slug}', [App\Http\Controllers\SubcategoryController::class, 'update'])->name('subcategory.update');
    Route::get('/subcategory/delete/{slug}', [App\Http\Controllers\SubcategoryController::class, 'destroy'])->name('subcategory.delete');


    Route::get('product', [App\Http\Controllers\ProductController::class, 'index'])->name('product.index');
    Route::get('product/create', [App\Http\Controllers\ProductController::class, 'create'])->name('product.create');
    Route::post('product/store', [App\Http\Controllers\ProductController::class, 'store'])->name('product.store');
    Route::get('product/edit/{slug}', [App\Http\Controllers\ProductController::class, 'edit'])->name('product.edit');
    Route::get('product/show/{slug}', [App\Http\Controllers\ProductController::class, 'show'])->name('product.show');
    Route::post('product/update/{slug}', [App\Http\Controllers\ProductController::class, 'update'])->name('product.update');
    Route::post('product/status/{slug}', [App\Http\Controllers\ProductController::class, 'statusUpdate'])->name('product.status');
    Route::get('product/delete/{slug}', [App\Http\Controllers\ProductController::class, 'destroy'])->name('product.delete');
});
