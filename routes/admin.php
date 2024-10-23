<?php

use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin;



Route::get('/statics', [DashboardController::class,'index'])->name('statics');

Route::resource('category',Admin\Dashboard\CategoriesController::class)->except('createSlug');
Route::post('category/slug/create',[Admin\Dashboard\CategoriesController::class,'createSlug'])->name('category.slug.create');

Route::resource('product',Admin\Dashboard\ProductsController::class)->except('createSlug');
Route::post('product/slug/create',[Admin\Dashboard\ProductsController::class,'createSlug'])->name('product.slug.create');

Route::post('product/{id}/image/replace', [Admin\Dashboard\ProductImagesHandlingController::class,'replaceImage'] )->name('product.image.replace');
Route::post('product/{id}/image/delete', [Admin\Dashboard\ProductImagesHandlingController::class,'deleteImage'] )->name('product.image.delete');
Route::post('product/{id}/image/mark_as_featured', [Admin\Dashboard\ProductImagesHandlingController::class,'markImageAsFeatured'] )->name('product.image.mark_as_featured');
