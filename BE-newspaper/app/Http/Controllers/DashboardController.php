<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Category;
use App\Models\News;
use App\Models\Comment;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $userCount = User::count();
        $categoryCount = Category::count();
        $newsCount = News::count();
        $commentCount = Comment::count();

        return response()->json([
            'user_count' => $userCount,
            'category_count' => $categoryCount,
            'news_count' => $newsCount,
            'comment_count' => $commentCount
        ]);
    }
}
