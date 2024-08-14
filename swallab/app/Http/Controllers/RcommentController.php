<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rcomment;
use Illuminate\Support\Facades\Auth;

class RcommentController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'post_id' => 'required|exists:posts,id',
            'rating' => 'required|integer|min:1|max:5',
            'comment' => 'required|max:255',
        ]);

        Rcomment::create([
            'user_id' => Auth::id(),
            'post_id' => $request->post_id,
            'rating' => $request->rating,
            'comment' => $request->comment,
        ]);

        return back();
    }
}
