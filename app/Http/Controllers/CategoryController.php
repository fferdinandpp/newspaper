<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();

        return response()->json($categories);
    }

    public function create()
    {
        // return view('categories.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'category' => 'required|max:255',
            'slug' => 'required|max:255|unique:categories,slug',
        ]);

        $category = Category::create([
            'category' => $request->category,
            'slug' => $request->slug,
        ]);

        return response()->json($category, 201);
    }

    public function edit($slug)
    {
        $category = Category::where('slug', $slug)->firstOrFail();

        return response()->json($category);
    }

    public function update(Request $request, $id)
    {
        $category = Category::where('id_category', $id)
                            ->orWhere('slug', $id)
                            ->firstOrFail();

        $request->validate([
            'category' => 'required|max:255',
        ]);

        $category->update([
            'category' => $request->category,
        ]);

        return response()->json($category, 200);
    }

    public function destroy($slug)
    {
        $category = Category::where('slug', $slug)->firstOrFail();
        $category->delete();

        return response()->json(null, 204);
    }
}
