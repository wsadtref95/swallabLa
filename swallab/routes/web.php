<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Middleware\IsAdmin;
use App\Http\Middleware\IsMember;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\FoodItemController;

Route::get('/', function () {
    return view('welcome');
});

// =============================登入路徑=================================
Route::view('/register', 'auth.register');
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::view('/login', 'auth.login');
Route::get('/forgot-password', function () {
    return view('auth.forgot-password');
});
Route::get('/reset-password/{token}', function ($token) {
    return view('auth.reset-password', ['token' => $token]);
})->name('password.reset');

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::post('/forgot-password', [AuthController::class, 'forgotPassword']);
Route::post('/reset-password', [AuthController::class, 'resetPassword']);

Route::middleware(['auth'])->group(function () {
    Route::middleware([IsAdmin::class])->group(function () {
        Route::get('/admin', function () {
            return view('admin.dashboard');
        });
    });

    Route::middleware([IsMember::class])->group(function () {
        Route::get('/profile', function () {
            $user = Auth::user();
            dd($user); // 调试信息，检查用户数据
            return view('login.profile', compact('user'));
        })->name('profile.show');
    });
});

// ========================後台模擬=============================
Route::resource('/food_items', FoodItemController::class);

// ========================個人頁面login==================
Route::view('/login/profile', 'login.profile');
