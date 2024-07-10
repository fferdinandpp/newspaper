<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\newses;
use Illuminate\Support\Str;

class NewsesController extends Controller
{
    public function index()
    {
        $news = newses::all();

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
        
        $news = newses::create([
            'title' => $request->title,
            'news' => $request->news,
            'id_category' => $request->id_category,
            'tag' => $request->tag,
            'slug' => $slug,
        ]);

        return response()->json($news, 201);
    }

    public function edit($slug)
    {
        $news = newses::where('slug', $slug)->firstOrFail();

        return response()->json($news);
    }

    public function update(Request $request, $slug)
    {
        $news = newses::where('slug', $slug)->firstOrFail();

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

    public function destroy($slug)
    {
        $news = newses::where('slug', $slug)->firstOrFail();
        $news->delete();

        return response()->json(null, 204);
    }
}
