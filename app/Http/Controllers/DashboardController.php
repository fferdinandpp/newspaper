<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\News;
use App\Models\Category;
use App\Models\Comment;

class DashboardController extends Controller
{
    public function index()
    {
        $totalUsers = User::count();
        $totalNews = News::count();
        $totalCategories = Category::count();
        $totalComments = Comment::count();

        return response()->json([
            'total_users' => $totalUsers,
            'total_news' => $totalNews,
            'total_categories' => $totalCategories,
            'total_comments' => $totalComments,
        ]);
    }
}
