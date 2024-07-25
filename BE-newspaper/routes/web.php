<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\NewsController;
use App\Http\Controllers\Admin\CommentController;
use App\Http\Controllers\Admin\DashboardController;

Route::prefix('admin')->group(function () {
    Route::resource('users', UserController::class)->except(['index', 'edit', 'destroy']);
    Route::resource('categories', CategoryController::class)->except(['index', 'create', 'edit', 'destroy']);
    Route::resource('news', NewsController::class)->except(['index', 'create', 'edit', 'destroy']);
    Route::resource('comments', CommentController::class)->only(['index', 'destroy']);
    Route::get('/dashboard', [DashboardController::class, 'index']);
});
