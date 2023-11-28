<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\User\UserController;

Route::middleware(['auth'])->group(function () {

    //dashboard
    Route::get('dashboard', [AuthController::class, 'dashboard'])->name('dashboard');

    // categories 
    Route::middleware(['admin_auth'])->group(function () {
        //categories 
        Route::prefix('category')->group(function () {
            Route::get('list', [CategoryController::class, 'list'])->name('category#list');
            Route::get('create', [CategoryController::class, 'createPage'])->name('category#createPage');
            Route::post('create', [CategoryController::class, 'create'])->name('category#create');
            Route::get('delete/{id}', [CategoryController::class, 'delete'])->name('category#delete');
            Route::get('edit/{id}', [CategoryController::class, 'edit'])->name('category#edit');
            Route::post('update', [CategoryController::class, 'update'])->name('category#update');
        });

        //products
        Route::prefix('product')->group(function() {
            Route::get('list', [ProductController::class, 'list'])->name('product#list');
            Route::get('new', [ProductController::class, 'new'])->name('product#new');
            Route::post('create', [ProductController::class, 'create'])->name('product#create');
            Route::get('edit/{id}', [ProductController::class, 'edit'])->name('product#edit');
            Route::post('update/{id}', [ProductController::class, 'update'])->name('product#update');
            Route::get('delete{id}', [ProductController::class, 'delete'])->name('product#delete');
            Route::get('show/{id}', [ProductController::class, 'show'])->name('product#show');
        });

        //admin
        Route::prefix('admin/account')->group(function() {
            Route::get('list', [AdminController::class, 'list'])->name('admin#list');
            Route::get('change-password', [AdminController::class, 'changePasswordPage'])->name('admin#changePasswordPage');
            Route::post('update-password', [AdminController::class, 'updatePassword'])->name('admin#updatePassword');
            Route::get('detail', [AdminController::class, 'detail'])->name('admin#detail');
            Route::get('edit', [AdminController::class, 'edit'])->name('admin#edit');
            Route::post('update/{id}', [AdminController::class, 'update'])->name('admin#update');
            Route::get('delete/{id}', [AdminController::class, 'delete'])->name('admin#delete');
            Route::get('changeRole/{id}', [AdminController::class, 'changeRole'])->name('admin#changeRole');
            Route::post('updateRole/{id}', [AdminController::class, 'updateRole'])->name('admin#updateRole');
        });
    });

    //user
    Route::prefix('user')->middleware('user_auth')->group(function () {
        Route::get('home', [UserController::class, 'home'])->name('user#home');
        Route::get('changePassword', [UserController::class, 'changePassword'])->name('user#changePassword');
        Route::post('updatePassword', [UserController::class, 'updatePassword'])->name('user#updatePassword');
        Route::get('view', [UserController::class, 'view'])->name('user#view');
        Route::get('edit/{id}', [UserController::class, 'edit'])->name('user#edit');
        Route::post('update/{id}', [UserController::class,'update'])->name('user#update');
    });
});

// login, register
Route::middleware(['admin_auth'])->group(function() {
    Route::redirect('/', 'loginPage');
    Route::get('loginPage',[AuthController::class, 'loginPage'])->name('auth#loginPage');
    Route::get('registerPage', [AuthController::class, 'registerPage'])->name('auth#registerPage');
});
