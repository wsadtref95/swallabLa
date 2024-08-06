<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;

class FoodNotesController extends Controller
{
    public function show($id)
    {
        // 獲取所有評論
        $comments = Comment::with('user')->where('article_id', $id)->get();
        $user = Auth::user();

        // 將評論數據和文章ID傳遞給視圖
        return view('foodNotes.demoHotpot', [
            'comments' => $comments,
            'user' => $user,
            'article_id' => $id,
        ]);
    }

    public function storeComment(Request $request)
    {
        $validatedData = $request->validate([
            'article_id' => 'required|exists:articles,id',
            'message' => 'required|string|max:1000',
            'content' => 'nullable|string|max:1000',
        ]);

        \Log::info('Validated Data:', $validatedData);

        $comment = new Comment();
        $comment->user_id = Auth::id();
        $comment->article_id = $request->article_id;
        $comment->message = $request->message;
        $comment->content = $request->content ?? '';

        if ($comment->save()) {
            \Log::info('Comment saved successfully.');
        } else {
            \Log::error('Failed to save comment.');
        }

        return redirect()->back()->with('success', '評論已發表');
    }
}
