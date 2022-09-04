<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\BlogController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\LinkController;
use App\Http\Controllers\PhotoController;
use App\Http\Controllers\ReplyController;
use App\Http\Controllers\UserController;

Route::get('/', [SiteController::class, 'home'])->name('home');
Route::get('/about', [SiteController::class, 'about'])->name('about');
Route::get('/contact', [SiteController::class, 'contact'])->name('contact');
Route::get('/projects', [PostController::class, 'index'])->name('projects');
Route::get('/blog', [BlogController::class, 'index'])->name('blogs');
Route::get('/blog/{blog}', [BlogController::class, 'show'])->name('blog.post');
Route::get('/projects/categories', [CategoryController::class, 'index'])->name('projects.categories');
Route::get('/projects/{category:slug}', [CategoryController::class, 'show'])->name('projects.category');
Route::get('/project/{post:id}', [PostController::class, 'show'])->name('projects.post');
Route::get('/links', [LinkController::class, 'index'])->name('links');
Route::get('/photos', [PhotoController::class, 'index'])->name('photos');
Route::get('/photos/{photo:id}', [PhotoController::class, 'show'])->name('photo.show');
Route::get('/@{user:username}', [UserController::class, 'show'])->name('user-profile');

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified',])->group(function () {
    Route::post('/projects/{post:id}/reply', [ReplyController::class, 'PostReply'])->name('project.reply');
    Route::delete('/replies/{reply}/delete', [ReplyController::class, 'destroy'])->name('reply.destroy');
    Route::post('/blog/{blog}/reply', [ReplyController::class, 'BlogReply'])->name('blog.reply');
    Route::post('/photos/{photo}/reply', [ReplyController::class, 'PhotoReply'])->name('photo.reply');

    Route::group(['middleware' => 'admin'], function () {
        Route::middleware('optimizeImages')->group(function () {
            Route::post('/projects', [PostController::class, 'store'])->name('project.store');
            Route::post('/blogs', [BlogController::class, 'store'])->name('blog.store');
            Route::post('/photos', [PhotoController::class, 'store'])->name('photo.store');
        });
        Route::delete('/project/{post:id}/delete', [PostController::class, 'destroy'])->name('project.destroy');
        Route::delete('/blog/{blog}/delete', [BlogController::class, 'destroy'])->name('blog.destroy');
        Route::post('/projects/categories', [CategoryController::class, 'store'])->name('category.store');
        Route::delete('/projects/{categeory:slug}/delete', [CategoryController::class, 'destory'])->name('category.destroy');
        Route::post('/links', [LinkController::class, 'store'])->name('link.store');
        Route::delete('/links/{link}/delete', [LinkController::class, 'destroy'])->name('link.destroy');
        Route::delete('/photos/{photo}/delete', [PhotoController::class, 'destroy'])->name('photo.destroy');
        Route::get('/admin/users', [AdminController::class, 'users'])->name('admin.users');
        Route::get('/admin/replies', [AdminController::class, 'replies'])->name('admin.replies');
        Route::delete('/replies/{reply}/delete', [AdminController::class, 'deleteReply'])->name('admin.reply.destroy');
        Route::delete('/@{user:id}/delete', [AdminController::class, 'deleteUser'])->name('admin.user.destroy');
    });
});
