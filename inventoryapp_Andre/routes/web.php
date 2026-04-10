<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FormController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TransactionController;

Route::get('/', [DashboardController::class, 'home'])->middleware('auth');

Route::get('/profile', [ProfileController::class, 'profile'])->middleware('auth');
Route::post('/profile', [ProfileController::class, 'profileadd'])->middleware('auth');

Route::get('/profile/update', [ProfileController::class, 'profileupdate'])->middleware('auth');
Route::put('/profile', [ProfileController::class, 'profilesave'])->middleware('auth');

Route::get('/register', [FormController::class, 'register']);
Route::post('/welcome', [FormController::class, 'welcome']);

Route::middleware(['auth', 'admin'])->group(function () {

    //Category
    Route::get('/category/create', [CategoryController::class, 'create']);
    Route::post('/category', [CategoryController::class, 'store']);

    Route::get('/category', [CategoryController::class, 'index']);
    Route::get('/category/{id}', [CategoryController::class, 'show']);

    Route::get('/category/{id}/edit', [CategoryController::class, 'edit']);
    Route::put('/category/{id}', [CategoryController::class, 'update']);

    Route::delete('/category/{id}', [CategoryController::class, 'destroy']);
});

Route::middleware(['guest'])->group(function () {
    //User
    Route::get('/register', [UserController::class, 'registration']);
    Route::post('/register', [UserController::class, 'register']);

    Route::get('/login', [UserController::class, 'login'])->name('login');
    Route::post('/login', [UserController::class, 'authenticate']);
});

//Product
Route::resource('/product', ProductController::class);

Route::middleware(['auth'])->group(function () {
    //Transaction
    Route::get('/transaction', [TransactionController::class, 'index']);

    Route::get('/transaction/{id}/create', [TransactionController::class, 'create']);
    Route::post('/transaction', [TransactionController::class, 'store']);

    Route::get('/transaction/{id}/edit', [TransactionController::class, 'edit']);
    Route::put('/transaction/{id}', [TransactionController::class, 'update']);
});

Route::post('/logout', [UserController::class, 'logout']);