<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;
use App\Models\Comment;
use Illuminate\Support\Str;

class HomeController extends Controller
{
    public function index()
    {
        $news = News::all();

        return response()->json($news);
    }

    public function show($slug)
    {
        $news = News::where('slug', $slug)->firstOrFail();

        return response()->json($news);
    }

    public function addComment(Request $request, $news_id)
    {
        $request->validate([
            'comment' => 'required|max:255',
        ]);

        $comment = Comment::create([
            'comment' => $request->comment,
            'id_news' => $news_id,
            'id_user' => $request->user()->id,
        ]);

        return response()->json($comment, 201);
    }

    public function deleteComment($comment_id)
    {
        $comment = Comment::findOrFail($comment_id);

        if ($comment->id_user === auth()->user()->id) {
            $comment->delete();
            return response()->json(null, 204);
        }

        return response()->json(['error' => 'Unauthorized'], 403);
    }
}
