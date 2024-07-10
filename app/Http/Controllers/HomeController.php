<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\comments;
use App\Models\newses;

class HomeController extends Controller
{
    public function index()
    {
        $news = newses::all();

        return response()->json($news);
    }

    public function show($slug)
    {
        $news = newses::where('slug', $slug)->firstOrFail();

        return response()->json($news);
    }

    public function addComment(Request $request, $news_id)
    {
        $request->validate([
            'comment' => 'required|max:255',
        ]);

        $comment = comments::create([
            'comment' => $request->comment,
            'id_news' => $news_id,
            'id_user' => Auth::id(),
        ]);

        return response()->json($comment, 201);
    }

    public function deleteComment($comment_id)
    {
        $comment = comments::findOrFail($comment_id);

        if ($comment->id_user === auth()->user()->id) {
            $comment->delete();
            return response()->json(null, 204);
        }

        return response()->json(['error' => 'Unauthorized'], 403);
    }
}
