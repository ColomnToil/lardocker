<?php

use App\Http\Controllers\Main\IndexController;
use App\Http\Controllers\Admin\Main\IndexController as AdminIndexController;

use App\Http\Controllers\Admin\Category\IndexController as AdminCategoryIndexController;
use App\Http\Controllers\Admin\Category\CreateController as AdminCategoryCreateController;
use App\Http\Controllers\Admin\Category\StoreController as AdminCategoryStoreController;
use App\Http\Controllers\Admin\Category\ShowController as AdminCategoryShowController;
use App\Http\Controllers\Admin\Category\EditController as AdminCategoryEditController;
use App\Http\Controllers\Admin\Category\UpdateController as AdminCategoryUpdateController;
use App\Http\Controllers\Admin\Category\DeleteController as AdminCategoryDeleteController;

use App\Http\Controllers\Admin\Tag\IndexController as AdminTagIndexController;
use App\Http\Controllers\Admin\Tag\CreateController as AdminTagCreateController;
use App\Http\Controllers\Admin\Tag\StoreController as AdminTagStoreController;
use App\Http\Controllers\Admin\Tag\ShowController as AdminTagShowController;
use App\Http\Controllers\Admin\Tag\EditController as AdminTagEditController;
use App\Http\Controllers\Admin\Tag\UpdateController as AdminTagUpdateController;
use App\Http\Controllers\Admin\Tag\DeleteController as AdminTagDeleteController;

use App\Http\Controllers\Admin\Post\IndexController as AdminPostIndexController;
use App\Http\Controllers\Admin\Post\CreateController as AdminPostCreateController;
use App\Http\Controllers\Admin\Post\StoreController as AdminPostStoreController;
use App\Http\Controllers\Admin\Post\ShowController as AdminPostShowController;
use App\Http\Controllers\Admin\Post\EditController as AdminPostEditController;
use App\Http\Controllers\Admin\Post\UpdateController as AdminPostUpdateController;
use App\Http\Controllers\Admin\Post\DeleteController as AdminPostDeleteController;

use App\Http\Controllers\Admin\User\IndexController as AdminUserIndexController;
use App\Http\Controllers\Admin\User\CreateController as AdminUserCreateController;
use App\Http\Controllers\Admin\User\StoreController as AdminUserStoreController;
use App\Http\Controllers\Admin\User\ShowController as AdminUserShowController;
use App\Http\Controllers\Admin\User\EditController as AdminUserEditController;
use App\Http\Controllers\Admin\User\UpdateController as AdminUserUpdateController;
use App\Http\Controllers\Admin\User\DeleteController as AdminUserDeleteController;

use Illuminate\Support\Facades\Route;

Route::group(['namespace' => 'Main'], function () {
    Route::get('/', [IndexController::class, '__invoke'])->name('main.index');
});

Route::group(['namespace' => 'Admin', 'prefix' => 'admin'], function () {
    Route::group(['namespace' => 'Main'], function () {
        Route::get('/', [AdminIndexController::class, '__invoke'])->name('admin.main.index');
        Route::group(['namespace' => 'Category', 'prefix' => 'categories'], function () {
            Route::get('/', [AdminCategoryIndexController::class, '__invoke'])->name('admin.category.index');
            Route::get('/create', [AdminCategoryCreateController::class, '__invoke'])->name('admin.category.create');
            Route::post('/', [AdminCategoryStoreController::class, '__invoke'])->name('admin.category.store');
            Route::get('/{category}', [AdminCategoryShowController::class, '__invoke'])->name('admin.category.show');
            Route::get('/{category}/edit', [AdminCategoryEditController::class, '__invoke'])->name('admin.category.edit');
            Route::patch('/{category}', [AdminCategoryUpdateController::class, '__invoke'])->name('admin.category.update');
            Route::delete('/{category}', [AdminCategoryDeleteController::class, '__invoke'])->name('admin.category.delete');
        });
        Route::group(['namespace' => 'Tag', 'prefix' => 'tags'], function () {
            Route::get('/', [AdminTagIndexController::class, '__invoke'])->name('admin.tag.index');
            Route::get('/create', [AdminTagCreateController::class, '__invoke'])->name('admin.tag.create');
            Route::post('/', [AdminTagStoreController::class, '__invoke'])->name('admin.tag.store');
            Route::get('/{tag}', [AdminTagShowController::class, '__invoke'])->name('admin.tag.show');
            Route::get('/{tag}/edit', [AdminTagEditController::class, '__invoke'])->name('admin.tag.edit');
            Route::patch('/{tag}', [AdminTagUpdateController::class, '__invoke'])->name('admin.tag.update');
            Route::delete('/{tag}', [AdminTagDeleteController::class, '__invoke'])->name('admin.tag.delete');
        });
        Route::group(['namespace' => 'Post', 'prefix' => 'posts'], function () {
            Route::get('/', [AdminPostIndexController::class, '__invoke'])->name('admin.post.index');
            Route::get('/create', [AdminPostCreateController::class, '__invoke'])->name('admin.post.create');
            Route::post('/', [AdminPostStoreController::class, '__invoke'])->name('admin.post.store');
            Route::get('/{post}', [AdminPostShowController::class, '__invoke'])->name('admin.post.show');
            Route::get('/{post}/edit', [AdminPostEditController::class, '__invoke'])->name('admin.post.edit');
            Route::patch('/{post}', [AdminPostUpdateController::class, '__invoke'])->name('admin.post.update');
            Route::delete('/{post}', [AdminPostDeleteController::class, '__invoke'])->name('admin.post.delete');
        });
        Route::group(['namespace' => 'User', 'prefix' => 'users'], function () {
            Route::get('/', [AdminUserIndexController::class, '__invoke'])->name('admin.user.index');
            Route::get('/create', [AdminUserCreateController::class, '__invoke'])->name('admin.user.create');
            Route::post('/', [AdminUserStoreController::class, '__invoke'])->name('admin.user.store');
            Route::get('/{user}', [AdminUserShowController::class, '__invoke'])->name('admin.user.show');
            Route::get('/{user}/edit', [AdminUserEditController::class, '__invoke'])->name('admin.user.edit');
            Route::patch('/{user}', [AdminUserUpdateController::class, '__invoke'])->name('admin.user.update');
            Route::delete('/{user}', [AdminUserDeleteController::class, '__invoke'])->name('admin.user.delete');
        });
    });
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
