<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Auth\EmailVerificationPromptController;
use App\Http\Controllers\Auth\VerifyEmailController;
use App\Http\Controllers\Auth\EmailVerificationNotificationController;


// Default home route
Route::get('/', function () {
    return view('welcome');
});

// Dashboard route (requires authentication and email verification)
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Group for authenticated users
Route::middleware(['auth'])->group(function () {
    // Profile Routes
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // User Routes
    // Route for users list
Route::get('/users', [UserController::class, 'index'])->name('users.index');

// Route for showing the create user form (optional)
Route::get('/users/create', [UserController::class, 'create'])->name('users.create');

// Route for storing a new user
Route::post('/users', [UserController::class, 'store'])->name('users.store');

// Route for showing the edit form for a user
Route::get('/users/{user}/edit', [UserController::class, 'edit'])->name('users.edit');

// Route for updating user details
Route::put('/users/{user}', [UserController::class, 'update'])->name('users.update');

// Route for deleting a user
Route::delete('/users/{user}', [UserController::class, 'destroy'])->name('users.destroy');
    
    // Post Routes
    Route::get('/posts', [PostController::class, 'index'])->name('posts.index');
    Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create');
    Route::post('/posts', [PostController::class, 'store'])->name('posts.store');
    Route::get('/posts/{post}', [PostController::class, 'show'])->name('posts.show');
    Route::get('/posts/{post}/edit', [PostController::class, 'edit'])->name('posts.edit');
    Route::patch('/posts/{post}', [PostController::class, 'update'])->name('posts.update');
    Route::delete('/posts/{post}', [PostController::class, 'destroy'])->name('posts.destroy');
});

// Auth routes with email verification
Auth::routes(['verify' => true]);

// Email Verification Routes (Handled by Auth::routes)
Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');

require __DIR__.'/auth.php';

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
