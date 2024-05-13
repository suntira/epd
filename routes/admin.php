<?php

use App\Http\Controllers\Admin\PostController;
use App\Models\role;
use Illuminate\Support\Facades\Route;
use  Illuminate\Database\Eloquent\Model;
Route::get('login', [App\Http\Controllers\Admin\AuthController::class, 'index'])->name('login');
Route::post('login_process', [App\Http\Controllers\Admin\AuthController::class, 'login'])->name('login_process');
Route::middleware("auth:admin")->group(function(){
    Route::put('posts/{id}/accept', [App\Http\Controllers\Admin\PostController::class, 'accept'])->name('posts.accept');
    Route::put('posts/{id}/reject', [App\Http\Controllers\Admin\PostController::class, 'reject'])->name('posts.reject');
    Route::get('posts/{id}', [App\Http\Controllers\Admin\PostController::class, 'show'])->name('posts.show');
    Route::get('posts/{postId}/steps', [App\Http\Controllers\Admin\PostController::class, 'showStep'])->name('step.show');
    Route::resource('posts', App\Http\Controllers\Admin\PostController::class);
    Route::resource('users', App\Http\Controllers\Admin\UserController::class);
    Route::resource('comments', App\Http\Controllers\Admin\CommentController::class);
    Route::get('logout', [App\Http\Controllers\Admin\AuthController::class, 'logout'])->name('logout');
   
});
