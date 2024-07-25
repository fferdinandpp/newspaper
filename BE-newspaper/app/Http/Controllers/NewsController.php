<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\News;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index()
    {
        $news = News::with('category')->get();
        return response()->json($news);
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'news' => 'required|string',
            'image' => 'nullable|image|max:2048',
            'tag' => 'nullable|string',
            'category_id' => 'required|exists:categories,id',
        ]);

        $newsData = $request->only(['title', 'news', 'tag', 'category_id']);

        if ($request->hasFile('image')) {
            // Store the image
            $imagePath = $request->file('image')->store('news_images');
            $newsData['image'] = $imagePath;
        }

        $news = News::create($newsData);

        return response()->json(['message' => 'News created successfully', 'news' => $news]);
    }

    public function update(Request $request, News $news)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'news' => 'required|string',
            'image' => 'nullable|image|max:2048',
            'tag' => 'nullable|string',
            'category_id' => 'required|exists:categories,id',
        ]);

        $newsData = $request->only(['title', 'news', 'tag', 'category_id']);

        if ($request->hasFile('image')) {
            // Remove the old image if exists
            if ($news->image) {
                Storage::delete($news->image);
            }

            // Store the new image
            $imagePath = $request->file('image')->store('news_images');
            $newsData['image'] = $imagePath;
        }

        $news->update($newsData);

        return response()->json(['message' => 'News updated successfully', 'news' => $news]);
    }

    public function destroy(News $news)
    {
        // Remove the image if exists
        if ($news->image) {
            Storage::delete($news->image);
        }

        $news->delete();
        return response()->json(['message' => 'News deleted successfully']);
    }
}
