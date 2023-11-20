<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    // categories 
    Route::prefix('category')->group(function () {
        Route::get('/list', [CategoryController::class, 'list'])->name('category#list');
    });
});

// login, register
Route::redirect('/', 'loginPage');
Route::get('loginPage',[AuthController::class, 'loginPage'])->name('auth#loginPage');
Route::get('registerPage', [AuthController::class, 'registerPage'])->name('auth#registerPage');
Route::get('dashboard', function() {
    return view('dashboard');
});