<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {

    //dashboard
    Route::get('dashboard', [AuthController::class, 'dashboard'])->name('dashboard');

    // categories 

    Route::prefix('category')->middleware('admin_auth')->group(function () {
        Route::get('list', [CategoryController::class, 'list'])->name('category#list');
        Route::get('create', [CategoryController::class, 'createPage'])->name('category#createPage');
        Route::post('create', [CategoryController::class, 'create'])->name('category#create');
        Route::get('delete/{id}', [CategoryController::class, 'delete'])->name('category#delete');
    });

    //user
    Route::prefix('user')->middleware('user_auth')->group(function () {
        Route::get('home', function() {
            return view('user.home');    
        })->name('user#home');
    });
});

// login, register
Route::redirect('/', 'loginPage');
Route::get('loginPage',[AuthController::class, 'loginPage'])->name('auth#loginPage');
Route::get('registerPage', [AuthController::class, 'registerPage'])->name('auth#registerPage');