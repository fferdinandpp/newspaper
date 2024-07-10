<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\NewsesController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CommentsController;

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
        Route::get('/dashboard/news', [NewsesController::class, 'index']);
        Route::get('/dashboard/news/create', [NewsesController::class, 'create']);
        Route::post('/dashboard/news', [NewsesController::class, 'store']);
        Route::get('/dashboard/news/{slug}', [NewsesController::class, 'edit']);
        Route::put('/dashboard/news/{slug}', [NewsesController::class, 'update']);
        Route::delete('/dashboard/news/{slug}', [NewsesController::class, 'destroy']);
        Route::get('/dashboard/categories', [CategoryController::class, 'index']);
        Route::get('/dashboard/categories/create', [CategoryController::class, 'create']);
        Route::post('/dashboard/categories', [CategoryController::class, 'store']);
        Route::get('/dashboard/categories/{slug}', [CategoryController::class, 'edit']);
        Route::put('/dashboard/categories/{slug}', [CategoryController::class, 'update']);
        Route::delete('/dashboard/categories/{slug}', [CategoryController::class, 'destroy']);
        Route::get('/dashboard/users', [UserController::class, 'index']);
        Route::delete('/dashboard/users/{id}', [UserController::class, 'destroy']);
        Route::get('/dashboard/comments', [CommentsController::class, 'index']);
        Route::delete('/dashboard/comments/{id}', [CommentsController::class, 'destroy']);
    });
    
    //User
    Route::get('/news', [HomeController::class, 'index']);
    Route::get('/news/{slug}', [HomeController::class, 'show']);
    Route::post('/comment/{news_id}', [HomeController::class, 'addComment']);
    Route::delete('/comment/{id}', [HomeController::class, 'deleteComment']);
});

// Public
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);