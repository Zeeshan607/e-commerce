<?php

use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Admin\DashboardController;




Route::get('dashboard/statics', [DashboardController::class,'index'])->name('dashboard');
