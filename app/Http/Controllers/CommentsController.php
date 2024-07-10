<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\comments;

class CommentsController extends Controller
{
    public function index()
    {
        $comments = comments::all();

        return response()->json($comments);
    }

    public function destroy($id)
    {
        $comment = comments::findOrFail($id);
        $comment->delete();

        return response()->json(null, 204);
    }
}
