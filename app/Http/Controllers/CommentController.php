<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function show($id)
    {
        // 獲取該食記的評論
        $comments = Comment::where('post_id', $id)->with('user')->get();

        // 將評論傳遞給視圖
        return view('foodNotes.demoHotpot', compact('comments', 'id'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'comment' => 'required|max:255',
        ]);

        Comment::create([
            'user_id' => Auth::id(),
            'post_id' => $request->post_id, // 確保有傳遞post_id
            'comment' => $request->comment,
        ]);

        return back();
    }
}
