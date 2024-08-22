<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
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
            'credit_card_1' => 'nullable|string|max:19',
            'credit_card_2' => 'nullable|string|max:19',
            'credit_card_3' => 'nullable|string|max:19',
        ]);

        $user = Auth::user();

        $data = $request->only(['name', 'email', 'phone', 'bio', 'instagram', 'facebook', 'threads', 'credit_card_1', 'credit_card_2', 'credit_card_3']);

        if ($request->hasFile('avatar')) {
            $avatarPath = $request->file('avatar')->store('avatars', 'public');
            $data['avatar'] = $avatarPath;

            if ($user->avatar) {
                Storage::disk('public')->delete($user->avatar);
            }
        }

        $user->update($data);

        return redirect()->route('profile.show')->with('success', '個人檔案更新完成!');
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

    public function updateCreditCard(Request $request)
    {
        $user = Auth::user();

    
        $creditCards = [];
        if ($user->credit_card_1) $creditCards[] = $user->credit_card_1;
        if ($user->credit_card_2) $creditCards[] = $user->credit_card_2;
        if ($user->credit_card_3) $creditCards[] = $user->credit_card_3;

        if (count($creditCards) >= 3) {
            return response()->json(['success' => false, 'message' => '最多只能儲存三張信用卡']);
        }

        $newCard = $request->input('card_number') . '|' . $request->input('expiry_date') . '|' . $request->input('cardholder_name');

        if (!$user->credit_card_1) {
            $user->credit_card_1 = $newCard;
        } elseif (!$user->credit_card_2) {
            $user->credit_card_2 = $newCard;
        } elseif (!$user->credit_card_3) {
            $user->credit_card_3 = $newCard;
        }

        $user->save();

        return response()->json(['success' => true]);
    }
    public function deleteCreditCard(Request $request)
    {
        $user = Auth::user();
        $index = $request->input('card_index');

        switch ($index) {
            case 0:
                $user->credit_card_1 = null;
                break;
            case 1:
                $user->credit_card_2 = null;
                break;
            case 2:
                $user->credit_card_3 = null;
                break;
            default:
                return response()->json(['success' => false], 400);
        }

        $user->save();

        return response()->json(['success' => true]);
    }

    public function changePassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|confirmed|min:8',
        ]);

        $user = Auth::user();

        if (!Hash::check($request->current_password, $user->password)) {
            return response()->json(['error' => '目前密碼不正確。'], 400);
        }

        $user->password = Hash::make($request->new_password);
        $user->save();

        return response()->json(['success' => '密碼更改成功。']);
    }
}
