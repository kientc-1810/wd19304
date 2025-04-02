<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

// trang chủ
Route::get('/', function () {
    return view('client.home');
});

//form login
Route::get('/login', function () {
    return view('auth.login');
})->name('login');
// đẩy từ form login lên
Route::post('/login', [AuthController::class, 'login']);

// logout
Route::post('/logout', function () {
    Auth::logout();
    return redirect('/login');    
})->name('logout');

// sử dụng middleware để xác thực user
Route::middleware('client')->group(function () {
    Route::get('/list', function () {
        return view('client.list');
    });
});

// sử dụng middleware để xác thực admin
Route::middleware('admin')->group(function () {
    Route::resource('categories', CategoryController::class);
    Route::resource('products', ProductController::class);
});
