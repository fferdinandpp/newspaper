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
        $news = newses::where('slug', $slug)->with('comments.user')->firstOrFail();
        return response()->json($news);
    }

    public function addComment(Request $request, $slug)
    {
        $request->validate([
            'comment' => 'required|max:255',
        ]);

        $news = newses::where('slug', $slug)->firstOrFail();

        $comment = comments::create([
            'comment' => $request->comment,
            'id_news' => $news->id_news,
            'id_user' => Auth::id(),
        ]);

        return response()->json($comment, 201);
    }

    public function deleteComment($id)
    {
        $comment = comments::findOrFail($id);

        if ($comment->id_user === auth()->id() || auth()->user()->role === 'admin') {
            $comment->delete();
            return response()->json(null, 204);
        }

        return response()->json(['error' => 'Unauthorized'], 403);
    }
}
