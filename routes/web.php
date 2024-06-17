<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});


Route::get("/shop", function (){
    return view('shop');
});

<<<<<<< HEAD
\Auth::routes();

Route::get('/get-admin',function(){
    $admin=\App\Models\Admin::all();
   return $admin;
});

=======

Auth::routes();
>>>>>>> c918cc21c5e5d2ec3ac47688dd0f158902afd674

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
//admin routes
Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {
    Route::get('/login', [App\Http\Controllers\Admin\Auth\AdminLoginController::class,"showLoginForm"])->name('login');
    Route::post('/login', [App\Http\Controllers\Admin\Auth\AdminLoginController::class,'adminLogin']);
    Route::post('/logout', [App\Http\Controllers\Admin\Auth\AdminLoginController::class,'adminLogout'])->name('logout')->middleware('auth:admin');
});
