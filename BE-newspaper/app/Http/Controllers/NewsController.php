<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Log;

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
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:5120',
        ]);

        $slug = Str::slug($request->title);
        $imagePath = null;

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('news_images', 'public');
        }

        $news = News::create([
            'title' => $request->title,
            'news' => $request->news,
            'id_category' => $request->id_category,
            'tag' => $request->tag,
            'slug' => $slug,
            'image' => $imagePath,
        ]);

        return response()->json($news, 201);
    }

    public function edit($slug)
    {
        $news = News::where('slug', $slug)->firstOrFail();

        return response()->json($news);
    }

    public function update(Request $request, $slug)
    {
        Log::info('Update method called with slug: ' . $slug);
        // Find the news item by slug
        $news = News::where('slug', $slug)->firstOrFail();
    
        // Validate the incoming request
        $request->validate([
            'title' => 'required|max:255',
            'news' => 'required',
            'id_category' => 'required|exists:categories,id_category',
            'tag' => 'required|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:5120',
        ]);
    
        // Update title, news, id_category, and tag
        $news->title = $request->title;
        $news->news = $request->news;
        $news->id_category = $request->id_category;
        $news->tag = $request->tag;
    
        // Handle image upload if a new image is provided
        if ($request->hasFile('image')) {
            // Delete old image if it exists
            if ($news->image) {
                Storage::disk('public')->delete($news->image);
            }
    
            // Store the new image and update the path
            $imagePath = $request->file('image')->store('news_images', 'public');
            $news->image = $imagePath; // Update image path
        }
    
        // Update slug based on title
        $news->slug = Str::slug($request->title); 
    
        // Save the changes
        $news->save();
    
        // Return the updated news item
        return response()->json($news, 200);
    }    

    public function destroy($slug)
    {
        $news = News::where('slug', $slug)->firstOrFail();

        if ($news->image) {
            Storage::disk('public')->delete($news->image);
        }

        $news->delete();

        return response()->json(null, 204);
    }
}
