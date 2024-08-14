<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Models\User;

class ProfileController extends Controller
{
    public function show()
    {
        $user = Auth::user();
        return view('profile.show', compact('user'));
    }

    public function edit()
    {
        $user = Auth::user();
        return view('profile.edit', compact('user'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'phone' => 'nullable|string|max:20',
            'bio' => 'nullable|string|max:1000',
            'instagram' => 'nullable|url|max:255',
            'facebook' => 'nullable|url|max:255',
            'threads' => 'nullable|url|max:255',
            'avatar' => 'nullable|image|max:2048', // 限制圖片大小為2MB
        ]);

        $user = Auth::user();

        $data = $request->only(['name', 'email', 'phone', 'bio', 'instagram', 'facebook', 'threads']);

        if ($request->hasFile('avatar')) {
            $avatarPath = $request->file('avatar')->store('avatars', 'public');
            $data['avatar'] = $avatarPath;

            if ($user->avatar) {
                Storage::disk('public')->delete($user->avatar);
            }
        }

        $user->update($data);

        return redirect()->route('profile.show')->with('success', 'Profile updated successfully.');
    }

    public function updateSocialLink(Request $request)
    {
        $request->validate([
            'platform' => 'required|string|in:instagram,facebook,threads',
            'link' => 'required|url|max:255',
        ]);

        $user = Auth::user();

        // 動態地更新指定的社群連結欄位
        $user->{$request->platform} = $request->link;
        $user->save();

        return response()->json(['message' => 'Social link updated successfully.']);
    }
}
