<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;






//user login routes
Auth::routes();



//admin routes
Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {
    Route::get('/login', [App\Http\Controllers\Admin\Auth\AdminLoginController::class,"showLoginForm"])->name('login');
    Route::post('/login', [App\Http\Controllers\Admin\Auth\AdminLoginController::class,'adminLogin']);
    Route::post('/logout', [App\Http\Controllers\Admin\Auth\AdminLoginController::class,'adminLogout'])->name('logout')->middleware('auth:admin');
});



///client side public routes
Route::get('/', function () {
    return view('home');
});
Route::get("/shop", function (){
    return view('shop');
});
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

