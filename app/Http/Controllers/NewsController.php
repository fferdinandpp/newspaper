<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;
use App\Models\Category;

class NewsController extends Controller
{
    //Admin

    // Show News
    public function adminIndex()
    {
        $news = News::all();
        return view('adminNews.index', compact('news'));
    }

    // Show Form Add News
    public function create()
    {
        $categories = Category::all();
        return view('news.create', compact('categories'));
    }

    // Add News
    public function store(Request $request)
    {
        // Validate Data
        $request->validate([
            'news_title' => 'required|string|max:255',
            'news_content' => 'required|string',
            'news_tag' => 'required|string|max:255',
            'news_slug' => 'required|string|max:255|unique:news',
            'category_id' => 'required|integer|exists:categories,id',
        ]);

        News::create([
            'news_title' => $request->title,
            'news_content' => $request->content,
            'news_tag' => $request->tag,
            'news_slug' => $request->slug,
            'category_id' => $request->category_id,
        ]);

        return redirect()->route('admin.news.index');
    }

    // Show Form Edit News by ID
    public function edit($id)
    {
        $news = News::findOrFail($id);
        $categories = Category::all();
        return view('news.edit', compact('news', 'categories'));
    }

    // Update News by ID
    public function update(Request $request, $id)
    {
        // Validate Data
        $request->validate([
            'news_title' => 'required|string|max:255',
            'news_content' => 'required|string',
            'news_tag' => 'required|string|max:255',
            'news_slug' => 'required|string|max:255|unique:news',
            'category_id' => 'required|integer|exists:categories,id',
        ]);

        $news = News::findOrFail($id);
        $news->update([
            'news_title' => $request->title,
            'news_content' => $request->content,
            'news_tag' => $request->tag,
            'news_slug' => $request->slug,
            'category_id' => $request->category_id,
        ]);

        return redirect()->route('admin.news.index');
    }

    // Delete News by ID
    public function destroy($id)
    {
        $news = News::findOrFail($id);
        $news->delete();

        return redirect()->route('admin.news.index');
    }

    // User

    // Show News
    public function userIndex()
    {
        $news = News::all();
        return view('userNews.index', compact('news'));
    }

    // Show Detail News by ID
    public function show($id)
    {
        $news = News::findOrFail($id);
        return view('user.news.show', compact('news'));
    }

    // Show News in Specific Tag
    public function searchByTag(Request $request)
    {
        $tag = $request->input('tag');
        $news = News::where('tag', 'LIKE', "%{$tag}%")->get();
        return view('user.news.index', compact('news'));
    }

}