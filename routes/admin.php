<?php

use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin;



Route::get('/statics', [DashboardController::class,'index'])->name('statics');
Route::group(['prefix' => 'category','as' => 'category.'],function(){
//
        Route::resource('/',Admin\Dashboard\CategoriesController::class)->except('createSlug');
        Route::post('/slug/create',[Admin\Dashboard\CategoriesController::class,'createSlug'])->name('slug.create');
});

