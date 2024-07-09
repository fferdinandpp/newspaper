<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::prefix('admin')->group(function () {
    
    //Admin Authentication
    Route::get('login', [AuthController::class, 'adminLoginForm'])->name('admin.login'); //Show Form Login
    Route::post('login', [AuthController::class, 'adminLogin'])->name('admin.login.submit'); //Login
    Route::post('logout', [AuthController::class, 'adminLogout'])->name('admin.logout'); //Logout

    Route::middleware('auth:admin')->group(function () {

        //News
        Route::get('news', [NewsController::class, 'adminIndex'])->name('admin.news.index'); // Show News
        Route::get('news/create', [NewsController::class, 'create'])->name('admin.news.create'); // Show Form Add News 
        Route::post('news', [NewsController::class, 'store'])->name('admin.news.store'); // Add News
        Route::get('news/{id}/edit', [NewsController::class, 'edit'])->name('admin.news.edit'); // Show Form Edit News by ID
        Route::put('news/{id}', [NewsController::class, 'update'])->name('admin.news.update'); // Update News by ID
        Route::delete('news/{id}', [NewsController::class, 'destroy'])->name('admin.news.destroy'); // Delete News by ID

        //Comments
        Route::get('comments', [CommentController::class, 'adminIndex'])->name('admin.comments.index'); // Show Comments
        Route::delete('comments/{id}', [CommentController::class, 'adminDestroy'])->name('admin.comments.destroy'); // Delete Comments by ID

        //Categories
        Route::get('categories', [CategoryController::class, 'index'])->name('admin.categories.index'); // Show Categories
        Route::get('categories/create', [CategoryController::class, 'create'])->name('admin.categories.create'); // Show Form Add Categories
        Route::post('categories', [CategoryController::class, 'store'])->name('admin.categories.store'); // Add Categories
        Route::get('categories/{id}/edit', [CategoryController::class, 'edit'])->name('admin.categories.edit'); // Show Form Edit Categories by ID
        Route::put('categories/{id}', [CategoryController::class, 'update'])->name('admin.categories.update'); // Update Categories by ID
        Route::delete('categories/{id}', [CategoryController::class, 'destroy'])->name('admin.categories.destroy'); // Delete Categories by ID

        // User Management
        Route::get('users', [AuthController::class, 'adminIndex'])->name('admin.users.index'); //Show Users
        Route::delete('users/{id}', [AuthController::class, 'adminDestroy'])->name('admin.users.destroy'); // Delete Users
    });
});

    Route::prefix('user')->group(function () {
    
    // User Authentication
    Route::get('register', [AuthController::class, 'userRegisterForm'])->name('user.register'); // Show Form Register 
    Route::post('register', [AuthController::class, 'userRegister'])->name('user.register.submit'); // Register
    Route::get('login', [AuthController::class, 'userLoginForm'])->name('user.login'); // Show Form Login
    Route::post('login', [AuthController::class, 'userLogin'])->name('user.login.submit'); // Login
    Route::post('logout', [AuthController::class, 'userLogout'])->name('user.logout'); // Logout

    // News
    Route::get('news', [NewsController::class, 'userIndex'])->name('user.news.index'); // Show News
    Route::get('news/{id}', [NewsController::class, 'show'])->name('user.news.show'); // Show Detail News by ID
    Route::get('news/search', [NewsController::class, 'searchByTag'])->name('user.news.search'); // Show News in Specific Tag

    // Comments
    Route::get('comments', [CommentController::class, 'userIndex'])->name('user.comments.index'); // Show Comments
    Route::post('comments', [CommentController::class, 'store'])->name('user.comments.store'); // Add Comments
    Route::delete('comments/{id}', [CommentController::class, 'userDestroy'])->name('user.comments.destroy'); // Delete Comments by ID

    // Categories
    Route::get('categories/{id}/news', [CategoryController::class, 'showNews'])->name('user.categories.news'); // Show News in Specific Category
});