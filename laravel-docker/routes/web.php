<?php

use App\Http\Controllers\Main\IndexController;
use App\Http\Controllers\Admin\Main\IndexController as AdminIndexController;
use App\Http\Controllers\Admin\Category\IndexController as AdminCategoryIndexController;
use App\Http\Controllers\Admin\Category\CreateController as AdminCategoryCreateController;
use App\Http\Controllers\Admin\Category\StoreController as AdminCategoryStoreController;
use App\Http\Controllers\Admin\Category\ShowController as AdminCategoryShowController;
use App\Http\Controllers\Admin\Category\EditController as AdminCategoryEditController;
use App\Http\Controllers\Admin\Category\UpdateController as AdminCategoryUpdateController;
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
        });
    });
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
