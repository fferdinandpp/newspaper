<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;
use App\Models\Category;
use Illuminate\Support\Str;

class NewsController extends Controller
{
    public function index()
    {
        $news = News::all();

        return response()->json($news);
    }

    public function create()
    {
        // Return view for creating news (if using views)
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'news' => 'required',
            'id_category' => 'required|exists:categories,id_category',
            'tag' => 'required|max:255',
        ]);

        $slug = Str::slug($request->title);
        
        $news = News::create([
            'title' => $request->title,
            'news' => $request->news,
            'id_category' => $request->id_category,
            'tag' => $request->tag,
            'slug' => $slug,
        ]);

        return response()->json($news, 201);
    }

    public function edit($id)
    {
        $news = News::findOrFail($id);

        return response()->json($news);
    }

    public function update(Request $request, $id)
    {
        $news = News::findOrFail($id);

        $request->validate([
            'title' => 'required|max:255',
            'news' => 'required',
            'id_category' => 'required|exists:categories,id_category',
            'tag' => 'required|max:255',
        ]);

        $slug = Str::slug($request->title);

        $news->update([
            'title' => $request->title,
            'news' => $request->news,
            'id_category' => $request->id_category,
            'tag' => $request->tag,
            'slug' => $slug,
        ]);

        return response()->json($news, 200);
    }

    public function destroy($id)
    {
        $news = News::findOrFail($id);
        $news->delete();

        return response()->json(null, 204);
    }
}
