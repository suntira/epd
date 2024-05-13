<?php

use App\Models\role;
use Illuminate\Support\Facades\Route;
use  Illuminate\Database\Eloquent\Model;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [\App\Http\Controllers\IndexController::class, 'index'])->name('home');
Route::get('/posts', [\App\Http\Controllers\PostController::class, 'index'])->name('posts.index');


Route::middleware("auth")->group(function () {
    Route::get('/posts/my/edit', [\App\Http\Controllers\PostController::class, 'myPosts'])->name('posts.my');
    Route::get('/posts/create', [\App\Http\Controllers\PostController::class, 'create'])->name('posts.create');
    Route::get('/posts/{post}/steps/create', [\App\Http\Controllers\PostController::class, 'createStepForm'])->name('posts.steps.create');
    Route::post('/posts/new',  [\App\Http\Controllers\PostController::class, 'storePost'])->name('posts.store');
    Route::get('/logout', [\App\Http\Controllers\AuthController::class,'logout'])->name('logout');
    Route::get('/posts/{id}', [\App\Http\Controllers\PostController::class, 'show'])->name('posts.show');
    Route::get('/posts/{id}/editshow', [\App\Http\Controllers\PostController::class, 'showedit'])->name('posts.showedit');
    Route::get('/posts/{postId}/steps', [\App\Http\Controllers\PostController::class, 'showStep'])->name('step.show');
    Route::get('/posts/{postId}/stepsedit', [\App\Http\Controllers\PostController::class, 'showStepEdit'])->name('step.showedit');
    Route::get('/profile', [\App\Http\Controllers\UserController::class, 'profile'])->name('user.show');
    Route::get('/profile/edit', [\App\Http\Controllers\UserController::class, 'edit'])->name('user.edit');
    Route::post('/profile/update', [\App\Http\Controllers\UserController::class, 'update'])->name('user.update');
    Route::get('/user/{id}', [\App\Http\Controllers\UserController::class, 'show'])->name('user.usershow');
    Route::post('/posts/like/{post}', [\App\Http\Controllers\PostController::class, 'like'])->name('posts.like');
    Route::get('/{userId}/favorites', [\App\Http\Controllers\PostController::class, 'showFavorites'])->name('posts.favorites');
    Route::post('/posts/{post}/steps/store', [\App\Http\Controllers\PostController::class, 'storeStep'])->name('posts.steps.store');
    Route::get('/posts/{post}/edit',[\App\Http\Controllers\PostController::class, 'edit'])->name('posts.edit');
    Route::patch('/posts/{post}/update', [\App\Http\Controllers\PostController::class, 'update'])->name('posts.update');
    Route::delete('/posts/{post}/delete', [\App\Http\Controllers\PostController::class, 'destroy'])->name('posts.destroy');
    Route::post('/posts/comment/{id}', [\App\Http\Controllers\PostController::class, 'comment'])->name('comment');
});
Route::middleware("guest")->group(function () {
    Route::get('/register', [\App\Http\Controllers\AuthController::class,'showRegisterForm'])->name('register');
    Route::post('/register_process', [\App\Http\Controllers\AuthController::class,'register'])->name('register_process');
    Route::get('/login', [\App\Http\Controllers\AuthController::class,'showLoginForm'])->name('login');
    Route::post('/login_process', [\App\Http\Controllers\AuthController::class,'login'])->name('login_process');
  
});
