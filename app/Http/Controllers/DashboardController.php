<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Category;
use App\Models\comments;
use App\Models\newses;

class DashboardController extends Controller
{
    public function index()
    {
        $totalUsers = User::count();
        $totalNews = newses::count();
        $totalCategories = Category::count();
        $totalComments = comments::count();

        return response()->json([
            'total_users' => $totalUsers,
            'total_news' => $totalNews,
            'total_categories' => $totalCategories,
            'total_comments' => $totalComments,
        ]);
    }
}
