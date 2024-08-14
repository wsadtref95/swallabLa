<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function show($id)
    {
        $comments = Comment::where('post_id', $id)->with('user')->orderBy('created_at', 'desc')->get();

        return view('foodNotes.demoHotpot', compact('comments', 'id'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'comment' => 'required|max:255',
        ]);

        Comment::create([
            'user_id' => Auth::id(),
            'post_id' => $request->post_id,
            'comment' => $request->comment,
        ]);

        return back();
    }
}
