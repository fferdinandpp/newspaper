<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CommentController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware(['auth:sanctum'])->group(function () {
    Route::get('/user', [AuthController::class, 'user']);
    Route::post('/logout', [AuthController::class, 'logout']);

    //Admin
    Route::middleware(['role:admin'])->group(function () {
        Route::get('/dashboard', [DashboardController::class, 'index']);
        Route::get('/dashboard/news', [NewsController::class, 'index']);
        Route::get('/dashboard/news/create', [NewsController::class, 'create']);
        Route::post('/dashboard/news', [NewsController::class, 'store']);
        Route::get('/dashboard/news/{slug}', [NewsController::class, 'edit']);
        Route::put('/dashboard/news/{slug}', [NewsController::class, 'update']);
        Route::delete('/dashboard/news/{slug}', [NewsController::class, 'destroy']);
        Route::get('/dashboard/categories', [CategoryController::class, 'index']);
        Route::get('/dashboard/categories/create', [CategoryController::class, 'create']);
        Route::post('/dashboard/categories', [CategoryController::class, 'store']);
        Route::get('/dashboard/categories/{slug}', [CategoryController::class, 'edit']);
        Route::put('/dashboard/categories/{slug}', [CategoryController::class, 'update']);
        Route::delete('/dashboard/categories/{slug}', [CategoryController::class, 'destroy']);
        Route::get('/dashboard/users', [UserController::class, 'index']);
        Route::delete('/dashboard/users/{id}', [UserController::class, 'destroy']);
        Route::get('/dashboard/comments', [CommentController::class, 'index']);
        Route::delete('/dashboard/comments/{id}', [CommentController::class, 'destroy']);
    });
    
    //User
    Route::get('/news', [HomeController::class, 'index']);
    Route::get('/news/{slug}', [HomeController::class, 'show']);
    Route::post('/comment/{slug}', [HomeController::class, 'addComment']);
    Route::delete('/comment/{id}', [HomeController::class, 'deleteComment']);
});

// Public
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);