<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\IsAdmin;
use App\Http\Middleware\IsMember;
use App\Http\Controllers\AuthController;

Route::get('/', function () {
    return view('welcome');
});
// =============================登入路徑=================================
Route::view('/register', 'auth.register');
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
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
            return view('aa');
        });
    });

    
    Route::middleware([IsMember::class])->group(function () {
        Route::get('/member', function () {
            return view('aa');
        });
    });
});