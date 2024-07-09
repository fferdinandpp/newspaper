<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;

class CommentController extends Controller
{
    
    // Admin

    // Show Comments
    public function adminIndex()
    {
        $comments = Comment::all();
        return view('admin.comments.index', compact('comments'));
    }

    // Delete Comments by ID
    public function adminDestroy($id)
    {
        $comment = Comment::findOrFail($id);
        $comment->delete();

        return redirect()->route('admin.comments.index');
    }

    // User

    // Show Comments
    public function userIndex()
    {
        $comments = Comment::all();
        return view('user.comments.index', compact('comments'));
    }

    // Add Comments
    public function store(Request $request)
    {
        // Validate Data
        $request->validate([
            'comment_content' => 'required|string|max:255',
            'news_id' => 'required|integer|exists:news,id',
            'user_id' => 'required|integer|exists:users,id',
        ]);

        Comment::create([
            'comment_content' => $request->comment,
            'news_id' => $request->news_id,
            'user_id' => $request->user_id,
        ]);

        return redirect()->route('user.comments.index');
    }

    // Delete Comments by ID
    public function userDestroy($id)
    {
        $comment = Comment::findOrFail($id);
        $comment->delete();

        return redirect()->route('user.comments.index');
    }
}