<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\News;

class CategoryController extends Controller
{
    // Admin

    // Show Categories
    public function index()
    {
        $categories = Category::all();
        return view('categories.index', compact('categories'));
    }

    // Show Form Add Categories
    public function create()
    {
        return view('categories.create');
    }

    // Add Categories
    public function store(Request $request)
    {
        // Validate Data
        $request->validate([
            'category' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:categories',
        ]);

        Category::create([
            'category' => $request->category,
            'slug' => $request->slug,
        ]);

        return redirect()->route('admin.categories.index');
    }

    // Show Form Update Categories by ID
    public function edit($id)
    {
        $category = Category::findOrFail($id);
        return view('categories.edit', compact('category'));
    }

    // Update Categories by ID
    public function update(Request $request, $id)
    {
        // Validate Data
        $request->validate([
            'category' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:categories,slug,' . $id,
        ]);

        $category = Category::findOrFail($id);

        $category->update([
            'category' => $request->category,
            'slug' => $request->slug,
        ]);

        return redirect()->route('admin.categories.index');
    }

    // Delete Categories by ID
    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();

        return redirect()->route('admin.categories.index');
    }

    // User

    // Show News in Specific Category
    public function showNews($id)
    {
        $category = Category::findOrFail($id);
        $news = $category->news;

        return view('categories.news', compact('category', 'news'));
    }
}