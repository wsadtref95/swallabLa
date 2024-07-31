<?php
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Middleware\IsAdmin;
use App\Http\Middleware\IsMember;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\FoodItemController;
use App\Http\Controllers\ProfileController;
Route::get('/', function () {
    return view('welcome');
});

// =============================登入路徑=================================
Route::view('/register', 'auth.register');
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::view('/login', 'auth.login');
Route::get('/forgot-password', function() {
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
        Route::get('/headpage/headpage', function () {
            return view('headpage.headpage');
        })->name('headpage');

        Route::get('/profile', function () {
            $user = Auth::user();
            return view('login.profile', compact('user'));
        })->name('profile.show');
        Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::post('/profile/edit', [ProfileController::class, 'update'])->name('profile.update');
    });
});

// ========================後台模擬=============================
Route::resource('/food_items', FoodItemController::class);

// ========================個人頁面login==================
Route::view('/login/profile','login.profile');

Route::view('/headpage/Fheadpage','headpage/Fheadpage');
