<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\UserController;

Route::get('/', [SiteController::class, 'home'])->name('home');
Route::get('/about', [SiteController::class, 'about'])->name('about');
Route::get('/contact', [SiteController::class, 'contact'])->name('contact');
Route::get('/projects', [PostController::class, 'index'])->name('projects');
Route::get('/projects/categories', [CategoryController::class, 'index'])->name('projects.categories');
Route::get('/projects/{category:slug}', [CategoryController::class, 'show'])->name('projects.category');
Route::get('/project/{post:id}', [PostController::class, 'show'])->name('projects.post');
Route::get('/@{user:username}', [UserController::class, 'show'])->name('user-profile');

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified',])->group(function () {

    Route::group(['middleware' => 'admin'], function () {
        Route::middleware('optimizeImages')->group(function () {
            Route::post('/projects', [PostController::class, 'store'])->name('project.store');
        });
        Route::delete('/projects/{post:slug}/delete', [PostController::class, 'destroy'])->name('project.destroy');
        Route::post('/projects/categories', [CategoryController::class, 'store'])->name('category.store');
        Route::delete('/projects/{categeory:slug}/delete', [CategoryController::class, 'destory'])->name('category.destroy');
    });
});
