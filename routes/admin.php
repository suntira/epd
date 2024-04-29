<?php

use App\Http\Controllers\Admin\PostController;
use App\Models\role;
use Illuminate\Support\Facades\Route;
use  Illuminate\Database\Eloquent\Model;
Route::get('login', [App\Http\Controllers\Admin\AuthController::class, 'index'])->name('login');
Route::post('login_process', [App\Http\Controllers\Admin\AuthController::class, 'login'])->name('login_process');
Route::middleware("auth:admin")->group(function(){
    Route::resource('posts', App\Http\Controllers\Admin\PostController::class);
    Route::get('logout', [App\Http\Controllers\Admin\AuthController::class, 'logout'])->name('logout');
   
});
