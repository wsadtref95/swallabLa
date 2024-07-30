<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Password;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    // 显示登录表单
    public function showLoginForm()
    {
        return view('auth.login');
    }

    // 登录方法
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            $user = Auth::user();

            if ($user->role == 'admin') {
                return redirect('/admin');
            } else {
                return redirect('/member');
            }
        }

        return back()->withErrors([
            'email' => __('auth.failed'), // 使用 auth 语言包中的错误消息
        ])->onlyInput('email');
    }

    // 注册方法
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'role' => 'required|in:admin,member',
        ], [
            'name.required' => '名称是必需的。',
            'email.required' => '电子邮件地址是必需的。',
            'email.unique' => '这个电子邮件地址已经被使用。',
            'password.required' => '密码是必需的。',
            'password.confirmed' => '密码确认不匹配。',
            'role.required' => '角色是必需的。',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role,
        ]);

        Auth::login($user); // 自动登录

        if ($user->role == 'admin') {
            return redirect('/admin');
        } else {
            return redirect('/member');
        }
    }

    // 忘记密码方法
    public function forgotPassword(Request $request)
    {
        $request->validate(['email' => 'required|email']);

        $status = Password::sendResetLink(
            $request->only('email')
        );

        return $status === Password::RESET_LINK_SENT
            ? back()->with('status', '密码重设链接已发送至您的邮箱。')
            : back()->withErrors(['email' => __($status)]);
    }

    // 重置密码方法
    public function resetPassword(Request $request)
    {
        $request->validate([
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function ($user, $password) {
                $user->forceFill([
                    'password' => Hash::make($password)
                ])->save();

                $user->setRememberToken(Str::random(60));

                event(new PasswordReset($user));
                Auth::login($user); // 自动登录用户
            }
        );

        if ($status === Password::PASSWORD_RESET) {
            $user = Auth::user();
            if ($user->role == 'admin') {
                return redirect('/admin');
            } else {
                return redirect('/member');
            }
        } else {
            return back()->withErrors(['email' => [__($status)]]);
        }
    }

    // 退出登录方法
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}
