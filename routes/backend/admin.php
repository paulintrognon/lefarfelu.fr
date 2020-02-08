<?php

use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\MediaController;
use App\Http\Controllers\Backend\PageController;

// All route names are prefixed with 'admin.'.

Route::redirect('/', '/admin/dashboard', 301);
Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

Route::get('pages', [PageController::class, 'list'])->name('page.list');
Route::get('pages/create', [PageController::class, 'create'])->name('page.create');
Route::post('pages/store', [PageController::class, 'store'])->name('page.store');
Route::get('pages/{page}/edit', [PageController::class, 'edit'])->name('page.edit');
Route::post('pages/{page}/update', [PageController::class, 'update'])->name('page.update');

Route::post('media/tinymce_upload', [MediaController::class, 'tinymce_upload'])->name('media.tinymce_upload');