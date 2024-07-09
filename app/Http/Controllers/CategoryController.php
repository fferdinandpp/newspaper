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
        // Return view for creating category (if using views)
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

    public function edit($id)
    {
        $category = Category::findOrFail($id);

        return response()->json($category);
    }

    public function update(Request $request, $id)
    {
        $category = Category::findOrFail($id);

        $request->validate([
            'category' => 'required|max:255',
            'slug' => 'required|max:255|unique:categories,slug,' . $category->id,
        ]);

        $category->update([
            'category' => $request->category,
            'slug' => $request->slug,
        ]);

        return response()->json($category, 200);
    }

    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();

        return response()->json(null, 204);
    }
}
